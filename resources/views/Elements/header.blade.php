@if(!isset($with_up_header))
    <div class="up_header">
        <div style="padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
            <p><i class="fa-solid fa-phone"></i> +373 123 456 789</p>

            <div class="icon_header">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-facebook"></i>
            </div>
        </div>
    </div>
@endif
<div class="header default_shadow">
    <p class="header_p">MANAGERSIM.net</p>
    <div class="space_flex_right">
        @if(auth()->user())
            <a href="{{ route("welcome") }}"><button class="default_btn">Home</button></a>
            <a href="{{ route("games.available") }}"><button class="default_btn">Games</button></a>
            <a href="{{ route("games.my") }}"><button class="specific_btn">MY GAMES</button></a>
            <i class="fa-solid fa-user header_user"></i>
        @else
            <button class="default_btn">Home</button>
            <button class="default_btn">Announces</button>
            <a href="{{ route("login") }}"><button class="specific_btn">LOGIN</button></a>
        @endif
    </div>
</div>
<style>
    .icon_header i{
        font-size: 20px;
        margin: 0 2px;
    }
    .up_header{
        width: 100%;
        padding: 10px 0;
        background-color: #1a1a14;
        color: white;
    }
    .up_header p{
        margin: 0;
    }
    .header{
        width: 100%;
        padding: 15px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #111111;
    }
    .header_p{
        font-family: "Josefin Sans", sans-serif;
        font-weight: bold;
        font-size: 30px;
        margin: 0;
        color: white;
        margin-left: 20px;
    }
    .space_flex_right{
        margin-right: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    @media only screen and (max-width: 670px) {
        .header{
            display: block;
        }
        .header_p{
            text-align: center;
            margin-top: 15px;
        }
        .space_flex_right{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
            width: 100%;
        }
    }
    .header_user{
        padding: 10px 20px;
        color: white;
        cursor: pointer;
        font-size: 25px;
    }
</style>
