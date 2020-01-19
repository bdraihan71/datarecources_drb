<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockInfo;
class StockInfoController extends Controller
{
    public function index()
   {
       $stockinfos = StockInfo::all();
       return view('back-end.stockinfo.index', compact('stockinfos'));
   }
}
