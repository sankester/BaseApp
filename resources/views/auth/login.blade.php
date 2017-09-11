@extends('layouts.admin.auth')

@section('content')
    <form method="POST" action="{{ route('base.login') }}">
        {{ csrf_field() }}
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">Login to your account
                    <small class="display-block">Enter your credentials below</small>
                </h5>
                {{--if use google recaptcha--}}
                @if( $errors->has('g-recaptcha-response') )
                    <div class="alert alert-danger alert-bordered">
                        <span class="text-semibold">
                            {{ !empty($errors->first('g-recaptcha-response')) ? $errors->first('g-recaptcha-response') : 'Captcha tidak boleh kosong.' }}
                        </span>
                    </div>
                @endif
                {{--end use google recaptcha--}}

                {{--if mews captcha--}}
                @if( $errors->has('captcha') )
                    <div class="alert alert-danger alert-bordered">
                        <span class="text-semibold">
                            {{ !empty($errors->first('captcha')) ? $errors->first('captcha') : 'Captcha tidak boleh kosong.' }}
                        </span>
                    </div>
                @endif
                {{--end mews captcha--}}
            </div>

            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }} has-feedback has-feedback-left">
                <input placeholder="Username" id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
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
            <div  class="form-group" >
                <div class="row">
                    <div class="col-md-6">
                        {!!  Captcha::img(); !!}
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="captcha" id="captcha" >
                    </div>
                </div>
                {{--generate captcha if use google recaptcha--}}
                {{--{!! Recaptcha::generateCaptcha() !!}--}}
                {{--end generate captcha if use google recaptcha--}}
            </div>
            <div class="form-group">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="styled">&nbsp;&nbsp;Remember
                Me
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
        $(document).ready(function () {
            $(".styled").uniform({
                radioClass: 'choice',
                wrapperClass: 'border-primary text-primary'
            });
        });
    </script>
@endsection
