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
            <a href="/backend/brand" class="btn btn-default">
                <i class="fa fa-reply" aria-hidden="true"></i> Back to Brand List
            </a>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-body">
                <form class="form-horizontal" method="post" action="/backend/new_brand_handler">
                    {{ csrf_field() }}
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category <span class="req">*</span> </label>
                        <div class="col-md-4">
                            <select class="form-control" name="main_category" id="main_category">
                                <option value="">Select Main Category</option>
                                @foreach($maincat as $mc)
                                    <option value="{{ $mc->id }}">{{ ucfirst(strtolower($mc->name)) }}</option>
                                @endforeach
                                <option value="00">Others</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="sub_category" id="sub_category" style="display: none">
                                <option value="">Select Sub Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Name <span class="req">*</span> </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status <span class="req">*</span> </label>
                        <div class="col-md-3">
                            <select class="form-control" name="status" id="status">
                                <option value="A">Active</option>
                                <option value="N">Not Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Image</label>
                        <div class="col-md-3">
                            <input id="input-1" type="file" class="file" name="images">
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_section')
    <script>
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
        });
    </script>
@endsection