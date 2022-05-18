@props(['post' => $post])

<div class="bg-slate-50 mb-5 p-3 shadow-sm rounded-sm">
    <div class="mb-2">
        <x-user  :user="$post->user" :sm="false" />
        <small>{{$post ->  created_at -> diffForHumans()}}</small>
        <small>in <a class="text-blue-800 underline" href="{{route('posts.index')}}?category={{$post->category->id}}">{{$post -> category -> name}}</a></small>
    </div>

    <div class="mt-3">
        <p class="mb-4">{{ Str::limit($post -> body, 200) }}</p>
        <a
            href="{{ route('posts.show', $post->id) }}"
            class="py-1 px-3 bg-green-400 mb-3 inline-block rounded-sm text-sm text-white hover:bg-green-500"
            >Post Details</a
        >

        <div class="flex items-center">
            @auth @if(!$post -> likedBy(auth()->user()))
            <form action="{{route('posts.likes', $post->id)}}" method="post">
                @csrf
                <button class="text-blue-600 mr-2 font-semibold" type="submit">
                    <i class="fa fa-thumbs-up"></i>
                </button>
            </form>
            @else
            <form action="{{route('posts.likes', $post -> id)}}" method="post">
                @csrf
                <button class="text-red-600 mr-2 font-semibold" type="submit">
                    <i class="fa fa-thumbs-down"></i>
                </button>
            </form>
            @endif @can('delete', $post)
            <form action="{{route('posts.delete', $post -> id)}}" method="post">
                @csrf @method('DELETE')
                <button class="text-red-700 mr-2 font-semibold" type="submit">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
            @endcan @endauth

            <a
                href="{{ route('posts.likes', $post->id) }}"
                class="text-blue-700 font-semibold"
            >
                {{$post -> likes -> count()}}
                {{Str::plural('like', $post->likes->count())}}
            </a>
            <a
                href="{{ route('posts.comments', $post->id) }}"
                class="text-blue-700 font-semibold ml-2"
            >
                {{$post -> comments -> count()}}
                {{Str::plural('comment', $post->comments->count())}}
            </a>
        </div>
    </div>
</div>
