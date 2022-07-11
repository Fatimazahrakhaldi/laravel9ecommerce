<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @livewireStyles
    @include('layouts.front.partials.styles')
    @stack('styles')
</head>

<body class="">
    @include('layouts.front.partials.header')

    {{ $slot }}

    <!-- Scripts -->
    @livewireScripts
    @include('layouts.front.partials.footer')
    @include('layouts.front.partials.scripts')
    @stack('scripts')
</body>

</html>
