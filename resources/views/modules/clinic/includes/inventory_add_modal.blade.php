
<div id="addModalFile" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('clinic.inventory.create') }}" method="post"  enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Inventory</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            Item Name:<input type="text" name="item" class="form-control">
                        </div>
                        <div class="col-md-6">
                            Count:<input type="number" name="count" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Date added:<input type="date" name="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            Added By: <b class="form-control">{{\Auth::user()->first_name}} {{\Auth::user()->last_name}} {{\Auth::user()->middle_name}}</b><input type="hidden" name="created_by" value="{{\Auth::user()->first_name}} {{\Auth::user()->last_name}} {{\Auth::user()->middle_name}}" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        Remarks:
                        <textarea class="form-control" style="resize:none;" name="remarks">

                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
