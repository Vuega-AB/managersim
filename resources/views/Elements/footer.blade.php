<div class="footer">
    <div style="padding: 10px 40px;">
        <div class="footer_categories">
            <div class="fcateg">
                <p style="font-size: 30px; margin: 0; font-weight: 400">Categories</p>

                <button class="default_button" style="margin-top: 10px"><i class="fa-solid fa-gamepad"></i> Games</button>
                <button class="default_button"><i class="fa-solid fa-money-bill"></i> Support Us</button>
                <button class="default_button"><i class="fa-solid fa-newspaper"></i> Announces</button>
                <a href="{{ route("register") }}"><button class="default_button"><i class="fa-solid fa-landmark"></i> Sign up</button></a>
            </div>
            <div class="fcateg">
                <p style="font-size: 30px; margin: 0; font-weight: 400">About</p>

                <button class="default_button" style="margin-top: 10px"><i class="fa-solid fa-user"></i> Us</button>
                <button class="default_button"><i class="fa-solid fa-lock"></i> Private Policy</button>
                <button class="default_button"><i class="fa-solid fa-building"></i> Company</button>
                <button class="default_button"><i class="fa-solid fa-futbol"></i> Football</button>
            </div>
            <div class="fcateg">
                <p style="font-size: 30px; margin: 0; font-weight: 400">Need Support ?</p>

                <button class="default_button" style="margin-top: 10px"><i class="fa-brands fa-wikipedia-w"></i> Our Wiki</button>
                <button class="default_button"><i class="fa-solid fa-address-book"></i> Contact Us</button>
                <button class="default_button"><i class="fa-solid fa-blog"></i> Blog</button>
                <button class="default_button"><i class="fa-solid fa-bars"></i> Status</button>
            </div>
            <div class="fcateg">
                <p style="font-size: 30px; margin: 0; font-weight: 400">Follow us on:</p>

                <button class="default_button" style="margin-top: 10px"><i class="fa-brands fa-twitter"></i> Twitter</button>
                <button class="default_button"><i class="fa-brands fa-instagram"></i> Instagram</button>
                <button class="default_button"><i class="fa-brands fa-tiktok"></i> Tiktok</button>
                <button class="default_button"><i class="fa-brands fa-facebook"></i> Facebook</button>
            </div>
        </div>
    </div>
</div>
<style>
    .footer{
        width: 100%;
        padding: 15px 0;
        background-color: #111111;
        color: white;
        font-family: "Josefin Sans", sans-serif;
    }
    .footer p {
        margin: 0;
    }
    .footer_title{
        font-size: 27px;
        margin: 0;
        margin-left: 40px;
        font-weight: bold;
    }
    .footer_categories{
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 90%;
        margin: 0 auto;
        margin-top: 20px;
    }
    .fcateg{
        display: block;
    }
    .fcateg button {
        display: block;
        background-color: transparent;
        padding: 5px;
        border: none;
        color: cornflowerblue;
    }
    .fcateg button:hover{
        text-decoration: underline;
    }

    @media only screen and (max-width: 920px) {
        .footer_categories{
            width: 100%;
        }
    }

    @media only screen and (max-width: 820px) {
        .footer_categories{
            display: block
        }
        .fcateg{
            display: block;
            width: 100%;
            margin-top: 20px;
            text-align: center;
        }
        .fcateg button{
            margin: 0 auto;
        }
    }
</style>
