<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>Hozoor</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('login.css')}}">

</head>
<body>

<div class="login">
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="form">
            <h2>ورود</h2>

            <div class="form-field">
                <label for="login-mail"><i class="fa fa-user"></i></label>
                <input id="login-mail" type="email" name="email" placeholder="ایمیل" required>
                <svg>
                    <use href="#svg-check"/>
                </svg>
            </div>
            <div class="form-field">
                <label for="login-password"><i class="fa fa-lock"></i></label>
                <input id="login-password" type="password" name="password" placeholder="رمزعبور" pattern=".{6,}"
                       required>
                <svg>
                    <use href="#svg-check"/>
                </svg>
            </div>
            <button type="submit" class="button">
                <div class="arrow-wrapper">
                    <span class="arrow"></span>
                </div>
                <p class="button-text">ورود</p>
            </button>


        </div>
    </form>
    {{--    <div class="login">--}}
    <div class="form">
        <form action="{{route('manager.create')}}" method="get">
            @csrf
            <button type="submit" class="button">
                <div class="arrow-wrapper">
                    <span class="arrow"></span>
                </div>
                <p class="button-text">ثبت نام مدیر</p>
            </button>
        </form>
    </div>
    <div class="finished">
        <svg>
            <use href="#svg-check"/>
        </svg>
    </div>
</div>

<svg style="display:none;">
    <symbol id="svg-check" viewBox="0 0 130.2 130.2">
        <polyline points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
    </symbol>
</svg>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
{{--<script src="{{asset('login.js')}}"></script>--}}

</body>
</html>
