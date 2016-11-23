<div class="form-group">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addProdOptGrp" onclick="addProductGroup()">
        <i class="fa fa-plus" aria-hidden="true"></i> Add New Product Option Group
    </a>
</div>

@if(count($prod_opt_grp)==0)
    <div class="alert alert-warning">No Product Option Groups Available!</div>
@else
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default cat-sidebar">
                <div class="panel-heading">
                    List of Group
                </div>
                <div class="panel-body">
                    @foreach($prod_opt_grp as $pog)
                        <ul class="list-unstyled">
                            <li class="maincat">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                                <a href="{{ url($basecat_url.$pog->id) }}" class="maincat_link">{{ ucfirst(strtolower($pog->name)) }}</a>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-9">
            @if(isset($prod_group_detail) && count($prod_group_detail)>0)
                <div class="well">
                    <div class="row">
                        <div class="col-md-6">Delete this Product Option Group</div>
                        <div class="col-md-6">
                            <a href="/backend/delete_prod_grp/{{ $prod_group_detail->id }}" name="delete_cat" class="btn-sm btn-warning pull-right" onclick="confirm('Are you sure you want to delete this Product Option Group?');">
                                Delete Group
                            </a>
                        </div>
                    </div>
                </div>

                <form class="form-horizontal" method="post" action="/backend/prod_opt_mgmt_update_handler" onsubmit="return validateFormGrpEdit()">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="opt_grp_id" value="{{ $prod_group_detail->id }}">
                    <div class="form-group " id="grp_name_group_edit">
                        <label class="control-label col-md-2">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" id="opt_grp_name_edit" value="{{ $prod_group_detail->name }}">
                        </div>
                        <div class="col-md-10 col-md-offset-2" id="grp_name_group_error_edit" style="display: none">
                            <span class="help-block"><strong>Name field is required</strong></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Status</label>
                        <div class="col-md-3">
                            <select class="form-control" name="status" id="opt_grp_status_edit">
                                <option value="A" @if($prod_group_detail->status == 'A') selected="selected" @endif>Active</option>
                                <option value="N" @if($prod_group_detail->status == 'N') selected="selected" @endif>In-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            <hr>

                @if(isset($prod_opt_actv) && count($prod_opt_actv)>0)

                    <table class="table table-bordered table-striped" id="prod_opt_table">
                        <thead>
                            <tr>
                                <th width="15%">No.</th>
                                <th>Product Option</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-center">
                                    <a class="btn-add" href="#" onclick="addField();" id="add_field_btn">
                                        <i class="fa fa-plus-circle" aria-hidden="true" style=""></i>
                                    </a>

                                    <a class="btn-remove disabled" href="#" onclick="deleteField();" id="delete_field_btn">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </a>

                                    <a class="btn btn-info pull-right disabled" href="#" id="savetogrp">
                                        Save to Group
                                    </a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning">No active Product Option found!</div>
                @endif
            @else
                <div class="well">This page will be used to manage your Product Option Group</div>
            @endif
        </div>
    </div>
@endif

<!---------------------------------product option modal start------------------------------>
<div class="modal fade" id="addProdOptGrp" tabindex="-1" role="dialog" aria-labelledby="addProdOptGrpLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addProdOptGrpLabel">Label</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="/backend/new_prod_opt_grp" method="post" id="new_prod_grp_opt" onsubmit="return validateFormGrp()">
                    {{ csrf_field() }}
                    <div class="form-group " id="grp_name_group">
                        <label class="control-label col-md-2">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" id="opt_grp_name">
                        </div>
                        <div class="col-md-10 col-md-offset-2" id="grp_name_group_error" style="display: none">
                            <span class="help-block"><strong>Name field is required</strong></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Status</label>
                        <div class="col-md-3">
                            <select class="form-control" name="status" id="opt_grp_status">
                                <option value="A">Active</option>
                                <option value="N">In-Active</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submiGrptBtn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!---------------------------------product option modal end------------------------------>

