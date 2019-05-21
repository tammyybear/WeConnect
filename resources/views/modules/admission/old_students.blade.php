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
            <li class="active">List of Students</li>
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
            <h3 class="box-title">List of Students</h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>LRN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Middle Name</th>
                            <th>Username</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Birthdate</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ $student->lrn }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->middle_name }}</td>
                            <td>{{ $student->user()->first()->username }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->contact_number }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->birthdate }}</td>
                            <td>{{ $student->gender }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
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
