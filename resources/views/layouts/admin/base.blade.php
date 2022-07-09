<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @include('layouts.admin.partials.styles')
    @livewireStyles
</head>

<body class="app">
    @include('layouts.admin.partials.header')

    {{ $slot }}

    <!-- Scripts -->
    @include('layouts.admin.partials.scripts')
    @livewireScripts
    @stack('scripts')
</body>
</html>
