<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 min-h-screen flex items-center justify-center h-screen">
    
    
    <div x-data="{ openRegister: false, openLogin: false }" class="text-center">

    <header class="w-full flex items-center justify-between px-8 py-4 fixed top-0 left-0">
        <!-- Logo -->
        <img src="{{ asset('images/logo.svg') }}" alt="Logo del Proyecto" class="flex items-center ml-10">

        <!-- Botón de Login -->
        <button @click="openLogin = true" class="absolute top-4 right-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition font-poppins">
                Login
        </button>
    </header>
        
        <!-- Contenido Principal -->
    <section class="text-left max-w-lg text-white absolute top-2/5 left-20 font-poppins">
        <h1 class="text-4xl font-bold">Welcome to My Shop</h1>
        <p class="mt-4 text-lg">
            Discover a world of amazing products, exclusive deals, and more.
        </p>
        <!-- Botón de Registro -->
        <button @click="openRegister = true" class="px-6 py-2 bg-primary text-white rounded-md hover:bg-red-700 transition mt-4">
            Register
        </button>
    </section>

        <!-- Modal de Registro -->
        <div x-show="openRegister" x-on:click.self="openRegister = false" x-on:keydown.escape.window="openRegister = false" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="p-6 rounded-lg shadow-lg w-96 bg-gradient-to-r from-blue-400 to-purple-200 font-poppins" >
                <h2 class="text-xl font-bold mb-4 text-white">Register</h2>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="block text-gray-700">Name</label>
                        <input type="text" name="name" class="w-full px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-3">
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-3">
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" class="w-full px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <button type="submit" class="w-full bg-primary text-white py-2 rounded-md hover:bg-red-700 transition">
                        Register
                    </button>
                </form>
            </div>
        </div>

        <!-- Modal de Login -->
        <div x-show="openLogin" x-on:click.self="openLogin = false" x-on:keydown.escape.window="openLogin = false" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class=" p-6 rounded-lg shadow-lg w-96 bg-gradient-to-r from-blue-400 to-purple-200 font-poppins">
                <h2 class="text-xl font-bold mb-4 text-white">Login</h2>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3 ">
                        <label class="block text-gray-700">Email</label>
                        <input type="email" name="email" class="w-full px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="mb-3">
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" class="w-full px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                        Login
                    </button>
                </form>
            </div>
        </div>

    </div>

</body>
</html>
