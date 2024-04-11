<div class="players_container">
    <table>
        <tr>
            <th>Name</th>
            <th>Pos</th>
            <th>Side</th>
            <th>Keep</th>
            <th>Tackl</th>
            <th>Pass</th>
            <th>Shot</th>
            <th>Speed</th>
            <th>Ctrl</th>
            <th>Head</th>
            <th>Drbbl</th>
            <th>Flair</th>
            <th>Aggr</th>
            <th>Stam</th>
            <th>Play</th>
            <th>Avg</th>
            <th>Valued At</th>
        </tr>
        @foreach($team_data[1] as $player)
            <tr>
                @php
                    $nameParts = explode(' ', $player->name);
                    $firstInitial = strtoupper(substr($nameParts[0], 0, 1));
                    $restOfName = implode(' ', array_slice($nameParts, 1));
                    $newName = $firstInitial . '. ' . $restOfName;
                @endphp
                <td>
                    <a href="{{ route("games.manage.player.info", [$game['id'], $player->id]) }}">
                        {{ $newName }}
                    </a>
                </td>
                <td>{{ $player->pos }}</td>
                <td>{{ $player->side }}</td>
                <td>{{ $player->current_keep }}</td>
                <td>{{ $player->current_tackle }}</td>
                <td>{{ $player->current_pass }}</td>
                <td>{{ $player->current_shot }}</td>
                <td>{{ $player->current_speed }}</td>
                <td>{{ $player->current_control }}</td>
                <td>{{ $player->current_heading }}</td>
                <td>{{ $player->current_dribble }}</td>
                <td>{{ $player->flair }}</td>
                <td>{{ $player->aggression }}</td>
                <td>{{ $player->stamina }}</td>
                <td>{{ $player->totalgames }}</td>
                <td>{{ $player->average }}</td>
                <td>€{{ $player->value/1000 }}K</td>
            </tr>
        @endforeach
    </table>
</div>

<style>
    .players_container th{
        font-size: 20px;
    }
    .players_container{
        color: white;
        overflow: hidden;
    }
    .players_container table {
        width: 100%;
        margin-top: 30px;
        text-align: center;
    }
    .players_container table tr th {
        font-size: 18px;
    }
    .players_container table td{
        padding: 7px 0;
        cursor: pointer;
    }
    .players_container table td:hover{
        background-color: rgba(128, 128, 128, 0.3);
    }
</style>
