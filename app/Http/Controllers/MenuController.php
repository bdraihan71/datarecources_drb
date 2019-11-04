<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('title')->get()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
        return view('menu.index', compact('menus'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
        ]);

        // if ( $request->get('parent_menu_id') != null ) {
        //     $parent_id = $request->get('parent_menu_id');
        // }else{
        //     $parent_id =
        // }

        $menu = new Menu([
            'title' => $request->get('title'),
            'parent_menu_id' => $request->get('parent_menu_id')

        ]);
        $menu->save();
        return redirect(route('menu.index'))->with('success', 'Menu create successfully');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        $menus = Menu::orderBy('title')->get()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
        return view('menu.edit', compact('menu', 'menus'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
        ]);
        $menu = Menu::find($id);
        $menu->title = $request->get('title');
        $menu->parent_menu_id = $request->get('parent_menu_id');
        $menu->save();
        return redirect()->route('menu.index')->with('success', 'Menu update successfully');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu delete successfully');
    }
}
