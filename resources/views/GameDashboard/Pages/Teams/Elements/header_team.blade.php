<div class="header_team">
    <a href="{{ route('games.manage.teams.fixtures', [$game['id'], $team_data[0]->id]) }}"><p>Fixtures</p></a>
    <a href="{{ route("games.manage.teams.players", [$game['id'], $team_data[0]->id]) }}"><p>Players</p></a>
    <a href="{{ route("games.manage.teams.information", [$game['id'], $team_data[0]->id]) }}"><p>Info</p></a>
    <a href="{{ route("games.manage.teams.staff", [$game['id'], $team_data[0]->id]) }}"><p>Staff</p></a>
    <a href="{{ route("games.manage.teams.press", [$game['id'], $team_data[0]->id]) }}"><p>Press</p></a>
</div>

<style>
    .header_team{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        margin: 10px 0;
    }
    .header_team p{
        margin: 0 5px;
        text-decoration: underline;
        cursor: pointer;
    }
</style>
