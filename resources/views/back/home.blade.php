@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('pageheading')
    Dashboard <small>Statistics Overview</small>
@endsection

@section('breadcrumb')
    <i class="fa fa-dashboard"></i> Dashboard
@endsection

@section('content')
    <div class="col-md-10">
        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-heading">Order Status <small>(Recent 3 months)</small></div>--}}
            {{--<div class="panel-body">--}}
        <div class="sub-title">
            <h3>Order Status</h3> <small>(Recent 3 months)</small>
            <button class="btn btn-sm pull-right"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</button>
        </div>

        <div>
            <div class="order-box">
                <div class="panel panel-default">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <i class="fa fa-credit-card fa-3x" aria-hidden="true"></i>
                            </div>
                            <div class="col-xs-12 text-center">
                                <div class="order-box-title">Payment Complete</div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <a class="text-center count-order-stat" href="#">
                                    0
                                </a>
                            </div>
                        </div>
                </div>
            </div>
            <div class="order-box">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <i class="fa fa-external-link fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Order Confirmed</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-box">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <i class="fa fa-truck fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Shipping in Progress</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-box">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <i class="fa fa-home fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Shipping Complete</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-box">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <i class="fa fa-check-square-o fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Purchase Confirmed</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            {{--</div>--}}
        {{--</div>--}}

        <div class="sub-title">
            <h3>Product Status</h3> <small>(Recent 3 months)</small>
            <button class="btn btn-sm pull-right"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</button>
        </div>

        <div>
            <div class="order-box">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <i class="fa fa-ban fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Cancellation Requested</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-box">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <i class="fa fa-reply fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Return Requested</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                        <hr>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Return Approved</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-box">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <i class="fa fa-truck fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Shipping in Progress</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-box">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <i class="fa fa-home fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Shipping Complete</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-box">
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <i class="fa fa-check-square-o fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-12 text-center">
                            <div class="order-box-title">Purchase Confirmed</div>
                        </div>
                        <div class="col-xs-12 text-center">
                            <a class="text-center count-order-stat" href="#">
                                0
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2">

    </div>


        {{--<div id="page-wrapper">--}}
            {{--<div class="container-fluid">--}}

                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<div class="alert alert-info alert-dismissable">--}}
                            {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                            {{--<i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.row -->--}}


                <!-- /.row -->

                {{--<div class="row">--}}
                    {{--<div class="col-lg-12">--}}
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-heading">--}}
                                {{--<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>--}}
                            {{--</div>--}}
                            {{--<div class="panel-body">--}}
                                {{--<div id="morris-area-chart"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- /.row -->

                {{--<div class="row">--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-heading">--}}
                                {{--<h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>--}}
                            {{--</div>--}}
                            {{--<div class="panel-body">--}}
                                {{--<div id="morris-donut-chart"></div>--}}
                                {{--<div class="text-right">--}}
                                    {{--<a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-heading">--}}
                                {{--<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Tasks Panel</h3>--}}
                            {{--</div>--}}
                            {{--<div class="panel-body">--}}
                                {{--<div class="list-group">--}}
                                    {{--<a href="#" class="list-group-item">--}}
                                        {{--<span class="badge">just now</span>--}}
                                        {{--<i class="fa fa-fw fa-calendar"></i> Calendar updated--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="list-group-item">--}}
                                        {{--<span class="badge">4 minutes ago</span>--}}
                                        {{--<i class="fa fa-fw fa-comment"></i> Commented on a post--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="list-group-item">--}}
                                        {{--<span class="badge">23 minutes ago</span>--}}
                                        {{--<i class="fa fa-fw fa-truck"></i> Order 392 shipped--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="list-group-item">--}}
                                        {{--<span class="badge">46 minutes ago</span>--}}
                                        {{--<i class="fa fa-fw fa-money"></i> Invoice 653 has been paid--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="list-group-item">--}}
                                        {{--<span class="badge">1 hour ago</span>--}}
                                        {{--<i class="fa fa-fw fa-user"></i> A new user has been added--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="list-group-item">--}}
                                        {{--<span class="badge">2 hours ago</span>--}}
                                        {{--<i class="fa fa-fw fa-check"></i> Completed task: "pick up dry cleaning"--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="list-group-item">--}}
                                        {{--<span class="badge">yesterday</span>--}}
                                        {{--<i class="fa fa-fw fa-globe"></i> Saved the world--}}
                                    {{--</a>--}}
                                    {{--<a href="#" class="list-group-item">--}}
                                        {{--<span class="badge">two days ago</span>--}}
                                        {{--<i class="fa fa-fw fa-check"></i> Completed task: "fix error on sales page"--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="text-right">--}}
                                    {{--<a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-heading">--}}
                                {{--<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>--}}
                            {{--</div>--}}
                            {{--<div class="panel-body">--}}
                                {{--<div class="table-responsive">--}}
                                    {{--<table class="table table-bordered table-hover table-striped">--}}
                                        {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th>Order #</th>--}}
                                                {{--<th>Order Date</th>--}}
                                                {{--<th>Order Time</th>--}}
                                                {{--<th>Amount (USD)</th>--}}
                                            {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                            {{--<tr>--}}
                                                {{--<td>3326</td>--}}
                                                {{--<td>10/21/2013</td>--}}
                                                {{--<td>3:29 PM</td>--}}
                                                {{--<td>$321.33</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>3325</td>--}}
                                                {{--<td>10/21/2013</td>--}}
                                                {{--<td>3:20 PM</td>--}}
                                                {{--<td>$234.34</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>3324</td>--}}
                                                {{--<td>10/21/2013</td>--}}
                                                {{--<td>3:03 PM</td>--}}
                                                {{--<td>$724.17</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>3323</td>--}}
                                                {{--<td>10/21/2013</td>--}}
                                                {{--<td>3:00 PM</td>--}}
                                                {{--<td>$23.71</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>3322</td>--}}
                                                {{--<td>10/21/2013</td>--}}
                                                {{--<td>2:49 PM</td>--}}
                                                {{--<td>$8345.23</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>3321</td>--}}
                                                {{--<td>10/21/2013</td>--}}
                                                {{--<td>2:23 PM</td>--}}
                                                {{--<td>$245.12</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>3320</td>--}}
                                                {{--<td>10/21/2013</td>--}}
                                                {{--<td>2:15 PM</td>--}}
                                                {{--<td>$5663.54</td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td>3319</td>--}}
                                                {{--<td>10/21/2013</td>--}}
                                                {{--<td>2:13 PM</td>--}}
                                                {{--<td>$943.45</td>--}}
                                            {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                                {{--<div class="text-right">--}}
                                    {{--<a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.row -->--}}

            {{--</div>--}}
            {{--<!-- /.container-fluid -->--}}

        {{--</div>--}}
        {{--<!-- /#page-wrapper -->--}}
@endsection