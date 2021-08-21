<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('assign.guard:employees');
    }


    /**
     * employeeCompany
     *
     * @return void
     */
    public function employeeCompany()
    {
        $employee = auth()->user();
        $data['company'] = auth()->user()->company()->first();
        $data['companyEmployee'] = Employee::where('company_id', $data['company']['id'])->get();

        return response()->json($data);
    }
}
