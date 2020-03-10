<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PlayIT — @yield('title')</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url(@yield('error_link'));
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
</body>
</html>