@extends('layouts.front') @section('content')
<!-- post's main content -->
<div class="bg-white rounded-md mx-2 mt-4">
    <img
        src="{{ asset('images/'.  $post->image  ) }}"
        alt=""
        class="w-full mb-3"
    />
    <div class="p-4">
        <x-user :user="$post->user" :sm="false" />
        <small
            class="inline-block mb-3"
            >{{$post -> created_at -> diffForHumans()}}</small
        >
        <p>{{$post -> body}}</p>
    </div>
</div>

<!-- post comments section -->
<div class="bg-white p-4 rounded-md mx-2 my-5">
    <h2 class="text-2xl mb-4">Comments</h2>
    <div class="mb-4">
        @forelse($post->comments as $comment)
        <x-comment :post="$post" :comment="$comment" />
        @empty
        <p class="text-gray-500 border-l-4 pl-3 text-lg">No comments yet</p>
        @endforelse
    </div>

    <h2 class="text-2xl mb-4">Add Comment</h2>

    @guest
    <p>
        Please <a class="text-blue-600" href="/auth/login">login</a> to comment
    </p>
    @endguest @auth
    <form action="{{ route('posts.comments', $post->id) }}" method="post">
        @csrf
        <div>
            <textarea
                name="comment"
                tabindex="1"
                class="shadow appearance-none border-gray-200 border-2 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-400 @error('comment') border-red-500 @enderror"
                placeholder="Comment"
            ></textarea>
            @error('comment')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-3">
            <button
                type="submit"
                tabindex="2"
                class="bg-green-500 hover:bg-green-700 focus:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer"
            >
                Add Comment
            </button>
        </div>
    </form>
    @endauth
</div>

@endsection
