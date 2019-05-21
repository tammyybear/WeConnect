@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Admission</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('get.admission') }}">Admission</a></li>
            <li class="active">Sections</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of sections&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-default"  data-toggle="modal" data-target="#addModal">Add Section</button>
            </h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
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
                            <button class="btn btn-default" id="btnEdit" data-id="{{ $section->id }}">Edit</button>
                            <button class="btn btn-default" id="btnDelete" data-id="{{ $section->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('modules.admission.includes.sectionAddModal')
@include('modules.admission.includes.sectionEditModal')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable();
    });
    $(document).on('click','[id=btnEdit]', function(){
        var id = $(this).data('id');
        var route = "{{route('get.admission.det.sections')}}";
        $.ajax({
         method: 'get',
         url: route,
         data:{
             '_token': $('input[name=_token]').val(),
             'id': id,
             },
         jsonp: false,
         success: function(data){
            $('[id=section_id]').val(data.id);
            $('[id=grade_level]').val(data.grade_level);
            $('[id=school_year]').val(data.school_year);
            $('[id=name]').val(data.name);
            $('[id=adviser_id]').val(data.adviser_id);
            $('[id=room_id]').val(data.room_id);
            $('[id=editModal]').modal();
         }
         });
    });
    $(document).on('click','[id=btnDelete]', function(){
        var id = $(this).data('id');
        var route = "{{ route('get.admission.del.sections') }}";
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
