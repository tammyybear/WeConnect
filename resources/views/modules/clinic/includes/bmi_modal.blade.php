
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form  action="{{ route('post.bmi.student.post') }}"  method="post" >
            <div class="modal-content">
                <div class="modal-header">
                    <a type="button" class="close" data-dismiss="modal">&times;</a>
                    <h4 class="modal-title">BMI</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="student_id" id="student_id" value="{{$id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="weight">Weight (kg)</label>
                            <input type="text" class="form-control" name="weight" id="weight">
                        </div>
                        <div class="col-md-3">
                            <label for="mheight">Height (meters)</label>
                            <input type="text" class="form-control" name="height" id="mheight">
                        </div>
                        <div class="col-md-3">
                            <label for="height">Height (meters<sup>2</sup>)</label>
                            <input type="text" class="form-control" name="mheight" id="height" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" name="birthday" id="age">
                        </div>
                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="bmi">Body Mass Index (BMI)</label>
                            <input type="text" class="form-control" name="bmi" id="bmi" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="result">Result</label>
                            <select name="result" id="result_text" class="form-control">
                                <option value="underweight">Underweight</option>
                                <option value="normal">Normal</option>
                                <option value="overweight">Underweight</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="section_id">Current section</label>
                            <select name="section_id" id="section_id" class="form-control">
                                @foreach($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}} ({{$section->school_year}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="month">Month</label>
                            <select name="month" id="month" class="form-control">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="year">Year</label>
                            <select name="years" id="year" class="form-control">
                                @for($i = date('Y');$i>=1990;$i--)
                                <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
