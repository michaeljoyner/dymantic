<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dymantic Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset("css/bapp.css") }}"/>
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
    @section('head')

    @show
</head>
<body>
    @yield('content')

    @section('bodyscripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    @show
</body>
</html>