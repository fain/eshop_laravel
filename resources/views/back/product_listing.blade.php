@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/datepicker.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">

    {{--file upload start--}}
    <link href="{{asset('css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
    {{--file upload end--}}

    <script src='{{ asset("js/tinymce/tinymce.min.js") }}'></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            height: 230,
            plugins: [
                'advlist autolink lists link image charmap preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
        });

        tinymce.init({
            selector: '#mytextarea2',
            height: 150,
            plugins: [
                'advlist autolink lists charmap preview',
                'searchreplace visualblocks code fullscreen',
                'table contextmenu paste code'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent'
        });
    </script>
@endsection

@section('pageheading')
    Product Listing <small>Manage your products</small>
@endsection

@section('breadcrumb')
    <i class="fa fa-cube" aria-hidden="true"></i> Product Management / <i class="fa fa-list-alt" aria-hidden="true"></i> Product Listing
@endsection

@section('content')
    <div class="col-md-12">
        <div class="form-group">
            <a href="/backend/new_product" class="btn btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New Product
            </a>
        </div>
        @if(count($product_list)=="")
            <div class="alert alert-warning">No Record!</div>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="8%">Id</th>
                        <th width="10%">Thumbnail</th>
                        <th width="17%">Name</th>
                        <th width="8%">Type</th>
                        <th>Category</th>
                        <th width="8%">Code</th>
                        <th width="8%">Price</th>
                        <th width="8%">Quantity</th>
                        <th width="8%">Status</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($product_list as $pl)
                    <tr>
                        <td>{{ $pl->p_id }}</td>
                        <td>
                            @if($pl->img_id=="")
                                <img src="{{ asset('images/no_image.jpg') }}" style="width: 50px">
                            @else
                                <img src="../{{ $pl->img_path }}{{ $pl->img_name }}" style="width: 50px">
                            @endif
                        </td>
                        <td>{{ $pl->prod_name }}</td>
                        <td>{{ $pl->prod_type }}</td>
                        <td>{{ $pl->prod_cat }}</td>
                        <td>{{ $pl->prod_code }}</td>
                        <td>{{ $pl->prod_price }}</td>
                        <td>{{ $pl->quantity }}</td>
                        <td>{{ $pl->prod_status }}</td>
                        <td>
                            <a href="{{ url("/backend/edit_product/".$pl->p_id) }}" class="btn-sm btn-info" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="{{ url("/backend/delete_product/".$pl->p_id) }}" class="btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure to delete this Product?')"><i class="fa fa-times" aria-hidden="true"></i></a>
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