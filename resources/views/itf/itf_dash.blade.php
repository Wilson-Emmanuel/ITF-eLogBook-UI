<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ITF Electronic Logbook - Dashboard</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/ebsu.png') }}" />


          <!-- Core theme CSS (includes Bootstrap)-->
          <link href="{{asset('assets/dash_bootstrap.min.css')}}" rel="stylesheet">
          <link href="{{asset('assets/all.min.css')}}" rel="stylesheet">

          <link href="{{asset('assets/dash.css')}}" rel="stylesheet">




    </head>

    <body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="text-center">
                    <a hef="home.html"><img src="{{asset('img/dash_logo.png')}}" width=50 height=60 alt="merkery_logo" >
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="{{route('itf_dashboard')}}"><i class="fas fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Account</span></a></li>
                        <li><a href="#"><i class="fas fa-university" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Schools</span></a></li>
                        <li><a href="#"><i class="fas fa-user-tag" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Coordinators</span></a></li>
                        <li><a href="#"><i class="fas fa-user-graduate" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Students</span></a></li>

                     </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="{{route('itf_dashboard')}}">Profile</a></li>
                                <li><a href="{{route('itf_show_create_coordinator')}}">Create Coordinator</a></li>
                                <li><a href="#">Manage Coordinators</a></li>
                                <li><a href="#">Manage Students</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Schools</a></li>
                            </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li class="hidden-xs"><a href="{{route('itf_show_create_coordinator')}}" class=" btn-primary btn-sm" >Add IT Coordinator</a></li>
<!--                                    <li class="hidden-xs"><a href="#" class=" btn-primary btn-sm" data-toggle="modal" data-target="#add_project">Add IT Coordinator</a></li>-->
                                    <!-- <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">3</span>
                                        </a>
                                    </li> -->
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- <img src="http://jskrishna.com/work/merkury/images/user-pic.jpg" alt="user"> -->
<!--                                            <b class="caret"></b></a>-->
                                        <i class="fas fa-arrow-circle-down"></i>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span>{{$user->getInfo()->getFullName()}}</span>
                                                    <p class="text-muted small">
                                                        {{$user->getInfo()->getEmail()}}
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="{{route('logout')}}" class="view btn-outline-warning btn-sm active">Log Out</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>


                <div class="user-dashboard">

                @yield('content')

                </div>

            </div>
        </div>

    </div>



    <!-- Modal -->
    <div id="add_project" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header login-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                            <input type="text" placeholder="Project Title" name="name">
                            <input type="text" placeholder="Post of Post" name="mail">
                            <input type="text" placeholder="Author" name="passsword">
                            <textarea placeholder="Desicrption"></textarea>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="cancel" data-dismiss="modal">Close</button>
                    <button type="button" class="add-project" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>
<footer class="py-2 bg-white">
            <div class="container"><p class="m-0 text-bold text-center small">Copyright &copy; ITF e-Logbook. Designed and Implemented by Onyibe Godstime 2021</p></div>

        </footer>
        <script src="{{asset('assets/dash_jquery-1.11.1.min.js')}}"></script>
       <script src="{{asset('assets/dash_bootstrap.min.js')}}"></script>


       <script src="{{asset('assets/dash.js')}}"></script>
   </body>

</html>
