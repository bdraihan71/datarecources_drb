<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class ApiController extends Controller
{
    public function getCompany($sector_id)
    {
        $companies = Company::where('sector_id',$sector_id)->get();
        return response()->json($companies);
    }
}
