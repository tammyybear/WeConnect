@extends('layouts.dashboard')
@section('styles')
<style>
.modal-fullscreen {
padding: 0 !important;
}
.modal-fullscreen .modal-dialog {
width: 100%;
height: 100%;
margin: 0;
padding: 0;
}
.modal-fullscreen .modal-content {
height: auto;
min-height: 100%;
border: 0 none;
border-radius: 0;
}
</style>
@endsection
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Admission</h4>
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
    <div class="alert alert-danger">
        {{$errors->first()}}
    </div>
    @endif
</div>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="#" data-toggle="modal" data-target="#addModal">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Manual Add Student</h5>
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
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('get.admission.unverified-student') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Unverified Students</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{ $students_count }}</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('get.admission.oldstud') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">List of Students</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{ $old_stud }}</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('get.admission.rooms') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Rooms</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{ $room_count }}</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('get.admission.subjects') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Subjects</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{ $subject_count }}</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="{{ route('get.admission.sections') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Sections</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{ $section_count }}</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @include('modules.admission.includes.manualAddStudent')
</div>
@endsection
