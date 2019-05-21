@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Schedule</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of schedule&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-default"  data-toggle="modal" data-target="#addModal">Add Schedule</button>
            </h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>Time</th>
                            <th>Days</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                        <tr>
                            <td>{{$schedule->section()->first()->name}}</td>
                            <td>{{$schedule->subject()->first()->name}}</td>
                            <td>{{$schedule->teacher()->first()->first_name}}
                                {{$schedule->teacher()->first()->middle_name}}
                                {{$schedule->teacher()->first()->last_name}}
                            </td>
                            @php
                               $time = new \DateTime($schedule->start_time);
                               $time2 = new \DateTime($schedule->end_time);
                            @endphp
                            <td>{{$time->format('h:i A')}} - {{$time2->format('h:i A')}}</td>
                            <td>{{$schedule->days}}</td>
                            <td>
                                <button class="btn btn-default" id="btnEdit" data-id="{{ $schedule->id }}">Edit</button>
                                <button class="btn btn-default" id="btnDelete" data-id="{{ $schedule->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('modules.schedule.includes.schedule_add_modal')
@include('modules.schedule.includes.schedule_edit_modal')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable();
    });
    $(document).on('click','[id=btnEdit]', function(){
        var id = $(this).data('id');
        var route = "{{route('get.schedules.edit')}}";
        $.ajax({
         method: 'get',
         url: route,
         data:{
             '_token': $('input[name=_token]').val(),
             'id': id,
             },
         jsonp: false,
         success: function(data){
            console.log(data);
            $('[id=shour]').val(data.shour);
            $('[id=schedule_id]').val(data.id);
            $('[id=sminute]').val(data.sminute);
            $('[id=sampm]').val(data.sampm);
            $('[id=ehour]').val(data.ehour);
            $('[id=eminute]').val(data.eminute);
            $('[id=eampm]').val(data.eampm);
            $('[id=section_id]').val(data.section_id);
            $('[id=subject_id]').val(data.subject_id);
            $('[id=user_id]').val(data.user_id);
            $('[id=days]').selectpicker('val',data.days);
            $('[id=editModal]').modal();
         }
         });
    });
    $(document).on('click','[id=btnDelete]', function(){
        var id = $(this).data('id');
        var route = "{{route('get.schedules.delete')}}";
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

    $(document).on('change','[id=asampm]',function(){
        var time = $("[id=asampm]").val();
        if (time === "PM") {
            var num = $('[id=ashour]').val();
            if (num >= 7) {
                $('[id=ashour]').val(6);
            }
        }
    });
    $(document).on('change','[id=ashour]',function(){
        var time = $('[id=asampm]').val();
        if (time === "PM") {
            var num = $('[id=ashour]').val();
            if (num >= 7) {
                $('[id=ashour]').val(6);
            }
        }
    });
    $(document).on('change','[id=aeampm]',function(){
        var time = $('[id=aeampm]').val();
        if (time === "PM") {
            var num = $('[id=aehour]').val();
            if (num >= 7) {
                $('[id=aehour]').val(6);
            }
        }
    });
    $(document).on('change','[id=aehour]',function(){
        var time = $('[id=aeampm]').val();
        if (time === "PM") {
            var num = $('[id=aehour]').val();
            if (num >= 7) {
                $('[id=aehour]').val(6);
            }
        }
    });

    $(document).on('change','[id=sampm]',function(){
        var time = $('[id=sampm]').val();
        if (time === "PM") {
            var num = $('[id=shour]').val();
            if (num >= 7) {
                $('[id=shour]').val(6);
            }
        }
    });
    $(document).on('change','[id=shour]',function(){
        var time = $('[id=sampm]').val();
        if (time === "PM") {
            var num = $('[id=shour]').val();
            if (num >= 7) {
                $('[id=shour]').val(6);
            }
        }
    });
    $(document).on('change','[id=eampm]',function(){
        var time = $('[id=eampm]').val();
        if (time === "PM") {
            var num = $('[id=ehour]').val();
            if (num >= 7) {
                $('[id=ehour]').val(6);
            }
        }
    });
    $(document).on('change','[id=ehour]',function(){
        var time = $('[id=eampm]').val();
        if (time === "PM") {
            var num = $('[id=ehour]').val();
            if (num >= 7) {
                $('[id=ehour]').val(6);
            }
        }
    });
</script>
@endsection
