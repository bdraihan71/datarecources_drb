<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Subscriber;
use App\User;
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
        $user = User::where('email', $request->email)->first();
        if ($user != null){
            $invoice = Invoice::where('user_id', auth()->user()->id)->latest()->first();
            $subscriber = Subscriber::where('Invoice_id', $invoice->id)->get();
            if($subscriber->count() <= $invoice->user_limit){
                $subscriber = new Subscriber;
                $subscriber->Invoice_id = $invoice->id;
                $subscriber->creator = auth()->user()->id;
                $subscriber->user_id = $user->id;
                $subscriber->expiry_date =  $invoice->expiry_date;
                $subscriber->save();
            }else{
                dd('user limit exceeded');
            }
            // dd($subscriber->count());
            // dd($invoice->user_limit);
        }else {
            dd('not found');
        }
        
    }
}
