<div class="team_information">
    <hr style="margin: 30px 0">
    <div class="team_data">
        <div class="title">
            <p>{{ $team_data[0]->name }}</p>
        </div>
    </div>
</div>

<style>
    .team_information{
        width: 50%;
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
