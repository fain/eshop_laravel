@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Categories <small>Manage your categories</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-cube" aria-hidden="true"></i> Products / <i class="fa fa-list-alt" aria-hidden="true"></i> Categories
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-3">
                    @foreach($treecat as $tc)
                        <ul class="list-unstyled">
                            @if(count($tc->subcat)>0)
                                <li class="maincat">
                                <a id="link_{{ strtolower($tc->name) }}" data-toggle="collapse" data-parent="#accordian" href="#{{ strtolower($tc->name) }}">
                                    <i id="icon_{{ strtolower($tc->name) }}" class="fa fa-plus-square" aria-hidden="true"></i>
                                </a>
                                    <a class="maincat_link" href="{{ url($basecat_url.$tc->slug) }}">{{ ucfirst(strtolower($tc->name)) }}</a>
                                <div id="{{ strtolower($tc->name) }}" class="panel-collapse collapse">
                                    <ul class="list-unstyled">
                                    @foreach ($tc->subcat as $sc)
                                        <li class="subcat"><i class="fa fa-square-o" aria-hidden="true"></i>
                                            <a href="{{ url($basecat_url.$sc->slug) }}">{{ ucfirst(strtolower($sc->name)) }}</a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                                </li>
                            @else
                                <li class="maincat"><i class="fa fa-square" aria-hidden="true"></i>
                                    <a href="{{ url($basecat_url.$tc->slug) }}" class="maincat_link">{{ ucfirst(strtolower($tc->name)) }}</a></li>
                            @endif
                        </ul>
                    @endforeach
                </div>
                <div class="col-md-9">
                    @include('back.cat_detail')
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
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