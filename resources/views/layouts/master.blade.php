<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="environment {{ app()->environment() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vuetify.min.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>

    <div id="app">
        @yield('body')
    </div>

    <!-- Scripts -->
    @yield('data')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
