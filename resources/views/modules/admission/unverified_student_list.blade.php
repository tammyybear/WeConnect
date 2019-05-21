@extends('layouts.dashboard')
@section('styles')
<style>
    .modal-fullscreen {
        padding: 0 !important;
        }
        .modal-fullscreen .modal-dialog {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        }
        .modal-fullscreen .modal-content {
        height: auto;
        min-height: 100%;
        border: 0 none;
        border-radius: 0;
    }
</style>
@endsection
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Admission</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('get.admission') }}">Admission</a></li>
            <li class="active">Unverified Students</li>
        </ol>
    </div>
</div>
<div class="row">
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ Session::get('flash_message') }}
    </div>
    @endif
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">List of unverified students</h3>
            <p class="text-muted">Students applied online</p>
            <div class="table-responsive">
                <table class="table" id="DataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Middle Name</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Birthdate</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->middle_name }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->contact_number }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->birthdate }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>
                                <button class="btn btn-default" id="btnVerify" data-id="{{ $student->id }}">Verify</button>
                                <button form="form-{{$student->id}}" type="submit" class="btn btn-default">Delete</button>

                            </td>
                        </tr>
                        <form id="form-{{$student->id}}" onsubmit="return confirm('Do you really want to delete this data?');"  action="{{ route('post.admission.student-delete') }}" method="post">
                            <input type="hidden" name="id" value="{{ $student->id }}">
                            {{ csrf_field() }}
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('modules.admission.includes.student_modal')
@endsection
@section('scripts')
<script>
    $(document).on('click','[id=btnVerify]', function(){
        var id = $(this).data('id');
        var route = "{{ route('get.admission.unverified-student.details') }}";
        $.ajax({
         method: 'get',
         url: route,
         data:{
             'id': id,
             },
         success: function(data){
            $("[id=id]").val(data.id);
            $("[id=first_name]").val(data.first_name);
            $("[id=last_name]").val(data.last_name);
            $("[id=middle_name]").val(data.middle_name);
            $("[id=nickname]").val(data.nickname);
            $("[id=address]").val(data.address);
            $("[id=contact_number]").val(data.contact_number);
            $("[id=email]").val(data.email);
            $("[id=birthdate]").val(data.birthdate);
            $("[id=gender]").val(data.gender);
            $("[id=civil_status]").val(data.civil_status);
            $("[id=religion]").val(data.religion);
            $("[id=nationality]").val(data.nationality);
            $("[id=guardian_name]").val(data.guardian_name);
            $("[id=guardian_relation]").val(data.guardian_relation);
            $("[id=guardian_contact]").val(data.guardian_contact);
            $("[id=modal-fullscreen]").modal();
         }
         });
    });
      $(document).ready(function(){
        $('#datatable').DataTable();
    });
    $(document).on('click','[id=btnEdit]', function(){
        var id = $(this).data('id');
        var route = "{{ route('get.admission.rooms.details') }}";
        $.ajax({
         method: 'get',
         url: route,
         data:{
             '_token': $('input[name=_token]').val(),
             'id': id,
             },
         jsonp: false,
         success: function(data){
            $("[id=room_id]").val(data.id);
            $("[id=room_name]").val(data.name);
            $("[id=editModal]").modal();
         }
         });
    });
    $(document).on('click','[id=btnDelete]', function(){
        var id = $(this).data('id');
        var route = "{{ route('get.delete.rooms.details') }}";
        var yesno = confirm('Do you want to delete this room?');
        if (yesno) {
            $.ajax({
             method: 'post',
             url: route,
             data:{
                 '_token': $('input[name=_token]').val(),
                 'id': id,
                 },
             jsonp: false,
             success: function(data){
              location.reload();
               }
             });
        }
    });
</script>
@endsection
