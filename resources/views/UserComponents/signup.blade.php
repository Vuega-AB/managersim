<div class="container">
    <form method="post" action="{{ route("register") }}" class="content default_shadow">
        @csrf
        <p style="margin: 0; font-size: 30px; margin-bottom: 30px">Sign up</p>
        <input class="default_input" name="email" placeholder="Email" type="email">
        <input type="text" placeholder="Name" name="name" class="default_input">

        <hr>
        <a href="{{ route('login') }}"><p style="text-align: right">Login</p></a>
        <a href="email_verification.php"><button class="specific_btn" style="box-sizing: border-box; width: 100%; margin-top: 20px">Sign up</button></a>
    </form>
</div>
