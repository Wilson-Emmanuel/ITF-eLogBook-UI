@extends('student.dash')
@section('content')
<h2>Hello, {{$student->getInfo()->getFullName()}}</h2>
<div class="row">
    <div class=" col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Fill LogBook</h4></div>
            <div class="panel-body">
                <form class="form" action="/student/logbook" method="post">
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
                        <label for="date" class="text-info">Date <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{$date}}" readonly required name="date"  id="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="task" class="text-info">Task <span class="text-danger">*</span></label><br>
                        <textarea  value="{{$task}}" required name="task"  id="task" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="week" value="{{$week}}">
                    <input type="hidden" name="day" value="{{$day}}">

                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-md"><i class="fas fa-book-open"></i> Submit</button>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
@endsection
