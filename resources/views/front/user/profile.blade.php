@php
    $user = auth()->user();
@endphp


@extends('layouts.front') @section('content')
<div class="p-5 bg-white rounded-sm mt-5 mx-2">
    <div class="flex items-center">
        <x-avatar :avatar="$user->avatar" />
        <div>
            <p class="text-lg">{{auth() -> user() -> name}}</p>
            <small>&#64;{{auth() -> user() -> username}}</small>
        </div>
    </div>

    <p class="my-2">{{auth()->user()->bio}}</p>
    <p class="my-2">
        <strong>Department : </strong> {{auth()->user()->department}}
    </p>
    <p class="my-2">
        <strong>Semester : </strong> Semester - {{auth()->user()->semester }}
    </p>
    <a
        href="{{ route('user.profile.setting') }}"
        class="py-1 px-3 bg-green-500 text-white text-sm cursor-pointer hover:bg-green-400 rounded-md"
    >
        Settings
    </a>
</div>

<div class="p-4 bg-white rounded-sm mt-4 mx-2">
    <h2 class="text-2xl mb-3">Posts</h2>
    <div class="overflow-x-auto">
        <table class="w-full border p-2" style="min-width: 600px">
            <thead class="text-left">
                <tr>
                    <th class="border p-2">#id</th>
                    <th class="border p-2">Body</th>
                    <th class="border p-2">Likes</th>
                    <th class="border p-2">Comments</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(auth() -> user() -> posts as $post)
                <tr class="h-14">
                    <td class="border px-2">{{$post -> id}}</td>
                    <td class="border px-2">
                        <a
                            class="text-blue-600"
                            href="{{ route('posts.show', $post) }}"
                            >{{Str::limit($post -> body, 20)}}</a
                        >
                    </td>
                    <td class="border px-2">
                        <a
                            class="text-blue-600"
                            href="{{ route('posts.likes', $post) }}"
                            >{{$post -> likes -> count()}}
                            {{Str::plural('likes', $post->comments->count())}}</a
                        >
                    </td>
                    <td class="border px-2">
                        <a
                            class="text-blue-600"
                            href="{{ route('posts.comments', $post) }}"
                            >{{$post -> comments -> count()}}
                            {{Str::plural('comment', $post->comments->count())}}</a
                        >
                    </td>
                    <td class="border px-2">
                        <form
                            action="{{route('posts.delete', $post->id)}}"
                            method="POST"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="py-1 px-4 bg-red-700 cursor-pointer rounded-md text-sm text-white hover:bg-red-800"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@if($user -> isAdmin)
<div class="p-4 bg-white rounded-sm my-4 mx-2">
    <h2 class="text-2xl mb-3">Users</h2>
    <div class="overflow-x-auto">
        <table class="w-full border p-2" style="min-width: 600px">
            <thead class="text-left">
                <tr>
                    <th class="border p-2">#id</th>
                    <th class="border p-2">Name</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Username</th>
                    <th class="border p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="h-14">
                    <td class="border px-2">{{$user -> id}}</td>
                    <td class="border px-2">{{$user->name}}</td>
                    <td class="border px-2">{{$user->email}}</td>
                    <td class="border px-2">{{$user->username}}</td>
                    <td class="border px-2">
                        <form
                            action="{{ route('user.remove', $user) }}"
                            method="POST"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="py-1 px-4 bg-red-700 cursor-pointer rounded-md text-sm text-white hover:bg-red-800"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection
