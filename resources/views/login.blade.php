<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ITF Electronic Logbook - Login</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/ebsu.png') }}" />


          <!-- Core theme CSS (includes Bootstrap)-->
          <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet">
          <link href="{{asset('assets/all.min.css')}}" rel="stylesheet">

       <style>
                        body {
                /* background-image: linear-gradient(to left top, #17a2b8, #14abc4, #12b3d1, #11bcde, #12c5eb); */
                background: linear-gradient(
0deg
, #ff6a00 0%, #ee0979 100%);
                height: 100vh;
                }
                #login .container #login-row #login-column .login-box {
                margin-top: 120px;
                max-width: 600px;
                height: 320px;
                border: 1px solid #9C9C9C;
                background-image: linear-gradient(to bottom, #aec1c3, #a9b5b7, #bcc5c6, #cfd5d5, #e3e5e5);
                }
                #login .container #login-row #login-column .login-box #login-form {
                padding: 20px;
                }
                #login .container #login-row #login-column .login-box #login-form #register-link {
                margin-top: -85px;
                }
       </style>
       <script src="{{asset('assets/jquery.min.js')}}"></script>
       <script src="{{asset('assets/bootstrap.min.js')}}"></script>

    </head>

   <body>
   <div id="login">
    <h3 class="text-center text-white pt-5"><a class="navbar-brand" href="{{route('home')}}">  ITF e-Logbook</a></h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div class="login-box col-md-12">
                    <form id="login-form" class="form" action="/process_login" method="post">
                    {{ csrf_field() }}
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group mb-0" >
                  @error('message')
                      <div class='alert alert-danger '>
                          <span >
                            {{$message}}
                      &times;</span>
                      </div>
                  @enderror

               </div>
                        <div class="form-group">
                            <label for="username" class="text-info"><i class="fas fa-user"></i>:<span class="text-danger">*</span></label><br>
                            <input type="email" name="email" value="{{old('email')}}" placeholder="Email" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info"><i class="fas fa-lock"></i>: <span class="text-danger">*</span></label><br>
                            <input type="password" value="{{old('password')}}" name="password" placeholder="Password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="py-2 bg-white">
            <div class="container"><p class="m-0 text-bold text-center small">Copyright &copy; ITF e-Logbook. Designed and Implemented by Onyibe Godstime 2021</p></div>
        </footer>
   </body>
</html>
