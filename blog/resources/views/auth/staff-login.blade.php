<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>

    <link rel="icon" type="image/png" href="{{ asset('login_register_layout/images/icons/favicon.ico') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/vendor/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/fonts/iconic/css/material-design-iconic-font.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/vendor/animate/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/vendor/css-hamburgers/hamburgers.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/vendor/animsition/css/animsition.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/vendor/select2/select2.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/vendor/daterangepicker/daterangepicker.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_register_layout/css/main.css') }}">


    <style type="text/css">
    .container-login100-form-btn button{
        margin: 0px 10px;
    }

    .back-form-btn {
        font-family: Poppins-Medium;
        font-size: 16px;
        color: #555555;
        line-height: 1.2;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 20px;
        min-width: 120px;
        height: 50px;
        border-radius: 25px;
        background: #62a6e2;
        position: relative;
        z-index: 1;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .back-form-btn::before {
        content: "";
        display: block;
        position: absolute;
        z-index: -1;
        width: 100%;
        height: 100%;
        border-radius: 25px;
        background-color: #fff;
        top: 0;
        left: 0;
        opacity: 1;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .back-form-btn:hover {
        color: #fff;
    }

    .back-form-btn:hover::before{
        background-color: #62a6e2;
    }

</style>

</head>
<body>



    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('login_register_layout/images/login_bg.jpg') }}');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="{{ route('staff.login.submit') }}">

                    {!! csrf_field() !!}

                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>

                    <a href="{{ url('/login') }}">
                        <span class="login100-form-title p-b-34 p-t-27">Staff Log in</span>
                    </a>


                    <div class="wrap-input100 validate-input has-feedback {{ $errors->has('email') ? ' has-error' : '' }}" data-validate = "Enter email">
                        <input class="input100" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input has-feedback{{ $errors->has('password') ? ' has-error' : '' }}" data-validate="Enter password">
                        <input class="input100" type="password" placeholder="Password" name="password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                        <button class="back-form-btn" onclick="goBack()">
                            Cancel
                        </button>
                    </div>
                    <div class="text-center p-t-90">
                        <a class="txt1" href="{{ url('/register') }}">
                            I don't hve an account.
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script type="text/javascript">
        function goBack() {
            window.history.back();
        }
    </script>


    <script src="{{ asset('login_register_layout/vendor/jquery/jquery-3.2.1.min.js') }}"></script>

    <script src="{{ asset('login_register_layout/vendor/animsition/js/animsition.min.js') }}"></script>

    <script src="{{ asset('login_register_layout/vendor/bootstrap/js/popper.js') }}"></script>
    
    <script src="{{ asset('login_register_layout/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('login_register_layout/vendor/select2/select2.min.js') }}"></script>

    <script src="{{ asset('login_register_layout/vendor/daterangepicker/moment.min.js') }}"></script>

    <script src="{{ asset('login_register_layout/vendor/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('login_register_layout/vendor/countdowntime/countdowntime.js') }}"></script>

    <script src="{{ asset('login_register_layout/js/main.js') }}"></script>
</body>
</html>
