<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/templates/logo/LogoOrmawa.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Ormawa Polbeng</title>

    @include('layouts.guest.style')
</head>
<body>
    @include('layouts.guest.navbar')

    @yield('content')

    @include('layouts.guest.footer')

    @include('layouts.guest.script')

</body>
</html>
