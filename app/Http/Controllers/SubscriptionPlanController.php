<?php

namespace App\Http\Controllers;

use App\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $subscriptionplans = SubscriptionPlan::orderBy('name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
       dd($subscriptionplans);
    }

    public function create()
    {
       dd('hello');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'duration_in_days' => 'required'
        ]);

        $subscriptionplan = new SubscriptionPlan([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'duration_in_days' => $request->get('duration_in_days'),
            'is_visible' => $request->get('is_visible'),
        ]);
        $subscriptionplan->save();
        return redirect()->route('subscriptionplan.index');
    }

    public function edit($id)
    {
        $subscriptionplan = SubscriptionPlan::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'duration_in_days' => 'required'
        ]);
        $subscriptionplan = SubscriptionPlan::find($id);
        $subscriptionplan->name = $request->get('name');
        $subscriptionplan->price = $request->get('price');
        $subscriptionplan->duration_in_days = $request->get('duration_in_days');
        $subscriptionplan->is_visible = $request->get('is_visible');
        $subscriptionplan->save();
        return redirect()->route('subscriptionplan.index');
    }

    public function destroy($id)
    {
        $subscriptionplan = SubscriptionPlan::find($id);
        $subscriptionplan->delete();
        return redirect()->route('subscriptionplan.index');
    }
}
