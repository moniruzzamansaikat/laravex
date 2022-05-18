@extends('layouts.front') @section('content')
<div class="my-5 p-4 bg-white rounded-sm sm:mx-2 md:mx-auto max-w-sm">
    <h2 class="text-3xl mb-3">Setting</h2>

    <form
        action="{{ route('user.profile.setting') }}"
        method="post"
        enctype="multipart/form-data"
    >
        @csrf @method('PUT')
        <div class="mb-4">
            <label for="name" class="block mb-1">Name</label>
            <input
                type="text"
                name="name"
                id="name"
                class="border-2 p-2 rounded-md outline-none w-full @error('name') border-red-600 @enderror focus:border-green-500"
                tabindex="1"
                value="{{ $user->name}}"
            />
            @error('name')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block mb-1">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                class="border-2 p-2 rounded-md outline-none w-full focus:border-green-500"
                tabindex="1"
                value="{{ $user->email}}"
            />
            @error('email')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="bio" class="block mb-1">Bio</label>
            <input
                type="text"
                name="bio"
                id="email"
                class="border-2 p-2 rounded-md outline-none w-full focus:border-green-500"
                tabindex="1"
                value="{{ $user->bio }}"
            />
        </div>

 <div class="mb-4">
            <label for="semester" class="block mb-1">Semester</label>
            <select
                name="semester"
                id="semester"
                class="border-2  p-2 rounded-md outline-none w-full @error('semester') border-red-600 @enderror focus:border-green-500"
            >
                <option value="">Select Semester</option>
                @for($i = 1; $i < 8; $i++)
                <option @if($user -> semester == $i) selected @endif value="{{ $i }}">Semester - {{ $i }}</option>
                @endfor 
            </select>
            @error('semester')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="department class="block mb-1">Department</label>
            <select
                name="department"
                id="department"
                class="border-2  p-2 rounded-md outline-none w-full @error('department') border-red-600 @enderror focus:border-green-500"
            >
                <option value="" >Select Department</option>
                <option @if($user -> department == 'Computer') selected  @endif value="Computer">Computer</option>
                <option @if($user -> department == 'Electrical') selected  @endif value="Electrical">Electrical</option>
                <option @if($user -> department == 'Civil') selected  @endif value="Civil">Civil</option>
                <option @if($user -> department == 'Mechanical') selected  @endif value="Mechanical">Mechanical</option>
                <option @if($user -> department == 'Textile') selected  @endif value="Textile">Textile</option>
                <option @if($user -> department == 'Garments') selected  @endif value="Garments">Garments</option>
            </select>
            @error('department')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        @if(!$user->avatar)
        <div class="mb-4">
            <label for="avatar" class="block mb-1">Avatar</label>
            <input
                type="file"
                name="avatar"
                id="avatar"
                class="border-2 p-2 rounded-md outline-none w-full @error('avatar') border-red-600 @enderror focus:border-green-500"
                tabindex="1"
            />
            @error('avatar')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        @endif

        <div>
            <button
                type="submit"
                class="py-2 px-3 bg-green-500 text-white rounded-md hover:bg-green-400"
            >
                Update
            </button>
        </div>
    </form>
</div>
@endsection
