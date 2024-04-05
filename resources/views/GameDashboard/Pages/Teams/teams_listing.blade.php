<div class="teams_container">
    <hr style="margin: 30px 0">
    <table>
        <tr style="margin-bottom: 50px">
            <th>Pos</th>
            <th>Team</th>
            <th>Pld</th>
            <th>Wo</th>
            <th>Dr</th>
            <th>Lo</th>
            <th>GF</th>
            <th>GA</th>
            <th>P</th>
        </tr>
        @if(count($teams) > 0)
            @foreach($teams as $key => $team)
                @php
//                Get league id
                    $leagueID = \Illuminate\Support\Facades\DB::connection(env("DB_STARTUP") . $game['id'])->table("leagues")->where("countryid", $country_id)->first();
                    if ($leagueID){
                        $fixtures = \Illuminate\Support\Facades\DB::connection(env("DB_STARTUP") . $game['id'])->table("fixtures")->where("leagueid", $leagueID->id)->where("hometeamid", $team->id)->orWhere('awayteamid', $team->id)->where("fixturetype", 0)->get();
//                        Calc points
                        $points = 0;
                        $wins = 0;
                        $losses = 0;
                        $draws = 0;
                        $games = 0;
                        foreach($fixtures as $fixture){
                            $points += $fixture->hometeamscore;
                            $wins += $fixture->winamount;
                            $losses += $fixture->looseamount;
                            $draws += $fixture->evenamount;
                            $games += $fixture->played;
                        }
                    }
                @endphp
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <a href="{{ route('games.manage.teams.information', [$game['id'], $team->id]) }}">
                            {{ $team->name }}
                        </a>
                    </td>
                    @if(isset($fixtures))
                        <td>{{ $games }}</td>
                        <td>{{ $wins }}</td>
                        <td>{{ $draws }}</td>
                        <td>{{ $losses }}</td>
                        <td></td>
                        <td></td>
                        <td>@if(isset($points)) {{ $points }} @else 0 @endif</td>
                    @endif
                </tr>
            @endforeach
        @else
        @endif
    </table>
</div>

<style>
    .teams_container{
        width: 50%;
        margin: 20px auto;
        min-height: 50vh;
        padding: 0 0 20px 0;
    }
    .teams_container table{
        width: 100%;
        color: white;
        text-align: center;
    }
    .teams_container table td {
        padding: 7px 0;
        cursor: pointer;
    }
    .teams_container table td:hover{
        background-color: rgba(128, 128, 128, 0.3);
    }
</style>
