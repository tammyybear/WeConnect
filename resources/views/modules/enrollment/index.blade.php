@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Enrollment</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                Enrollment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h3>
            <div class="table-responsive">
                <table class="table" id="studentTable">
                    <thead>
                        <tr>
                            <th>Grade Level</th>
                            <th>Adviser</th>
                            <th>Section</th>
                            <th>Room</th>
                            <th>School Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sections as $section)
                    <tr>
                        <td>{{ $section->grade_level }}</td>
                        <td>
                            {{ $section->adviser()->first()->first_name }}&nbsp;
                            {{ $section->adviser()->first()->middle_name }}&nbsp;
                            {{ $section->adviser()->first()->last_name }}&nbsp;
                        </td>
                        <td>{{ $section->name }}</td>
                        <td>{{ $section->room()->first()->name }}</td>
                        <td>{{ $section->school_year }}</td>
                        <td>
                            <button class="btn btn-default" id="enrollmentModal" data-id="{{ $section->id }}">Add Student</button>
                            <a href="{{ route('get.students.enrollment',$section->id) }}" class="btn btn-default">View Enrolled</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('modules.enrollment.includes.student_modal')
@endsection
@section('scripts')
<script>
    var section_id = null;
    $(document).on('click','[id=enrollmentModal]', function(){
        section_id = $(this).data('id');
        $('[id=enrollmentMod]').modal();
    });
    $(document).ready(function(){
        $('#studentTable').DataTable();
    });
    $(document).on('click','[id=enrollStudent]', function(){
        var id = $(this).data('id');
        var route = "{{ route('post.enroll.student') }}";
        $.ajax({
         method: 'post',
         url: route,
         data:{
             '_token': $('input[name=_token]').val(),
             'student_id': id,
             'section_id': section_id,
             },
         jsonp: false,
         success: function(data){
               swal(
                        'Success!',
                        'Student successfully enrolled!',
                        'success'
                )
         },
         error: function(){
                swal(
                        'Error!',
                        'Student has already enrolled!',
                        'error'
                )
         }
         });
    });
</script>
@endsection
