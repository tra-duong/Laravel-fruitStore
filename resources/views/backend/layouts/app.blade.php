<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="g-sidenav-show bg-gray-200">
    <div id="app">
        @section('aside')
            @include('backend.layouts.aside')
        @show
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <div class="container-fluid py-4">
                @include('backend.common.message')
                @yield('page_title')
                @yield('content')
                @section('footer')
                    @include('backend.layouts.footer')
                    @livewireScripts
                    @yield('scripts')
                @show
            </div>
        </main>
    </div>

</body>

</html>
