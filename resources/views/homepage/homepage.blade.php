@extends('wrapper')

@section('title')
    Welcome
@endsection

@section('content')
    <li>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
    <div class="content">
        <div class="wishy-background-image-try">
            <img src="/img/background-image.jpg" alt="">
        </div>
        <div class="wishy-body-cover">
            <div class="container wishy-container-position">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="wishy-flipper-container">
                            <div class="w-100 wishy-switcher d-flex align-items-center">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-4 wishy-ml text-center">
                                        <div id="left">
                                            @if(Auth::check())
                                                Loged in
                                            @endif
                                            <h4>Don't have an account?</h4>
                                            <p>In case you want to became a part of gift and goals sharing society
                                                create a free
                                                account. Don't waste your time anymore</p>
                                            <button id="signin" type="button" class="btn btn-outline-light">Sign in
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-4 wishy-mr text-center">
                                        <div id="right">
                                            <h4>Already have an account?</h4>
                                            <p>Ok, let's login, and share your wishes with others!</p>
                                            <button id="signup" type="button" class="btn btn-outline-light">Sign up
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 bg-white wishy-login w-100">
                                    <div class="login">

                                        {{--  LOGIN FORM --}}

                                        <div id="login" class="panel-body mt-4 sign @if(isset($token)) hidden @endif">
                                            <h4 class="text-uppercase wishy-form-headline ml-3">Sign Up</h4>
                                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col control-label text-uppercase"><i
                                                                class="fa fa-envelope" aria-hidden="true"></i></label>

                                                    <div class="col">
                                                        <input id="email" type="email" class="form-control" name="email"
                                                               value="{{ old('email') }}" required placeholder="EMAIL">

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col control-label text-uppercase"><i
                                                                class="fa fa-unlock-alt" aria-hidden="true"></i></label>

                                                    <div class="col">
                                                        <input id="password" type="password" class="form-control"
                                                               name="password" required placeholder="PASSWORD">

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox"
                                                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                Remember Me
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col">
                                                        <button type="submit" class="btn wishy-btn">
                                                            Login
                                                        </button>

                                                        <a id="pw-reset" class="btn wishy-link"
                                                           href="">
                                                            Forgot Your Password?
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        {{--  END OF LOGIN FORM --}}

                                        {{--  REGISTRATION FORM --}}
                                        <div id="register" class="panel-body mt-4 hidden">
                                            <h4 class="text-uppercase wishy-form-headline ml-3">Sign In</h4>
                                            <form class="form-horizontal" method="POST"
                                                  action="{{ route('register') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col control-label"><i class="fa fa-user"
                                                                                                   aria-hidden="true"></i></label>

                                                    <div class="col">
                                                        <input id="name" type="text" class="form-control" name="name"
                                                               value="{{ old('name') }}" required placeholder="NAME">

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col control-label"><i
                                                                class="fa fa-envelope" aria-hidden="true"></i></label>

                                                    <div class="col">
                                                        <input id="email" type="email" class="form-control" name="email"
                                                               value="{{ old('email') }}" required placeholder="EMAIL">

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col control-label"><i
                                                                class="fa fa-unlock-alt" aria-hidden="true"></i></label>

                                                    <div class="col">
                                                        <input id="password" type="password" class="form-control"
                                                               name="password" required placeholder="PASSWORD">

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password-confirm" class="col control-label"><i
                                                                class="fa fa-unlock-alt" aria-hidden="true"></i></label>

                                                    <div class="col">
                                                        <input id="password-confirm" type="password"
                                                               class="form-control" name="password_confirmation"
                                                               required placeholder="CONFIRM PASSWORD">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col">
                                                        <button type="submit" class="btn wishy-btn">
                                                            Register
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        {{--  END OF REGISTRATION FORM --}}
                                        {{--  START OF PASSWORD RESET FORM--}}
                                        <div id="reset" class="panel-body mt-4 hidden">
                                            <h4 class="text-uppercase wishy-form-headline ml-3">Reset password</h4>
                                            @if (session('status'))
                                                <div class="alert alert-success">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            <form class="form-horizontal" method="POST"
                                                  action="{{ route('password.email') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col control-label"><i
                                                                class="fa fa-envelope" aria-hidden="true"></i></label>

                                                    <div class="col">
                                                        <input id="email" type="email" class="form-control" name="email"
                                                               value="{{ old('email') }}" required placeholder="EMAIL">

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col">
                                                        <button type="submit" class="btn wishy-btn">
                                                            Send Password Reset Link
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        {{--  END OF PASSWORD RESET FORM--}}
                                        {{--  START OF PASSWORD RESET FORM--}}
                                        @if(isset($token))
                                        <div id="finalreset" class="panel-body mt-4">
                                            <h4 class="text-uppercase wishy-form-headline ml-3">Set new password</h4>
                                            <form class="form-horizontal" method="POST"
                                                  action="">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="token" value="{{ $token }}">

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label"><i
                                                                class="fa fa-envelope" style="right: -262px" aria-hidden="true"></i></label>

                                                    <div class="col">
                                                        <input id="email" type="email" class="form-control" name="email"
                                                               value="{{ $email or old('email') }}" required placeholder="EMAIL">

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password"
                                                           class="col control-label"><i
                                                                class="fa fa-unlock-alt" aria-hidden="true"></i></label>

                                                    <div class="col">
                                                        <input id="password" type="password" class="form-control"
                                                               name="password" required placeholder="PASSWORD">

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                    <label for="password-confirm" class="col-md-4 control-label"><i
                                                                class="fa fa-unlock-alt" style="right: -262px" aria-hidden="true"></i></label>
                                                    <div class="col">
                                                        <input id="password-confirm" type="password"
                                                               class="form-control" name="password_confirmation"
                                                               required placeholder="CONFIRM PASSWORD">

                                                        @if ($errors->has('password_confirmation'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col">
                                                        <button type="submit" class="btn wishy-btn">
                                                            Reset Password
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                        {{--  END OF PASSWORD RESET FORM--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        $('#signup').click(function () {

            $('#register').hide();
            $('#reset').hide();
            $('#login').fadeIn('slow');


            $('.wishy-login').animate({
                left: '480px'
            }, 600, function () {
                $('.wishy-login').animate({
                    left: '438px'
                }, 200)

            })
        });

        $('#signin').click(function () {

            $('#login').hide();
            $('#reset').hide();
            $('#register').fadeIn('slow');


            $('.wishy-login').animate({
                left: '-10px'
            }, 600, function () {
                $('.wishy-login').animate({
                    left: '25px'
                }, 200)

            })
        })

        $('#pw-reset').click(function (ev) {
            ev.preventDefault();
            $('#login').hide();
            $('#reset').fadeIn('slow');
        })
    </script>
@endsection