<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/templates/user/img/fav.png') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Merch Store</title>

    @include('layouts.user.style')
</head>
<body>
    @include('sweetalert::alert')

    @include('layouts.user.navbar')
    <section class="banner-area" style="background-image: url('{{ asset('assets/templates/logo/logo.jpeg') }}'); background-size: cover; background-position: center; height: 300px;"></section>

    @yield('content')

    @include('layouts.user.footer')

    @include('layouts.user.script')

</body>
</html>
