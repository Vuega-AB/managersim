<div class="staff_categ">
    <div class="staff_name">
        <p>{{ $staff->name }}</p>
    </div>

    @switch($staff->profession)
        @case(0)
            @php $profession = "Scout" @endphp
            @break;
        @case(2)
            @php $profession = "Coach" @endphp
            @break;
        @case(1)
            @php $profession = "Physio" @endphp
            @break;
    @endswitch

    <p style="margin: 0; font-size: 25px">Personal Data</p>
    <div class="sample_data_player">
        <div style="display: flex; justify-content: center" class="space_p">
            <div class="data_p">
                <p>Profession</p>
                <p>Age</p>
                <p>Employer</p>
                <p>Weekly wage</p>
                <p>Term of notice</p>
                <p>Experience</p>
                <p>Nationality</p>
            </div>
            <div class="data_p">
                <p>{{ $profession }}</p>
                <p>3</p>
                <a href="{{ route('games.manage.teams.information', [$game['id'], $team->id]) }}">
                    <p style="text-decoration: underline">{{ $team->name }}</p>
                </a>
                <p>{{ $staff->contract_weekpay }}</p>
                <p>{{ $staff->contract_termofnoticemonths }}</p>
                <p>{{ $staff->experience }}</p>
                <p>{{ $staff->country  }}</p>
            </div>
        </div>
        <div style="display: flex; justify-content: center" class="space_p">
            <div class="data_p">
                <p>General Training</p>
                <p>Keeping Training</p>
                <p>Defensive Training</p>
                <p>Offensive Training</p>
                <p>Match Preparation</p>
                <p>Youth Development</p>
            </div>
            <div class="data_p">
                <p>{{ $staff->ability_generaltraining }}</p>
                <p>{{ $staff->ability_trainkeeper }}</p>
                <p>{{ $staff->ability_traindefensive }}</p>
                <p>{{ $staff->ability_trainoffensive }}</p>
                <p>{{ $staff->orders_playermaxprice }}</p>
                <p>{{ $staff->orders_agegroup }}</p>
            </div>
        </div>
    </div>
</div>

<style>
    .staff_categ{
        width: 50%;
        margin: 0 auto;
        padding:  0 0 30px 0;
        color: white;
    }
    .staff_name{
        text-align: right;
        font-size: 30px;
        margin-top: 30px;
    }
    .staff_name p{
        margin: 0;
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
