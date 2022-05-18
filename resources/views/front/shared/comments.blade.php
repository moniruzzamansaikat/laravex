@extends('layouts.front') @section('content')

<div class="p-4 bg-white rounded-md max-w-sm mx-auto mt-4">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl mb-4">Comments</h2>
        <a
            href="{{  url()->previous()  }}"
            class="bg-green-400 rounded-md text-white py-1 px-3 hover:bg-green-300"
        >
            Back
        </a>
    </div>

    @if(count($comments) > 0) @foreach($comments as $comment)
        <x-user :user="$comment->user" :sm="true" /> 
    @endforeach @else
    <p class="text-lg">No one commented yet</p>
    @endif
</div>

@endsection
