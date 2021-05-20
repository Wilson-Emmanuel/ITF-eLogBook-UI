@extends('manager.dash')
@section('content')
<h1>Hello, {{$user->getInfo()->getFullName()}}</h1>
<div class="row">
    <div class="text-center col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Profile</h4></div>
            <div class="panel-body">
                <!--


                                                Table -->
                <table class="table table-striped table-active">
                    <tr>
                        <th>Full Name: </th>
                        <td>{{$user->getInfo()->getFullName()}}</td>
                    </tr>
                    <tr>
                        <th>Email: </th>
                        <td>{{$user->getInfo()->getEmail()}}</td>
                    </tr>
                    <tr>
                        <th>Phone: </th>
                        <td>{{$user->getInfo()->getPhone()}}</td>
                    </tr>

                </table>
                <h4 class="text-secondary">Company Details</h4>
                <table class="table table-striped table-active">
                    <tr>
                        <th>Company Name: </th>
                        <td>{{$user->getCompanyName()}}</td>
                    </tr>
                    <tr>
                        <th>Company Address: </th>
                        <td>{{$user->getCompanyAddress()}}</td>
                    </tr>
                    <tr>
                        <th>Company Type: </th>
                        <td>{{$user->getCompanyType()}}</td>
                    </tr>
                    <tr>
                        <th>State: </th>
                        <td>{{$user->getCompanyState()}}</td>
                    </tr>

                </table>
            </div>
        </div>

    </div>

</div>
<div class="row">
    <div class="text-center col-xs-8 col-xs-offset-2 gutter">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><h4 class="text-secondary">Update Password</h4></div>
            <div class="panel-body">
                <form class="form" action="/update_password" method="post">
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
                        <label for="password" class="text-info">New Password <span class="text-danger">*</span></label><br>
                        <input type="text" value="{{old('password')}}" required name="password" placeholder="Password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-md"><i class="fas fa-edit"></i> Update</button>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
@endsection
