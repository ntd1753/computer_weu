<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('partials.head')
    <script src="https://cdn.tailwindcss.com"></script>
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
<body>
@include('partials.header')
<div>
    @yield('content')
</div>
@include('partials.footer')
@include('partials.bodyJS')
@yield('scripts')
</body>
</html>
