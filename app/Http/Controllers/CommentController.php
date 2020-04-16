<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:255',
        ]);
        
        if(Auth::check() == false){
            $user = null;
          } else {
            $user = Auth::user()->id;
        }

        $comment = new Comment([
            'user_id' => $user,
            'body' => $request->get('body'),
            'body' => $request->get('body'),
            'news_id' => $request->get('news_id'),
        ]);
        $comment->save();
        return redirect()->back()->with('success', 'Comment has been created successfully');

    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment has been deleted successfully');
    }
}
