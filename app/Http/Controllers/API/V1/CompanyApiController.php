<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => 'showCompany']);
    }

    public function getCompanyEmployees(Request $request)
    {
        $employees = Employee::where('company_id', $request->company_id)->get();

        return response()->json($employees);
    }

    public function showCompany(Request $request)
    {
        $company_name = str_replace('-', ' ', $request->name ?? null);
        $company = Company::where('name', $company_name)->first();

        return response()->json($company);
    }
}
