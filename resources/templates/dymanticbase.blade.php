<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @section('title')
            <title>Dymantic Design</title>
            @show
        @section('description')
            <meta name="description" content="Dymantic Design in a small design agency focused on visual and web design.">
            @show
        @section('head')
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="{{ elixir("css/app.css") }}"/>
            @show
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon" />

        <!-- Facebook og meta tags -->
        <meta property="og:image" content="{{ asset('images/fbshareimg.jpg') }}">
        <meta property="og:site_name" content="Dymantic Design">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ Request::url() }}">
        @section('fbook')
            <meta property="og:title" content="Dymantic Design">
            <meta property="og:description" content="We are a small and innovative design agency based in Taiwan.">
            @show

        <script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
        <style type="text/css">
            @font-face {
                font-family: 'Geosans';
                src: url('{{ asset('fonts/GeosansLight.ttf') }}');
            }
        </style>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-51468211-1', 'dymanticdesign.com');
          ga('send', 'pageview');

        </script>
    </head>
    <body>
        @yield('content')

        @yield('bodyscripts')
    </body>
</html>