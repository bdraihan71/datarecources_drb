<?php

namespace App\Http\Controllers;

use App\Category;
use App\MostRecent;
use Illuminate\Http\Request;
use App\News;
use Auth;

class NewsController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_published', 1)->orderBy('order', 'asc')->get();
        $allnews = News::where('is_published', 1)->latest()->paginate(50);
        $mostrecents = MostRecent::where('is_published', 1)->orderBy('created_at', 'DESC')->get();
        return view('front-end.news.index', compact('allnews','mostrecents','categories'));
    }

    public function singleNews($id)
    {
        $news = News::find($id);
        return view('front-end.news.single-news', compact('news'));
    }

    public function newsPortal()
    {
        $categories = Category::where('is_published', 1)->orderBy('order', 'asc')->get();
        $allnews = News::orderBy('id', 'DESC')->get();
        return view('back-end.news.index', compact('allnews','categories'));
    }

    public function newsStore (Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'required|min:3|max:255',
            'source' => 'required|max:255|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'body' => 'required|min:10|max:200',
            'showing_area' => 'required',
            'category_id' => 'required',
        ]);

        if($request->file('image')){
            try{
                $epath = $request->file('image')->store(
                    env('APP_ENV') . '/news/images' , 's3'
                );
            }catch(\Exception $exception){
                $exception->getMessage();
                return back()->withError("There was an error with uploading your file")->withInput();
            }

            $path = $epath;
        }else{
            $path = "";
        }

        if($request->get('is_published') == null){
            $is_published = 0;
          } else {
            $is_published = request('is_published');
        }

        $news = new News([
            'user_id' => Auth::user()->id,
            'image' => $path,
            'heading' => $request->get('heading'),
            'source' => $request->get('source'),
            'body' => $request->get('body'),
            'showing_area' => $request->get('showing_area'),
            'category_id' => $request->get('category_id'),
            'is_published' => $is_published
        ]);
        $news->save();
        return redirect()->back()->with('success', 'News has been created successfully');

    }

    public function newsEdit($id)
    {
        $categories = Category::where('is_published', 1)->orderBy('order', 'asc')->get();
        $news = News::find($id);
        return view('back-end.news.edit', compact('news','categories'));
    }

    public function newsUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'required|min:3|max:255',
            'source' => 'required|max:255|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'body' => 'required|min:10|max:200',
            'showing_area' => 'required',
            'category_id' => 'required',
        ]);

        if($request->file('image')){
            try{
                $epath = $request->file('image')->store(
                    env('APP_ENV') . '/news/images' , 's3'
                );
            }catch(\Exception $exception){
                $exception->getMessage();
                return back()->withError("There was an error with uploading your file")->withInput();
            }

            $path = $epath;
        }else {
            $path = $request->img;
        }

        if($request->get('is_published') == null){
            $is_published = 0;
          } else {
            $is_published = request('is_published');
        }

        $news = News::find($id);
        $news->user_id = Auth::user()->id;
        $news->image = $path;
        $news->heading = $request->get('heading');
        $news->source = $request->get('source');
        $news->body = $request->get('body');
        $news->category_id = $request->get('category_id');
        $news->showing_area = $request->get('showing_area');
        $news->is_published = $is_published;
        $news->save();
        return redirect()->route('news.portal')->with('success', 'News has been updated successfully');
    }

    public function newsDestroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->back()->with('success', 'News has been deleted successfully');
    }

    public function newsSearch(Request $request)
    {
        $allnews = News::where('is_published', 1)->where('heading', 'LIKE', "%$request->search%")->latest()->paginate(10);
        return view('front-end.news.index', compact('allnews'));
    }

    public function newsByCategoty($category)
    {
        $category = Category::where('name', $category)->first();
        $categories = Category::where('is_published', 1)->orderBy('order', 'asc')->get();
        $allnews = News::where('is_published', 1)->where('category_id', $category->id)->latest()->paginate(50);
        $mostrecents = MostRecent::where('is_published', 1)->orderBy('created_at', 'DESC')->get();
        return view('front-end.news.index', compact('allnews','mostrecents','categories','category'));
    }
}
