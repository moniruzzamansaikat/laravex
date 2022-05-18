@extends('layouts.front') @section('content')
<div class="bg-white p-4 mt-5 max-w-sm md:mx-auto rounded-sm xs:mx-3">
    <form action="/auth/login" method="POST">
        @csrf @if(session('wrong'))
        <p
            class="bg-red-300 border-2 border-red-600 text-center py-2 rounded-lg text-red-800 text-lg mb-3 flex justify-between items-center alert px-2"
        >
            <span>{{ session("wrong") }}</span>
            <span class="cross text-red-800 text-2xl cursor-pointer"
                >&times;</span
            >
        </p>
        @endif

        <div class="mb-4">
            <label for="username" class="block mb-1">Username</label>
            <input
                type="text"
                name="username"
                id="username"
                class="border-2 p-2 rounded-md outline-none w-full focus:border-green-500 @error('username') border-red-600 @enderror"
                tabindex="1"
                value="{{ old('username') }}"
            />
            @error('username')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block mb-1">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                class="border-2 p-2 rounded-md outline-none w-full focus:border-green-500 @error('password') border-red-600 @enderror"
                tabindex="2"
                value="{{ old('password') }}"
            />
            @error('password')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <input type="checkbox" name="remember" id="remember" />
            <label for="remember" class="text-lg ml-1 cursor-pointer"
                >Remember me</label
            >
        </div>

        <div>
            <button
                type="submit"
                tabindex="3"
                class="py-2 px-3 bg-green-500 text-white rounded-md hover:bg-green-400"
            >
                Login
            </button>
        </div>
    </form>
</div>
@endsection
