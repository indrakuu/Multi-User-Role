<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.include.meta')

    @include('frontend.include.style')

    <title>Multi User Role - DuniaDev</title>

</head>
<body id="page-top">
    @include('frontend.include.navbar')
    @yield('content')
    @include('frontend.include.footer')
    @include('frontend.include.script')
</body>
</html>
