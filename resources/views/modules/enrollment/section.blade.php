@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Enrollment</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('get.enrollment') }}">Enrollment</a></li>
            <li class="active">{{$section->name}}</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                <div class="row">
                    <div class="col-md-6">
                        Section: {{ $section->name }}
                    </div>
                    <div class="col-md-6">
                        Adviser: {{ $section->adviser()->first()->first_name }} {{ $section->adviser()->first()->middle_name }} {{ $section->adviser()->first()->last_name }}
                    </div>
                </div>
            </h3>
            <div class="table-responsive">
                <table class="table" id="studentTable">
                    <thead>
                        <tr>
                            <th>LRN</th>
                            <th>Student Name</th>
                            <th>Email Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->lrn }}</td>
                        <td>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <form action="{{ route('post.remove.student') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                <input type="hidden" name="section_id" value="{{ $section->id }}">
                                <button type="submit" class="btn btn-default">Remove</button>
                            </form>
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
