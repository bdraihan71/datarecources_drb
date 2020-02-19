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
        $subscriber = Subscriber::where('creator', auth()->user()->id)->latest()->first();
        $subscribers =Subscriber::where('invoice_id', $subscriber->invoice_id)->get();
        return view('back-end.user-dashboard.subscriber.index', compact('subscribers'));
    }

    public function postUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user != null){
            $invoice = Invoice::where('user_id', auth()->user()->id)->latest()->first();
            $subscribers = Subscriber::where('invoice_id', $invoice->id)->get();
            if($subscribers->count() < $invoice->user_limit){
                $subscriber = new Subscriber;
                $subscriber->invoice_id = $invoice->id;
                $subscriber->creator = auth()->user()->id;
                $subscriber->user_id = $user->id;
                $subscriber->expire_date =  $invoice->expire_date;
                $subscriber->save();
            }else{
                // dd('User limit exceeded');
                return redirect()->back()->with('error', 'User limit exceeded');
            }
        }else {
            // dd('User not found');
            return redirect()->back()->with('error', 'User not found');
        }

        return redirect()->back();
        
    }

    public function invoiceShow($id)
    {
        $invoice = Invoice::find($id);
        // dd($invoice);
        return view('back-end.user-dashboard.invoice.invoice', compact('invoice'));
    }

    public function destroy($id)
    {
        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        return redirect()->back();
    }
}
