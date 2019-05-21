@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Student Profile</h4>
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
    <div class="col-md-12">
        <div class="white-box">
            <form action="{{ route('get.ohshit') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="name">First Name</label>
                            <input required value="{{ auth()->user()->student->first_name }}" id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="name">Last Name</label>
                            <input required value="{{ auth()->user()->student->last_name }}" id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="name">Middle Name</label>
                            <input required value="{{ auth()->user()->student->middle_name }}" id="middle_name" name="middle_name" type="text" placeholder="Middle Name" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="nickname">Nickname</label>
                            <input required value="{{ auth()->user()->student->nickname }}" id="nickname" name="nickname" type="text" placeholder="Nickname" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="address">Complete Address</label>
                            <textarea required style="resize:none" rows="5" id="address" name="address" placeholder="Complete Address" class="form-control input-md">{{ auth()->user()->student->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="contact_number">Contact Number</label>
                            <input required value="{{ auth()->user()->student->contact_number }}" id="contact_number" name="contact_number" type="text" placeholder="Contact Number" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input required value="{{ auth()->user()->email }}" id="email" name="email" type="email" placeholder="Email" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="birthdate">Birthdate</label>
                            <input required value="{{ auth()->user()->student->birthdate }}" id="birthdate" name="birthdate" type="date" placeholder="Birthdate" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="gender">Gender</label>
                            <select required id="gender" name="gender" class="form-control">
                                <option {{ auth()->user()->student->gender === null ? 'selected' : '' }} disabled>Select Gender</option>
                                <option value="male" {{ auth()->user()->student->gender === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ auth()->user()->student->gender === 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="civil_status">Civil Status</label>
                            <select required id="civil_status" name="civil_status" class="form-control">
                                <option {{ auth()->user()->student->civil_status === null ? 'selected' : '' }} disabled>Select Civil Status</option>
                                <option value="single" {{ auth()->user()->student->civil_status === 'single' ? 'selected' : '' }}>Single</option>
                                <option value="married" {{ auth()->user()->student->civil_status === 'married' ? 'selected' : '' }}>Married</option>
                                <option value="divorced" {{ auth()->user()->student->civil_status === 'divorced' ? 'selected' : '' }}>Divorced</option>
                                <option value="separated" {{ auth()->user()->student->civil_status === 'separated' ? 'selected' : '' }}>Separated</option>
                                <option value="widowed" {{ auth()->user()->student->civil_status === 'widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="religion">Religion</label>
                            <input id="religion" value="{{ auth()->user()->student->religion }}" name="religion" type="text" placeholder="Religion" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="nationality">Nationality</label>
                            <input id="nationality" value="{{ auth()->user()->student->nationality }}" name="nationality" type="text" placeholder="Nationality" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="guardian_name">Guardian's Name</label>
                            <input id="guardian_name" value="{{ auth()->user()->student->guardian_name }}" name="guardian_name" type="text" placeholder="Guardian's Name" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="guardian_relation">Guardian's Relation</label>
                            <input id="guardian_relation" value="{{ auth()->user()->student->guardian_relation }}" name="guardian_relation" type="text" placeholder="Guardian's Relation" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="guardian_contact">Guardian's Contact Number</label>
                            <input id="guardian_contact" value="{{ auth()->user()->student->guardian_contact }}" name="guardian_contact" type="text" placeholder="Guardian's Contact Number" class="form-control input-md">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn form-control btn-default">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
