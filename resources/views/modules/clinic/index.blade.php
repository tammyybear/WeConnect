@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Clinic</h4>
    </div>
</div>
<div class="row">
{{-- <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('clinic.bmi') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Body Mass Index</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('clinic.deworming') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Deworming</h5>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('clinic.folic') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Folic Acid</h5>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('clinic.feeding') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Feeding Program</h5>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('clinic.nutritional') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Nutritional Structure</h5>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('clinic.seminars') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Wins (Wash) & Seminars</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{$seminars_count}}</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div> --}}
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('clinic.logs') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Logs</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{ $logs_count }}</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
{{--     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('clinic.files') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Files</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{ $files_count }}</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div> --}}
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('clinic.inventory.get') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Inventory</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">#</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
</div>
@endsection
