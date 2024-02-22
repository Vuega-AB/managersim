<?php
    session_start();
    if (isset($_SESSION["user"])){
        if ($_SESSION["user"]["logged"] == true) {
            header('Location: ./index.php');
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Managersim | Signup</title>

    <link rel="stylesheet" href="./style/assests.css">
    <link rel="stylesheet" href="./style/components/header.css">
    <link rel="stylesheet" href="./style/login.css">
    <link rel="stylesheet" href="./style/components/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
<div class="header default_shadow">
    <p class="header_p">MANAGERSIM</p>
    <div class="space_flex_right">
        <button class="default_btn">Home</button>
        <button class="default_btn">Announces</button>
        <button class="specific_btn">CONTACT</button>
    </div>
</div>

<div class="container">
    <form <?php
        if (isset($_SESSION["error_required_signup"])){
            echo 'style="border: 1px solid red !important;"';
        }

        unset($_SESSION["error_required_signup"]);
    ?> method="post" action="./php/User/signup.php" class="content default_shadow">
        <p style="margin: 0; font-size: 30px; margin-bottom: 30px">Sign up</p>
        <input class="default_input" name="email" placeholder="Email" type="email">
        <input type="text" class="default_input" name="password" placeholder="Password">
        <input type="text" placeholder="Name" name="name" class="default_input">

        <hr>
        <a href="login.php"><p style="text-align: right">Login</p></a>
        <a href="email_verification.php"><button class="specific_btn" style="box-sizing: border-box; width: 100%; margin-top: 20px">Sign up</button></a>
    </form>
</div>

<div class="footer">
    <div style="padding: 10px 40px;">
        <div class="footer_categories">
            <div class="fcateg">
                <p style="font-size: 30px; margin: 0; font-weight: 400">Categories</p>

                <button class="default_button" style="margin-top: 10px"><i class="fa-solid fa-gamepad"></i> Games</button>
                <button class="default_button"><i class="fa-solid fa-money-bill"></i> Support Us</button>
                <button class="default_button"><i class="fa-solid fa-newspaper"></i> Announces</button>
                <a href="signup.php"><button class="default_button"><i class="fa-solid fa-landmark"></i> Sign up</button></a>
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

<script src="https://kit.fontawesome.com/1d101e268c.js" crossorigin="anonymous"></script>
</body>
</html>