
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('get.edit.admission.rooms') }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Room Name</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="room_id">
                    <input type="text" class="form-control" id="room_name" name="room_name">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
