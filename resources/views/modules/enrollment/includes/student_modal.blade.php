<div id="enrollmentMod" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Students</h4>
                {{ csrf_field() }}
            </div>
            <div class="modal-body">
                <table class="table table-responsive" id="studentTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                            <td>{{$student->email}}</td>
                            <td id="btn_dis_{{$student->id}}">
                                <button class="btn btn-default" id="enrollStudent" data-id="{{ $student->id }}">Enroll Student</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
