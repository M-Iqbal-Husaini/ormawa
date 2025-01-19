<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/templates/logo/LogoOrmawa.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/modules/fontawesome/css/all.min.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Ormawa Polbeng</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });
    </script>

    @include('layouts.user.style')
</head>
<body>
    @include('sweetalert::alert')

    @include('layouts.user.navbar')

    @yield('content')

    @include('layouts.user.footer')

    @include('layouts.user.script')

</body>
</html>
