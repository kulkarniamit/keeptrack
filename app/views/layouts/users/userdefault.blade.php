<!DOCTYPE html>
<html lang="en">
  <head>
    @section('meta')  
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<link rel="shortcut icon" href="{{URL::to('assets/images/leaplogo_64x64.png')}}">--}}
    {{-- Extend your custom meta here --}}
    @show
    
    <title>
	    @yield('title')
    </title>
    
    @section('stylesheets')
        {{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')}}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300')}}
        {{ HTML::style('assets/css/top-navbar-fixed-top.css') }}
	    {{ HTML::style('assets/css/base.css')}}
        <style>
            .dropdown-menu > li > a:focus, .dropdown-menu > li > a:hover {
                background-color: #339933;
                color: #FFF;
                text-decoration: none;
            }
            .dropdown-menu > .active > a, .dropdown-menu > .active > a:focus, .dropdown-menu > .active > a:hover {
                background-color: #339933;
                color: #fff;
                outline: 0 none;
                text-decoration: none;
            }
            .dropdown-menu .divider{
                margin: 0px;
            }
        </style>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        {{ HTML::style('assets/css/ie10-viewport-bug-workaround.css') }}
    @show

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]
    -->

  </head>

  <body>
                        {{-- Content that has to go to every page --}}
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                @if (Auth::check())
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @endif

                <a class="navbar-brand" href="/">KeepTrack <span class="glyphicon glyphicon-ok-sign" style="color: #339933;"></span> </a>

            </div>

            @if (Request::is('register'))
                <div class="navbar-collapse collapse" id="navbar">
                    <div class="navbar-form navbar-right">
                        <a class="btn btn-success" href="{{URL::to('login')}}">
                            Login
                        </a>
                    </div>
                </div><!--/.nav-collapse -->
            @elseif(Request::is('login'))
                <div class="navbar-collapse collapse" id="navbar">
                    <div class="navbar-form navbar-right">
                        <a class="btn btn-success" href="{{URL::to('register')}}">
                            Register
                        </a>
                    </div>
                </div><!--/.nav-collapse -->
            @endif

            @if (Auth::check())
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{URL::to('dashboard')}}">
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-bell"></span>
                            </a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-align-justify"></span>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings</a></li>
                                <li class="divider"></li>
    {{--                            <li><a href="{{URL::route('emp_password_change')}}">Change Password</a></li>--}}
                                <li><a href="{{URL::to('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            @endif
        </div>
    </nav>
						{{-- End of Content that has to go to every page --}}

	<div class="container">
	    @yield('content')
            
            <!-- FOOTER -->
              <footer>
                  <div>
                    <div class="col-xs-12 col-md-12 " style="margin: 10px auto; border-top: 1px solid #EEE; padding: 5px auto;">
                        {{--<a href="{{ URL::to('/privacy') }}">Privacy</a> &middot;--}}
                         {{--<a href="{{ URL::to('/terms') }}">Terms</a> &middot;--}}
                    </div>
                    <div class="col-xs-12 col-md-12 footerstyle">
                        <p>Made with Keyboard and <span class="glyphicon glyphicon-heart" style="color: #B30000;"></span> in NYC</p>
                    </div>
                </div>
              </footer>
	</div>

    @section('js')
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	{{-- jQuery has to be included because our common.js uses jQuery functions to accomplish some tasks --}}
	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')}}
    {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{ HTML::script('assets/js/ie10-viewport-bug-workaround.js') }}
    @show
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-75278990-1', 'auto');
        ga('send', 'pageview');
    </script>
  </body>
</html>
