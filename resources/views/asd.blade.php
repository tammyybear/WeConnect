
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('student.qwe') }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Non-acad</h4>
                </div>
     <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}">
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save</button>
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form></div>
</div>
