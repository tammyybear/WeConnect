<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{route('get.schedules.add')}}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sections</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                         <div class="col-sm-1">
                            <h5><label for="name">Start Time:</label></h5>
                        </div>
                        <div class="col-sm-5">
                            <div class="col-sm-4">
                            <select name="shour" class="form-control" id="ashour">
                                @for($i = 1; $i <=12; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <select name="sminute" class="form-control">
                                @for($i = 0; $i <= 59; $i++)
                                @if($i < 10)
                                <option value="{{'0'.$i}}">{{'0'.$i}}</option>
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                                @endfor
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <select name="sampm" class="form-control" id="asampm">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                            </div>
                        </div>
                         <div class="col-sm-1">
                            <h5><label for="name">End Time:</label></h5>
                        </div>
                        <div class="col-sm-5">
                            <div class="col-sm-4">
                            <select name="ehour" class="form-control" id="aehour">
                                @for($i = 1; $i <=12; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <select name="eminute" class="form-control">
                                @for($i = 0; $i <= 59; $i++)
                                @if($i < 10)
                                <option value="{{'0'.$i}}">{{'0'.$i}}</option>
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                                @endfor
                            </select>
                            </div>
                            <div class="col-sm-4">
                            <select name="eampm" class="form-control" id="aeampm">
                                <option value="AM">AM</option>
                                <option value="PM">PM</option>
                            </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3">
                            <h5><label for="name">Days:</label></h5>
                        </div>
                        <div class="col-sm-9">
                            <select name="days[]" class="selectpicker" multiple>
                                @foreach($days as $day)
                                <option value="{{$day}}">{{$day}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3">
                            <h5><label for="adviser">Teacher:</label></h5>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="user_id">
                                @foreach($faculty as $fac)
                                <option value="{{$fac->id}}">{{$fac->first_name}} {{ $fac->middle_name }} {{$fac->last_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-3">
                            <h5><label for="adviser">Section:</label></h5>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control" name="section_id">
                                @foreach($sections as $section)
                                <option value="{{$section->id}}">{{$section->name}}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="col-sm-2">
                            <h5><label for="adviser">Subject:</label></h5>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" name="subject_id">
                                @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
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
