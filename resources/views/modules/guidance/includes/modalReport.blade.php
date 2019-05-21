<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('incident-report.store') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Reports</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input id="id" name="id" type="hidden">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="student">Student</label>
                                <input autocomplete="off" required list="students" name="student" placeholder="Student" class="form-control input-md">
                                <datalist id="students">
                                    @foreach($students as $student)
                                    <option value="{{ $student->lrn }} - {{ucfirst($student->last_name)}}, {{ucfirst($student->first_name)}} {{ucfirst(str_limit($student->middle_name, 1, '.'))}}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="report">Report</label>
                                <textarea class="form-control input-md" id="report" name="report" required></textarea>
                            </div>
                        </div>
                           <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="date_reported">Date Reported</label>
                                <input required id="date_reported" name="date_reported" type="datetime-local" placeholder="Date Reported" class="form-control input-md">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
