@props(['user' => $user, 'sm' => $sm])

<div @class(['mb-4' => $sm])>
    <a
        href="{{route('user.profile.other', $user->id) }}"
        class="hover:underline  p-2 rounded-md hover:bg-gray-200 flex items-center"
    >
        <x-avatar :avatar="$user->avatar" />
        <div>
            <h2 @class([
                'text-sm' => $sm,
                'text-lg' => !$sm,
            ])>
                {{$user -> name}}
            </h2>
            <small>&#64;{{$user -> username}}</small>
        </div>
    </a>
</div>