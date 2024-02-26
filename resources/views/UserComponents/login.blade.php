<div class="container">
    <form method="post" action="{{ route("login") }}" class="content default_shadow">
        @csrf
        <p style="margin: 0; font-size: 30px; margin-bottom: 30px">Login</p>
        <input class="default_input" name="email" placeholder="Email" type="text">
        <input type="text" class="default_input" name="password" placeholder="Password">

        <hr>
        <a href="forgot_password.php"><p style="text-align: right">Forgot your password ?</p></a>
        <button class="specific_btn" style="box-sizing: border-box; width: 100%; margin-top: 20px">Submit</button>

        @if(session()->has("created"))
            <p style="color: white">We sent you an email where we specialized your password. Check it and connect.</p>
        @endif

        @if(session()->has('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

    </form>
</div>
