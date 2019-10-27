<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticContentController extends Controller
{
    public function index()
    {
        $keyvaluepairs = KeyValuePair::orderBy('key')->get()->sortBy('key', SORT_NATURAL|SORT_FLAG_CASE);

    }

    public function edit($id)
    {
        $keyvaluepair = KeyValuePair::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'value' => 'required',
        ]);

        $keyvaluepair = KeyValuePair::find($id);
        $keyvaluepair->value = $request->get('value');
        $keyvaluepair->save();
        return redirect('/configuration');
    }
}
