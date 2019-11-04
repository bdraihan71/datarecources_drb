<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('slug')->get()->sortBy('slug', SORT_NATURAL|SORT_FLAG_CASE);
        return view('page.index', compact('pages'));
    }

    public function create()
    {
        $menus = Menu::orderBy('title')->get()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
        dd($menus);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'menu_id' => 'required',
            'slug' => 'required|slug|unique:pages',
        ]);

        $page = new Page([
            'title' => $request->get('title'),
            'menu_id' => $request->get('menu_id'),
            'description' => $request->get('description'),
            'slug' => $request->get('slug')
        ]);
        $page->save();
        return redirect()->route('page.index');
    }

    public function edit($id)
    {
        $page = Page::find($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'menu_id' => 'required',
            'slug' => 'required|slug|unique:pages',
            'company_id' => 'required|unique:users,company_id,'.$id,
        ]);
        $sector = Sector::find($id);
        $sector->name = $request->get('name');
        $sector->name = $request->get('name');
        $sector->name = $request->get('name');
        $sector->name = $request->get('name');
        $sector->save();
        return redirect()->route('sector.index');
    }

    public function destroy($id)
    {
        $sector = Sector::find($id);
        $sector->delete();
        return redirect()->route('sector.index');
    }
}
