<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('back-end.category.index', compact('categories'));
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:255',
        ]);

        if($request->get('is_published') == null){
            $is_published = 0;
          } else {
            $is_published = request('is_published');
        }

        $category = new Category([
            'name' => $request->get('name'),
            'order' => $request->get('order'),
            'is_published' => $is_published
        ]);
        $category->save();
        return redirect()->back()->with('success', 'Category has been created successfully');
    }
}
