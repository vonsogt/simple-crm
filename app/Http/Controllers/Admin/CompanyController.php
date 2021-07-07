<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::all();
        $data['title'] = 'Companies';

        return view('admin.companies.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Companies';

        return view('admin.companies.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $request_data = $request->all();

        $logo_extension = $request->logo->extension() ?? null;
        if ($logo_extension != null) {
            $logo_name = time() . '.' . $logo_extension;
            $request->logo->move(public_path('storage/img/companies/'), $logo_name);

            // file name to database
            $request_data['logo'] = $logo_name;
        }

        $company = Company::create($request_data);

        return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $company = Company::findOrFail($id);

        $data['company'] = $company;
        $data['title'] = 'Companies';

        return view('admin.companies.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        $data['company'] = $company;
        $data['title'] = 'Companies';

        return view('admin.companies.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $request_data = $request->all();
        $company = Company::findOrFail($id);

        $logo_extension = $request->logo->extension() ?? null;
        if ($logo_extension != null) {
            $logo_name = time() . '.' . $logo_extension;
            $request->logo->move(public_path('storage/img/companies/'), $logo_name);

            // Delete old file before update file name to the database
            File::delete(storage_path('app\public\img\companies\\') . $company->logo);

            // file name to database
            $request_data['logo'] = $logo_name;
        }

        $company->update($request_data);

        return redirect()->route('admin.company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('companies')->delete($id);
    }
}
