<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::orderBy('name')->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
       dd($sectors);
    }

    public function create()
    {
       dd('hello');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $sector = new Sector([
            'name' => $request->get('name')
        ]);
        $sector->save();
        return redirect()->route(' sector.index');
    }

    public function edit($id)
    {
        $sector = Sector::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $sector = Sector::find($id);
        $sector->name = $request->get('name');
        $sector->save();
        return redirect()->route(' sector.index');
    }

    public function destroy($id)
    {
        $sector = Sector::find($id);
        $sector->delete();
        return redirect()->route(' sector.index');
    }

}
