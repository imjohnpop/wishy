@extends('wrapper')

@section('title')
    Welcome
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 pt-5 mx-auto my-auto">
                <div class="wishy-flipper-container mt-5">
                    <div class="w-100 wishy-switcher d-flex align-items-center">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-4 wishy-ml text-center">
                                <div id="left">
                                    <h4>Don't have an account?</h4>
                                    <p>In case you want to became a part of gift and goals sharing society create a free
                                        account. Don't waste your time anymore</p>
                                    <button id="signin" type="button" class="btn btn-outline-light">Sign in</button>
                                </div>
                            </div>
                            <div class="col-4 wishy-mr text-center">
                                <div id="right">
                                    <h4>Already have an account?</h4>
                                    <p>Ok, let's login, and share your wishes with others!</p>
                                    <button id="signup" type="button" class="btn btn-outline-light">Sign up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 bg-white wishy-login w-100">
                            <div class="login">

                                {{--  LOGIN FORM --}}

                                <div id="login" class="panel-body mt-4 sign hidden">
                                    <h4 class="text-uppercase wishy-form-headline ml-3">Sign Up</h4>
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col control-label text-uppercase"><i class="fa fa-envelope" aria-hidden="true"></i></label>

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
                                            <label for="password" class="col control-label text-uppercase"><i class="fa fa-unlock-alt" aria-hidden="true"></i></label>

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

                                                <a class="btn wishy-link" href="{{ route('password.request') }}">
                                                    Forgot Your Password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{--  END OF LOGIN FORM --}}

                                {{--  REGISTRATION FORM --}}
                                <div id="register" class="panel-body mt-4">
                                    <h4 class="text-uppercase wishy-form-headline ml-3">Sign In</h4>
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col control-label"><i class="fa fa-user" aria-hidden="true"></i></label>

                                            <div class="col">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="NAME">

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col control-label"><i class="fa fa-envelope" aria-hidden="true"></i></label>

                                            <div class="col">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="EMAIL">

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col control-label"><i class="fa fa-unlock-alt" aria-hidden="true"></i></label>

                                            <div class="col">
                                                <input id="password" type="password" class="form-control" name="password" required placeholder="PASSWORD">

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="col control-label"><i class="fa fa-unlock-alt" aria-hidden="true"></i></label>

                                            <div class="col">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="CONFIRM PASSWORD">
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
            $('#register').fadeIn('slow');



            $('.wishy-login').animate({
                left: '-10px'
            }, 600, function () {
                $('.wishy-login').animate({
                    left: '25px'
                }, 200)

            })
        })
    </script>
@endsection