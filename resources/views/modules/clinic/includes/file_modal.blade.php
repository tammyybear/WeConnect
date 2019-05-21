
<div id="addModalFile" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('get.file') }}" method="post"  enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">File Upload</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="file" style="display:none" class="form-control" id="file" name="file">
                    <div class="row">
                            <center>
                            <a class="btn" id="btn-upload">Click to Upload File</a>
                    </center>
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
