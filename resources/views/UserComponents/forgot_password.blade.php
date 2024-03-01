<div class="container">
    <form method="post" action="{{ route("resubmit_for_password") }}" class="content default_shadow">
        @csrf
        <p style="margin: 0; font-size: 30px; margin-bottom: 30px">Forgot password</p>
        <input class="default_input" name="email" placeholder="Email" type="text">

        <hr>
        <a href="{{ route("login") }}"><p style="text-align: right">Login</p></a>
        <button class="specific_btn" style="box-sizing: border-box; width: 100%; margin-top: 20px">Submit</button>

        @if(session()->has("succesfuly"))
            <p style="color: white">{{ session("succesfuly") }}</p>
        @endif

        @if(session()->has('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

    </form>
</div>
