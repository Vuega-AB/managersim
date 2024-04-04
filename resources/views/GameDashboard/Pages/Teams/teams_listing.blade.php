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
                        <td>{{ count($fixtures) }}</td>
                        <td>{{ $fixtures->where("winamount", 1)->count() }}</td>
                        <td>{{ $fixtures->where("evenamount", 1)->count() }}</td>
                        <td>{{ $fixtures->where("looseamount", 1)->count() }}</td>
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
