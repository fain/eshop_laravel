@extends('layouts.backlayout')

@section('css_section')
    <link href="{{asset('css/backend_custom.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
    <i class="fa fa-cube" aria-hidden="true"></i> Products / <i class="fa fa-list-alt" aria-hidden="true"></i> Categories
@endsection

@section('content')
    <div class="col-md-3">
        @include('back.cat_sidebar')
    </div>
    <div class="col-md-9">
        <div class="cat-cont">
            @include('back.message')
            <form class="form-horizontal" method="post" action="/backend/categories/update/{{ $catdetails->id }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-3 control-label">Name</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ $catdetails->name }}" name="name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Slug</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" value="{{ $catdetails->slug }}" name="slug">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Type</label>
                    <div class="col-md-4">
                        <select class="form-control" id="cat_type" name="type">
                            <option value="">Select Category Type</option>
                            <option value="main" @if($catdetails->menu_type=="main") selected="selected" @endif>Main Category</option>
                            <option value="sub" @if($catdetails->menu_type=="sub") selected="selected" @endif>Sub Category</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="sub_cat">
                    <label class="col-md-3 control-label">Sub Category of</label>
                    <div class="col-md-4">
                        @if(count($maincat)>0)
                            <select class="form-control" name="main_cat_id">
                                <option value="">Select Main Category</option>
                                @foreach($maincat as $mc)
                                    <option value="{{ $mc->id }}" @if($catdetails->main_category_id==$mc->id) selected="selected" @endif>{{ ucfirst(strtolower($mc->name)) }}</option>
                                @endforeach
                            </select>
                        @else
                            <div class="alert alert-warning">Main category are empty or not active</div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Status</label>
                    <div class="col-md-3">
                        <select class="form-control" name="status">
                            <option value="A" @if($catdetails->status=="A") selected="selected" @endif>Active</option>
                            <option value="N" @if($catdetails->status=="N") selected="selected" @endif>Not Active</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Description</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="description">{{ $catdetails->description }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3 col-md-offset-3">
                        <button type="submit" name="submit_cat" class="btn btn-info">Update</button>
                        <button type="reset" name="reset_cat" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js_section')
    <script>
        $(document).ready(function(){
            $(".collapse").on('shown.bs.collapse', function(event){
                var link = "link_"+event.target.id;
                var icon = "icon_"+event.target.id;

                $( "#"+link ).html('<i id="'+icon+'" class="fa fa-minus-square" aria-hidden="true"></i>');
            });

            $(".collapse").on('hidden.bs.collapse', function(event){
                var link = "link_"+event.target.id;
                var icon = "icon_"+event.target.id;

                $( "#"+link ).html('<i id="'+icon+'" class="fa fa-plus-square" aria-hidden="true"></i>');
            });

            //this part is for category details

            var cattype = $("#cat_type").val();
            if(cattype=="main" || cattype==""){
                $("#sub_cat").hide();
            }else{
                $("#sub_cat").show();
            }

            $("#cat_type").on('change', function() {
                var selectval = this.value;
                if(selectval=='main' || selectval==""){
                    $("#sub_cat").hide();
                }else{
                    $("#sub_cat").show();
                }
            });
        });

    </script>
@endsection