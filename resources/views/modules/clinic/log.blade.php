@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Clinic</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('clinic.index')}}">Clinic</a></li>
            <li class="active">Logs</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of logs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-default" data-toggle="modal" data-target="#addModalFile">Add log entry</button>
            </h3>
            <div class="table-responsive">
                <table class="table" id="fileTable">
                    <thead>
                        <tr>
                            <th>Student No</th>
                            <th>Description</th>
                            <th>Date/Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                        <tr>
                            <td>{{ $log->any }}</td>
                            <td>{{ $log->description}}</td>
                            <td>{{ $log->created_at }}</td>
                            <td>
                                <a id="btnDelete" data-id="{{ $log->id }}" class="btn btn-default">
                                    Delete Entry
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{ csrf_field() }}
@include('modules.clinic.includes.log_modal')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#fileTable').DataTable();
    });

    $(document).on('click','[id=btnDelete]',function(){
        var id = $(this).data('id');
        var route = "{{ route('get.delete') }}";
        var yesno = confirm('Do you want to delete this file?');
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
