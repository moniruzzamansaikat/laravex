@extends('layouts.front') @section('content')
<div class="grid md:grid-cols-12 gap-5 my-4">
    <div class="md:col-span-7">
        <div
            class="bg-hero-bg md:h-80 min-w-full md:bg-cover bg-center bg-no-repeat xs:h-52 xs:bg-contain"
        ></div>
    </div>

    <aside class="md:col-span-5 p-4 bg-white rounded-sm self-baseline">
        <x-news-ticker />
    </aside>
</div>
@endsection
