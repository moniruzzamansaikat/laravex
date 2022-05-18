<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, Post $post, Comment $comment)
    {
        // IT'S NOT JS 😀
        $user = auth()->user();
        $comment->replies()->create([
            'body' => $request->body,
            'user_id' => $user->id,
            'post_id' => $post->id,
            'comment_id' => $comment->id,
        ]);

        return back();
    }
}
