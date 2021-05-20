@extends('coordinator.dash')
@section('content')

<div class="row">
    <div class=" col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">New PPA/Manager</h4>
                <span class="text-muted text-warning">Ensure PPA is not already existing in the system.</span>

            </div>
            <div class="panel-body">
                <form class="form" action="/coordinator/create_manager" method="post">
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
                        <h4 class="text-center">Manager Details</h4>
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
                        <span class="text-muted text-sm-left"><i>At least 6 characters in length</i></span>
                    </div>
                    <div class="form-group">
                        <h4 class="text-center">Company Details</h4>
                    </div>
                    <div class="form-group">
                        <label for="companyName" class="text-info">Company Name <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('companyName')}}"  required name="companyName" placeholder="Company Name" id="company_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="company_address" class="text-info">Company Address <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('companyAddress')}}"  required name="companyAddress" placeholder="Company Address" id="company_address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="company_type" class="text-info">Company Address <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('companyType')}}"  required name="companyType" placeholder="e.g. Software or Bank" id="company_type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="state" class="text-info">Company State <span class="text-danger">*</span></label><br>
                        <select type="text"    name="state" id="state" required class="form-control">
                            @foreach(getStates() as $state)
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
