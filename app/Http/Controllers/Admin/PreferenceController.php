<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use \Illuminate\Foundation\Inspiring;

class PreferenceController extends Controller
{
    public function index()
    {
        $data['quote'] = explode(' - ', Inspiring::quote());

        return view('admin.preferences.index', compact('data'));
    }
}
