@extends('layouts.front') @section('content')

<div class="grid md:grid-cols-12 gap-5 p-4">
    <div class="md:col-span-9">
        @if($posts -> count()) @foreach($posts as $post)
            <x-post :post="$post" />
         @endforeach

        {{$posts -> links()}}
        <div class="mb-4"></div>

        @else
        <h2>There is no posts</h2>
        @endif
    </div>

    <aside class="md:col-span-3 bg-white p-4 self-baseline rounded-sm">
        <h2 class="text-2xl">Categories</h2>
        <ul>
            @foreach($categories as $category)
            <li class="my-4">
                <a
                    href="?category={{$category -> id}}"
                    class="border-l-2 pl-2 hover:pl-3 transition-all"
                    >{{$category -> name}}</a
                >
            </li>
            @endforeach
        </ul>
    </aside>
</div>

<div class="mt-5"></div>

@endsection
