@extends('layouts.reglayout')

@section('css_section')
<link href="{{asset('css/datepicker.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="">
    <div class="page-header">
        <h1>Seller Registration</h1>
    </div>

    @include('back.message')

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/backend/register_seller') }}">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-user" aria-hidden="true"></i> <strong>Seller Information</strong></div>
            <div class="panel-body">            
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-2 control-label">E-mail Address</label>

                    <div class="col-md-4">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="youremail@angkasa.com">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                    <label for="dob" class="col-md-2 control-label">Date of Birth</label>

                    <div class="col-md-2">
                        <input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob') }}" placeholder="dd-mm-yyyy" data-date-viewmode="years">

                        @if ($errors->has('dob'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
                    <label for="contact_number" class="col-md-2 control-label">Contact Number</label>

                    <div class="col-md-3">
                        <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ old('contact_number') }}" placeholder="0123456789">

                        @if ($errors->has('contact_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contact_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label for="gender" class="col-md-2 control-label">Gender</label>

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

                <div class="form-group{{ $errors->has('store_name') ? ' has-error' : '' }}">
                    <label for="store_name" class="col-md-2 control-label">Store Name</label>

                    <div class="col-md-6">
                        <input id="store_name" type="text" class="form-control" name="store_name" value="{{ old('store_name') }}" >

                        @if ($errors->has('store_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('store_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('store_url') ? ' has-error' : '' }}">
                    <label for="store_url" class="col-md-2 control-label">Store URL</label>
                    <div class="col-md-2 form-control-static">http://eshop.angkasa.my/</div>
                    <div class="col-md-3">                        
                        <input id="store_url" type="text" class="form-control" name="store_url" value="{{ old('store_url') }}" >

                        @if ($errors->has('store_url'))
                            <span class="help-block">
                                <strong>{{ $errors->first('store_url') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <br>

                <h4>Login Information</h4>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-2 control-label">Password</label>

                    <div class="col-md-3">
                        <input id="password" type="password" class="form-control" name="password" >

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>

                    <div class="col-md-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>                                  
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-briefcase" aria-hidden="true"></i> <strong>Business Details</strong>
            </div>
            <div class="panel-body"> 
                <h4>Person In Charge</h4>
                <div class="form-group">
                    <div class="checkbox col-md-offset-2 col-md-6">
                        <label>
                            <input type="checkbox" name="same_seller" id="same_seller"> Same as <b>Seller Information</b>
                        </label>
                    </div>
                </div>
                <!-- <hr> -->
                <div class="form-group{{ $errors->has('pic_name') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-6">
                        <input id="pic_name" type="text" class="form-control" name="pic_name" value="{{ old('pic_name') }}">

                        @if ($errors->has('pic_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pic_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('pic_email') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">E-mail</label>
                    <div class="col-md-4">
                        <input id="pic_email" type="text" class="form-control" name="pic_email" value="{{ old('pic_email') }}" >

                        @if ($errors->has('pic_email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pic_email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('pic_phone') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Phone Number</label>
                    <div class="col-md-3">
                        <input id="pic_phone" type="text" class="form-control" name="pic_phone" value="{{ old('pic_phone') }}" >

                        @if ($errors->has('pic_phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pic_phone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <br>

                <h4>Shipping Address</h4>
                <div class="form-group{{ $errors->has('ship_add') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Address</label>
                    <div class="col-md-6">
                        <input id="ship_add" type="text" class="form-control" name="ship_add" value="{{ old('ship_add') }}" >

                        @if ($errors->has('ship_add'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ship_add') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('ship_state') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">State</label>
                    <div class="col-md-3">                        
                        <select id="ship_state" class="form-control" name="ship_state" value="{{ old('ship_state') }}" >
                            <option value="">Select State</option>
                            @foreach($ship_states as $ship_state)
                                <option value="{{ $ship_state->id }}" @if(old('ship_state') == $ship_state->id) selected="selected" @endif>{{ $ship_state->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('ship_state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ship_state') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('ship_city') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">City</label>
                    <div class="col-md-3">
                        <input id="ship_city" type="text" class="form-control" name="ship_city" value="{{ old('ship_city') }}" >

                        @if ($errors->has('ship_city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ship_city') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('ship_pcode') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Postcode</label>
                    <div class="col-md-2">
                        <input id="ship_pcode" type="text" class="form-control" name="ship_pcode" value="{{ old('ship_pcode') }}" >

                        @if ($errors->has('ship_pcode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ship_pcode') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <br>

                <h4>Return Address</h4>
                <div class="form-group">
                    <div class="checkbox col-md-offset-2 col-md-6">
                        <label>
                            <input type="checkbox" name="same_ship" id="same_ship"> Same as <b>Shipping Address</b>
                        </label>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('rtn_add') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Address</label>
                    <div class="col-md-6">
                        <input id="rtn_add" type="text" class="form-control" name="rtn_add" value="{{ old('rtn_add') }}" >

                        @if ($errors->has('rtn_add'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rtn_add') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('rtn_state') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">State</label>
                    <div class="col-md-3">                        
                        <select id="rtn_state" class="form-control" name="rtn_state" value="{{ old('rtn_state') }}" >
                            <option value="">Select State</option>
                            @foreach($rtn_states as $rtn_state)
                                <option value="{{ $rtn_state->id }}" @if(old('rtn_state') == $rtn_state->id) selected="selected" @endif>{{ $rtn_state->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('rtn_state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rtn_state') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('rtn_city') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">City</label>
                    <div class="col-md-3">
                        <input id="rtn_city" type="text" class="form-control" name="rtn_city" value="{{ old('rtn_city') }}" >

                        @if ($errors->has('rtn_city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rtn_city') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('rtn_pcode') ? ' has-error' : '' }}">
                    <label class="col-md-2 control-label">Postcode</label>
                    <div class="col-md-2">
                        <input id="rtn_pcode" type="text" class="form-control" name="rtn_pcode" value="{{ old('rtn_pcode') }}" >

                        @if ($errors->has('rtn_pcode'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rtn_pcode') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>            
        </div>

        <div class="form-group">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js_section')
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>

<script type="text/javascript">
var dob = $('#dob').datepicker({ format: 'dd-mm-yyyy' });

$("#same_seller").change(function() {
    var name = $("#name").val();
    var email = $("#email").val();
    var contact_number = $("#contact_number").val();

    if(this.checked) {
        //Do stuff
        $("#pic_name").val(name);
        $("#pic_email").val(email);
        $("#pic_phone").val(contact_number);
    }else{
        $("#pic_name").val("");
        $("#pic_email").val("");
        $("#pic_phone").val("");
    }
});

$("#same_ship").change(function() {
    var ship_add = $("#ship_add").val();
    var ship_state = $("#ship_state").val();
    var ship_city = $("#ship_city").val();
    var ship_pcode = $("#ship_pcode").val();

    if(this.checked) {
        //Do stuff
        $("#rtn_add").val(ship_add);
        $("#rtn_state").val(ship_state);
        $("#rtn_city").val(ship_city);
        $("#rtn_pcode").val(ship_pcode);
    }else{
        $("#rtn_add").val("");
        $("#rtn_state").val("");
        $("#rtn_city").val("");
        $("#rtn_pcode").val("");
    }
});

$(document).ready(function() {
    $("#contact_number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>
@endsection