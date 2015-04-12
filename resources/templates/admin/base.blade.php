<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dymantic Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset("css/bapp.css") }}"/>
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