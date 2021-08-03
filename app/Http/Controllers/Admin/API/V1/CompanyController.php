<?php

namespace App\Http\Controllers\Admin\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function companyOptions(Request $request)
    {
        $options = Company::get()->pluck('name', 'id');
        return $options;
    }
}
