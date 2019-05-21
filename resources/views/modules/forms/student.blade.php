@extends('layouts.dashboard')
@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Student Request Form</h4>
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
    <div class="col-md-12">
        <div class="white-box">
            <form action="{{ route('post.student.fuckshit') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            <input required value="{{ old('name') }}" id="name" name="name" type="text" placeholder="Name" class="form-control input-md">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="request">Request Document</label>
                            <select required id="request" name="request" class="form-control">
                                <option {{ old('request') === null ? 'selected' : '' }} disabled>Select Request Document</option>
                                <option value="FORM 137" {{ old('request') === 'FORM 137' ? 'selected' : '' }}>FORM 137</option>
                                <option value="Good Moral Character" {{ old('request') === 'Good Moral Character' ? 'selected' : '' }}>Good Moral Character</option>
                                <option value="Certificate of Enrollment" {{ old('request') === 'Certificate of Enrollment' ? 'selected' : '' }}>Certificate of Enrollment</option>

                                <option value="gago">Others</option>


                            </select>



                        </div>
                    </div>
                                     <div class="col-md-12"></div>

                                     <div class="col-md-12">
                        <div class="form-group">
                            <input style="display: none;" type="text" placeholder="OTHERS" class="form-control input-md" name="request_text" id="text-request">
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn form-control btn-default">Apply</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
      <script>
                                $('#request').on('change', function() {
                                    if($(this).val() == 'gago') {
                                        $('#text-request').show();
                                    } else {
                                        $('#text-request').hide();
                                        $('#text-request').val('');


                                    }
                                });
                            </script>

@stop
