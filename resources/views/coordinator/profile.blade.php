@extends('coordinator.dash')
@section('content')
<h1>Hello, {{$user->getInfo()->getFullName()}}</h1>
@include('coordinator.snippets.profile',['coordinator'=>$user])
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
