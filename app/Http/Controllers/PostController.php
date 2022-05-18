<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $req)
    {
        $category = $req->query('category');
        $posts = [];

        if ($category) {
            $posts = Post::where('category_id', $category)->orderBy('created_at', 'desc')->with(['user', 'likes', 'category'])->paginate(10);
        } else {
            $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes', 'category'])->paginate(10);
        }

        $categories = Category::all();
        return view('front.posts.index', ['posts' => $posts, 'categories' => $categories]);
    }

    public function show(Post $post)
    {
        return view('front.posts.show', ['post' => $post]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('front.posts.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $fileName = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
        }

        $this->validate($request, [
            'body' => 'required',
            'category' => 'required',
        ]);

        $request->user()->posts()->create([
            'body' => $request->body,
            'category_id' => $request->category,
            'image' => $fileName,
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        return back();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('front.posts.edit', ['post' => $post]);
    }

    public function update(Request $request)
    {
        $post = array(
            'description' => $request->body,
        );

        Post::find($request->id)->update($post);

        return redirect('/');
    }

    public function handle_likes(Post $post, Request $request)
    {
        if (!$post->likedBy($request->user())) {
            $post->likes()->create([
                'user_id' => $request->user()->id,
            ]);
        } else {
            $post->likes()->where('user_id', $request->user()->id)->delete();
        }

        return back();
    }

    public function get_likes(Post $post)
    {
        $likes = $post->likes()->get();
        return view('front.shared.likes', ['likes' => $likes]);
    }

}
