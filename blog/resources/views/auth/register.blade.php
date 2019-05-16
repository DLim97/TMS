<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Page</title>

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
                <form class="login100-form validate-form" method="post" action="{{ url('/register') }}">

                    {!! csrf_field() !!}

                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>

                    <a href="{{ url('/register') }}">
                        <span class="login100-form-title p-b-34 p-t-27">Register</span>
                    </a>

                    <div class="wrap-input100 validate-input has-feedback {{ $errors->has('name') ? ' has-error' : '' }}" data-validate = "Enter name">
                        <input class="input100" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input has-feedback {{ $errors->has('ic') ? ' has-error' : '' }}" data-validate = "Enter ic">
                        <input class="input100" type="text" name="ic" value="{{ old('ic') }}" placeholder="IC">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @if ($errors->has('ic'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ic') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input has-feedback {{ $errors->has('gender') ? ' has-error' : '' }}" data-validate = "Enter gender">
                        <input class="input100" type="text" name="gender" value="{{ old('gender') }}" placeholder="Gender">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input has-feedback {{ $errors->has('marital') ? ' has-error' : '' }}" data-validate = "Enter marital">
                        <input class="input100" type="text" name="marital" value="{{ old('marital') }}" placeholder="Marital Status">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @if ($errors->has('marital'))
                        <span class="help-block">
                            <strong>{{ $errors->first('marital') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input has-feedback {{ $errors->has('DOB') ? ' has-error' : '' }}" data-validate = "Enter Date Of Birth">
                        <input class="input100" type="date" name="DOB" value="{{ old('DOB') }}" placeholder="Date Of Birth">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @if ($errors->has('DOB'))
                        <span class="help-block">
                            <strong>{{ $errors->first('DOB') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input has-feedback {{ $errors->has('address') ? ' has-error' : '' }}" data-validate = "Enter Date Of Birth">
                        <textarea class="input100" name="address" placeholder="Address">{{ old('address') }}</textarea>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>


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

                    <div class="wrap-input100 validate-input has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" data-validate="Enter password confirmation">
                        <input class="input100" type="password" placeholder="Password Confirm" name="password_confirmation">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                        <button class="back-form-btn" onclick="goBack()">
                            Cancel
                        </button>
                    </div>


                    <div class="text-center p-t-90">
                        <a class="txt1" href="{{ url('/login') }}">
                            Already a member.
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
