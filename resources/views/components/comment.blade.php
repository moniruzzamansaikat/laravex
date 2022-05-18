@php 
    $user = auth()->user();
@endphp
@props(['post' => $post, 'comment' => $comment])

<div class="block p-3 bg-gray-100 my-4 rounded-sm border-2 border-green-400">
    <!-- comment header -->
    <x-user :user="$comment -> user" :sm="true" />

    <!-- comment text -->
    <p class="my-2">{{$comment -> text}}</p>
    
    <!-- comment time -->
    <small class="text-gray-500">
        {{$comment -> created_at -> diffForHumans()}}
    </small>

        
    <!-- delete comment if same user of post -->
    @auth @if($user->id == $comment->user_id)
    <form
        action="{{ route('comments.delete', $comment) }}"
        class="mt-2"
        method="post"
    >
        @csrf @method('DELETE')
        <button
            type="submit"
            class="py-1 px-2 bg-red-700 text-white font-bold text-sm rounded-lg cursor-pointer hover:bg-red-600 mb-2"
        >
            Delete
        </button>
    </form>
    @endif

    <!-- any authenticated user can reply -->
    <div>
        <button
            type="submit"
            class="py-1 px-2 bg-green-500 text-white font-bold text-sm rounded-lg cursor-pointer hover:bg-green-600 reply_toggler_button inline-block"
        >
            Reply
        </button>
        <form
            action="{{ route('post.comment.reply.store', ['post' => $post, 'comment' => $comment]) }}"
            class="mt-2 flex bg-gray-300 shadow-md p-2 rounded-md max-w-sm hidden"
            method="post"
        >
            @csrf
            <div class="w-full">
                <input type="text" name="body" class="p-2 border-2 border-green-400 outline-none w-full" required>
            </div>
            <button
                type="submit"
                class="py-1 px-2 bg-green-500 text-white font-bold text-sm rounded-r-lg cursor-pointer hover:bg-green-600"
            >
                Reply
            </button>
        </form>
    </div>

    <!-- comment replies -->
    <div class="border-l-2 border-green-400 pl-3 mt-5">
        @foreach($comment -> replies as $reply)
        <div class="p-2 my-2 bg-gray-200 rounded-sm">
            <x-user :user="$reply->user" :sm="true" />
            <p>{{$reply -> body}}</p>

            @if(auth()->user()->id == $reply->user_id)
            <form action="">
                @csrf
                <i class="fa fa-trash"></i>
            </form>
            @endif
        </div>
        @endforeach
    </div>
    <!-- end of replies -->

    @endauth
</div>