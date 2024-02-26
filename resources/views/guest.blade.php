<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Managersim | {{ $type }}</title>

    <link rel="stylesheet" href="{{ asset("cssfiles/guest.css") }}">
    <link rel="stylesheet" href="{{ asset("cssfiles/assests.css") }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    @include("Elements.header")
    @switch($type)
        @case("login")
            @include("UserComponents.login")
            @break
        @case("register")
            @include("UserComponents.signup")
            @break
    @endswitch
    @include("Elements.footer")
<script src="https://kit.fontawesome.com/1d101e268c.js" crossorigin="anonymous"></script>
</body>
</html>
