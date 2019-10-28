<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        dd($companies);
    }

    public function create()
    {
       dd('hello');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'ticker' => 'required',
            'sector_id' => 'required',
        ]);

        $company = new Company([
            'name' => $request->get('name'),
            'ticker' => $request->get('ticker'),
            'sector_id' => $request->get('sector_id')
        ]);
        $company->save();
        return redirect()->route('company.index');
    }

    public function edit($id)
    {
        $company = Company::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'ticker' => 'required',
            'sector_id' => 'required',
        ]);
        $company = Company::find($id);
        $company->name = $request->get('name');
        $company->name = $request->get('ticker');
        $company->name = $request->get('sector_id');
        $company->save();
        return redirect()->route('company.index');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('company.index');
    }
}
