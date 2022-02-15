<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&family=Sura&display=swap"
        rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <!-- boxicons -->
    <link
        href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
        rel="stylesheet"
    />

    <!-- Jquery  ui -->
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('css/input-range.css')}}" />
    <link rel="stylesheet" href="{{asset('css/countrySelect.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/country-input.css')}}" />
    <link rel="stylesheet" href="{{asset('css/master.css')}}" />
    @stack('styles')

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body>
<div class="font-sans text-gray-900 antialiased">
    @include('layouts.navigation')

    {{ $slot }}

    @include('layouts.footer')



    <!-- scripts -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/countrySelect.min.js')}}"></script>
    <script src="{{asset('js/range-inputs.js')}}"></script>
    @livewireScripts
    @stack('scripts')
</div>
</body>
</html>
