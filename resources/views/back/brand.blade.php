@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('pageheading')
    Brands <small>Manage brands</small>
@endsection

@section('breadcrumb')
    <i class="fa fa-cube" aria-hidden="true"></i> Product Management / <i class="fa fa-list-alt" aria-hidden="true"></i> Brand
@endsection

@section('content')
    <div class="col-md-12">
        <div class="form-group">
            <a href="/backend/new_brand" class="btn btn-info">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New Brand
            </a>
        </div>

        @if(count($brandlist)==0)
            <div class="alert alert-danger">No records!</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Categories</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brandlist as $index => $bl)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $bl['name'] }}</td>
                        <td>{{ $bl['category_id'] }}</td>
                        <td>{{ $bl['status'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

@section('js_section')
@endsection