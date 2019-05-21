@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Non-acad</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of Non-acad&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn"  data-toggle="modal" data-target="#addModal">Add</button>
            </h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($xafasasfasg as $room)
                    <tr>
                        <td>{{$room->name}}</td>
                        <td>
                            <form onsubmit="console.log('WHATS GOOD IN THE HOOD'); return confirm('Are you sure you want to delete this data ?');" action="{{route('student.pekpek')}}" method="POST" >
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$room->id}}">
                                <button class="btn btn-default" type="submit">Delete</button>
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
@include('asd')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#datatable').DataTable();
    });
</script>
@endsection
