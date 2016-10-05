@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('pageheading')
    Categories <small>Manage your categories</small>
@endsection

@section('breadcrumb')
    <i class="fa fa-cube" aria-hidden="true"></i> Products / <i class="fa fa-list-alt" aria-hidden="true"></i> Categories
@endsection

@section('content')
    <div class="col-md-3">
        @include('back.cat_sidebar')
    </div>
    <div class="col-md-9">
        <div class="well">This page will be used to manage your Categories</div>
    </div>
@endsection

@section('js_section')
    <script>
        $(document).ready(function(){
            $(".collapse").on('shown.bs.collapse', function(event){
                var link = "link_"+event.target.id;
                var icon = "icon_"+event.target.id;

                $( "#"+link ).html('<i id="'+icon+'" class="fa fa-minus-square" aria-hidden="true"></i>');
            });

            $(".collapse").on('hidden.bs.collapse', function(event){
                var link = "link_"+event.target.id;
                var icon = "icon_"+event.target.id;

                $( "#"+link ).html('<i id="'+icon+'" class="fa fa-plus-square" aria-hidden="true"></i>');
            });
        });
    </script>
@endsection