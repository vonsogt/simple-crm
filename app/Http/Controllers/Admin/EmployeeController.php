<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Imports\EmployeeImport;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * importExcel
     *
     * @param  mixed $request
     * @return void
     */
    public function importExcel(Request $request)
    {
        // Validate the file
        $validator = $request->validate([
            'excel_import' =>   'required|mimes:csv,xls,xlsx',
        ]);

        // Get file and store to storage
        $file = $request->file('excel_import');
        $file_name = time() . $file->getClientOriginalName();
        $file->move(public_path('storage/employees/excel-import/'), $file_name);

        Excel::import(new EmployeeImport, public_path('storage/employees/excel-import/' . $file_name));

        return redirect()->route('admin.employee.index')->with('message', 'Import success!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['employees'] = Employee::all();
        $data['title'] = trans('simplecrm.employee.title_singular');

        return view('admin.employees.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all()->pluck('name', 'id');

        $data['companies'] = $companies;
        $data['title'] = trans('simplecrm.employee.title');

        return view('admin.employees.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        // Add request created & updated by user_id
        $user_id = auth()->user()->id;
        $request->request->add(['created_by_id' => $user_id, 'updated_by_id' => $user_id]);

        // Hash the password
        $request->request->add(['password' => Hash::make($request->password)]);

        $employee = Employee::create($request->all());

        return redirect()->route('admin.employee.index')->with('message', trans('simplecrm.insert_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);

        $data['employee'] = $employee;
        $data['title'] = trans('simplecrm.employee.title_singular');

        return view('admin.employees.show', compact('data', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all()->pluck('name', 'id');

        $data['companies'] = $companies;
        $data['employee'] = $employee;
        $data['title'] = trans('simplecrm.employee.title_singular');

        return view('admin.employees.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);

        // Add request updated by user_id
        $user_id = auth()->user()->id;
        $request->request->add(['updated_by_id' => $user_id]);

        // Check if updated password same like in database
        $isChangePassword = $request->password != $employee->password;
        $isChangePassword ? $request->request->add(['password' => Hash::make($request->password)]) : $employee->password;

        $employee->update($request->all());

        return redirect()->route('admin.employee.index')->with('message', trans('simplecrm.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('employees')->delete($id);
    }
}
