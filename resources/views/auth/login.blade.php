@extends('layouts.user-master-no-nav')

@section('title', ' login page')

@section('content')

<div class="page-login rlp">
    <div class="container">
        <div class="login-wrapper rlp-wrapper center-text">
            <div class="login-table rlp-table"><a href="/"><img src="assets/images/logo-color-1.png" alt="" class="login"/></a>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="login-title rlp-title">login to your sol.ng account</div>
                    <!-- @if(Session::has('status'))
                        <div class="alert alert-warning">{{Session('status')}}<span class="fa fa-user"></span></div>
                    @endif -->
                    <div class="login-form bg-w-form rlp-form">
                        <div class="row text-center">
                            <div class="col-md-12"><label for="regemail" class="control-label form-label">email </label><input id="regemail" type="email" placeholder="email" name="email" class="form-control form-input blue_border all-input"/>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                <!--p.help-block Warning !-->
                            </div>
                            <div class="col-md-12"><label for="regpassword" class="control-label form-label">password </label><input id="regpassword" type="password" name="password" class="form-control form-input all-input"/>
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                <!-- p.help-block Warning !-->
                            </div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <div class="login-submit">
                        <button type="submit" class="loginButton"><span>sign in</span></button>
                    </div>
                    <a href="/register">Register</a>
                    <span> or </span>
                    <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
