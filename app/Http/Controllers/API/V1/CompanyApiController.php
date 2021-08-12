<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getCompanyEmployees(Request $request)
    {
        $employees = Employee::where('company_id', $request->company_id)->get();

        return response()->json($employees);
    }
}
