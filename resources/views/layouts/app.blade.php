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
        <a href="#" class="logo" ><img alt="logo" src="{{ asset('img/logo.svg') }}"></a>

        <div class="flex items-center">
            @if (Route::has('login'))
            <div class="px-6 py-4">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
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
    <main class="container mx-auto flex max-w-custom " >
        <div class="w-[17.5rem] mr-4" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae sequi nesciunt iure impedit libero odit nam necessitatibus, quos saepe accusamus magni, quo doloremque nihil? Voluptate dolore beatae ducimus dolor, consequatur totam voluptatibus et fugit placeat praesentium numquam rerum doloremque. Eveniet hic commodi optio rerum. Voluptatum ullam voluptates vero impedit provident cumque aperiam culpa quo, deserunt eius repellendus? Animi, aperiam. Dicta unde blanditiis iusto. Sequi earum dignissimos ad? Iusto accusamus amet, impedit, nisi, quos sapiente aliquam libero delectus quibusdam inventore odit similique praesentium ipsam ullam rem cum nostrum ab velit nesciunt vel. Praesentium deleniti ut, eum delectus soluta quae autem quia.</div>
        <div class="w-[43.5rem]">
            <nav class="flex items-center justify-between text-sm ">
                <ul class="flex uppercase font-semibold border-b-4 border-gray-300 pb-3 space-x-10">
                    <li><a href="#" class="border-b-4 pb-3 border-blue-200">All Ideas(187)</a></li>
                    <li><a href="#" class="text-gray-400   pb-3 hover:border-b-4 border-blue-400 hover:transition duration-150 ease-in">Considering(6)</a></li>
                    <li><a href="#" class="text-gray-400   pb-3 hover:border-b-4 border-blue-400 hover:transition duration-150 ease-in">InProgress(1)</a></li>
                    
                </ul>
                <ul class="flex uppercase font-semibold border-b-4 border-gray-300 pb-3 space-x-10">
                    <li><a href="#" class="border-b-4 pb-3 border-blue-400">Implmented(10)</a></li>
                    <li><a href="#" class="text-gray-400   pb-3 hover:border-b-4 border-blue-400 hover:transition duration-150 ease-in">Closed(55)</a></li>
                    
                </ul>
            </nav>
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>

    </main>
</body>

</html>