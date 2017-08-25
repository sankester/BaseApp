@extends('layouts.admin.auth')

@section('content')
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
            <h5 class="content-group">Login to your account
                <small class="display-block">Enter your credentials below</small>
            </h5>
        </div>

        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback has-feedback-left">

            <input placeholder="E-Mail" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>

        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback has-feedback-left">
            <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
            <div class="form-control-feedback">
                <i class="icon-lock2 text-muted"></i>
            </div>
        </div>
        <div class="form-group">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="styled">&nbsp;&nbsp;Remember Me
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Sign in <i
                        class="icon-circle-right2 position-right"></i></button>
        </div>

        <div class="text-center">
            <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>
    </div>
</form>

@endsection

@section('initial-js')
    <script>
        $( document ).ready(function() {
            $(".styled").uniform({
                radioClass: 'choice',
                wrapperClass: 'border-primary text-primary'
            });
        });
    </script>
@endsection
