<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('get.admission.edit.sections') }}" method="post">
            <input type="hidden" name="id" id="section_id">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Section</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-3">
                            <h5><label for="grade_level">Grade Level:</label></h5>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control" name="grade_level" id="grade_level">
                                @for($i = 7; $i <=10; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <h5><label for="school_year">School Year:</label></h5>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control" name="school_year" name="school_year" id="school_year">
                                @for($i = date('Y'); $i >= 1990; $i--)
                                    <option value="{{$i}} - {{$i+1}}">{{$i}} - {{$i+1}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3">
                            <h5><label for="name">Name:</label></h5>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3">
                            <h5><label for="adviser">Adviser:</label></h5>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="adviser_id" id="adviser_id">
                                @foreach($faculty as $fac)
                                <option value="{{$fac->id}}">{{$fac->first_name}} {{ $fac->middle_name }} {{$fac->last_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3">
                            <h5><label for="adviser">Room:</label></h5>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="room_id" id="room_id">
                                @foreach($rooms as $room)
                                <option value="{{$room->id}}">{{$room->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
