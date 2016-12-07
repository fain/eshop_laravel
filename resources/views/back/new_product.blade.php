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
    <i class="fa fa-cube" aria-hidden="true"></i> Product Management / <i class="fa fa-list-alt" aria-hidden="true"></i> Product Listing / <i class="fa fa-plus" aria-hidden="true"></i> Add New Product
@endsection

@section('content')
    <div class="col-md-12">
        <div class="form-group">
            <a href="/backend/product_listing" class="btn btn-default">
                <i class="fa fa-reply" aria-hidden="true"></i> Back to Product Listing
            </a>
        </div>
        <form class="form-horizontal" enctype="multipart/form-data" id="fileupload" method="post" action="/backend/product_listing_handler">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-md-2 control-label">Sales Type <span class="req">*</span> </label>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="sales_type" id="sales_type1" value="New" checked="checked"> New
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
                <label class="col-md-2 control-label">Category <span class="req">*</span> </label>
                <div class="col-md-3">
                    <select class="form-control" name="main_category" id="main_category">
                        <option value="">Select Main Category</option>
                        @foreach($maincat as $mc)
                            <option value="{{ $mc->id }}">{{ ucfirst(strtolower($mc->name)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="sub_category" id="sub_category">
                        <option value="">Select Sub Category</option>
                    </select>
                </div>
            </div>
            <div id="brand_box" style="display: none">
                <div class="form-group">
                    <label class="col-md-2 control-label">Brand <span class="req">*</span> </label>
                    <div class="col-md-3">
                        <select class="form-control" name="brand_sel" id="brand_sel">
                            <option value="">Select Brand</option>
                            <option value="others">Others</option>
                            {{--@foreach($maincat as $mc)--}}
                            {{--<option value="{{ $mc->id }}">{{ ucfirst(strtolower($mc->name)) }}</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Name <span class="req">*</span> </label>
                <div class="col-md-8">
                    <input type="text" name="name" id="prod_name" placeholder="Product name to be displayed" class="form-control">
                </div>
                <div class="col-md-1">
                    <p class="form-control-static"><span id="prod_name_count">0</span>/100</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Seller Product Code</label>
                <div class="col-md-8">
                    <input type="text" name="prod_code" id="prod_code"  class="form-control">
                </div>
                <div class="col-md-1">
                    <p class="form-control-static"><span id="prod_code_count">0</span>/40</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Image</label>
                <div class="col-md-8">
                    <input id="input-id" type="file" class="file" data-preview-file-type="text" name="images[]" multiple data-show-upload="false">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Short Description <span class="req">*</span> </label>
                <div class="col-md-9">
                    <textarea id="mytextarea2" name="short_details"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Detailed Description <span class="req">*</span> </label>
                <div class="col-md-9">
                    <textarea id="mytextarea" name="details"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">GST Applicable <span class="req">*</span> </label>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="gst_type" id="gst_type1" value="Standard"> Standard Rate
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gst_type" id="gst_type2" value="Exempted" checked="checked"> Exempted Rate
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gst_type" id="gst_type3" value="Zero"> Zero Rate
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gst_type" id="gst_type3" value="Flat"> Flat Rate
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="col-md-2 control-label">Selling Period</label>
                <div class="col-md-1">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="selling_period_set" id="selling_period_set" value="Y" checked="checked"> Set
                    </label>
                </div>
                <div id="selling_period_cont">
                    <div class="col-md-2">
                        <select class="form-control" name="selling_period_day" id="selling_period_day">
                            <option value="3">3 Days</option>
                            <option value="5">5 Days</option>
                            <option value="7">7 Days</option>
                            <option value="15">15 Days</option>
                            <option value="30">30 Days</option>
                            <option value="60">60 Days</option>
                            <option value="90">90 Days</option>
                            <option value="120">120 Days</option>
                            <option value="180">180 Days</option>
                            <option value="direct">Direct Input</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-append date" id="" data-date="{{ date('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" id="selling_period_start" name="selling_period_start" value="{{ date('d-m-Y') }}">
                            </div>
                            <div class="input-group-addon">to</div>
                            <div class="input-append date" id="" data-date="" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" id="selling_period_end" name="selling_period_end" readonly disabled="disabled">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Selling Price <span class="req">*</span> </label>
                <label class="col-md-1 control-label"><span class="req">RM</span> </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="price">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Tier Price <span class="req"></span> </label>
                <div class="col-md-3">
                    <select class="form-control" name="tier_price">
                        <option value="">Select Plan</option>
                        <option value="12">12 Months</option>
                        <option value="24">24 Months</option>
                        <option value="36">36 Months</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <p class="form-control-static">Installment Plan</p>
                </div>
                <div class="col-md-1">
                    <p class="form-control-static text-right">RM</p>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="inst_price">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Discount by Seller </label>
                <div class="col-md-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="discount_set" name="discount_set" value="Y"> Set
                    </label>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="discount_sel">
                        <option value="RM">RM</option>
                        <option value="%">%</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="discount_val">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 col-md-offset-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="discount_period_set" name="discount_period_set" value="set"> Set Period
                    </label>
                </div>
                <div id="discount-period-cont">
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-append date" id="" data-date="" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" id="discount_period_start" name="discount_period_start">
                            </div>
                            <div class="input-group-addon">to</div>
                            <div class="input-append date" id="" data-date="" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" id="discount_period_end" name="discount_period_end">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Weight <span class="req">*</span> </label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="weight">
                </div>
                <div class="col-md-2">
                    <p class="form-control-static">Kg</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Stock Quantity <span class="req">*</span> </label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="stock_quantity">
                </div>
                <div class="col-md-2">
                    <p class="form-control-static">Units</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Option </label>
                <div class="col-md-3">
                    <select class="form-control" name="prod_opt_sel" id="prod_opt_sel">
                        <option value="">Select Product Options</option>
                        <option value="grp">Product Options by Group</option>
                        <option value="indv">Product Options by Individual</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="prod_opt_grp_sel" style="display: none" id="prod_opt_grp_sel">
                        <option value="">Select Product Options Group</option>
                        @foreach($prod_opt_group as $pog)
                            <option value="{{ $pog->id }}">{{ $pog->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group" id="prod_opt_box">
                <div class="col-md-9 col-md-offset-2">
                    <table class="table table-bordered table-striped" id="prod_opt_table_id" style="display: none">
                        <thead>
                            <tr>
                                <th>Product Options</th>
                                <th>Information</th>
                                <th width="20%" id="actioncolid" style="display: none" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="display: none" id="manuallistid">
                                <td colspan="4" class="text-center">
                                    <a class="btn-add" href="#" onclick="addField();" id="add_field_btn">
                                        <i class="fa fa-plus-circle" aria-hidden="true" style=""></i>
                                    </a>

                                    <a class="btn-remove disabled" href="#" onclick="deleteField();" id="delete_field_btn">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr style="display: none" id="grouplistid">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="col-md-2 control-label">Address <span class="req">*</span> </label>
                <div class="col-md-2">
                    <p class="form-control-static">Ship-From Address</p>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="shipping_add">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info" type="button" data-toggle="modal" data-target="#shippingModal" onclick="shippingMerchant();">Edit</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 col-md-offset-2">
                    <p class="form-control-static">Return/Exchange Address</p>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="return_add">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info" type="button">Edit</button>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">Shipping Method <span class="req">*</span> </label>
                <div class="col-md-4">
                    <select class="form-control" name="shipping_method">
                        <option value="courier">Courier Service</option>
                        <option value="direct">Direct Shipping</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Shipping rate <span class="req">*</span> </label>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="ship_rate" id="ship_rate1" value="Free" checked="checked"> Free
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ship_rate" id="ship_rate2" value="Bundle"> Bundle Shipping Rate
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ship_rate" id="ship_rate3" value="ByProd"> Shipping Rate by Product
                    </label>
                </div>
            </div>
            <div id="shipping-method-cont">
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td rowspan="2" width="15%">West Malaysia</td>
                                <td width="15%">Up to</td>
                                <td width="25%"><div class="ship-kg"><input type="text" class="form-control" name="wm_kg"></div>Kg</td>
                                <td width="25%">RM<div class="ship-rm"><input type="text" class="form-control" name="wm_rm"></div></td>
                                <td rowspan="2" width="20%">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="same-all-region" value="Y" name="same_all_reg"> Same for all region
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>For additional</td>
                                <td><div class="ship-kg"><input type="text" class="form-control" name="add_wm_kg"></div>Kg</td>
                                <td>RM<div class="ship-rm"><input type="text" class="form-control" name="add_wm_rm"></div> added</td>
                            </tr>

                            <tr>
                                <td rowspan="2">Sabah</td>
                                <td>Up to</td>
                                <td><div class="ship-kg"><input type="text" class="form-control" name="sbh_kg"></div>Kg</td>
                                <td>RM<div class="ship-rm"><input type="text" class="form-control" name="sbh_rm"></div></td>
                                <td rowspan="2">
                                </td>
                            </tr>
                            <tr>
                                <td>For additional</td>
                                <td><div class="ship-kg"><input type="text" class="form-control" name="add_sbh_kg"></div>Kg</td>
                                <td>RM<div class="ship-rm"><input type="text" class="form-control" name="add_sbh_rm"></div> added</td>
                            </tr>

                            <tr>
                                <td rowspan="2">Sarawak</td>
                                <td>Up to</td>
                                <td><div class="ship-kg"><input type="text" class="form-control" name="srk_kg"></div>Kg</td>
                                <td>RM<div class="ship-rm"><input type="text" class="form-control" name="srk_rm"></div></td>
                                <td rowspan="2">
                                </td>
                            </tr>
                            <tr>
                                <td>For additional</td>
                                <td><div class="ship-kg"><input type="text" class="form-control" name="add_srk_kg"></div>Kg</td>
                                <td>RM<div class="ship-rm"><input type="text" class="form-control" name="add_srk_rm"></div> added</td>
                            </tr>
                        </table>

                        <ul>
                            <li>Input shipping rate based on weight of the product.</li>
                            <li>Please input conversed weight for shipping rate in case of applying shipping rate by volume.</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{--<div class="form-group">--}}
                {{--<div class="col-md-2 col-md-offset-2">--}}
                    {{--<label class="checkbox-inline">--}}
                        {{--<input type="checkbox" id="selling_period" value="set"> Set Exclusion of Shipping Locations--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="form-group">
                <label class="col-md-2 control-label">After Sale Service </label>
                <div class="col-md-9">
                    <textarea class="form-control" name="after_sale_serv"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Return Policy <span class="req">*</span> </label>
                <div class="col-md-9">
                    <textarea class="form-control" name="return_policy"></textarea>
                </div>
            </div>
            <hr>

            <div class="form-group">
                <div class="col-md-12">
                    <div class="text-center well">
                        <p>Increase your sales by settings promotion or buy advertising features to boost your ads</p>
                        <button type="button" class="btn btn-info" id="promo_set" onclick="togglepromo();">Promotions & Advertising</button>
                    </div>
                </div>
            </div>

            <div id="promo_box" style="display: none">
                <input type="hidden" name="promo_set" id="promo_set" value="">
                <h3>Promotions or Advertisement</h3>
                <div class="form-group">
                    <label class="col-md-2 control-label">Promotional Text</label>
                    <div class="col-md-8">
                        <input type="text" name="promo_text" id="promo_text"  class="form-control">
                    </div>
                    <div class="col-md-1">
                        <p class="form-control-static"><span id="promo_text_count">0</span>/40</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Country of Origin</label>
                    {{--<div class="col-md-6">--}}
                        {{--<label class="radio-inline">--}}
                            {{--<input type="radio" name="coo" id="coo1" value="None"> None--}}
                        {{--</label>--}}
                        {{--<label class="radio-inline">--}}
                            {{--<input type="radio" name="coo" id="coo2" value="Domestic"> Domestic--}}
                        {{--</label>--}}
                        {{--<label class="radio-inline">--}}
                            {{--<input type="radio" name="coo" id="coo3" value="Foreign"> Foreign--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    <div class="col-md-4">
                        <input type="text" name="country_origin" id="promo_text"  class="form-control">
                    </div>
                </div>
                {{--<div class="form-group">--}}
                    {{--<div class="col-md-2 col-md-offset-2">--}}
                        {{--<label class="checkbox-inline">--}}
                            {{--<input type="checkbox" id="coo_region" value="set"> Set Specific Region--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<select class="form-control">--}}
                            {{--<option value="">Select Region</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<input type="text" class="form-control">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-md-2 control-label">Credit Offer </label>--}}
                    {{--<div class="col-md-1">--}}
                        {{--<label class="checkbox-inline">--}}
                            {{--<input type="checkbox" id="set_co" value="set"> Set--}}
                        {{--</label>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-2">--}}
                        {{--<select class="form-control">--}}
                            {{--<option value="RM">RM</option>--}}
                            {{--<option value="%">%</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                        {{--<input type="text" class="form-control">--}}
                    {{--</div>--}}
                    {{--<div class="col-md-2">--}}
                        {{--<p class="form-control-static">Accumulation</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label class="col-md-2 control-label">Multiple Purchase Discount </label>
                    <div class="col-md-1">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="mul_pur_disc_set" value="Y"> Set
                        </label>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">For purchases of</p>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="mul_pur_disc_item" id="mul_pur_disc_item">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">or more</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-3">
                        <select class="form-control" id="mul_pur_disc_sel" name="mul_pur_disc_sel">
                            <option value="RM">RM</option>
                            <option value="%">%</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="mul_pur_disc" name="mul_pur_disc">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">Discount (for per item)</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-3">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="mul_pur_disc_period_set" value="Y"> Set Period
                        </label>
                    </div>
                    <div id="disc_set_period_cont">
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-append date" id="" data-date="" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" id="mul_pur_period_start" name="mul_pur_period_start">
                                </div>
                                <div class="input-group-addon">to</div>
                                <div class="input-append date" id="" data-date="" data-date-format="dd-mm-yyyy">
                                    <input type="text" class="form-control" id="mul_pur_period_end" name="mul_pur_period_end">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Minimum Purchase Qty</label>
                    <div class="col-md-2">
                        <label class="radio-inline">
                            <input type="radio" name="min_pur" id="min_pur1" value="no_limit" checked="checked"> No Limit
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline">
                            <input type="radio" name="min_pur" id="min_pur2" value="minimum"> Minimum
                        </label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" id="min_pur_val">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">Set minimum quantity for one time purchase</p>
                        <div id="min_pur_err" class="alert alert-danger">The value must be more than 2!</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Maximum Purchase Qty</label>
                    <div class="col-md-2">
                        <label class="radio-inline">
                            <input type="radio" name="max_pur" id="max_pur1" value="no_limit" checked="checked"> No Limit
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label class="radio-inline">
                            <input type="radio" name="max_pur" id="max_pur2" value="per_ord"> Per Order
                        </label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" id="max_per_ord">
                    </div>
                    <div class="col-md-4">
                        <p class="form-control-static">Set maximum quantity for one time purchase</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2 col-md-offset-4">
                        <label class="radio-inline">
                            <input type="radio" name="max_pur" id="max_pur3" value="per_pers"> Per Person (ID)
                        </label>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" id="max_per_pers">
                    </div>
                    <div class="col-md-5">
                        <p class="form-control-static">Set maximum quantity for one time purchase. The setting is applied for 30 days upon purchase.</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Listing Ad Setting</label>
                    <div class="col-md-2">
                        <select class="form-control" id="ad_sel">
                            <option value="">Ad Type</option>
                            <option value="top">Top</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <div class="input-append date" id="" data-date="" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" id="ad_start" name="ad_start">
                            </div>
                            <div class="input-group-addon">to</div>
                            <div class="input-append date" id="" data-date="" data-date-format="dd-mm-yyyy">
                                <input type="text" class="form-control" id="ad_end" name="ad_end">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">RM 0</p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary">Product Listing</button>
                </div>
            </div>
        </form>
    </div>


    <!---------------------------------product option modal start------------------------------>
    <div class="modal fade" id="shippingModal" tabindex="-1" role="dialog" aria-labelledby="shippingModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="shippingModalContent">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="shippingModalLabel">Label</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" id="merch_ship_dtl">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                        </tr>
                        </thead>
                        <tbody id="prodlist_body">
                        @foreach($merch_ship as $index=>$ms)
                            <tr id="prodlist_{{ $ms->id }}" class="prod_class">
                                <td>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="setdefault" id="setdefault{{ $index+1 }}" value="Y">
                                            {{ $index+1 }}
                                        </label>
                                    </div>
                                    <input type="hidden" id="ship_id_{{ $index+1 }}" value="{{ $ms->id }}">
                                    <input type="hidden" id="ship_address_{{ $index+1 }}" value="{{ $ms->address }}">
                                    <input type="hidden" id="ship_city_{{ $index+1 }}" value="{{ $ms->city }}">
                                    <input type="hidden" id="ship_postcode_{{ $index+1 }}" value="{{ $ms->postcode }}">
                                    <input type="hidden" id="ship_state_{{ $index+1 }}" value="{{ $ms->state }}">
                                    <input type="hidden" id="ship_def_{{ $index+1 }}" value="{{ $ms->set_default }}">
                                    <input type="hidden" id="ship_title_{{ $index+1 }}" value="{{ $ms->title }}">
                                </td>
                                <td>{{ $ms->title }}
                                    <div id="default_{{ $index+1 }}">
                                        <span>@if($ms->set_default=="Y") (Default) @endif</span>
                                    </div>
                                </td>
                                <td>{{ $ms->name }}</td>
                                <td>
                                    {{ $ms->address }}, <br>
                                    {{ $ms->postcode }}, {{ $ms->city }}, <br>
                                    {{ $ms->state_name }}
                                </td>
                                <td>{{ $ms->phone }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div id="ajaxResponse"></div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" action="" id="shipping_form" >
                                {{ csrf_field() }}
                                <input type="hidden" class="form-control" name="ship_id" id="ship_id">
                                <input type="hidden" class="form-control" name="ship_row" id="ship_row">
                                <div class="form-group " id="ship_title_box">
                                    <label class="control-label col-md-2">Title <span class="req">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="ship_title" id="ship_title">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="ship_default" value="Y" id="ship_default"> Default Address
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-md-offset-2" id="ship_title_error" style="display: none">
                                        <span class="help-block"><strong>Title field is required</strong></span>
                                    </div>
                                </div>

                                <div class="form-group " id="ship_name_box">
                                    <label class="control-label col-md-2">Name <span class="req">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="ship_name" id="ship_name">
                                    </div>
                                    <div class="col-md-10 col-md-offset-2" id="ship_name_error" style="display: none">
                                        <span class="help-block"><strong>Name field is required</strong></span>
                                    </div>
                                </div>

                                <div class="form-group " id="ship_address_box">
                                    <label class="control-label col-md-2">Address <span class="req">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="ship_address" id="ship_address">
                                    </div>
                                    <div class="col-md-10 col-md-offset-2" id="ship_address_error" style="display: none">
                                        <span class="help-block"><strong>Address field is required</strong></span>
                                    </div>
                                </div>

                                <div class="form-group " id="ship_state_box">
                                    <label class="control-label col-md-2">State <span class="req">*</span></label>
                                    <div class="col-md-5">
                                        <select id="ship_state" class="form-control" name="ship_state" id="ship_state" value="" >
                                            <option value="">Select State</option>
                                            @foreach($ship_states as $ship_state)
                                                <option value="{{ $ship_state->id }}" @if(old('ship_state') == $ship_state->id) selected="selected" @endif>{{ $ship_state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-10 col-md-offset-2" id="ship_state_error" style="display: none">
                                        <span class="help-block"><strong>State field is required</strong></span>
                                    </div>
                                </div>

                                <div class="form-group " id="ship_city_box">
                                    <label class="control-label col-md-2">City <span class="req">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="ship_city" id="ship_city">
                                    </div>
                                    <div class="col-md-10 col-md-offset-2" id="ship_city_error" style="display: none">
                                        <span class="help-block"><strong>City field is required</strong></span>
                                    </div>
                                </div>

                                <div class="form-group " id="ship_pcode_box">
                                    <label class="control-label col-md-2">Postcode <span class="req">*</span></label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="ship_pcode" id="ship_pcode">
                                    </div>
                                    <div class="col-md-10 col-md-offset-2" id="ship_pcode_error" style="display: none">
                                        <span class="help-block"><strong>Postcode field is required</strong></span>
                                    </div>
                                </div>

                                <div class="form-group " id="ship_phone_box">
                                    <label class="control-label col-md-2">Phone <span class="req">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="ship_phone" id="ship_phone">
                                    </div>
                                    <div class="col-md-10 col-md-offset-2" id="ship_phone_error" style="display: none">
                                        <span class="help-block"><strong>Phone field is required</strong></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" onclick="addReset();">Add</button>

                    <button type="button" class="btn btn-info" id="">Apply</button>
                    <button type="button" class="btn btn-success" id="saveButton">Save</button>
                    <button type="button" class="btn btn-danger" id="">Delete</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="addReset();">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!---------------------------------product option modal end------------------------------>
@endsection

@section('js_section')
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>

    <script type="text/javascript">
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var selling_period_day = $('#selling_period_day').val();
        var selling_period_start = $('#selling_period_start').val();

        var pieces = selling_period_start.split("-");
        var newDate = new Date(pieces[2],pieces[1]-1,pieces[0],0,0,0,0);

        var a = newDate.getDate();
        var b = selling_period_day;

        var ab = +a + +b;

        newDate.setDate(ab);

        var end_day = ("0" + newDate.getDate()).slice(-2);
        var end_month = ("0" + (newDate.getMonth() + 1)).slice(-2);
        var end_year = newDate.getFullYear();

        $('#selling_period_end').val(end_day+'-'+end_month+'-'+end_year);

        $('#selling_period_day').on('change', function(e){
            if(e.target.value!="direct"){
                $('#selling_period_end').attr("readonly", true);
                $('#selling_period_end').prop("disabled", true);

                var selling_period_start = $('#selling_period_start').val();

                var pieces = selling_period_start.split("-");
                var newDate = new Date(pieces[2],pieces[1]-1,pieces[0],0,0,0,0);

                var a = newDate.getDate();
                var b = e.target.value;

                var ab = +a + +b;

                newDate.setDate(ab);

                var end_day = ("0" + newDate.getDate()).slice(-2);
                var end_month = ("0" + (newDate.getMonth() + 1)).slice(-2);
                var end_year = newDate.getFullYear();

                $('#selling_period_end').val(end_day+'-'+end_month+'-'+end_year);
            }else{
                var selling_period_day = $('#selling_period_day').val();

                if(selling_period_day=="direct"){
                    $('#selling_period_end').attr("readonly", false);
                    $('#selling_period_end').prop("disabled", false);
                }
            }
        });

        var selling_period_start = $('#selling_period_start').datepicker({
            format: 'dd-mm-yyyy',
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
               var selling_period_day = $('#selling_period_day').val();

                var newDate = new Date(ev.date);
                var a = newDate.getDate();
                var b = selling_period_day;

                if(selling_period_day!="direct"){
                    var ab = +a + +b;

                    newDate.setDate(ab);

                    var start_day = ("0" + newDate.getDate()).slice(-2);
                    var start_month = ("0" + (newDate.getMonth() + 1)).slice(-2);
                    var start_year = newDate.getFullYear();
                    selling_period_start.hide();
                    $('#selling_period_end').val(start_day+'-'+start_month+'-'+start_year);
                }else{
                    alert(newDate);
                    newDate.setDate(newDate.getDate() + 1);
                    alert(newDate);
                    selling_period_end.setValue(newDate);
                    selling_period_start.hide();
                    $('#selling_period_end')[0].focus();
                }

        }).data('datepicker');

        var selling_period_end = $('#selling_period_end').datepicker({
            format: 'dd-mm-yyyy',
            onRender: function(date) {
                return date.valueOf() <= selling_period_start.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            selling_period_end.hide();
        }).data('datepicker');


    </script>

    <script>
        $(document).ready(function() {
            /*******************************Discount by seller start*********************************/

            /**-----------------------------set checkbox-------------------------------**/
            if ($('#discount_set').prop('checked') == false) {
                $('#discount_period_set').prop("disabled", true);
            }

            $("#discount_set").change(function() {
                if (this.checked) {
                    $('#discount_period_set').prop("disabled", false);
                }else{
                    $('#discount_period_set').prop("disabled", true);
                    $('#discount_period_set').attr('checked', false);

                    $('#discount_period_start').prop("disabled", true);
                    $('#discount_period_start').val("");
                    $('#discount_period_end').prop("disabled", true);
                    $('#discount_period_end').val("");
                }
            });

            /**-----------------------------set period checkbox-------------------------------**/
            if ($('#discount_period_set').prop('checked') == false) {
                $('#discount_period_start').prop("disabled", true);
                $('#discount_period_end').prop("disabled", true);
            }

            $("#discount_period_set").change(function() {
                if(this.checked) {
                    //Do stuff
                    $('#discount_period_start').prop("disabled", false);
                    $('#discount_period_end').prop("disabled", false);

                    var nowTemp = new Date();
                    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

                    var discount_period_start = $('#discount_period_start').datepicker({
                        format: 'dd-mm-yyyy',
                        onRender: function(date) {
                            return date.valueOf() < now.valueOf() ? 'disabled' : '';
                        }
                    }).on('changeDate', function(ev) {
                        if (ev.date.valueOf() > discount_period_end.date.valueOf()) {
                            var newDate = new Date(ev.date)
                            newDate.setDate(newDate.getDate() + 1);
                            discount_period_end.setValue(newDate);
                        }
                        discount_period_start.hide();
                        $('#discount_period_end')[0].focus();
                    }).data('datepicker');

                    var discount_period_end = $('#discount_period_end').datepicker({
                        format: 'dd-mm-yyyy',
                        onRender: function(date) {
                            return date.valueOf() <= discount_period_start.date.valueOf() ? 'disabled' : '';
                        }
                    }).on('changeDate', function(ev) {
                        discount_period_end.hide();
                    }).data('datepicker');
                }else{
                    $('#discount_period_start').prop("disabled", true);
                    $('#discount_period_start').val("");
                    $('#discount_period_end').prop("disabled", true);
                    $('#discount_period_end').val("");
                }
            });
            /*******************************Discount by seller end*********************************/

            /*******************************Multiple purchase discount start*********************************/

            /**-----------------------------set checkbox-------------------------------**/
            if ($('#mul_pur_disc_set').prop('checked') == false) {
                $('#mul_pur_disc_period_set').prop("disabled", true);
                $('#mul_pur_disc_item').prop("disabled", true);
                $('#mul_pur_disc_sel').prop("disabled", true);
                $('#mul_pur_disc').prop("disabled", true);
            }

            $("#mul_pur_disc_set").change(function() {
                if (this.checked) {
                    $('#mul_pur_disc_period_set').prop("disabled", false);
                    $('#mul_pur_disc_item').prop("disabled", false);
                    $('#mul_pur_disc_sel').prop("disabled", false);
                    $('#mul_pur_disc').prop("disabled", false);
                }else{
                    $('#mul_pur_disc_item').prop("disabled", true);
                    $('#mul_pur_disc_sel').prop("disabled", true);
                    $('#mul_pur_disc').prop("disabled", true);

                    $('#mul_pur_disc_period_set').prop("disabled", true);
                    $('#mul_pur_disc_period_set').attr('checked', false);

                    $('#mul_pur_period_start').prop("disabled", true);
                    $('#mul_pur_period_start').val("");
                    $('#mul_pur_period_end').prop("disabled", true);
                    $('#mul_pur_period_end').val("");
                }
            });


            /**-----------------------------set period checkbox-------------------------------**/
            if ($('#mul_pur_disc_period_set').prop('checked') == false) {
                $('#mul_pur_period_start').prop("disabled", true);
                $('#mul_pur_period_end').prop("disabled", true);
            }

            $("#mul_pur_disc_period_set").change(function() {
                if(this.checked) {
                    //Do stuff
                    $('#mul_pur_period_start').prop("disabled", false);
                    $('#mul_pur_period_end').prop("disabled", false);

                    var nowTemp = new Date();
                    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

                    var mul_pur_period_start = $('#mul_pur_period_start').datepicker({
                        format: 'dd-mm-yyyy',
                        onRender: function(date) {
                            return date.valueOf() < now.valueOf() ? 'disabled' : '';
                        }
                    }).on('changeDate', function(ev) {
                        if (ev.date.valueOf() > mul_pur_period_end.date.valueOf()) {
                            var newDate = new Date(ev.date)
                            newDate.setDate(newDate.getDate() + 1);
                            mul_pur_period_end.setValue(newDate);
                        }
                        mul_pur_period_start.hide();
                        $('#mul_pur_period_end')[0].focus();
                    }).data('datepicker');

                    var mul_pur_period_end = $('#mul_pur_period_end').datepicker({
                        format: 'dd-mm-yyyy',
                        onRender: function(date) {
                            return date.valueOf() <= mul_pur_period_start.date.valueOf() ? 'disabled' : '';
                        }
                    }).on('changeDate', function(ev) {
                        mul_pur_period_end.hide();
                    }).data('datepicker');
                }else{
                    $('#mul_pur_period_start').prop("disabled", true);
                    $('#mul_pur_period_start').val("");
                    $('#mul_pur_period_end').prop("disabled", true);
                    $('#mul_pur_period_end').val("");
                }
            });
            /*******************************Multiple purchase discount end*********************************/

            /*******************************Minimum Purchase start*********************************/
            $('#min_pur_err').css("display","none");

            if ($('#min_pur1').prop('checked') == true) {
                $('#min_pur_val').prop("disabled", true);
                $('#min_pur_val').val("");
                $('#min_pur_err').css("display","none");
            }

            $('#min_pur1').click(function(){
                $('#min_pur_val').prop("disabled", true);
                $('#min_pur_val').val("");
                $('#min_pur_err').css("display","none");
            });

            $('#min_pur2').click(function(){
                $('#min_pur_val').prop("disabled", false);
            });

            $('#min_pur_val').keyup(morethantwo);
//            $('#min_pur_val').keydown(morethantwo);

            function morethantwo(e){
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                        // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                        (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }

                var theval = $(this).val();

                if(theval<2){
                    $('#min_pur_err').css("display","block");
                }else{
                    $('#min_pur_err').css("display","none");
                }

            }
            /*******************************Minimum Purchase end*********************************/

            /*******************************Maximum Purchase start*********************************/
            if ($('#max_pur1').prop('checked') == true) {
                $('#max_per_ord').prop("disabled", true);
                $('#max_per_ord').val("");
                $('#max_per_pers').prop("disabled", true);
                $('#max_per_pers').val("");
            }

            $('#max_pur1').click(function(){
                $('#max_per_ord').prop("disabled", true);
                $('#max_per_ord').val("");
                $('#max_per_pers').prop("disabled", true);
                $('#max_per_pers').val("");
            });

            $('#max_pur2').click(function(){
                $('#max_per_ord').prop("disabled", false);
                $('#max_per_pers').prop("disabled", true);
                $('#max_per_pers').val("");
            });

            $('#max_pur3').click(function(){
                $('#max_per_pers').prop("disabled", false);
                $('#max_per_ord').prop("disabled", true);
                $('#max_per_ord').val("");
            });
            /*******************************Maximum Purchase end*********************************/

            /*******************************Ad Listing start*********************************/
            var ad_sel = $('#ad_sel').val();

            if(ad_sel==""){
                $('#ad_start').prop("disabled", true);
                $('#ad_end').prop("disabled", true);
            }

            $('#ad_sel').on('change', function(e){
                if(e.target.value!=""){
                    $('#ad_start').prop("disabled", false);
                    $('#ad_end').prop("disabled", false);
                }else{
                    $('#ad_start').prop("disabled", true);
                    $('#ad_start').val("");
                    $('#ad_end').prop("disabled", true);
                    $('#ad_end').val("");
                }
            });

            var nowTemp = new Date();
            var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

            var ad_start = $('#ad_start').datepicker({
                format: 'dd-mm-yyyy',
                onRender: function(date) {
                    return date.valueOf() < now.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > ad_end.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    ad_end.setValue(newDate);
                }
                ad_start.hide();
                $('#ad_end')[0].focus();
            }).data('datepicker');

            var ad_end = $('#ad_end').datepicker({
                format: 'dd-mm-yyyy',
                onRender: function(date) {
                    return date.valueOf() <= ad_start.date.valueOf() ? 'disabled' : '';
                }
            }).on('changeDate', function(ev) {
                ad_end.hide();
            }).data('datepicker');
            /*******************************Ad Listing end*********************************/
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#shipping-method-cont').hide();

            $('#ship_rate1').click(function(){
                $('#shipping-method-cont').hide();
            });

            $('#ship_rate2').click(function(){
                $('#shipping-method-cont').hide();
            });

            $('#ship_rate3').click(function(){
                 if ($(this).is(':checked')){
                     $('#shipping-method-cont').show();
                 }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#sub_category').hide();

            $('#prod_name').keyup(updateCount);
            $('#prod_name').keydown(updateCount);

            function updateCount() {
                var cs = $(this).val().length;
                $('#prod_name_count').text(cs);
            }

            $('#prod_code').keyup(updateCount1);
            $('#prod_code').keydown(updateCount1);

            function updateCount1() {
                var cs = $(this).val().length;
                $('#prod_code_count').text(cs);
            }

            $('#promo_text').keyup(updateCount2);
            $('#promo_text').keydown(updateCount2);

            function updateCount2() {
                var cs = $(this).val().length;
                $('#promo_text_count').text(cs);
            }
//            $('#editor').wysiwyg();
        });

        $("#selling_period_set").change(function() {
            if(this.checked) {
                //Do stuff
                $("#selling_period_cont").show();
            }else{
                $("#selling_period_cont").hide();
            }
        });

        /**
         * This is for sub cat dropdown
         * **/

        $('#main_category').on('change', function(e){

            $.ucfirst = function(str) {

                var text = str;


                var parts = text.split(' '),
                        len = parts.length,
                        i, words = [];
                for (i = 0; i < len; i++) {
                    var part = parts[i];
                    var first = part[0].toUpperCase();
                    var rest = part.substring(1, part.length);
                    var word = first + rest;
                    words.push(word);

                }
                return words.join(' ');
            };

            var main_category = e.target.value;
            //ajax
            $.get('../api/category-dropdown/' + main_category, function(data){
                //success data
                $('#sub_category').empty();

                $('#sub_category').append('<option value="">Select Sub Category</option>');

                if(data==''){
                    $('#sub_category').hide();
                }else{
                    $('#sub_category').show();
                }

                $.each(data, function(index, subcatObj){
                    var id = subcatObj.id;
                    var name = subcatObj.name;

                    $('#sub_category').append('<option value="'+ id +'">'
                            + $.ucfirst(name) + '</option>');
                });
            });


            $.get('../api/brand-dropdown/' + main_category, function(data){
                //success data
                $('#brand_sel').empty();

                $('#brand_sel').append('<option value="">Select Brand</option>');

                if(data==''){
                    $('#brand_box').hide();
                }else{
                    $('#brand_box').show();
                }

                $.each(data, function(index, brandObj){
                    var id = brandObj.id;
                    var name = brandObj.name;

                    $('#brand_sel').append('<option value="'+ id +'">'
                            + $.ucfirst(name) + '</option>');
                });
            });
        });

        $('#sub_category').on('change', function(e){

            $.ucfirst = function(str) {

                var text = str;


                var parts = text.split(' '),
                        len = parts.length,
                        i, words = [];
                for (i = 0; i < len; i++) {
                    var part = parts[i];
                    var first = part[0].toUpperCase();
                    var rest = part.substring(1, part.length);
                    var word = first + rest;
                    words.push(word);

                }
                return words.join(' ');
            };

            var sub_category = e.target.value;

            if(sub_category==""){
                sub_category = $('#main_category').val();
            }

            $.get('../api/brand-dropdown/' + sub_category, function(data){
                //success data
                $('#brand_sel').empty();

                $('#brand_sel').append('<option value="">Select Brand</option>');

                if(data==''){
                    $('#brand_box').hide();
                }else{
                    $('#brand_box').show();
                }

                $.each(data, function(index, brandObj){
                    var id = brandObj.id;
                    var name = brandObj.name;

                    $('#brand_sel').append('<option value="'+ id +'">'
                            + $.ucfirst(name) + '</option>');
                });
            });
        });

        function togglepromo(){
            var div = document.getElementById('promo_box');
            if (div.style.display !== 'none') {
                div.style.display = 'none';
                $('#promo_set').val("N");
            }
            else {
                div.style.display = 'block';
                $('#promo_set').val("Y");
            }
        }

        /**-----------------------------Part for Product options-------------------------------**/

        function deleteUnwantedRow(){
            var myTable = document.getElementById("prod_opt_table_id");
            var currentIndex = myTable.rows.length;
            var curr_index = currentIndex-1;

            if(curr_index>2){
                for(var j=(curr_index-1); j>=2; j--){
                    var currentRow = myTable.deleteRow(j-1);
                }
            }
        }

        //product option selection
        $('#prod_opt_sel').on('change', function(e){
            var opt_sel_val = e.target.value;

            if(opt_sel_val=='grp'){
                $('#prod_opt_table_id').hide();
                $('#prod_opt_grp_sel').show();
                $('#grouplistid').show();
                $('#actioncolid').show();
                $('#manuallistid').hide();

                deleteUnwantedRow();

                $('#delete_field_btn').addClass(' disabled');
                $('#add_field_btn').removeClass(' disabled');
            }
            else if(opt_sel_val=='indv'){
                $('#prod_opt_table_id').show();
                $('#prod_opt_grp_sel').val("");
                $('#prod_opt_grp_sel').hide();
                $('#grouplistid').hide();
                $('#actioncolid').hide();
                $('#manuallistid').show();

                deleteUnwantedRow();
            }
            else{
                $('#prod_opt_table_id').hide();
                $('#prod_opt_grp_sel').val("");
                $('#prod_opt_grp_sel').hide();
                $('#grouplistid').hide();
                $('#actioncolid').hide();
                $('#manuallistid').hide();

                deleteUnwantedRow();
            }
        });

        //product option group selection
        $('#prod_opt_grp_sel').on('change', function(e){
            var opt_grp_val = e.target.value;

            if(opt_grp_val!=""){
                $('#prod_opt_table_id').show();
                $('#grouplistid').show();
                $('#actioncolid').show();

                $.get('../api/prod-opt-grp-table/' + opt_grp_val, function(data){
                    //success data
                    var myTable = document.getElementById("prod_opt_table_id");
                    var currentIndex = myTable.rows.length;

                    if(data==''){
                        $('#grouplistid').hide();
                        $('#actioncolid').hide();

                        deleteUnwantedRow();

                        var currentRow = myTable.insertRow(1);
                        var prod_opt = currentRow.insertCell(0);
                        prod_opt.innerHTML = "No records!";
                        prod_opt.colSpan  = 4;
                        prod_opt.setAttribute( "class", "warning text-center" );
                    }else{
                        deleteUnwantedRow();

                        var len = data.length;

                        $.each(data, function(index, brandObj){
                            var all_val = Object.values(data[index]);

                            var prod_opt_id = all_val[0];
                            var prod_opt_val = all_val[1];

                            //insert into table
                            var currentRow = myTable.insertRow(1);

                            var prod_opt = currentRow.insertCell(0);
                            prod_opt.innerHTML = prod_opt_val;

                            var infoBox = document.createElement("input");
                            infoBox.setAttribute("name", "opt" + (index));
                            infoBox.setAttribute("id", "opt" + (index));
                            infoBox.setAttribute("class", "form-control");

                            var hiddenIdBox = document.createElement("input");
                            hiddenIdBox.setAttribute("name", "opt" + (index));
                            hiddenIdBox.setAttribute("id", "opt" + (index));
                            hiddenIdBox.setAttribute("class", "form-control");
                            hiddenIdBox.setAttribute("type", "hidden");

                            var info = currentRow.insertCell(1);
                            info.appendChild(infoBox);
                            info.appendChild(hiddenIdBox);

                            var act_btn = currentRow.insertCell(2);
                            act_btn.innerHTML = "";
                        });
                    }
                });
            }else{
                $('#prod_opt_table_id').hide();
                $('#grouplistid').hide();
                $('#actioncolid').hide();
            }
        });

        $('#add_field_btn').click(function(e) {
            e.preventDefault();
            //do other stuff when a click happens
        });

        $('#delete_field_btn').click(function(e) {
            e.preventDefault();
            //do other stuff when a click happens
        });

        /**-----------------------------add into list button-------------------------------**/
        function addField (argument) {
            var myTable = document.getElementById("prod_opt_table_id");
            var currentIndex = myTable.rows.length;

            var curr_index = currentIndex-1;

            var chosen_item = false;

            var nameBox = document.createElement("select");
            nameBox.setAttribute("name", "opt" + (curr_index-1));
            nameBox.setAttribute("id", "opt" + (curr_index-1));
            nameBox.setAttribute("class", "form-control");

            var infoBox = document.createElement("input");
            infoBox.setAttribute("name", "info" + (curr_index-1));
            infoBox.setAttribute("id", "info" + (curr_index-1));
            infoBox.setAttribute("class", "form-control");

            var sel_val = document.getElementById("opt" + (currentIndex-2));
            if(sel_val!=null){
            //                alert(sel_val.value);
            }

            if(curr_index==2){
                var currentRow = myTable.insertRow(1);
            }else{
                var currentRow = myTable.insertRow(curr_index-1);
            }

            var name = currentRow.insertCell(0);
            name.appendChild(nameBox);

            var info = currentRow.insertCell(1);
            info.appendChild(infoBox);

            var arr = <?php if(isset($dropdown)) echo json_encode($dropdown); ?>;
            var len = (arr.length)-1;

            var arrj = [];

            for(var i=0; i<=len; i++){
                var option = document.createElement("option");

                $.each(arr[i], function(key, value){
                    option.value = key;
                    option.text = value;
                });

                nameBox.add(option);
            }

            var sel_length = arr.length;

            if((curr_index-1) >= (sel_length)){
                $('#add_field_btn').addClass(' disabled');
            }

            $('#delete_field_btn').removeClass(' disabled');
        }

        /**-----------------------------delete from list button-------------------------------**/
        function deleteField() {
            var myTable = document.getElementById("prod_opt_table_id");
            var currentIndex = myTable.rows.length;
            var curr_index = currentIndex-1;

            if(curr_index==2){
                $('#delete_field_btn').addClass(' disabled');
            }
            else if(curr_index>=2){
                var currentRow = myTable.deleteRow(curr_index-2);
                if(curr_index==3){
                    $('#delete_field_btn').addClass(' disabled');
                }


            }

            $('#add_field_btn').removeClass(' disabled');
        }

        /**-----------------------------Edit Shipping-------------------------------**/

        /**-----------------------------add new item to table-------------------------------**/
        $('#shippingModal').on('shown.bs.modal', function () {
            $("#saveButton").click(function (e) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var def = "N";

                if($('#ship_default').is(':checked')){
                    def="Y";
                }

                var ship_id = $('#ship_id').val();

                var formData = {
                    'ship_id': ship_id,
                    'ship_title': $('#ship_title').val(),
                    'ship_name': $('#ship_name').val(),
                    'ship_address': $('#ship_address').val(),
                    'ship_state': $('#ship_state').val(),
                    'full_state': $('#ship_state  option:selected').text(),
                    'ship_city': $('#ship_city').val(),
                    'ship_pcode': $('#ship_pcode').val(),
                    'ship_phone': $('#ship_phone').val(),
                    'ship_default': def
                };

                $.ajax({
                    type: "POST",
                    url: '/api/new_shipping',
                    data: formData,
                    dataType: 'json',
                    success: function( data ) {
                        $("#ajaxResponse").empty().append('<div class="alert alert-success">'+data.message+'</div>');

                        var currentIndex = $('#ship_row').val();

                        var product = '<tr id="prodlist_' + data.id + '"' +
                                ' class="prod_class"' +
                                ' onclick="viewDetailsShipping(\''+
                                data.id + '\', \'' + data.title + '\', \'' + data.name + '\', \'' + data.address + '\', \'' +
                                data.city + '\', \'' + data.pcode + '\', \'' + data.state + '\', \'' + data.phone + '\', \'' +
                                data.def + '\', \'' + currentIndex +'\')">';
                        product += '<td><div class="radio">' +
                                '<label><input type="radio" name="setdefault" id="setdefault'+currentIndex+'" value="Y">' +
                                currentIndex + '</label></div>' +
                                '<input type="hidden" id="ship_id_'+ currentIndex +'" value="' + data.id + '">' +
                                '<input type="hidden" id="ship_address_'+ currentIndex +'" value="' + data.address + '">' +
                                '<input type="hidden" id="ship_city_' + currentIndex + '" value="' + data.city + '">' +
                                '<input type="hidden" id="ship_postcode_' + currentIndex + '" value="' + data.pcode + '">' +
                                '<input type="hidden" id="ship_state_' + currentIndex + '" value="' + data.state + '">' +
                                '<input type="hidden" id="ship_def_' + currentIndex + '" value="' + data.def + '">' +
                                '</td>';
                        product += '<td>' + data.title +
                                '<div id="default_'+currentIndex+'"><span></span></div>' +
                                '</td><td>' + data.name + '</td>';
                        product += '<td>' + data.address + ', <br>' +
                                data.pcode + ', ' + data.city + ', <br>' +
                                data.full_state + '</td><td>' + data.phone + '</td>';
                        product += '</tr>';

                        if(ship_id==""){
                            $('#prodlist_body').append(product);
                        }else{
                            $("#prodlist_" + data.id).replaceWith( product );
                        }

                        $('#setdefault'+currentIndex).prop('checked', true);

                        if(data.def=="Y"){
                            var myTable = document.getElementById("merch_ship_dtl");
                            var count = myTable.rows.length;

                            for(var i=1; i<count; i++){
                                if(currentIndex!=i){
                                    $('#ship_def_'+i).val("N");
                                    $('#default_'+i).text("");
                                }else{
                                    $('div#default_'+i).append('<span>(Default)</span>');
                                }
                            }
                        }

                        return true;
                    },
                    fail: function(){
                        alert('fail');
                    }
                });
            });
        });

        function shippingMerchant(){
            $("#shippingModalLabel").text('Ship-From Address');
//            $('#shipping_form').attr('action', '/api/new_shipping');
//
//            $("#opt_grp_name").val('');
//            $("#opt_grp_status").val('A');
//            $("#submiGrptBtn").text('Submit');
//
//            $("#grp_name_group").removeClass('has-error');
//            $("#grp_name_group_error").hide();
        }

        function addReset(){
            $('#shipping_form')[0].reset();
            $('#ship_id').val("");
            $('#ship_title').attr("disabled", false);
        }

        //onclick table row
        $('#merch_ship_dtl tbody tr').click(function() {
            var row_num = ($(this).index()+1);
            var id_cell = this.cells[0];
            var title_cell = this.cells[1];
            var name_cell = this.cells[2];

            var phone_cell = this.cells[4];

            var title = title_cell.innerHTML;
            var name = name_cell.innerHTML;
            var phone = phone_cell.innerHTML;

            var id = $('#ship_id_'+row_num).val();
            var address = $('#ship_address_'+row_num).val();
            var city = $('#ship_city_'+row_num).val();
            var pcode = $('#ship_postcode_'+row_num).val();
            var state = $('#ship_state_'+row_num).val();
            var def = $('#ship_def_'+row_num).val();
            var title_in = $('#ship_title_'+row_num).val();

            viewDetailsShipping(id, title_in, name, address, city, pcode, state, phone, def, row_num);
        });

        function viewDetailsShipping(id, title, name, address, city, pcode, state, phone, def, row_num){
            $('#setdefault'+row_num).prop('checked', true);
            $('#ship_id').val(id);

            $('#ship_title').val(title);
            if(title=='Default'){
                $('#ship_title').attr("disabled", true);
            }else{
                $('#ship_title').attr("disabled", false);
            }

            $('#ship_name').val(name);
            $('#ship_address').val(address);
            $('#ship_state').val(state);
            $('#ship_city').val(city);
            $('#ship_pcode').val(pcode);
            $('#ship_phone').val(phone);
            $('#ship_row').val(row_num);

            if(def=='Y'){
                $('#ship_default').prop('checked', true);
            }else{
                $('#ship_default').prop('checked', false);
            }
        }

        // initialize with defaults
//        $("#input-id").fileinput();

        // with plugin options
//        $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
    </script>

    {{--file upload start--}}
    <!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
     This must be loaded before fileinput.min.js -->
    <script src="{{ asset('js/plugins/canvas-to-blob.min.js') }}" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
         This must be loaded before fileinput.min.js -->
    <script src="{{ asset('js/plugins/sortable.min.js') }}" type="text/javascript"></script>
    <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
         This must be loaded before fileinput.min.js -->
    <script src="{{ asset('js/plugins/purify.min.js') }}" type="text/javascript"></script>
    <!-- the main fileinput plugin file -->
    <script src="{{ asset('js/fileinput.min.js') }}"></script>
    <!-- bootstrap.js below is needed if you wish to zoom and view file content
         in a larger detailed modal dialog -->
    {{--file upload end--}}

    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="{{ asset('js/cors/jquery.xdr-transport.js') }}"></script>
    <![endif]-->
@endsection