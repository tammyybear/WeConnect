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
        <h4 class="page-title">Grades</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div>
            <h3 class="box-title">
                Grades&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h3>
            <div class="panel-group" id="accordion">
                @foreach($grades as $key => $value)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><b>Section {{$value['section']->name }}</b> | <b>School Year {{$value['section']->school_year}}</b></a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>1st Grading</th>
                                            <th>2nd Grading</th>
                                            <th>3rd Grading</th>
                                            <th>4th Grading</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($value['schedules'] as $k => $v)
                                        <tr>
                                            <td>{{$v->subject()->first()->name}}</td>
                                            <td>{{!empty($v->grade->g1st) ? $v->grade->g1st : 'null'}}</td>
                                            <td>{{!empty($v->grade->g2nd) ? $v->grade->g2nd : 'null'}}</td>
                                            <td>{{!empty($v->grade->g3rd) ? $v->grade->g3rd : 'null'}}</td>
                                            <td>{{!empty($v->grade->g4th) ? $v->grade->g4th : 'null'}}</td>
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
