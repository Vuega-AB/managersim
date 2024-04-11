<div class="content_player_data">
    <div class="player_data">
        <p>{{ $player->name }}</p>
    </div>
    <div class="sample_data_player">
        <div style="display: flex; justify-content: center" class="space_p">
            <div class="data_p">
                <p>Playing For </p>
                <p>Contracted To </p>
                <p>Contr. clauses </p>
                <p>Trans. status </p>
                <p>Est. value </p>
                <p>Weekly Wage </p>
            </div>
            <div class="data_p">
                <a href="{{ route('games.manage.teams.information', [$game['id'], $team->id]) }}">
                    <p style="font-size: 20px !important; text-decoration: underline">{{ $team->name }}</p>
                </a>
                <p>{{ $player->natdutyto }}</p>
                <p>@if($player->transferreason == 0) Undisclosed @endif</p>
                <p>{{ $player->starstatus }}</p>
                <p>€{{ $player->value }}</p>
                <p>€{{ $player->newcontract_weekpay }}</p>
            </div>
        </div>
        <div style="display: flex; justify-content: center">
            <div class="data_p">
                <p>Position </p>
                <p>Side</p>
                <p>Release Fee</p>
                <p>Country</p>
                <p>Birthdate / Age</p>
                <p>Own Product</p>
            </div>
            <div class="data_p">
                <p>{{ $player->pos }}</p>
                <p>{{ $player->side }}</p>
                <p>{{ $player->arrivedclub }}</p>
                <p>{{ $player->country }}</p>
                <p>{{ $player->birth }}</p>
                <p></p>
            </div>
        </div>
    </div>
</div>

<style>
    .player_data{
        padding: 15px;
        color: white;
        font-size: 30px;
        margin: 0;
        margin-top: 15px;
        background-color: #1a1a14;
    }
    .player_data p {
        margin: 0;
    }
    .data_p p{
        font-size: 16px;
        font-weight: bold;
        margin: 10px 0;
    }
    .data_p{
        padding: 15px;
    }
    .content_player_data{
        width: 60%;
        margin: 0 auto;
        overflow: hidden;
        min-height: 50vh;
    }
    .sample_data_player{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        color: white;
    }
    @media only screen and (max-width: 790px) {
        .sample_data_player{
            display: block !important;
        }
        .data_p{
            padding: 0 !important;
            width: 100% !important;
            margin-top: 20px;
        }
        .space_p{
            display: flex !important;
            justify-content: center !important;
        }
    }
</style>
