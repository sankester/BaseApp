@extends('layouts.admin.auth')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
                <!-- Password recovery -->
        <form method="POST" action="{{ route('password.email') }}">
            <div class="panel panel-body login-form">
                {{ csrf_field() }}
                <div class="text-center">
                    <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
                    <h5 class="content-group">Reset Password
                        <small class="display-block">Kami akan mengirimkan kode konfirmasi ke email anda.</small>
                    </h5>
                </div>

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>
                </div>

                <button type="submit" class="btn bg-blue btn-block">Reset password <i
                            class="icon-arrow-right14 position-right"></i></button>
            </div>
        </form>
        <!-- /password recovery -->
@endsection
