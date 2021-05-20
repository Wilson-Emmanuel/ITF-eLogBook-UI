@extends('itf.itf_dash')
@section('content')

<div class="row">
    <div class=" col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">New School</h4></div>
            <div class="panel-body">
                <form class="form" action="/itf/create_school" method="post">
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
                      &times;</span>
                        </div>
                        @endisset

                    </div>

                    <div class="form-group">
                        <label for="schoolName" class="text-info">School Name <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('schoolName')}}" required  name="schoolName" placeholder="School Name" id="schoolName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="schoolAddress" class="text-info">School Address <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('schoolAddress')}}"  required  name="schoolAddress" placeholder="School Address" id="schoolAddress" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="schoolState" class="text-info">State <span class="text-danger">*</span></label><br>
                        <select type="text"    name="schoolState" id="schoolState" required class="form-control">
                            @foreach(getStates() as $state)
                            <option value="{{$state->getName()}}">{{$state->getName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-md" ><i class="fas fa-plus-square"></i> Add</button>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
@endsection
