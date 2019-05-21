@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Admission</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('get.admission') }}">Admission</a></li>
            <li class="active">Rooms</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of rooms&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn"  data-toggle="modal" data-target="#addModal">Add Room</button>
            </h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Room</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{$room->name}}</td>
                        <td>
                            <button class="btn btn-default" id="btnEdit" data-id="{{ $room->id }}">Edit</button>
                            <button class="btn btn-default" id="btnDelete" data-id="{{ $room->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('modules.admission.includes.addModal')
@include('modules.admission.includes.editModal')
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
