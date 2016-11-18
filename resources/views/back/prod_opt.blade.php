<div class="form-group">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addProdOpt"><i class="fa fa-plus" aria-hidden="true"></i> Add New Product Option</a>
</div>
@if(count($prod_opt)==0)
    <div class="alert alert-warning">No Product Options Available!</div>
@else
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="10%">No.</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prod_opt as $index=>$po)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $po->name }}</td>
                <td>{{ $po->slug }}</td>
                <td>@if($po->status=='A') Active @else In-Active @endif</td>
                <td>
                    <a href="#" class="btn-sm btn-info" title="Edit" data-toggle="modal" data-target="#editProdOpt" onclick="editProduct('{{ $po->id }}', '{{ $po->name }}', '{{ $po->slug }}', '{{ $po->status }}')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="/backend/delete_prod_opt/{{ $po->id }}" class="btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure to delete this product option?')"><i class="fa fa-times" aria-hidden="true"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

<!---------------------------------add product option modal start------------------------------>
<div class="modal fade" id="addProdOpt" tabindex="-1" role="dialog" aria-labelledby="addProdOptLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addProdOptLabel">Add New Product Option</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="/backend/new_prod_opt" id="new_prod_opt">
                    {{ csrf_field() }}
                    <input type="hidden" name="active_tab" value="opt">
                    <div class="form-group">
                        <label class="control-label col-md-2">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" id="opt_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Slug</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slug">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Status</label>
                        <div class="col-md-3">
                            <select class="form-control" name="status">
                                <option value="A">Active</option>
                                <option value="N">In-Active</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!---------------------------------add product option modal end------------------------------>

<!---------------------------------edit product option modal start------------------------------>
<div class="modal fade" id="editProdOpt" tabindex="-1" role="dialog" aria-labelledby="editProdOptLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editProdOptLabel">Edit Product Option</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="/backend/edit_prod_opt" id="edit_prod_opt" name="edit_prod_opt" onsubmit="return validateForm()">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="opt_id">
                    <div class="form-group">
                        <label class="control-label col-md-2">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" id="edit_opt_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Slug</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="slug" id="opt_slug" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">Status</label>
                        <div class="col-md-3">
                            <select class="form-control" name="status" id="opt_status">
                                <option value="A">Active</option>
                                <option value="N">In-Active</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateBtn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!---------------------------------edit product option modal end------------------------------>

@section('js_section')
    <script>
        $('#addProdOpt').on('shown.bs.modal', function () {
            $('#opt_name').focus();

            $("#submitBtn").click(function(e){
                $("#new_prod_opt").submit();
            });
        })
    </script>

    <script>
        function editProduct(a, b, c, d){
            $("#opt_id").val(a);
            $("#edit_opt_name").val(b);
            $("#opt_slug").val(c);
            $("#opt_status").val(d);
        }

        function validateForm() {
            var x = $("#edit_opt_name").value;
            if (x == "") {
                alert("Name must be filled out");
                return false;
            }
        }

        $('#editProdOpt').on('shown.bs.modal', function () {
            $('#edit_opt_name').focus();

            $("#updateBtn").click(function(e){
                $("#edit_prod_opt").submit();
            });
        })
    </script>
@endsection