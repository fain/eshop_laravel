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
            <a href="/backend/new_brand" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New Brand
            </a>
        </div>

        @if(count($brandlist)==0)
            <div class="alert alert-danger">No records!</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="10%">No.</th>
                        <th width="35%">Name</th>
                        <th width="35%">Categories</th>
                        <th width="10%">Status</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                    @foreach($brandlist as $index => $bl)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ ucfirst(strtolower($bl->name)) }}</td>
                        <td>@if($bl->catname=="00") Others @elseif($bl->catname=="") None @else {{ ucfirst(strtolower($bl->catname)) }} @endif</td>
                        <td>@if($bl->status=="" || $bl->status=="N") Not Active @elseif($bl->status=="A") Active @endif</td>
                        <td>
                            <a href="/backend/edit_brand/{{ $bl->id }}" class="btn-sm btn-info" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="/backend/delete_brand/{{ $bl->id }}" class="btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure to delete this brand?')"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

@section('js_section')
@endsection