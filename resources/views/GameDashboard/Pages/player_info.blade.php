<div class="content_player_data">
    <div class="player_data" style="display: flex; justify-content: left; align-items: center">
{{--        $this->faker->imageUrl()--}}
        <img style="width: 50px; border-radius: 50%" src="https://cdn.vectorstock.com/i/500p/71/90/blank-avatar-photo-icon-design-vector-30257190.jpg" alt="">
        <p style="margin-left: 20px">{{ $player->name }}</p>
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

{{--    Player SKILLS--}}
    <table class="player_skill_Table">
        <tr>
            <th>KEEP</th>
            <th>TACKL</th>
            <th>PASS</th>
            <th>SHOT</th>
            <th>SPEED</th>
            <th>CTRL</th>
            <th>HEAD</th>
            <th>DRBBL</th>
            <th>FLAIR</th>
            <th>AGGR</th>
            <th>STAM</th>
            <th>FORM</th>
            <th>MORALE</th>
        </tr>

        <tr style="margin-top: 10px">
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
            <td>Superb</td>
            <th>Superb</th>
        </tr>
    </table>
</div>

<style>
    .players_container th{
        font-size: 20px;
    }
    .player_skill_Table{
        color: white;
        padding: 10px;
        overflow: hidden;
    }
    .player_skill_Table {
        width: 100%;
        margin-top: 30px;
        text-align: center;
    }
    .player_skill_Table tr th {
        font-size: 18px;
    }
    .player_skill_Table td{
        padding: 7px 0;
        cursor: pointer;
    }
    .player_skill_Table td:hover{
        background-color: rgba(128, 128, 128, 0.3);
    }
    .player_skill_Table{
        color: white;
        width: 100%;
        text-align: center;
        margin-top: 30px;
    }
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
        padding: 50px 0;
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
