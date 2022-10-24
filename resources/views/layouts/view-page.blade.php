<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') . ' | ' . $title ?? '' }}</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        @yield('css')
        @yield('css-2')
        @yield('splide-css')
    </head>
    <body>
        <main id="app">
            <div id="Xcet7He2oSNo208dHS">
                @yield('content')
            </div>
            @include('partials._footer')
        </main>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
            $(document).ready(() => {
                $('#mb__menu').on('click', () => {
                    $('#sidebar').toggleClass('sidebar-open')
                })
            })
            $('.arrow__left__back').on('click', () => {
                $("html, body").animate({scrollTop: 0}, 1000);
            })
            window.addEventListener('load', function () {
                $("html, body").animate({scrollTop: 0}, 1000);
            })

            window.addEventListener('load', function () {
                $("html, body").animate({scrollTop: 0}, 1000);
            })
        </script>
        @yield('js')
        @yield('splide-js')
    </body>
</html>
