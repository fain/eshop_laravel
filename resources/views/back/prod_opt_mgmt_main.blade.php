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

            $("#opt_grp_name").val('');
            $("#opt_grp_status").val('A');
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

        function validateFormGrpEdit() {
            var x = $("#opt_grp_name_edit").val();

            if (x == "") {
                $("#grp_name_group_edit").addClass('has-error');
                $('#opt_grp_name_edit').focus();
                $("#grp_name_group_error_edit").show();
                return false;
            }
        }

        $('#add_field_btn').click(function(e) {
            e.preventDefault();
            //do other stuff when a click happens
        });

        $('#delete_field_btn').click(function(e) {
            e.preventDefault();
            //do other stuff when a click happens
        });

        function addField (argument) {
            var myTable = document.getElementById("prod_opt_table");
            var currentIndex = myTable.rows.length;

            if(currentIndex==2){
                var currentRow = myTable.insertRow(1);
            }else{
                var currentRow = myTable.insertRow(currentIndex-1);
            }

            var nameBox = document.createElement("select");
            nameBox.setAttribute("name", "opt" + (currentIndex-1));
            nameBox.setAttribute("id", "opt" + (currentIndex-1));
            nameBox.setAttribute("class", "form-control");

            var chosen_item = false;

            var sel_val = document.getElementById("opt" + (currentIndex-2));
            if(sel_val!=null){
                alert(sel_val.value);
            }


            var arr = <?php echo json_encode($dropdown); ?>;
            var len = (arr.length)-1;

            for(var i=0; i<=len; i++){
                var option = document.createElement("option");

                $.each(arr[i], function(key, value){
                    option.value = key;
                    option.text = value;
                });

                nameBox.add(option);
            }


//            var addRowBox = document.createElement("input");
//            addRowBox.setAttribute("type", "button");
//            addRowBox.setAttribute("value", "Delete");
////            addRowBox.setAttribute("onclick", "addField();");
//            addRowBox.setAttribute("class", "btn-sm btn-danger disabled");

            var index = currentRow.insertCell(0);
            index.innerHTML = currentIndex-1;

            var name = currentRow.insertCell(1);
            name.appendChild(nameBox);

            var act_btn = currentRow.insertCell(2);
//            act_btn.appendChild(addRowBox);
            act_btn.innerHTML = "";
        }

        function deleteField() {
//            var myTable = document.getElementById("prod_opt_table");
//            var currentIndex = myTable.rows.length;
//
//            var currentRow = myTable.deleteRow(e-1);

            var myTable = document.getElementById("prod_opt_table");
            var currentIndex = myTable.rows.length;

            if(currentIndex==2){
                var currentRow = myTable.deleteRow(1);
            }else{
                var currentRow = myTable.deleteRow(currentIndex-2);
            }
        }
    </script>
    <!---------------------------------javascript part for product option group end------------------------------>
@endsection