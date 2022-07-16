<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('frontend.include.meta')

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body id="page-top">
    @include('frontend.include.navbar')
    <div class="pt-5 pb-5">
        <div class="pt-5 pb-5">
            @yield('auth')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
