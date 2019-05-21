@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">User Management</h4>
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
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <a href="#" data-toggle="modal" data-target="#addModal">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">New User</h5>
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
        <a href="{{ route('get.user-by-role') }}">
            <div class="white-box">
                <div class="col-in row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <i data-icon="E" class="linea-icon linea-basic"></i>
                        <h5 class="text-muted vb">Users</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h3 class="counter text-right m-t-15 text-danger">{{ $users->count() }}</h3>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <hr>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @include('modules.user.includes.modalAddUser')
</div>
@endsection
