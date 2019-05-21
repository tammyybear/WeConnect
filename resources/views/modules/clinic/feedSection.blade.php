@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Clinic</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('clinic.index')}}">Clinic</a></li>
            <li class="active">Feeding</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
           <h3 class="box-title">
                    Section: {{ $section->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Adviser: {{ $section->adviser()->first()->first_name }} {{ $section->adviser()->first()->middle_name }} {{ $section->adviser()->first()->last_name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Feeding Student Count: {{ $check_count }}
            </h3>
            <div class="table-responsive">
                <table class="table" id="studentTable">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Email Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <form action="{{ route('post.feeding.student') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="user_id" value="{{ $student->id }}">
                                <input type="hidden" name="section_id" value="{{ $section->id }}">
                                <input type="hidden" name="type" value="feed">
                                @if($student->deworm_id)
                                    <input type="hidden" value="{{$student->deworm_id}}" name="checking_id">
                                    @if($student->answer == "yes")
                                        <input type="hidden" value="no" name="answer">
                                        <button type="submit" class="btn btn-danger">No</button>
                                    @else
                                        <input type="hidden" value="yes" name="answer">
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    @endif
                                @else
                                    <input type="hidden" value="yes" name="answer">
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                @endif
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
