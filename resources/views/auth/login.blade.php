@extends('layouts.app')

@section('content')
<div class="page-wrapper pd-al-sm">
    <div class="login-container">
        <div class="text-center pd-al-sm">
            <i class="fa fa-envira logo-img" aria-hidden="true">DeepDive</i>
        </div>
        <div class="login-form theme-box-shadow">
            <form id="loginForm" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <hr class="login-sep">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="login-label">EMAIL</label>
                    <input type="text" class="form-control no-border login-field" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                    <i class="fa fa-user-o login-icon" aria-hidden="true"></i>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <hr class="login-sep">
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="login-label">PASSWORD</label>
                    <input type="password" class="form-control no-border login-field" id="password" placeholder="Password" name="password" required>
                    <i class="fa fa-key login-icon" aria-hidden="true"></i>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <hr class="login-sep">
                <div class="login-bottom-wrap">
                    <div class="login-bottom-box">
                        <button type="submit" class="btn btn-primary login-btn">Login</button>
                        <div class="custom-checkbox remember-me">
                            <input id="remember" class="checkbox-custom" name="remember" type="checkbox"  />
                            <label for="remember" class="checkbox-custom-label font-regular">Remember me</label>
                        </div>
                    </div>
                    <div class="mg-tp-sm">
                        or you can <a href="/templates/register.html">Register</a>
                    </div>
                    <div class="mg-tp-xs text-left">
                        <a class="no-link forgot-password" href="{{ url('/password/reset') }}">Forgot your password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
