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
                    @if($team_data[0]->humanplayerid == "")
                        <form method="post" action="{{ route('games.manage.teams.jobs.apply', [$game['id'], $team_data[0]->id]) }}" style="display: flex; justify-content: space-between; margin-top: 20px; align-items: center">
                            @csrf
                            <p style="font-size: 20px; font-weight: bold">Has no manager and is looking for one</p>

                            <button class="specific_btn" style="background-color: #666666">Send Job Application</button>
                        </form>
                    @else
                        <p style="font-size: 20px; font-weight: bold">Already has a manager</p>
                    @endif
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
