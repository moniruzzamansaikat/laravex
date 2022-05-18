@extends('layouts.front') @section('content')
<div class="bg-white p-4 my-5 max-w-sm mx-auto rounded-md">
    <form action="/auth/register" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block mb-1">Name</label>
            <input
                type="text"
                name="name"
                id="name"
                class="border-2  p-2 rounded-md outline-none w-full @error('name') border-red-600 @enderror focus:border-green-500"
                tabindex="1"
                value="{{ old('name') }}"
            />
            @error('name')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block mb-1">Email</label>
            <input
                type="text"
                name="email"
                id="email"
                class="border-2  p-2 rounded-md outline-none w-full focus:border-green-500 @error('email') border-red-600 @enderror"
                tabindex="1"
                value="{{ old('email') }}"
            />
            @error('email')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="username" class="block mb-1">Username</label>
            <input
                type="text"
                name="username"
                id="username"
                class="border-2  p-2 rounded-md outline-none w-full @error('username') border-red-600 @enderror focus:border-green-500"
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
                class="border-2  p-2 rounded-md outline-none w-full @error('password') border-red-600 @enderror focus:border-green-500"
                tabindex="1"
                value="{{ old('password') }}"
            />
            @error('password')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
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
                <option value="{{ $i }}">Semester - {{ $i }}</option>
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
                <option value="Computer">Computer</option>
                <option value="Electrical">Electrical</option>
                <option value="Civil">Civl</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Textile">Textile</option>
                <option value="Garments">Garments</option>
            </select>
            @error('department')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button
                type="submit"
                class="py-2 px-3 bg-green-500 text-white rounded-md hover:bg-green-400"
            >
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
