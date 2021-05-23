@extends('coordinator.dash')
@section('content')
<div class="row">
    <div class=" col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Student Remark</h4></div>
            <div class="panel-body">
                <form class="form" action="/coordinator/update_remark" method="post">
                    {{ csrf_field() }}
                    <div class="form-group mb-0" >
                        @error('message')
                        <div class='alert alert-danger'>
                          <span >
                            {{$message}}
                      &times;</span>
                        </div>
                        @enderror

                        @isset($pageMessage)
                        <div class='alert alert-success' >
                          <span >
                            {{$pageMessage}}
                      </span>
                        </div>
                        @endisset

                    </div>
                    <div class="form-group">
                        <label for="fullname" class="text-info">Full Name</label><br>
                        <input type="text" value="{{$student->getInfo()->getFullName()}}" readonly required name="fullname"  id="fullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="regno" class="text-info">Reg. No.</label><br>
                        <input type="text" value="{{$student->getRegNo()}}" readonly required name="regno"  id="regno" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="remark" class="text-info">Remark <span class="text-danger">*</span></label><br>
                        <textarea  value="{{$student->getCoordinatorRemark()}}" required name="remark"  id="remark" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <span><a href="{{route('view_student',['student_id'=>encode_parameter($student->getId())])}}">{{$student->getInfo()->getFirstName()}}'s Profile</a> |
                         <a href="{{route('view_student_logbook',['student_id'=>encode_parameter($student->getId()),'week_no'=>1])}}">{{$student->getInfo()->getFirstName()}}'s Log Book</a></span>
                    </div>
                    <input type="hidden" name="studentId" value="{{encode_parameter($student->getId())}}">

                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-md"><i class="fas fa-pen-alt"></i> Submit Remark</button>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
@endsection
