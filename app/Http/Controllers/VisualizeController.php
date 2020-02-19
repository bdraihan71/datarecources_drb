<?php

namespace App\Http\Controllers;

use App\StockInfo;
use Illuminate\Http\Request;

class VisualizeController extends Controller
{
    public function index(){
        return view('front-end.visualize.index');
    }

    public function dataMatrix(){
        $stockinfos = StockInfo::all();
        return view('front-end.visualize.data-matrix', compact('stockinfos'));
    }
}
