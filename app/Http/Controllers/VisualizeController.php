<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisualizeController extends Controller
{
    public function index(){
        return view('front-end.visualize.index', compact('title'));
    }

    public function dataMatrix(){
        return view('front-end.visualize.data-matrix', compact('title'));
    }
}
