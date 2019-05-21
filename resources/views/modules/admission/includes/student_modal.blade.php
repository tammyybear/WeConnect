<div class="modal fade modal-fullscreen" id="modal-fullscreen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b>Student Check<b></h4>
            </div>
            <form method="POST" action="{{ route('post.admission.verify-student') }}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input id="id" name="id" type="hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <p><b>Requirements:</b></p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="has_birthcert" name="has_birthcert" type="checkbox">
                                <label class="control-label" for="has_birthcert">Birth Certificate</label>
                            </div>
                            <div class="form-group">
                                <input id="has_form137" name="has_form137" type="checkbox">
                                <label class="control-label" for="has_form137">Form 137</label>
                            </div>
                            <div class="form-group">
                                <input id="has_goodmoral" name="has_goodmoral" type="checkbox">
                                <label class="control-label" for="has_goodmoral">Good Moral</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="verification_code">Verification Code</label>
                                <input id="verification_code" name="verification_code" type="text" placeholder="Verification Code" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p><b>Personal Information:</b></p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="name">First Name</label>
                                <input required id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="name">Last Name</label>
                                <input required id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="name">Middle Name</label>
                                <input required id="middle_name" name="middle_name" type="text" placeholder="Middle Name" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="nickname">Nickname</label>
                                <input required id="nickname" name="nickname" type="text" placeholder="Nickname" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="address">Complete Address</label>
                                <textarea required style="resize:none" rows="5" id="address" name="address" placeholder="Complete Address" class="form-control input-md"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="contact_number">Contact Number</label>
                                <input required id="contact_number" name="contact_number" type="text" placeholder="Contact Number" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input required id="email" name="email" type="email" placeholder="Email" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="birthdate">Birthdate</label>
                                <input required id="birthdate" name="birthdate" type="date" placeholder="Birthdate" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="gender">Gender</label>
                                <select required id="gender" name="gender" class="form-control">
                                    <option selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label required class="control-label" for="civil_status">Civil Status</label>
                                <select id="civil_status" name="civil_status" class="form-control">
                                    <option selected disabled>Select Civil Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="separated">Separated</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="religion">Religion</label>
                                <input id="religion" name="religion" type="text" placeholder="Religion" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="nationality">Nationality</label>
                                <input id="nationality" name="nationality" type="text" placeholder="Nationality" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="guardian_name">Guardian's Name</label>
                                <input id="guardian_name" name="guardian_name" type="text" placeholder="Guardian's Name" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="guardian_relation">Guardian's Relation</label>
                                <input id="guardian_relation" name="guardian_relation" type="text" placeholder="Guardian's Relation" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" for="guardian_contact">Guardian's Contact Number</label>
                                <input id="guardian_contact" name="guardian_contact" type="text" placeholder="Guardian's Contact Number" class="form-control input-md">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Verify</button>
                </div>
            </form>
        </div>
    </div>
</div>
