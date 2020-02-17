<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'DESC')->get();
        return view('back-end.invoice.index', compact('invoices'));
    }

    public function invoiceUser()
    {
        $invoices = Invoice::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('back-end.user-dashboard.invoice.index', compact('invoices'));
    }

    public function getUser()
    {
        return view('back-end.user-dashboard.subscriber.index');
    }

    public function postUser(Request $request)
    {
        dd($request->email);
    }
}
