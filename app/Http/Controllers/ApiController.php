<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class ApiController extends Controller
{
    public function getCompany($sector_id)
    {
        if( $sector_id == 'sector' )
        {
            $companies = Company::orderBy('name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        }
        else
        {
            $companies = Company::where('sector_id',$sector_id)->get();
        }
        return response()->json($companies);
    }
}
