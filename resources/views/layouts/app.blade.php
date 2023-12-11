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

    {{-- livewireStyles --}}
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#f7f8fc] text-sm ">
    <header class="flex flex-col md:flex-row space-y-2 md:space-y-0  items-center justify-between px-2 md:px-8 py-4">
        <a href="/" class="logo "><img alt="logo" src="{{ asset('img/logo.svg') }}"></a>

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

            @auth
            <a href="#">
                <img src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?d=mp" alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
            @else
            <a href="#">
                <img src="https://www.gravatar.com/avatar/00000000000000000000000?d=mp" alt="avatar"
                    class="w-10 h-10 rounded-full">
            </a>
            @endauth
            
        </div>
    </header>
    <main class="container mx-auto flex flex-col md:flex-row  max-w-[68.5rem] ">
        <div class="w-[17.5rem] md:mr-4 mx-auto md:mx-0 ">
            <div class=" bg-white border-2 md:sticky md:top-8 border-blue-300 rounded-xl mt-16">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add an Idea</h3>
                </div>
                @auth
                <p class="text-xs mt-4 text-center">Let us know what you would like to</p>
                <livewire:create-idea />
                @else
                <p class="text-center">please login to create an idea</p>
                <div class="flex flex-col space-y-4 mt-4 items-center p-4">
                    <a href="{{ route('login') }}"
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-gray-200 hover:border-gray-400 hover:transition duration-150 ease-in px-6 py-3">
                        Sign Up
                    </a>
                </div>
                @endauth
            </div>
        </div>
        <div class="w-full px-2 md:px-0 md:w-[43.5rem]">
            <livewire:status-filter/>
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>

    </main>

    {{-- livewireScripts --}}
    @livewireScripts
</body>

</html>