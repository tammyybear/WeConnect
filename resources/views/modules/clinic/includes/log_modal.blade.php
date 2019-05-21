
<div id="addModalFile" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('get.log') }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    @if(Request::url() === route('clinic.logs'))
                    <h4 class="modal-title">Add Log</h4>
                    @else
                    <h4 class="modal-title">Add Wins (Wash Seminar)</h4>
                    @endif
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            @if(Request::url() === route('clinic.logs'))
                                <label for="any">Student Name:</label>
                                <input type="hidden" name="type" value="log">
                            @else
                                <label for="any">Title:</label>
                                <input type="hidden" name="type" value="seminar">
                            @endif
                            <input type="text" name="any" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description">Description:</label>
                            <textarea name="description" id="" class="form-control" noresize></textarea>
                        </div>
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
