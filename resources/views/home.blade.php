<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ITF Electronic Logbook - Homepage</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('img/ebsu.png') }}" />


          <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('home/styles.css') }}" rel="stylesheet">

    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container">
            <img src="{{asset('img/ebsu.png')}}" class="img-thumbnail " width="50" height="50" alt="ebsu logo">
                <a class="navbar-brand" href="{{route('itf_dashboard')}}">  ITF e-Logbook</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            @guest
                            <a class="nav-link" href="{{route('login')}}">Log In</a>
                            @else
                            <a class="nav-link" href="{{route('logout')}}">Log Out</a>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container">
			<div class="row">
				<div class="col-sm">
   					<h1 class="masthead-heading mb-0">ITF eLogbook</h1>
                    			<h2 class="masthead-subheading mb-0">for IT Students</h2>
                    			@guest
                                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="{{route('login')}}">Login</a>
                                @else
                                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="{{route('logout')}}">Logout</a>

                                @endguest
				</div>
				<div class="col-sm">
 					<img src="{{asset('img/logbook2.jpg')}}" class="img-thumbnail" alt="home page image">
				</div>
			 </di>

                </div>
            </div>

        </header>



        <!-- Footer-->
        <footer class="py-2 bg-black">
            <div class="container"><p class="m-0 text-bold text-center small">Copyright &copy; ITF e-Logbook. Designed and Implemented by Onyibe Godstime 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->

    </body>
</html>
