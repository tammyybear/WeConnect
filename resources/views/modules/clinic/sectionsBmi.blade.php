@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Clinic</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('clinic.index')}}">Clinic</a></li>
            <li class="active">BMI</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                BMI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('clinic.bmi') }}" class="btn btn-default">View Student Report</a>
            </h3>
            <div class="table-responsive">
                <table class="table" id="studentTable">
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
                            <a  href="{{ route('clinic.bmi.students.get', $section->id) }}" style="color:grey;"><button class="btn btn-default">View Section</button></a>
                        </td>
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
        $('#studentTable').DataTable();
    });
</script>
@endsection
