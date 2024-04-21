<div class="search_player_content">
    <p style="font-size: 35px; margin: 0; text-align: center; margin-top: 10px">Search @if(session()->has("type")) {{ ucwords(session()->get("type")) }} @endif</p>
    <form style="display: flex; justify-content: center; margin-top: 10px" action="{{ route("games.manage.find", $game['id']) }}" method="get">
        <select class="default_select" name="type_search" id="type_search" style="margin-right: 5px">
            <option value="players" @if(session()->has("type") && session()->get("type") === "players") selected @endif>Players</option>
            <option value="managers" @if(session()->has("type") && session()->get("type") === "managers") selected @endif>Managers</option>
            <option value="teams" @if(session()->has("type") && session()->get("type") === "teams") selected @endif>Teams</option>
        </select>

        <input type="text" placeholder="Containing" name="containing" class="asset_input_2">
        <button class="specific_btn" style="margin-left: 5px">FIND</button>
    </form>


    @if(session()->has("list"))
        <div style="margin-top: 20px" class="grid_foreach_search">
            @foreach(session()->get("list") as $type)
                <div class="categ_search">
                    @switch(session()->get("type"))
                        @case("players")
                            <a href="{{ route("games.manage.player.info", [$game['id'], $type->name]) }}"><p style="text-align: center; font-size: 25px; font-weight: bold; margin-bottom: 0">{{ $type->name }}</p></a>
                            @php
                                $team = \Illuminate\Support\Facades\DB::connection(env("DB_STARTUP") . $game['id'])->table("teams")->where("id", $type->teamid)->first()
                            @endphp
                            @if(isset($team))
                                <p style="color: gray; margin: 0; text-align: center">{{ $team->name }}</p>
                            @endif
                            @break
                        @case("managers")
                            <a href="{{ route("games.manage.staff.info", [$game['id'], $type->name]) }}"><p style="text-align: center; font-size: 25px; font-weight: bold; margin-bottom: 0">{{ $type->name }}</p></a>
                            @php
                                $team = \Illuminate\Support\Facades\DB::connection(env("DB_STARTUP") . $game['id'])->table("teams")->where("id", $type->teamid)->first()
                            @endphp
                            @if(isset($team))
                                <p style="color: gray; margin: 0; text-align: center">{{ $team->name }}</p>
                            @endif
                            @break;
                        @case("teams")
                            @php
//                            Get players count
                                $playersCount = count(\Illuminate\Support\Facades\DB::connection(env("DB_STARTUP") . $game['id'])->table("players")->where("teamid", $type->id)->get());
                            @endphp
                            <a href="{{ route("games.manage.teams.information", [$game['id'], $type->id]) }}"><p style="text-align: center; font-size: 25px; font-weight: bold; margin-bottom: 0">{{ $type->name }}</p></a>
                            <p style="color: gray; margin: 0; text-align: center">{{ $playersCount }} Players</p>
                            @break
                    @endswitch
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .categ_search{
        width: 100%;
        height: 120px;
        padding: 10px;
        box-sizing: border-box;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(255, 255, 255, 0.08) 0px 0px 0px 1px;
    }
    .grid_foreach_search{
        width: 100%;
        justify-content: center;
        gap: 10px;
        display: grid;
        grid-template-columns: repeat(3, 33%);
    }
    .search_player_content{
        width: 50%;
        margin: 0 auto;
        min-height: 50vh;
        padding: 0 0 30px 0;
        color: white;
    }
</style>
