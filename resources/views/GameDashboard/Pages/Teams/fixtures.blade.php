<div class="fixtures_container">
    <table>
        <tr>
            <th>Date</th>
            <th>Opponent</th>
            <th>H/A</th>
            <th>Match Type</th>
            <th>Result</th>
        </tr>
        @foreach($team_data[1] as $fixture)
            <tr>
                @php
                    if($fixture->hometeamid == $team_data[0]->id) {
                        $homeoraway = "Home";
                        $opponent = $fixture->awayteamid;
                    } else {
                        $homeoraway = "Away";
                        $opponent = $fixture->hometeamid;
                    }
                    if($homeoraway == "Home") {
                         $strResult = "$fixture->hometeamscore - $fixture->awayteamscore";
                    }
                    else {
                         $strResult = "$fixture->awayteamscore - $fixture->hometeamscore";
                     }
                @endphp
                <td>{{ date('Y-m-d H:i:s', $fixture->date) }}</td>
                <td>{{ \Illuminate\Support\Facades\DB::connection(env("DB_STARTUP") . $game['id'])->table("teams")->where("id", $opponent)->first()->name }}</td>
                <td>{{ $homeoraway }}</td>
                <td>@if($fixture->usedepend) Divisional Match @else Friendly @endif</td>
                <td>@if($fixture->played) {{ $strResult }} @else - @endif</td>
            </tr>
        @endforeach
    </table>
</div>

<style>
    .fixtures_container th{
        font-size: 20px;
    }
    .fixtures_container{
        color: white;
        overflow: hidden;
    }
    .fixtures_container table {
        width: 100%;
        margin-top: 30px;
        text-align: center;
    }
    .fixtures_container table td{
        padding: 7px 0;
        cursor: pointer;
    }
    .fixtures_container table td:hover{
        background-color: rgba(128, 128, 128, 0.3);
    }
</style>
