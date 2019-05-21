<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b>New User<b></h4>
            </div>
            <form method="POST" action="{{ route('post.new-user') }}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input id="id" name="id" type="hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="name">First Name</label>
                                <input required id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="name">Last Name</label>
                                <input required id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="name">Middle Name</label>
                                <input required id="middle_name" name="middle_name" type="text" placeholder="Middle Name" class="form-control input-md">
                            </div>
                        </div>
                       <div class="col-md-12">
                            <div class="form-group">
                                <label required class="control-label" for="role">Role</label>
                                <select id="role" name="role" class="form-control">
                                    <option selected disabled>Select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
