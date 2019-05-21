@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Request Form</h4>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of request form&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </h3>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Request</th>
                            <th>Code</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($fuckshit as $gago)
                    <tr>
                        <td>{{$gago->name}}</td>
                        <td>{{$gago->request}}</td>
                        <td>{{$gago->code}}</td>
                        <td>{{$gago->updated_at}}</td>
                        <td>
                            <form onsubmit="return confirm('Are you sure?');" action="{{route('checkheck')}}" method="post">
                {{ csrf_field() }}
                                <input type="checkbox" {{ $gago->is_checked ? 'checked disabled' : ''}} name="is_checked" onchange="this.form.submit();">
                                <input type="hidden" name="id" value="{{$gago->id}}">
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
        $('#datatable').DataTable();
    });
    $(document).on('click','[id=btnEdit]', function(){
        var id = $(this).data('id');
        var route = "{{ route('get.admission.rooms.details') }}";
        $.ajax({
         method: 'get',
         url: route,
         data:{
             '_token': $('input[name=_token]').val(),
             'id': id,
             },
         jsonp: false,
         success: function(data){
            $("[id=room_id]").val(data.id);
            $("[id=room_name]").val(data.name);
            $("[id=editModal]").modal();
         }
         });
    });
    $(document).on('click','[id=btnDelete]', function(){
        var id = $(this).data('id');
        var route = "{{ route('get.delete.rooms.details') }}";
        var yesno = confirm('Do you want to delete this room?');
        if (yesno) {
            $.ajax({
             method: 'post',
             url: route,
             data:{
                 '_token': $('input[name=_token]').val(),
                 'id': id,
                 },
             jsonp: false,
             success: function(data){
              location.reload();
               }
             });
        }
    });
</script>
@endsection
