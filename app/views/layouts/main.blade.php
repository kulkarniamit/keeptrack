<!DOCTYPE html>
<html lang="en">
  <head>
    @section('meta')  
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{URL::to('assets/images/favicon.ico')}}">
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
                {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">--}}
                    {{--<span class="sr-only">Toggle navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}
                <a class="navbar-brand" href="/">KeepTrack <span class="glyphicon glyphicon-ok-sign" style="color: #339933;">

                    </span> </a>
            </div>
            {{--<div id="navbar" class="navbar-collapse collapse">--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li class="active"><a href="#">Home</a></li>--}}
                {{--</ul>--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<li class=""><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>--}}
                {{--</ul>--}}
            {{--</div><!--/.nav-collapse -->--}}
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

  </body>
</html>
