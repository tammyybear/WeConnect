@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Clinic</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('clinic.index')}}">Clinic</a></li>
            <li class="active">Inventory</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">
                List of Inventories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn"  data-toggle="modal" data-target="#addModalFile">Add Inventory</button>
            </h3>
            <div class="table-responsive">
                <table class="table" id="fileTable">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Count</th>
                            <th>Remarks</th>
                            <th>Date added</th>
                            <th>Added by</th>
                            <th>Updated by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventories as $inventory)
                        <tr>
                            <td>{{$inventory->item}}</td>
                            <td>{{$inventory->count}}</td>
                            <td>{{$inventory->remarks}}</td>
                            <td>{{$inventory->date}}</td>
                            <td>{{$inventory->created_by}}</td>
                            <td>{{$inventory->updated_by}}</td>
                            <td>
                                <button data-id="{{$inventory->id}}" id="btnEdit" class="btn btn-primary">Edit</button>
                                <button data-id="{{$inventory->id}}" id="btnDelete" class="btn btn-warning">Delete</button>
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
@include('modules.clinic.includes.inventory_add_modal')
@include('modules.clinic.includes.inventory_edit_modal')
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#fileTable').DataTable();
    });
    $('[id=btn-upload]').on('click', function(){
        $('[id=file]').click();
    });
    $(document).on('click','[id=btnEdit]',function(){
        var id = $(this).data('id');
        var route = "{{ route('clinic.inventory.edit.view') }}";
        $.ajax({
         method: 'post',
         url: route,
         data:{
             '_token': $('input[name=_token]').val(),
             'id': id,
             },
         jsonp: false,
         success: function(data){
            $('[id=inv_id]').val(data.id);
            $('[id=item]').val(data.item);
            $('[id=count]').val(data.count);
            $('[id=date]').val(data.date);
            $('[id=remarks]').val(data.remarks);
            $('[id=editModalFile]').modal();
           }
         });

    });
    $(document).on('click','[id=btnDelete]',function(){
        var id = $(this).data('id');
        var route = "{{ route('clinic.inventory.delete') }}";
        var yesno = confirm('Do you want to delete this file?');
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
