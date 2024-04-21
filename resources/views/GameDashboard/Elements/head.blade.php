<div class="head_class">
    <div style="width: 80%; padding: 0 10px; margin: 0 auto;" class="images-head">
        <a href="{{ route("games.join", $game['id']) }}"><img src="{{ asset("game_btns/board.png") }}" alt="Board room"></a>
        <a href=""><img src="{{ asset("game_btns/team.png") }}" alt="Squad"></a>
        <a href=""><img src="{{ asset("game_btns/tactics.png") }}" alt="Tactics"></a>
        <a href=""><img src="{{ asset("game_btns/train.png") }}" alt="Staff"></a>
        <a href=""><img src="{{ asset("game_btns/matches.png") }}" alt="Staff"></a>
        <a href=""><img src="{{ asset("game_btns/paper.png") }}" alt="Staff"></a>
        <a href=""><img src="{{ asset("game_btns/hotlist.png") }}" alt="Hotlist"></a>
        <a href=""><img src="{{ asset("game_btns/cup_mail_anim.gif") }}" alt="Mail"></a>
        <a href=""><img src="{{ asset("game_btns/deals.png") }}" alt="Negotiations"></a>
        <a href=""><img src="{{ asset("game_btns/world.png") }}" alt="Map"></a>
        <a href="{{ route("games.manage.search", $game['id']) }}"><img src="{{ asset("game_btns/search.png") }}" alt="Search"></a>
        <a href=""><img src="{{ asset("game_btns/managers.png") }}" alt="Manager list"></a>
        <a href=""><img src="{{ asset("game_btns/rankings.png") }}" alt="Rankings"></a>
        <a href=""><img src="{{ asset("game_btns/forums.png") }}" alt="Managersim Discord"></a>
        <a href=""><img src="{{ asset("game_btns/videocall.png") }}" alt="talk"></a>
        <a href=""><img src="{{ asset("game_btns/options.png") }}" alt="Personal information"></a>
    </div>
</div>
@if(isset($game_header) && $game_header == true)
    <div style="width: 60%; margin: 0 auto !important;" class="where_info">
        <a href="{{ route("games.manage.map", $game["id"]) }}"><p>Map</p></a>
        <p></p>
    </div>
@endif

<style>
    .where_info{
        color: white;
    }
    .where_info p{
        margin: 0;
        font-size: 13px;
        text-decoration: underline;
    }
    .head_class{
        width: 100%;
        padding: 30px 0;
    }
    .images-head{
        flex-wrap: wrap;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .images-head img{
        margin: 0 1px;
        transition: 0.2s all ease;
        border-radius: 15px;
    }
    .images-head img:hover{
        opacity: 0.8;
    }
</style>
