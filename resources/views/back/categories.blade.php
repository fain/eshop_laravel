@extends('layouts.backlayout')

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">
                        Dashboard <small>Statistics Overview</small>
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
                        <div>
                            @if(count($tc->subcat)>0)
                                <i class="fa fa-minus-square" aria-hidden="true"></i>
                            @else
                                <i class="fa fa-square" aria-hidden="true"></i>
                            @endif
                            {{ ucfirst(strtolower($tc->name)) }}

                            @foreach ($tc->subcat as $sc)
                                <div>{{ ucfirst(strtolower($sc->name)) }}</div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="col-md-9">
                    cont
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
@endsection