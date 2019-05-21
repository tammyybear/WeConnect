@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Admission</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('get.admission') }}">Admission</a></li>
            <li class="active">Subjects</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of subjects&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-default"  data-toggle="modal" data-target="#addSubjectModal">Add Subject</button>
            </h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($subjects as $subject)
                    <tr>
                        <td>{{$subject->name}}</td>
                        <td>
                            <button class="btn btn-default" id="btnEdit" data-id="{{ $subject->id }}">Edit</button>
                            <button class="btn btn-default" id="btnDelete" data-id="{{ $subject->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('modules.admission.includes.subjectAddModal')
@include('modules.admission.includes.subjectEditModal')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable();
    });
    $(document).on('click','[id=btnEdit]', function(){
        var id = $(this).data('id');
        var route = "{{ route('get.admission.subjects.details') }}";
        $.ajax({
         method: 'get',
         url: route,
         data:{
             '_token': $('input[name=_token]').val(),
             'id': id,
             },
         jsonp: false,
         success: function(data){
            $("[id=subject_id]").val(data.id);
            $("[id=subject_name]").val(data.name);
            $("[id=editSubjectModal]").modal();
         }
         });
    });
    $(document).on('click','[id=btnDelete]', function(){
        var id = $(this).data('id');
        var route = "{{ route('get.delete.subjects.details') }}";
        var yesno = confirm('Do you want to delete this subject?');
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
