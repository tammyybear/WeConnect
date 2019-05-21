@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Incident Reports</h4>
    </div>
</div>
@include('modules.guidance.includes.modalReport')
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of reports&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-default" data-toggle="modal" data-target="#addModal">Add Report</button>
            </h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student</th>
                            <th>Report</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->student()->first()->lrn }}</td>
                        <td>{{ $report->student()->first()->last_name }},{{ $report->student()->first()->first_name }} {{ $report->student()->first()->middle_name }}</td>
                        <td>{{ $report->report }}</td>
                        <td>{{  date("M jS, Y h:i:sa", strtotime($report->date_reported))}}</td>
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
