@extends('layouts.dashboard')
@section('styles')
<style>
.panel-group .panel .panel-heading a[data-toggle=collapse]:before {
    content: none;
    display: block;
    float: right;
    font-family: themify;
    font-size: 14px;
    text-align: right;
    width: 25px;
}
.panel-group .panel .panel-heading .accordion-toggle.collapsed:before, .panel-group .panel .panel-heading a[data-toggle=collapse].collapsed:before {
    content: none;
}
</style>
@endsection
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Schedules</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div>
            <h3 class="box-title">
            Schedules&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h3>
            <div class="panel-group" id="accordion">
                @foreach($scheds as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><b>Grade {{$value['section']['grade_level']}}</b> | <b>{{$value['section']['name']}}</b> | <b>{{$value['section']['school_year']}}</b></a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                            <th>Time</th>
                                            <th>Days</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($value['schedules'] as $schedule)
                                        <tr>
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
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
</script>
@endsection
