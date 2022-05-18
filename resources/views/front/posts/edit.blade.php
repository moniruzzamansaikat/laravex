@extends('layouts.front') @section('content')
<form action="/posts/update" method="POST" class="bg-white p-3">
    @csrf
    <input type="hidden" name="id" value="{{$post->id}}" />

    <div class="form-group mb-3">
        <textarea
            name="body"
            cols="30"
            rows="5"
            class="border-2 bg-gray-200 border-gray-300 p-2 rounded-md outline-none w-full @error('body') border-red-600 @enderror focus:border-green-500"
        >
                {{$post -> body}}
            </textarea
        >
    </div>
    <div class="form-group mb-3">
        <button
            type="submit"
            class="py-2 px-4 bg-green-600 text-white rounded-md"
        >
            Update Post
        </button>
    </div>
</form>
@endsection
