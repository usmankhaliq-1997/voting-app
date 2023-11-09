<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Voting App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#f7f8fc] text-sm">
    <header class="flex items-center justify-between px-8 py-4">
        <a href="#" class="logo"><img alt="logo" src="{{ asset('img/logo.svg') }}"></a>

        <div class="flex items-center">
            @if (Route::has('login'))
            <div class="px-6 py-4">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
                @endauth
            </div>
            @endif
            <a href="#">
                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
        </div>
    </header>
    <main class="container mx-auto flex max-w-custom ">
        <div class="w-[17.5rem] mr-4">
            <div class=" bg-white border-2 border-blue-300 rounded-xl mt-16">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add an Idea</h3>
                    <p class="text-xs mt-4">Let us know what you would like to</p>
                </div>
                <form action="#" method="POST" class="space-y-4 px-4 py-6 text-xsm">
                    <div class="">
                        <input type="text" class="border-none text-sm    w-full bg-gray-100 rounded-xl placeholder-gray-900 px-4 py-3" placeholder="Your Idea">
                    </div>
                    <div class="">

                        <select name="catagory_add" id="catagory_add" class="w-full rounded-xl px-4 py-2 bg-gray-100 text-sm border-none">
                            <option value="">Catagory One</option>
                            <option value="">Catagory Two</option>
                            <option value="">Catagory Three</option>
                            <option value="">Catagory Four</option>
                        </select>
            

                    </div>
                    <div class="">
                        <textarea name="idea" id="idea" cols="30" rows="4" class="bg-gray-100 rounded-xl placeholder-gray-900 text-sm px-4 py-2 w-full border-none" placeholder="Describe your idea"></textarea>
                    </div>
                    <div class="flex itmes-center justify-button space-x-3">
                        <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">
                            <svg class="w-4 text-gray-600 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                              </svg>
                              
                            <span class="ml-1">Attach</span>
                        </button>
                        <button type="submit" class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">
                            
                            <span class="ml-1">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-[43.5rem]">
            <nav class="flex items-center justify-between text-sm ">
                <ul class="flex uppercase font-semibold border-b-4 border-gray-300 pb-3 space-x-10">
                    <li><a href="#" class="border-b-4 pb-3 border-blue-200">All Ideas(187)</a></li>
                    <li><a href="#"
                            class="text-gray-400   pb-3 hover:border-b-4 border-blue-400 hover:transition duration-150 ease-in">Considering(6)</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-400   pb-3 hover:border-b-4 border-blue-400 hover:transition duration-150 ease-in">InProgress(1)</a>
                    </li>

                </ul>
                <ul class="flex uppercase font-semibold border-b-4 border-gray-300 pb-3 space-x-10">
                    <li><a href="#" class="border-b-4 pb-3 border-blue-400">Implmented(10)</a></li>
                    <li><a href="#"
                            class="text-gray-400   pb-3 hover:border-b-4 border-blue-400 hover:transition duration-150 ease-in">Closed(55)</a>
                    </li>

                </ul>
            </nav>
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>

    </main>
</body>

</html>