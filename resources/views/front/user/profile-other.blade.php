@extends('layouts.front') @section('content')
<div class="p-5 bg-white rounded-md mx-2 mt-5">
    <div class="flex items-center">
        <x-avatar :avatar="$user->avatar" />
        <div>
            <p class="text-lg">{{$user -> name}}</p>
            <small>&#64;{{$user -> username}}</small>
        </div>
    </div>

    <div class="mt-4">
        <p class="mb-3">{{$user->bio}}</p>
    </div>
</div>

<div class="mt-5 p-4 bg-white rounded-md mx-2">
    <h2 class="text-2xl mb-3">Posts</h2>

    @if($user->posts->count() > 0)
    <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-4">
        @foreach($user->posts as $post)
        <div class="bg-gray-200 rounded-md">
            <div class="h-28 bg-red-300">
                <img
                    src="{{asset('images/'. $post->image)}}"
                    alt=""
                    class="w-full bg-cover max-h-28"
                />
            </div>
            <div class="p-4">
                <p>{{Str::limit($post -> body, 100)}}</p>
                <a
                    href="{{ route('posts.show', $post) }}"
                    class="justify-end py-1 px-3 bg-green-600 text-white rounded-sm text-sm inline-block mt-3 hover:bg-green-500"
                    >view post</a
                >
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>No posts by {{$user->name}}</p>
    @endif
</div>

@endsection
