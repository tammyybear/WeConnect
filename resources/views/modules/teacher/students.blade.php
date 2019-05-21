@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Grades</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('teacher.sections') }}">Sections</a></li>
            <li class="active">{{$schedule->section()->first()->name}}</li>
        </ol>
    </div>
</div>
<div class="row">
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{ Session::get('flash_message') }}
    </div>
    @endif
</div>
<div class="row">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
        {{$error}}
    </div>
    @endforeach
    @endif
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                <div class="row">
                    <p>Section: <b>{{ $schedule->section()->first()->name }}</b></p>
                    <p>Subject: <b>{{ $schedule->subject()->first()->name }}</b></p>
                </div>
            </h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>1st Grading</th>
                            <th>2nd Grading</th>
                            <th>3rd Grading</th>
                            <th>4th Grading</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    @php
                    $grade = App\Grade::where('schedule_id', $schedule->id)->where('student_id', $student->id)->first();
                    @endphp
                    <form action="{{ route('grade.save') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                    <input type="hidden" name="grade_id" value="{{ empty($grade) ? null : $grade->id }}">
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                        <td>
                            <input min="0" max="100" value="{{ empty($grade) ? null : $grade->g1st }}" type="number" name="g1st" style="width: 60px;">
                        </td>
                          <td>
                            <input min="0" max="100" value="{{ empty($grade) ? null : $grade->g2nd }}" type="number" name="g2nd"  style="width: 60px;">
                        </td>
                          <td>
                            <input min="0" max="100" value="{{ empty($grade) ? null : $grade->g3rd }}" type="number" name="g3rd"  style="width: 60px;">
                        </td>
                          <td>
                            <input min="0" max="100" value="{{ empty($grade) ? null : $grade->g4th }}" type="number" name="g4th"  style="width: 60px;">
                        </td>
                          <td>
                                <button type="submit" class="btn btn-default">Save</button>
                          </td>
                    </tr>
                    </form>
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
