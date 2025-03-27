<!DOCTYPE html>

<html lang="en">
    <head>
        <title>App Name - @yield('title')</title>
        @include('partials.head')
    </head>
    <style>
        .bg-main-color-dark {
            --tw-bg-opacity: 1;
            background-color: #27ae60;
        }

        .bg-sub-main-color {
            --tw-bg-opacity: 1;
            background-color: #2c3e50 ;
        }

    </style>
@yield('styles')
    <body>
        <div id="main">
            @include('partials.header')
            <div>
                @yield('content')
            </div>
            @include('partials.footer')
            @include('partials.bodyJS')
            @yield('scripts')
        </div>
    </body>
</html>
