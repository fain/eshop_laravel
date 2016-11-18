<div class="form-group">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addProdOpt"><i class="fa fa-plus" aria-hidden="true"></i> Add New Product Option</a>
</div>
@if(count($prod_opt)==0)
    <div class="alert alert-warning">No Product Options Available!</div>
@else
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prod_opt as $index=>$po)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $po->name }}</td>
                <td>{{ $po->slug }}</td>
                <td>
                    <a href="#" class="btn-sm btn-info" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="/backend/delete_prod_opt/{{ $po->id }}" class="btn-sm btn-danger" title="delete" onclick="return confirm('Are you sure to delete this product option?')"><i class="fa fa-times" aria-hidden="true"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

<!-- Modal -->
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

@section('js_section')
    <script>
        $('#addProdOpt').on('shown.bs.modal', function () {
            $('#opt_name').focus();

            $("#submitBtn").click(function(e){
                $("#new_prod_opt").submit();
            });
        })
    </script>
@endsection