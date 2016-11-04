@extends('layouts.layout')

@section('content')       
       <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Login to your account</h2>
                            @include('front.message')
                            <div class="col-md-12">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('auth/login_handler') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Keep me signed in
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Login</button>

                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                    </div>
                                </form>
                            </div>
                            {{--<form class="form-horizontal" method="POST" action="{{url('auth/login')}}">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>--}}
                                        {{--@if ($errors->has('email'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<input id="password" type="password" class="form-control" placeholder="Password" name="password" required>--}}

                                        {{--@if ($errors->has('password'))--}}
                                            {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>-.--}}
                                    {{---}}--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<input type="email" name="email" id="email" placeholder="Email Address" />--}}
                                {{--<input type="password" name="password" id="password" placeholder="Password" />--}}
                                {{--<span>--}}
                                    {{--<input name="remember" id="remember" type="checkbox" class="checkbox">--}}
                                    {{--Keep me signed in--}}
                                {{--</span>--}}
                                {{--<button type="submit" class="btn btn-default">Login</button>--}}
                            {{--</form>--}}
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">OR</h2>
                    </div>
                    <div class="col-sm-4">
                        <div id="signup-form" class="signup-form"><!--sign up form-->
                            <h2>Don't have an account yet?</h2>
                            {{--<form method="POST" action="{{url('register')}}">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--<input type="text" name="name" id="name"  placeholder="Name">--}}
                                {{--<input type="email" name="email" placeholder="Email Address"/>--}}
                                {{--<input type="password" name="password" placeholder="Password">--}}
                                {{--<button type="submit" class="btn btn-default">Signup</button>--}}
                            <a href="register"><button class="btn btn-default">Signup</button></a>
                            {{--</form>--}}
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->
@endsection