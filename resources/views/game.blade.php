<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ucwords($game->gameid) }}</title>

    <link rel="stylesheet" href="{{ asset("cssfiles/game.css") }}">
    <link rel="stylesheet" href="{{ asset("cssfiles/assests.css") }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    @include("Elements.header")
    <div class="container_game">
        <div class="content_game">
            <div class="image_content_game">
                <img src="https://wallpaperbat.com/img/63242-football-wallpaper-hd.jpg" alt="">
                <p class="gameIdP">{{ \Illuminate\Support\Str::upper(ucwords($game->gameid)) }}</p>
                <button class="button_enter_office">ENTER OFFICE</button>
            </div>

            <div class="information_game">
                <p class="information_game_title">Monthly UPDATE, May 23 2022</p>
                <p class="information_game_description">While the game is truly free for all, the [ Gold Members / Sponsors ] will be given some perks, such as:
                    - Easier Board, not firing you as quickly as the non-sponsor managers.
                    - More generous sponsorship upon joining a new club.

                    One team per sponsor, ie it is no longer possible to split sponsorship between teams. We have removed the part that will set
                    the manager level back to lvl 5, so it's free game where sponsors can access premium game worlds and get the above
                    mentioned perks, while there are no penalties for non-sposors other than access to premium worlds (soon ).</p>

                <hr>

                <p class="information_game_title">MINOR RELEASE December 2016</p>
                <p class="information_game_description">✓ Wage change, making the best players demanding more money for their services
                    ✓ The ambitious players gaining one extra point ( on friendly games ) of total experience
                    ✓ The red cards are punishing the team more than before
                    ✓ Small tuning of the stamina calculations, so the stamina disadvantage will be triggered bit more often
                    ✓ Increased revenue from sponsorship and merchandise</p>

                <hr>
                <p class="information_game_title">Currently working on</p>
                <p class="information_game_description">- Comunity growth and introduction

                    - GUI enchancements
                    - Employees more interactive, better feedback from all employees
                    - Employees getting overworked when not rested
                    - Physios phys. tests on players to determine future gains
                    - Employees talking to players for morale improvements
                    - App development</p>
            </div>
        </div>
    </div>
    @include("Elements.footer")

    <script src="https://kit.fontawesome.com/1d101e268c.js" crossorigin="anonymous"></script>
</body>
</html>
