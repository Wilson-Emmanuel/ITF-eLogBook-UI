@extends('itf.itf_dash')
@section('content')

<div class="row">
    <div class=" col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">New ITF Staff</h4></div>
            <div class="panel-body">
                <form class="form" action="/itf/create_staff" method="post">
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
                        <h4 class="text-center">Staff Details</h4>
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
                        <label for="staffNo" class="text-info">Staff ID. <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('staffNo')}}" required name="staffNo" placeholder="Staff No." id="staffNo" class="form-control">
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
                        <label for="branch" class="text-info">Branch <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('branch')}}"  required name="branch" placeholder="Branch" id="branch" class="form-control">
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
