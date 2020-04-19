<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Mail\Subscribe;
use App\Subscriber;
use App\SubscriptionPlan;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Auth;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $subscriptionplans = SubscriptionPlan::orderBy('name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
       return view('back-end.subscription-plan.index', compact('subscriptionplans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price_per_month' => 'required',
            'price_per_year' => 'required'
        ]);

        if($request->get('is_visible') == null){
            $is_visible = 0;
          } else {
            $is_visible = request('is_visible');
        }


        $subscriptionplan = new SubscriptionPlan([
            'name' => $request->get('name'),
            'price_per_month' => $request->get('price_per_month'),
            'price_per_year' => $request->get('price_per_year'),
            'user_limit' => $request->get('user_limit'),
            'is_visible' => $is_visible,
        ]);
        $subscriptionplan->save();
        return redirect()->route('subscriptionplan.index')->with('success', 'Subscription Plan has been created successfully');
    }

    public function edit($id)
    {
        $subscriptionplan = SubscriptionPlan::find($id);
        return view('back-end.subscription-plan.edit', compact('subscriptionplan'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price_per_month' => 'required',
            'price_per_year' => 'required'
        ]);

        if($request->get('is_visible') == null){
            $is_visible = 0;
          } else {
            $is_visible = request('is_visible');
        }

        $subscriptionplan = SubscriptionPlan::find($id);
        $subscriptionplan->name = $request->get('name');
        $subscriptionplan->price_per_month = $request->get('price_per_month');
        $subscriptionplan->price_per_year = $request->get('price_per_year');
        $subscriptionplan->user_limit = $request->get('user_limit');
        $subscriptionplan->is_visible = $is_visible;
        $subscriptionplan->save();
        return redirect()->route('subscriptionplan.index')->with('success', 'Subscription Plan has been updated successfully');
    }

    public function destroy($id)
    {
        $subscriptionplan = SubscriptionPlan::find($id);
        $subscriptionplan->delete();
        return redirect()->route('subscriptionplan.index')->with('success', 'Subscription Plan has been deleted successfully');
    }

    function original(){
        return new Carbon;
    }

    public function subscribePlan(Request $request)
    {
        $invoice = Invoice::all();
        $tran_id = new Carbon;
        $uniqueid =  '#'.'DRB'.date("Y").(count($invoice)+1);

        $invoice = new Invoice;
        $invoice->user_id = auth()->user()->id;
        $invoice->plan_id = $request->plan_id;
        $invoice->unique_id = $uniqueid;
        $invoice->price = $request->price;
        $invoice->type = $request->type;
        $invoice->user_limit = $request->user_limit;
        if ($request->type == 'monthly')
        {
            $invoice->expire_date =  $this->original()->addMonths(1);
        }else {
            $invoice->expire_date =  $this->original()->addMonths(12);
        }
        $invoice->save();

        $subscriber = new Subscriber;
        $subscriber->Invoice_id = $invoice->id;
        $subscriber->creator = auth()->user()->id;
        $subscriber->user_id = auth()->user()->id;
        if ($request->type == 'monthly')
        {
            $subscriber->expire_date =  $this->original()->addMonths(1);
        }else {
            $subscriber->expire_date =  $this->original()->addMonths(12);
        }
        $subscriber->save();


        $appURl = config('app.url');
        $store_id = env('SSL_STORE_ID', false);
        $store_pass =  env('SSL_STORE_PASS', false);
        $total_amount = $request->price;
        $currency = 'BDT';
        $tran_id = $tran_id->format('Y-m-d::H:i:s.u');
        $success_url = $appURl.'subscriptionplan/success';
        $fail_url = $appURl.'subscriptionplan/fail';
        $cancel_url = $appURl;
        $customer_name = Auth::user()->full_name;
        $customer_email = Auth::user()->email;
        $customer_phone = Auth::user()->contact_number;
        $client = new Client();
        $response = $client->request('POST', 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php', [
            'form_params' => [
                'store_id' => $store_id,
                'store_passwd' => $store_pass,
                'total_amount' => $total_amount,
                'currency' => $currency,
                'tran_id' => $tran_id,
                'success_url' => $success_url,
                'fail_url' => $fail_url,
                'cancel_url' => $cancel_url,
                'customer_name' => $customer_name,
                'customer_email' => $customer_email,
                'customer_phone' => $customer_phone,
            ]
        ]);



        return redirect(json_decode($response->getBody())->redirectGatewayURL);
    }

    public function success()
    {
        return view('back-end.subscription-plan.success');
    }

    public function fail()
    {
        $invoice = Invoice::where('user_id', auth()->user()->id)->latest()->first();
        $invoice->delete();
        $subscriber = Subscriber::where('creator', auth()->user()->id)->latest()->first();
        $subscriber->delete();
        return view('back-end.subscription-plan.fail');
    }
}
