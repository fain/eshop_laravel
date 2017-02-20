@extends('layouts.backlayout')

@section('css_section')
    {{--file upload start--}}
    <link href="{{asset('css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css" />
    {{--file upload end--}}
@endsection

@section('pageheading')
    Product Bulk Listing <small>Manage your product in bulk</small>
@endsection

@section('breadcrumb')
    <i class="fa fa-cube" aria-hidden="true"></i> Product Management / <i class="fa fa-list-alt" aria-hidden="true"></i> Product Bulk Listing
@endsection

@section('content')
    <div class="col-md-12">
        <div class="well">
            <ul>
                <li>Bulk listing is allowed only for New Products.</li>
                <li>Bulk product listing only available for ‘Option 1’ in selection type.</li>
                <li>Product Description can only be uploaded using Excel. For image uploads, please ensure the image file names are the same as the image names in the excel file.<br>
                    (Please use numbers or letters for image file names)</li>
                <li>If window was closed during product registration, only successfully uploaded product will be listed.</li>
                <li>Bulk listing is limited to maximum 20MB per upload.</li>
                <li>By default the selling period for bulk listing is 120 days. However Seller can change the selling period at Product Info Management anytime.</li>
                <li>The default value for categories requiring halal certification is set non-halal. When modification is needed, seller must edit them after product registration.</li>
                <li>Validity period of e-voucher products is set to 365 days.</li>
                <li>Bulk listing is not allowed for mobile top up.</li>
            </ul>
        </div>
    </div>
    <div class="col-md-12">
        <button type="button" class="btn btn-info">Category Search</button>
        <a href="/excel/bulk-upload-ver-1.xls" class="btn btn-default pull-right">Download Excel Format (Latest Version 1.0.1)</a>
    </div>

    <div class="col-md-12">
        <h3><i class="fa fa-angle-right" aria-hidden="true"></i> Bulk Listing Upload</h3>

        <form class="form-horizontal" action="/backend/product_bulk_list_upload" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-md-2 control-label">Product Description</label>
                <div class="col-md-4">
                    <input id="input-1a" type="file" class="file" data-show-preview="false" name="excel_file">
                </div>
            </div>

            <button class="btn-lg btn-default pull-right"><i class="fa fa-arrow-up" aria-hidden="true"></i> Upload File</button>

            <div class="form-group">
                <label class="col-md-2 control-label">Product Image</label>
                <div class="col-md-4">
                    <input id="input-1b" type="file" class="file" data-show-preview="false" name="image_file">
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-12">
        <h3><i class="fa fa-angle-right" aria-hidden="true"></i> Product List</h3>

        <button type="button" class="btn btn-default"><i class="fa fa-arrow-down" aria-hidden="true"></i> Download Products which Failed to Register</button>
        <button type="button" class="btn btn-info">Expand Search Result</button>

        <hr>
    </div>

    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Number</th>
                    <th>Product Name</th>
                    <th>Selling Price</th>
                    <th>Option</th>
                    <th>Stock Quantity</th>
                    <th>Sale Status</th>
                    <th>Sales Type</th>
                    <th>Selling Period</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <tr class="warning text-center">
                    <td colspan="9">No records!</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('js_section')
    <!-- the main fileinput plugin file -->
    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <script>
        $("#input-1a").fileinput({
            uploadAsync: false,
            overwriteInitial: true,
            showUpload: false,
            showRemove: false,
            initialPreviewConfig: [
                {showDelete: false, showDrag: false}
            ],
        });

        $("#input-1b").fileinput({
            uploadAsync: false,
            overwriteInitial: true,
            showUpload: false,
            showRemove: false,
            initialPreviewConfig: [
                {showDelete: false, showDrag: false}
            ],
        });
    </script>
@endsection