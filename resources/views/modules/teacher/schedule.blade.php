@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Teacher Dashboard</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of schedules&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Grade Level</th>
                            <th>Subject</th>
                            <th>Section</th>
                            <th>Room</th>
                            <th>Time</th>
                            <th>Schedule</th>
                            <th>School Year</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($classes as $class)
                    <tr>
                        <td>{{ $class->section()->first()->grade_level }}</td>
                        <td>{{ $class->subject()->first()->name }}</td>
                        <td>{{ $class->section()->first()->name }}</td>
                        <td>{{ $class->section()->first()->room()->first()->name }}</td>
                        <td>{{ $class->start_time }} - {{ $class->end_time }}</td>
                        <td>{{ $class->days }}</td>
                        <td>{{ $class->section()->first()->school_year }}</td>
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
</script>
@endsection
