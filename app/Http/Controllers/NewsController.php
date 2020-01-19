<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function newsPortal()
    {
        return view('back-end.news.index');
    }
}
