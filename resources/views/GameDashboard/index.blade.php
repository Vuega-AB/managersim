<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $game["data"]["displayname"] }}</title>

    <link rel="stylesheet" href="{{ asset("cssfiles/game_dashboard/index.css") }}">
    <link rel="stylesheet" href="{{ asset("cssfiles/assests.css") }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
          rel="stylesheet">
</head>
<body>
@include("Elements.header")
@include("GameDashboard.Elements.head")

@switch($type)
    @case("index")
        @include("GameDashboard.Pages.welcome")
        @break
    @case("map")
        @include("GameDashboard.Pages.map")
        @break
    @case("listing_teams")
        @include("GameDashboard.Pages.Teams.teams_listing")
        @break
    @case("team_information")
        @include("GameDashboard.Pages.Teams.team_information")
        @break
@endswitch

@include("Elements.footer")

<script src="https://kit.fontawesome.com/1d101e268c.js" crossorigin="anonymous"></script>
</body>
</html>
