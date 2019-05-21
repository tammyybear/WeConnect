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
                Student name: {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-default" id="btnAdd">
                    Add BMI Detail
                </a>
            </h3>
            <div class="table-responsive">
                <table class="table" id="studentTable">
                    <thead>
                        <tr>
                            <th>Age</th>
                            <th>Weight</th>
                            <th>Height</th>
                            <th>BMI</th>
                            <th>Result</th>
                            <th>Section</th>
                            <th>Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bmis as $bmi)
                        <tr>
                            <td>{{$bmi->birthday}}</td>
                            <td>{{$bmi->weight }}</td>
                            <td>{{$bmi->height}}</td>
                            <td>{{$bmi->bmi}}</td>
                            <td>{{$bmi->result}}</td>
                            <td>{{$bmi->section()->first()->name}}</td>
                            <td>{{$bmi->year}}</td>
                            <td>
                                <a class="btn btn-default" data-id="{{$bmi->id}}" id="btnEdit">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{ csrf_field() }}
@include('modules.clinic.includes.bmi_modal')
@include('modules.clinic.includes.add_bmi_modal')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#studentTable').DataTable();
    });

    $(document).on('click',"[id=btnEdit]", function(){
        var id = $(this).data('id');
        var route = "{{route('clinic.bmi.section.get.bmi')}}";
            $.ajax({
             method: 'get',
             url: route,
             data:{
                 '_token': $('input[name=_token]').val(),
                 'id': id,
                 },
             jsonp: false,
             success: function(data){
                    $('#eid').val(data.id);
                    $('#eweight').val(data.weight);
                    $('#emheight').val(data.height);
                    $('#eage').val(data.birthday);
                    $('#ebmi').val(data.bmi);
                    $('#eresult_text').val(data.result);
                    $('#esection_id').val(data.section_id);
                    $('#emonth').val(data.month);
                    $('#eyears').val(data.years);
                    calculateeBMI(data.height, data.weight);
                    $('#editModal').modal();
               }
             });
    });

    $('[id=btnAdd]').on('click', function(){
        $('#addModal').modal();
    });

    $('#mheight').on('keyup', function(){
        var org = $(this).val();
        var h = Math.pow(org, 2);
        $('#height').val(h.toFixed(4));
        var h = $('#height').val();
        var w = $('#weight').val();
        calculateBMI(h, w);
   });
    $('#weight').on('keyup', function(){

        var h = $('#height').val();
        var w = $('#weight').val();
        calculateBMI(h, w);
    });

    function calculateBMI(h, w){
        var bmi = (w / h);
        $('#bmi').val(bmi.toFixed(2));
        var final = bmi.toFixed(2);
    }

    function calculateeBMI(h, w){
        var bmi = (w / h);
        $('#ebmi').val(bmi.toFixed(2));
        var final = bmi.toFixed(2);
    }
</script>
@endsection
