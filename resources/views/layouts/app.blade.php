<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('title')">
    <meta property=”og:title” content=”@yield('og-title')”>
    <meta property=”og:type” content=”@yield('og-type')”>
    <meta property=”og:image” content=”@yield('og-img')”/>
    <meta property=”og:description” content=”@yield('og-description')">
    
    <link rel="icon" type="image/png" href="/img/hero1.png">

    <link href="//fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" href="{{ elixir("css/all.css") }}">
</head>
<body id="app-layout" class="@yield('body_class')">
    @include('partials.banner')
    @include('partials.masternav')
    @yield('content')
    @include('partials.footer')
    @include('partials.copyright')

    <!-- JavaScripts -->
    <script src="{{ elixir('js/all.js') }}"></script>
</body>
</html>