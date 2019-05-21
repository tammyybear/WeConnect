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
            Section: {{ $section->name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Adviser: {{ $section->adviser()->first()->first_name }} {{ $section->adviser()->first()->middle_name }} {{ $section->adviser()->first()->last_name }}
            </h3>
            <p>Underweight: {{ $data['underweight'] }}</p>
            <p>Normal: {{ $data['normal'] }}</p>
            <p>Overweight: {{ $data['overweight'] }}</p>
            <p>Total: {{ $data['total'] }}</p>
            <hr>
            <div class="table-responsive">
                <table class="table" id="studentTable">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Email Address</th>
                            <th>Age</th>
                            <th>Weight</th>
                            <th>Height</th>
                            <th>BMI</th>
                            <th>Result</th>
                            <th>Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        @php
                        $bmi = $student->bmis()->orderBy('created_at', 'desc')->first();
                        @endphp
                        <tr>
                            <td>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{empty($bmi)? null : $bmi->birthday }}</td>
                            <td>{{empty($bmi)? null : $bmi->weight }}</td>
                            <td>{{empty($bmi)? null : $bmi->height }}</td>
                            <td>{{empty($bmi)? null : $bmi->bmi }}</td>
                            <td>{{empty($bmi)? null : $bmi->result }}</td>
                            <td>{{empty($bmi)? null : $bmi->year }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{ csrf_field() }}
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#studentTable').DataTable();
    });
</script>
@endsection
