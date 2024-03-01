<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env("APP_NAME") }} | Available Games</title>

    <link rel="stylesheet" href="{{ asset("cssfiles/games.css") }}">
    <link rel="stylesheet" href="{{ asset("cssfiles/assests.css") }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    @include("Elements.header")
    <div class="container">
        @if(count($games) > 0)
            <div class="content" style="grid-template-columns: repeat(@if(count($games) <= 2) 2 @else 3 @endif, 33%);">
                @foreach($games as $game)
                    <div class="game_categ default_shadow">
                        <div class="game_id">
                            <p>{{ ucwords($game->gameid) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p style="color: white">No games found</p>
        @endif
    </div>
    @include("Elements.footer")
</body>
</html>
