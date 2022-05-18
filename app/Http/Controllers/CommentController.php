<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Post $post)
    {
        $comments = $post->comments()->with('user')->get();
        return view('front.shared.comments', ['comments' => $comments]);
    }

    public function store(Post $post, Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $post->comments()->create([
            'text' => $request->comment,
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        Comment::destroy($comment->id);
        return back();
    }

}
