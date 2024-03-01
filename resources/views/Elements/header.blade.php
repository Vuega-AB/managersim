<div class="header default_shadow">
    <p class="header_p">MANAGERSIM</p>
    <div class="space_flex_right">
        <button class="default_btn">Home</button>
        <button class="default_btn">Announces</button>
        <button class="specific_btn">CONTACT</button>
    </div>
</div>
<style>
    .header{
        width: 100%;
        padding: 15px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;

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
</style>
