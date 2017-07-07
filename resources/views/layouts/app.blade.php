<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="@yield('favicon')"/>

    <title>@yield('title')</title>

    <!-- App CSS -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <!-- Additional CSS -->
    @yield('css')

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        html, body {
            font-family: 'Open Sans', Helvetica, Arial, sans-serif;
        }
        body {
            padding-top: 50px;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    @include('navigation.main')

    <!-- Main Content -->
    @yield('content')

    <!-- App JS -->
    <script src="{{ asset('js/all.js') }}"></script>

    <!-- Additional JS -->
    @yield('javascript')

</body>

</html>
