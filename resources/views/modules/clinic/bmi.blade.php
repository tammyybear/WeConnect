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
                <a href="{{ route('clinic.bmi.sections') }}" class="btn btn-default">View Section Report</a>
            </h3>
            <div class="table-responsive">
                <table class="table" id="studentTable">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>
                            <a  href="{{ route('clinic.bmi.section', $student->id) }}" style="color:grey;"><button class="btn btn-default">View Student Record</button></a>
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
