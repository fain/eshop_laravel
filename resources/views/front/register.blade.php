@extends('layouts.layout')

@section('css_content')
    <link href="{{asset('css/datepicker.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')       
       <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="register-form">
                            <h2>Register new account</h2>
                            @include('front.message')
                            {{ print_r($errors) }}
                            <form class="form-horizontal" method="POST" action="{{url('auth/register_handler')}}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-2 control-label text-left">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-2 control-label text-left">Email</label>

                                    <div class="col-md-4">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="dob" class="col-md-2 control-label text-left">Date of Birth</label>

                                    <div class="col-md-2">
                                        <div class="input-group">
                                            <input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob') }}" data-date-viewmode="years" required autofocus>
                                            <label class="input-group-addon btn" for="dob"><i class="fa fa-calendar" aria-hidden="true"></i></label>
                                        </div>
                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender" class="col-md-2 control-label text-left">Gender</label>

                                    <div class="col-md-2">
                                        <select id="gender" name="gender" class="form-control" >
                                            <option value="">Select Gender</option>
                                            <option value="M" @if(old('gender') == 'M') selected="selected" @endif>Male</option>
                                            <option value="F" @if(old('gender') == 'F') selected="selected" @endif>Female</option>
                                        </select>

                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('c_number') ? ' has-error' : '' }}">
                                    <label for="c_number" class="col-md-2 control-label text-left">Contact Number</label>

                                    <div class="col-md-3">
                                        <input id="c_number" size="12" type="text" class="form-control" name="c_number" value="{{ old('c_number') }}" required autofocus>

                                        @if ($errors->has('c_number'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('c_number') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-2 control-label text-left">Password</label>

                                    <div class="col-md-2">
                                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>

                                    <div class="col-md-2">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary">
                                            Signup
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/form-->
@endsection

@section('js_content')

    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>

    <script>
        $('#dob').datepicker({ format: 'dd-mm-yyyy'});

//        $(document).ready(function() {
//            $('#contact_form').bootstrapValidator({
//                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
//                feedbackIcons: {
//                    valid: 'glyphicon glyphicon-ok',
//                    invalid: 'glyphicon glyphicon-remove',
//                    validating: 'glyphicon glyphicon-refresh'
//                },
//                fields: {
//                    first_name: {
//                        validators: {
//                            stringLength: {
//                                min: 2,
//                            },
//                            notEmpty: {
//                                message: 'Please supply your first name'
//                            }
//                        }
//                    },
//                    last_name: {
//                        validators: {
//                            stringLength: {
//                                min: 2,
//                            },
//                            notEmpty: {
//                                message: 'Please supply your last name'
//                            }
//                        }
//                    },
//                    email: {
//                        validators: {
//                            notEmpty: {
//                                message: 'Please supply your email address'
//                            },
//                            emailAddress: {
//                                message: 'Please supply a valid email address'
//                            }
//                        }
//                    },
//                    phone: {
//                        validators: {
//                            notEmpty: {
//                                message: 'Please supply your phone number'
//                            },
//                            phone: {
//                                country: 'US',
//                                message: 'Please supply a vaild phone number with area code'
//                            }
//                        }
//                    },
//                    address: {
//                        validators: {
//                            stringLength: {
//                                min: 8,
//                            },
//                            notEmpty: {
//                                message: 'Please supply your street address'
//                            }
//                        }
//                    },
//                    city: {
//                        validators: {
//                            stringLength: {
//                                min: 4,
//                            },
//                            notEmpty: {
//                                message: 'Please supply your city'
//                            }
//                        }
//                    },
//                    state: {
//                        validators: {
//                            notEmpty: {
//                                message: 'Please select your state'
//                            }
//                        }
//                    },
//                    zip: {
//                        validators: {
//                            notEmpty: {
//                                message: 'Please supply your zip code'
//                            },
//                            zipCode: {
//                                country: 'US',
//                                message: 'Please supply a vaild zip code'
//                            }
//                        }
//                    },
//                    comment: {
//                        validators: {
//                            stringLength: {
//                                min: 10,
//                                max: 200,
//                                message:'Please enter at least 10 characters and no more than 200'
//                            },
//                            notEmpty: {
//                                message: 'Please supply a description of your project'
//                            }
//                        }
//                    }
//                }
//            })
//                    .on('success.form.bv', function(e) {
//                        $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
//                        $('#contact_form').data('bootstrapValidator').resetForm();
//
//                        // Prevent form submission
//                        e.preventDefault();
//
//                        // Get the form instance
//                        var $form = $(e.target);
//
//                        // Get the BootstrapValidator instance
//                        var bv = $form.data('bootstrapValidator');
//
//                        // Use Ajax to submit form data
//                        $.post($form.attr('action'), $form.serialize(), function(result) {
//                            console.log(result);
//                        }, 'json');
//                    });
//        });
    </script>
@endsection