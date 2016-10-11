@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/jquery.fileupload.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/jquery.fileupload-ui.css')}}" rel="stylesheet" type="text/css">

    <noscript><link href="{{asset('css/jquery.fileupload-noscript.css')}}" rel="stylesheet" type="text/css"></noscript>
    <noscript><link href="{{asset('css/jquery.fileupload-ui-noscript.css')}}" rel="stylesheet" type="text/css"></noscript>

    <script src='{{ asset("js/tinymce/tinymce.min.js") }}'></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
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
        <form class="form-horizontal" enctype="multipart/form-data" id="fileupload">
            <div class="form-group">
                <label class="col-md-2 control-label">Sales Type <span class="req">*</span> </label>
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
                <label class="col-md-2 control-label">Category <span class="req">*</span> </label>
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
                <div class="col-md-10">
                    <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                    <div class="row fileupload-buttonbar">
                        <div class="col-lg-7">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                                <span class="btn btn-success fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Add files...</span>
                                    <input type="file" name="files[]" multiple>
                                </span>
                            <button type="submit" class="btn btn-primary start">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>Start upload</span>
                            </button>
                            <button type="reset" class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Cancel upload</span>
                            </button>
                            <button type="button" class="btn btn-danger delete">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </button>
                            <input type="checkbox" class="toggle">
                            <!-- The global file processing state -->
                            <span class="fileupload-process"></span>
                        </div>
                        <!-- The global progress state -->
                        <div class="col-lg-5 fileupload-progress fade">
                            <!-- The global progress bar -->
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                            </div>
                            <!-- The extended global progress state -->
                            <div class="progress-extended">&nbsp;</div>
                        </div>
                    </div>
                    <!-- The table listing the files available for upload/download -->
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Detailed Description <span class="req">*</span> </label>
                <div class="col-md-9">
                    <textarea id="mytextarea"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Sales Type <span class="req">*</span> </label>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="gst_app" id="gst_app1" value="Standard"> Standard Rate
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gst_app" id="gst_app2" value="Exempted"> Exempted Rate
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gst_app" id="gst_app3" value="Zero"> Zero Rate
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gst_app" id="gst_app4" value="Flat"> Flat Rate
                    </label>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="col-md-2 control-label">Selling Period</label>
                <div class="col-md-1">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="selling_period" value="set"> Set
                    </label>
                </div>
                <div class="col-md-2">
                    <select class="form-control">
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
                <div class="col-md-2">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-1 text-center">
                    ~
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Selling Price <span class="req">*</span> </label>
                <label class="col-md-1 control-label"><span class="req">RM</span> </label>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Discount by Seller </label>
                <div class="col-md-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="selling_period" value="set"> Set
                    </label>
                </div>
                <div class="col-md-2">
                    <select class="form-control">
                        <option value="RM">RM</option>
                        <option value="%">%</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 col-md-offset-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="selling_period" value="set"> Set Period
                    </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-1 text-center">
                    ~
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Weight <span class="req">*</span> </label>
                <div class="col-md-2">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                    <p class="form-control-static">Kg</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Stock Quantity <span class="req">*</span> </label>
                <div class="col-md-2">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                    <p class="form-control-static">Units</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Product Option </label>
                <div class="col-md-2">
                    <input type="text" class="form-control">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="col-md-2 control-label">List of Shipping Template </label>
                <div class="col-md-8">
                    <select class="form-control">
                        <option value="">Select shipping template</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Address <span class="req">*</span> </label>
                <div class="col-md-2">
                    <p class="form-control-static">Ship-From Address</p>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info">Edit</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 col-md-offset-2">
                    <p class="form-control-static">Return/Exchange Address</p>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-info">Edit</button>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Shipping Method <span class="req">*</span> </label>
                <div class="col-md-4">
                    <select class="form-control">
                        <option value="">Courier Service</option>
                        <option value="">Direct Shipping</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Shipping rate <span class="req">*</span> </label>
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="ship_rate" id="ship_rate1" value="Free"> Free
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ship_rate" id="ship_rate2" value="Bundle"> Bundle Shipping Rate
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ship_rate" id="ship_rate3" value="ByProd"> Shipping Rate by Product
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2 col-md-offset-2">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="selling_period" value="set"> Set Exclusion of Shipping Locations
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">After Sale Service </label>
                <div class="col-md-9">
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Return Policy <span class="req">*</span> </label>
                <div class="col-md-9">
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <hr>
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
                <div class="col-md-6">
                    <label class="radio-inline">
                        <input type="radio" name="coo" id="coo1" value="None"> None
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="coo" id="coo2" value="Domestic"> Domestic
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="coo" id="coo3" value="Foreign"> Foreign
                    </label>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js_section')
    <script>
        $(document).ready(function() {
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

            $('#promo_text').keyup(updateCount1);
            $('#promo_text').keydown(updateCount1);

            function updateCount2() {
                var cs = $(this).val().length;
                $('#promo_text_count').text(cs);
            }

            $('#editor').wysiwyg();
        });
    </script>

    <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="btn btn-primary start" disabled>
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                {% } %}
                {% if (!i) { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                    {% } else { %}
                        <span>{%=file.name%}</span>
                    {% } %}
                </p>
                {% if (file.error) { %}
                    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                    <input type="checkbox" name="delete" value="1" class="toggle">
                {% } else { %}
                    <button class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>

    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="{{ asset('js/vendor/jquery.ui.widget.js') }}"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>

    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="{{ asset('js/jquery.iframe-transport.js') }}"></script>
    <!-- The basic File Upload plugin -->
    <script src="{{ asset('js/jquery.fileupload.js') }}"></script>
    <!-- The File Upload processing plugin -->
    <script src="{{ asset('js/jquery.fileupload-process.js') }}"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="{{ asset('js/jquery.fileupload-image.js') }}"></script>

    <!-- The File Upload validation plugin -->
    <script src="{{ asset('js/jquery.fileupload-validate.js') }}"></script>
    <!-- The File Upload user interface plugin -->
    <script src="{{ asset('js/jquery.fileupload-ui.js') }}"></script>

    <!-- The main application script -->
    <script src="{{ asset('js/main1.js') }}"></script>
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
    <!--[if (gte IE 8)&(lt IE 10)]>
    <script src="{{ asset('js/cors/jquery.xdr-transport.js') }}"></script>
    <![endif]-->
@endsection