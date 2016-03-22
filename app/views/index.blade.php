
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{URL::to('assets/images/favicon.ico')}}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    {{--<meta name="description" content="">--}}
    {{--<meta name="author" content="">--}}

    {{--<link rel="icon" href="../../favicon.ico">--}}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300')}}

    <title>Welcome to keeptrack</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')}}

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">--}}
    {{ HTML::style('assets/css/ie10-viewport-bug-workaround.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('assets/css/home-page-cover.css')}}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        html{
            background-color: #5cb85c;
        }
        body{
            font-family:'Open Sans',"Tahoma",'Segoe UI Light','Times New Roman';
            color: #FFF;
            text-shadow:0 1px 3px rgba(0,0,0,.5);
            font-size: 12px;
            background-color: #5cb85c;
        }
        .btn-default{border-radius: 0px;}
        h3{
            font-weight:300;
        }
        h1{
            font-weight: 800;
            font-size: 72px;
        }
        @media (min-width: 768px){
            .lead {
                    font-size: 14px;
            }
        }
    </style>

</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">KeepTrack</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            {{--<li class="active"><a href="#">Home</a></li>--}}
                            <li>
                                <a href="about" style="color: #FFF; font-weight: 500; font-size: 12px;">About us</a>
                            </li>
                            <li>
                                <a href="login">
                                    <button aria-label="Left Align" class="btn btn-default btn-sm" type="button">Login</button>
                                </a>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                {{--<h1 class="cover-heading">Track your job applications</h1>--}}
                <h1 class="cover-heading">Track</h1>

                <p class="lead">Maintain a list of your applied jobs, change status, track dates, tag friends for jobs and more...</p>
                <p class="lead">We will continue to add features based on your requests</p>
                <p class="lead">A Simple and Clean Interface awaits you</p>
                <p class="lead">
                    <a href="register" class="btn btn-lg btn-default">Register</a>
                </p>
            </div>

            <div class="mastfoot">
                <div class="inner">
                    <a href="https://twitter.com/intent/tweet?screen_name=keeptrackguys" class="twitter-mention-button" data-related="keeptrackguys">Tweet to @keeptrackguys</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    <p>Made with Keyboard and
                        <span class="glyphicon glyphicon-heart" style="color: #B30000;"></span> in NYC
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}

{{--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>--}}

{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{ HTML::script('assets/js/ie10-viewport-bug-workaround.js') }}
<script>
    var texts = ['Track','Save','Manage','Share','Tag','Jobs'];
    var i = 0;
    (function cycle() {
        $('h1').html(texts[i]);
        $("h1").fadeIn(700)
                .delay(1200)
                .fadeOut(700, cycle);
        i = ++i % texts.length;
    })();

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75278990-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
