@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('pageheading')
    Product Option Management <small>Manage your product option</small>
@endsection

@section('breadcrumb')
    <i class="fa fa-cube" aria-hidden="true"></i> Product Management / <i class="fa fa-list-alt" aria-hidden="true"></i> Product Option Management
@endsection

@section('content')
    <div class="col-md-12">
        <!-- Nav tabs -->

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" @if(session('active_tabs')=='opt_grp' || session('active_tabs')=='') class="active" @endif><a href="#opt_grp" aria-controls="opt_grp" role="tab" data-toggle="tab">Product Option Group</a></li>
            <li role="presentation" @if(session('active_tabs')=='opt') class="active" @endif><a href="#opt" aria-controls="opt" role="tab" data-toggle="tab">Product Options</a></li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade @if(session('active_tabs')=='opt_grp' || session('active_tabs')=='') in active @endif" id="opt_grp">
                <br>
                <div class="col-md-12">
                    @include('back.prod_opt_grp')
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade @if(session('active_tabs')=='opt') in active @endif" id="opt">
                <br>
                <div class="col-md-12">
                    @include('back.prod_opt')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_section')
    <!---------------------------------javascript part for product option start------------------------------>
    <script>
        $('#addProdOpt').on('shown.bs.modal', function () {
            $('#opt_name').focus();

            $("#submitBtn").click(function(e){
                $("#new_prod_opt").submit();
            });
        })

        function editProduct(a, b, c, d){
            $("#addProdOptLabel").text('Edit New Product Option');

            $("#opt_id").val(a);
            $("#opt_name").val(b);
            $("#opt_slug").val(c);
            $("#opt_status").val(d);

            $('#new_prod_opt').attr('action', '/backend/edit_prod_opt');
            $("#submitBtn").text('Update');

            $("#name_group").removeClass('has-error');
            $("#slug_group").removeClass('has-error');
            $("#name_group_error").hide();
            $("#slug_group_error").hide();
            $("#slug_group_error_char").hide();
        }

        function addProduct(){
            $("#addProdOptLabel").text('Add New Product Option');

            $("#opt_id").val('');
            $("#opt_name").val('');
            $("#opt_slug").val('');
            $("#opt_status").val('A');

            $('#new_prod_opt').attr('action', '/backend/new_prod_opt');
            $("#submitBtn").text('Submit');

            $("#name_group").removeClass('has-error');
            $("#slug_group").removeClass('has-error');
            $("#name_group_error").hide();
            $("#slug_group_error").hide();
            $("#slug_group_error_char").hide();
        }

        function validateForm() {
            var x = $("#opt_name").val();
            var y = $("#opt_slug").val();

            if (x == "" && y == "") {
                $("#name_group").addClass('has-error');
                $('#opt_name').focus();
                $("#name_group_error").show();

                $("#slug_group").addClass('has-error');
                $("#slug_group_error").show();
                return false;
            }

            if (x == "") {
                $("#name_group").addClass('has-error');
                $('#opt_name').focus();
                $("#name_group_error").show();
                return false;
            }

            if (y == "") {
                $("#slug_group").addClass('has-error');
                $('#opt_slug').focus();
                $("#slug_group_error").show();
                return false;
            }

            var charReg = /^[a-z0-9_&-]+$/;

            if(charReg.test(y) == false) {
                $("#slug_group").addClass('has-error');
                $("#slug_group_error_char").show();
                return false;
            }
        }

        $(document).ready(function () {
            var charReg = /^[a-z0-9_&-]+$/;
            $('.keyup-char').keyup(function () {
                $('span.error-keyup-1').hide();
                var inputVal = $(this).val();

                if (!charReg.test(inputVal)) {
                    $("#slug_group").addClass('has-error');
                    $("#slug_group_error_char").show();
                    return false;
                } else {
                    $("#slug_group").removeClass('has-error');
                    $("#slug_group_error_char").hide();
                }

            });
        });
    </script>
    <!---------------------------------javascript part for product option end------------------------------>

    <!---------------------------------javascript part for product option group start------------------------------>
    <script>
        $('#addProdOptGrp').on('shown.bs.modal', function () {
            $('#opt_grp_name').focus();

            $("#submiGrptBtn").click(function(e){
                $("#new_prod_grp_opt").submit();
            });
        })

        function addProductGroup(){
            $("#addProdOptGrpLabel").text('Add New Product Option Group');

            $("#opt_grp_id").val('');
            $("#opt_grp_name").val('');
            $("#opt_grp_status").val('A');

            $('#new_prod_grp_opt').attr('action', '/backend/new_prod_opt_grp');
            $("#submiGrptBtn").text('Submit');

            $("#grp_name_group").removeClass('has-error');
            $("#grp_name_group_error").hide();
        }

        function validateFormGrp() {
            var x = $("#opt_grp_name").val();

            if (x == "") {
                $("#grp_name_group").addClass('has-error');
                $('#opt_grp_name').focus();
                $("#grp_name_group_error").show();
                return false;
            }
        }
    </script>
    <!---------------------------------javascript part for product option group end------------------------------>
@endsection