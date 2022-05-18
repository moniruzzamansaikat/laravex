@extends('layouts.front') @section('content')
<div class="bg-white p-3 mt-5 rounded-md">
    <h2 class="mb-4 text-2xl">Create new post</h2>

    <form
        action="{{ route('posts.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div class="mb-3">
            <textarea
                name="body"
                cols="30"
                rows="5"
                class="border-2 bg-gray-100 p-2 rounded-md outline-none w-full @error('body') border-red-600 @enderror focus:border-green-500"
                tabindex="1"
                placeholder="Post description"
            ></textarea>
            @error('body')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <select
                name="category"
                id="category"
                tabindex="2"
                class="py-2 px-3 border-2 focus:border-green-400 bg-gray-100 w-full rounded-md cursor-pointer outline-none @error('category') border-red-400 @enderror"
            >
                <option value="">Select category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <input
                tabindex="3"
                type="file"
                name="image"
                id="image"
                class="p-2 border-2 border-gray-200 rounded-md w-full cursor-pointer focus:border-green-400 outline-none"
            />
        </div>
        <div class="form-group mb-3">
            <button
                type="submit"
                tabindex="3"
                class="px-3 py-2 bg-green-600 rounded-md text-white hover:bg-green-700"
            >
                Create post
            </button>
        </div>
    </form>
</div>

@endsection
