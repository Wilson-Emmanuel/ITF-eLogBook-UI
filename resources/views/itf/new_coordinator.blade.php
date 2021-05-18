@extends('itf.itf_dash')
@section('content')

<div class="row">
    <div class=" col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">New Coordinator</h4></div>
            <div class="panel-body">
                <form class="form" action="/itf/create_coordinator" method="post">
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
                        <h4 class="text-center">Coordinator Details</h4>
                    </div>
                    <div class="form-group">
                        <label for="firstName" class="text-info">First Name <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('firstName')}}" required name="firstName" placeholder="First Name" id="firstName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="text-info">Last Name <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('lastName')}}" required name="lastName" placeholder="Last Name" id="lastName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-info">Email <span class="text-danger">*</span></label><br>
                        <input type="email" value="{{old('email')}}" required name="email" placeholder="Email Address" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="text-info">Phone <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('phone')}}" pattern="^[0-9]{11}$" required name="phone" placeholder="Phone" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-info">Initial Password <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('password')}}" required name="password" placeholder="Password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <h4 class="text-center">School Details</h4>
                        <span class="text-muted">Select School If does not exists yet</span>
                    </div>
                    <div class="form-group">
                        <label for="department" class="text-info">Department <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('department')}}"  required name="department" placeholder="Department" id="department" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="school" class="text-info">School <span class="text-danger">*</span></label><br>
                        <select type="text"   required name="school" id="school" class="form-control">
                            <option value="0">New</option>
                            @foreach($schools as $sc)
                                <option value="{{$sc->getId()}}">{{$sc->getName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="schoolName" class="text-info">School Name <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('schoolName')}}"   name="phone" placeholder="School Name" id="schoolName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="schoolAddress" class="text-info">School Address <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('schoolAddress')}}"   name="schoolAddress" placeholder="School Address" id="schoolAddress" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="schoolState" class="text-info">State <span class="text-danger">*</span></label><br>
                        <select type="text"    name="schoolState" id="schoolState" class="form-control">
                            @foreach($states as $state)
                            <option value="{{$state->getName()}}">{{$state->getName()}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary btn-md" ><i class="fas fa-plus-square"></i> Create</button>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
@endsection
