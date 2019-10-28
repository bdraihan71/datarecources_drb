<?php

namespace App\Http\Controllers;

use App\Announcment;
use Illuminate\Http\Request;

class AnnouncmentController extends Controller
{
    public function index()
    {
        $announcments = Announcment::orderBy('text')->get()->sortBy('text', SORT_NATURAL|SORT_FLAG_CASE);
       dd($announcments);
    }

    public function create()
    {
       dd('hello');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
        ]);

        $announcment = new Announcment([
            'text' => $request->get('text'),
            'is_published' => $request->get('is_published')
        ]);
        $announcment->save();
        return redirect()->route('announcment.index');
    }

    public function edit($id)
    {
        $announcment = Announcment::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $announcment = Announcment::find($id);
        $announcment->name = $request->get('text');
        $announcment->name = $request->get('is_published');
        $announcment->save();
        return redirect()->route('announcment.index');
    }

    public function destroy($id)
    {
        $announcment = Announcment::find($id);
        $announcment->delete();
        return redirect()->route('announcment.index');
    }
}
