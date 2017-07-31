<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Patrique Ouimet">
    <!-- Additional meta tags -->
    @yield('meta')

    <link rel="shortcut icon" type="image/x-icon" href="@yield('favicon')"/>

    <title>@yield('title')</title>

    <!-- App CSS -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- Additional CSS -->
    @yield('css')

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <style type="text/css">
    /*html, body {
        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
    }*/
    </style>
</head>
<body>

    <div id="app">

        <!-- Main Content -->
        @yield('content')

    </div>

    <!-- App JS -->
    <script src="{{ mix('/js/app.js') }}"></script>

    <!-- Additional JS -->
    @yield('javascript')

</body>

</html>
