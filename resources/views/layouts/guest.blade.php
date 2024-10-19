<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'INCSSE-CERAFPAJ') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('/upload/logo/jus.jfif');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Figtree', sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Slight white overlay */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="login-container">
        <div class="flex justify-center mb-6">
            <a href="/">
                <img src="{{asset('upload/logo/logo-mjdhri.jpeg')}}" alt="" width="200" height="200">
            </a>
        </div>

        <div class="w-full px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
