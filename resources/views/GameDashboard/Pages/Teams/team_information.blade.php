<div class="team_information">
    <hr style="margin: 10px 0">
    <div class="team_data">
        <div class="title">
            <p>{{ $team_data[0]->name }}</p>
        </div>
        @include("GameDashboard.Pages.Teams.Elements.header_team")
        @switch($team_type)
            @case("")
                <div class="information">
                    <p style="margin: 0; text-decoration: underline">Currently playing in {{ $team_data[1]->name  }}</p>
                    @if($team_data[0]->humanplayerid == "")
                        <form method="post" action="{{ route('games.manage.teams.jobs.apply', [$game['id'], $team_data[0]->id]) }}" style="display: flex; justify-content: space-between; align-items: center">
                            @csrf
                            <p style="font-size: 20px; font-weight: bold; margin-top: 10px">Has no manager and is looking for one</p>

                            <button class="specific_btn" style="background-color: #666666">Send Job Application</button>
                        </form>
                    @else
                        <p style="font-size: 20px; margin-top: 10px; font-weight:bold">Already has a manager - {{ \App\Models\User::where("login", $team_data[0]->humanplayerid)->first()->realname }}</p>
                    @endif

                    <hr style="margin: 40px auto; width: 50%; opacity: 0.5">
                    <div class="div_class_data_flex">
                        <div>
                            <p>Goals this Season: </p>
                            <p>Reputation: </p>
                            <p>Academy Ranking: </p>
                            <p>Stadium: </p>
                        </div>
                        <div>
                            @php
                                $data_to_show = ["goals", "teamrating", "popularity", "stadium"]
                            @endphp
                            @foreach($data_to_show as $data)
                                <p>
                                    @if(!empty($team_data[0]->$data))
                                        {{ $team_data[0]->$data }}
                                    @else
                                        0
                                    @endif
                                </p>
                            @endforeach
                        </div>
                    </div>

                </div>
                @break;
            @case("fixtures")
                @include("GameDashboard.Pages.Teams.fixtures")
                @break;
            @case("players")
                @include("GameDashboard.Pages.Teams.players")
                @break
            @case("staff")
                @include("GameDashboard.Pages.Teams.staff")
                @break
            @case("press")
                @include("GameDashboard.Pages.Teams.press")
                @break
        @endswitch
    </div>
</div>

<style>
{{--    Team information--}}
    .div_class_data_flex{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .div_class_data_flex p{
        font-size: 20px;
        margin: 5px 0;

    }
    /*End*/
    .information{
        color: white;
        padding: 10px 20px;
    }
    .team_information{
        width: 60%;
        min-height: 50vh;
        padding: 20px 0;
        margin: 0 auto;
    }
    .title{
        padding: 10px 0;
        color: white;
        background-color: #1a1a14;
        border-radius: 5px;
    }
    .team_data{
        box-shadow: #1a1a14 0px 1px 4px;
        padding: 0 0 40px 0;
    }
    .title p {
        margin: 0;
        font-size: 35px;
        text-align: center;
        font-weight: bold;
    }
</style>
