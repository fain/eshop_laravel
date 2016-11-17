@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('pageheading')
    Product Option Management <small>Manage your product option</small>
@endsection

@section('breadcrumb')
    <i class="fa fa-cube" aria-hidden="true"></i> Product Management / <i class="fa fa-list-alt" aria-hidden="true"></i> Product Option Management
@endsection

@section('content')
    <div class="col-md-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#opt_grp" aria-controls="opt_grp" role="tab" data-toggle="tab">Product Option Group</a></li>
            <li role="presentation"><a href="#opt" aria-controls="opt" role="tab" data-toggle="tab">Product Options</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="opt_grp">
                <br>
                <div class="col-md-12">

                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="opt">
                <br>
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_section')

@endsection