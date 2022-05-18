<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        />
        <link rel="stylesheet" href="{{ asset('css/vendors/bn-news.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <title>Saikim App</title>
    </head>
    <body class="bg-gray-200 font-roboto">
        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-4">
            <div
                class="container flex flex-wrap justify-between items-center mx-auto sm:mx-4 sm:px-4"
            >
                <button
                    id="navbar-button"
                    type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <svg
                        class="hidden w-6 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
                <a href="/">LaraVex</a>

                <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                    <ul
                        class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium"
                    >
                        <li class="my-2">
                            <a class="hover:text-gray-500" href="/">Home</a>
                        </li>
                        <li class="my-2">
                            <a
                                href="{{ route('posts.index') }}"
                                class="hover:text-gray-500"
                                >Posts</a
                            >
                        </li>
                        @auth
                        <li class="my-2">
                            <a href="/user/profile" class="hover:text-gray-500"
                                >Profile</a
                            >
                        </li>
                        <li class="my-2">
                            <a
                                href="{{ route('posts.create') }}"
                                class="hover:text-gray-500"
                                >Add Post</a
                            >
                        </li>
                        <li class="my-2">
                            <a
                                class="bg-red-700 px-5 py-2 text-white hover:bg-red-500 rounded-full"
                                href="/auth/logout"
                                >Logout</a
                            >
                        </li>
                        @endauth @guest
                        <li class="my-2">
                            <a
                                class="bg-red-700 px-5 py-2 text-white hover:bg-red-500 rounded-full"
                                href="/auth/register"
                                >Register</a
                            >
                        </li>
                        <li class="my-2">
                            <a
                                class="bg-gray-900 px-5 py-2 text-white hover:bg-gray-500 rounded-full"
                                href="/auth/login"
                                >Login</a
                            >
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mx-auto">@yield('content')</div>

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>
        <script src="{{ asset('js/vendors/bn-news.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
