<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\User;
use App\Notifications\CompanyNotification;
use Illuminate\Http\Request;
use Notification;
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

        if (($request->logo ?? null) != null) {
            $logo_name = time() . '.' . $request_data['logo']->extension();
            $request->logo->move(public_path('storage/img/companies/'), $logo_name);

            // file name to database
            $request_data['logo'] = $logo_name;
        }

        $company = Company::create($request_data);

        $this->sendRegisteredNotification($company);

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
            File::delete(public_path('storage\\img\\companies\\') . $company->logo);

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
        // Get logo file name and delete it
        $company = Company::find($id)->first();
        File::delete(public_path('storage\\img\\companies\\') . $company->logo);

        return DB::table('companies')->delete($id);
    }

    /**
     * Send Notification
     *
     * @param mixed $companyData
     * @return void
     */
    public function sendRegisteredNotification($companyData)
    {
        $user = User::first();

        Notification::send($user, new CompanyNotification($companyData->toArray()));
    }
}
