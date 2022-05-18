@extends('layouts.front') @section('content')

<div class="p-4 bg-white rounded-md max-w-sm mx-auto mt-5">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl mb-4">Liked by</h2>
        <a
            href="{{  url()->previous()  }}"
            class="bg-green-400 rounded-md text-white py-1 px-3 hover:bg-green-300"
        >
            Back
        </a>
    </div>

    @if(count($likes) > 0) @foreach($likes as $like)
        <x-user :user="$like -> user" :sm="true" />
    @endforeach @else
    <p class="text-lg">No one liked this post yet</p>
    @endif
</div>

@endsection
