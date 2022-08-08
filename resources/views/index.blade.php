<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Supermercado alaplaya</title>

        @vite('resources/css/app.css')

        <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    </head>
    <body>
        <div class=" flex items-end justify-center bg-gray-500 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div >
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="min-h-screen flex justify-center items-center ">
            <a id="btn-init" class="rounded-md text-green-300 animate-bounce  p-4 " href="{{Route('productos')}}">Iniciar compra</a>
        </div>

    </body>
</html>
