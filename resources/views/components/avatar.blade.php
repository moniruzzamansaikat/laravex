@props(['avatar' => $avatar]) @if($avatar)
<img
    class="w-10 h-10 rounded-full mr-2"
    src="{{ asset('avatars/'.$avatar) }}"
    alt=""
/>
@else
<img
    class="w-10 h-10 rounded-full mr-2"
    src="{{ asset('avatars/default.png') }}"
    alt=""
/>
@endif
