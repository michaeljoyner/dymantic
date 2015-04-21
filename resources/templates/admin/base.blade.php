<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dymantic Admin</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrapmin.css') }}">
    <link rel="stylesheet" href="{{ asset("css/bapp.css") }}"/>
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    @section('head')

    @show
</head>
<body>
    @yield('content')

    @section('bodyscripts')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @show
</body>
</html>