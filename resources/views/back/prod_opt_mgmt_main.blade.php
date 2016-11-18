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
            <li role="presentation" @if(session('active_tabs')=='opt_grp' || session('active_tabs')=='') class="active" @endif><a href="#opt_grp" aria-controls="opt_grp" role="tab" data-toggle="tab">Product Option Group</a></li>
            <li role="presentation" @if(session('active_tabs')=='opt') class="active" @endif><a href="#opt" aria-controls="opt" role="tab" data-toggle="tab">Product Options</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade @if(session('active_tabs')=='opt_grp' || session('active_tabs')=='') in active @endif" id="opt_grp">
                <br>
                <div class="col-md-12">
                    @include('back.prod_opt_grp')
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade @if(session('active_tabs')=='opt') in active @endif" id="opt">
                <br>
                <div class="col-md-12">
                    @include('back.prod_opt')
                </div>
            </div>
        </div>
    </div>
@endsection