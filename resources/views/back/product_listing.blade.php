@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('pageheading')
    Product Listing <small>Manage your products</small>
@endsection

@section('breadcrumb')
    <i class="fa fa-cube" aria-hidden="true"></i> Product Management / <i class="fa fa-list-alt" aria-hidden="true"></i> Product Listing
@endsection

@section('content')
    <div class="col-md-12">
        <form class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 control-label">Sales Type</label>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="sales_type" id="sales_type1" value="new"> New
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sales_type" id="sales_type2" value="Pre-Order"> Pre-Order
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sales_type" id="sales_type3" value="Used"> Used
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Category</label>
                <div class="col-md-9">
                    <select class="form-control">
                        <option value="">Recently Registered Category</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-2">
                    <select class="form-control">
                        <option value="">Upper-Level Category</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control">
                        <option value="">Mid-Level Category</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control">
                        <option value="">Lower-Level Category</option>
                    </select>
                </div>
            </div>
        </form>

    </div>
@endsection

@section('js_section')

@endsection