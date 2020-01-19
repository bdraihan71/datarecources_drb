<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Auth;

class NewsController extends Controller
{
    public function newsPortal()
    {
        $allnews = News::orderBy('id', 'DESC')->get();
        return view('back-end.news.index', compact('allnews'));
    }

    public function newsStore (Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'heading' => 'required|min:3|max:255',
            'source' => 'required|max:255',
            'body' => 'required|min:10|max:2000',
            'showing_area' => 'required',
        ]);

        if($request->file('image')){
            try{
                $epath = $request->file('image')->store(
                    env('APP_ENV') . '/news/images/' . 's3'
                );
            }catch(\Exception $exception){
                $exception->getMessage();
                return back()->withError("There was an error with uploading your file")->withInput(); 
            }

            $path = $epath;
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
            'is_published' => $is_published
        ]);
        $news->save();
        return redirect()->back()->with('success', 'News has been created successfully');

    }

    public function newsEdit($id)
    {
        $news = News::find($id);
        return view('back-end.news.edit', compact('news'));
    }

    public function newsUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'heading' => 'required|min:3|max:255',
            'source' => 'required|max:255',
            'body' => 'required|min:10|max:2000',
            'showing_area' => 'required',
        ]);

        if($request->file('image')){
            try{
                $epath = $request->file('image')->store(
                    env('APP_ENV') . '/news/images/' . 's3'
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
}