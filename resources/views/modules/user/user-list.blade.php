@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">User Management</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('get.user-management') }}">User Management</a></li>
            <li class="active">Users</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session::get('flash_message') }}
        </div>
        @endif
        <div class="white-box">
            <div class="form-group">
                <form action="{{ route('get.user-by-role') }}" method="GET">
                    <select onchange="this.form.submit()" required id="role" name="role" class="form-control">
                        <option {{ Request::input('role') ? 'selected' : '' }} disabled>Select Role</option>
                        @foreach($roles as $role)
                        <option {{ Request::input('role') == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <div class="white-box">
            <h3 class="box-title">
            List of users&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            @foreach($roles as $role)
                            <th>{{ $role->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                        <td>{{ $user->id }}</td>

                            <?php $user_roles = $user->roles->pluck('id')->toArray();?>
                            <td>{{$user->first_name}} {{$user->middle_name}} {{$user->last_name}}</td>
                        <td>{{ $user->username }}</td>

                            @foreach($roles as $role)
                            <td>
                                <form action="{{ route('post.manage-roles')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user" value="{{ $user->id }}">
                                    <input type="hidden" name="role" value="{{ $role->id }}">
                                    <input onchange="this.form.submit();" type="checkbox" {{ in_array($role->id, $user_roles, true) ? 'checked' : '' }}>
                                </form>
                            </td>
                            @endforeach
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
        $('#datatable').DataTable();
    });
</script>
@endsection
