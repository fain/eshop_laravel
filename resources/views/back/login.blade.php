@extends('layouts.reglayout')

@section('content')
<div class="col-md-offset-3 col-md-6 mar-top-100">
    @include('back.message')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user-secret" aria-hidden="true"></i> Seller Login</h3>
        </div>
        <div class="panel-body">
            <form role="form" class="form-horizontal" method="POST" action="{{ url('/backend/login_handler') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Username</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox col-md-offset-4 col-md-6">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>

                <p class="text-center">
                    <a class="btn btn-link" href="{{ url('/backend/register') }}">
                        Don't have seller Account? Register Here.
                    </a> | 

                    <a class="btn btn-link" href="{{ url('/back/password/reset') }}">
                        Forgot Your Password?
                    </a>
                </p>

                <div class="col-md-offset-4 col-md-6">
                    <input type="submit" class="btn btn-primary" value="Login">
                    <input type="reset" class="btn btn-danger" value="Reset">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

