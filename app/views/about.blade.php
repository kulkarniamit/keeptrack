
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

    <title>About us | KeepTrack</title>

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
                font-size: 12px;
                font-weight: 400;
                line-height: 2;
            }
        }
        .yell-md{
            font-size:60px;
            font-weight:700;
        }
        .yell-xs{
            font-size:32px;
            font-weight:700;
        }
    </style>
</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="masthead clearfix">
                <div class="inner">
                    <a href="/"><h3 class="masthead-brand">KeepTrack</h3></a>
                    <nav>
                        <ul class="nav masthead-nav">
                            <li>
                                <a href="login">
                                    <button aria-label="Left Align" class="btn btn-default btn-sm" type="button">Login</button>
                                </a>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="inner cover">
                <p class="yell-md hidden-xs hidden-sm">We were you!</p>
                <p class="yell-xs visible-xs visible-sm">We were you!</p>
                <p class="lead">Yes, we have been there and done that. Managing excel sheets,
                    forgetting to update the applied jobs, trying to recall an employer when they call,
                    sharing job listings with friends, you name it and we have done it both for internships and full-time jobs.
                    We are just a bunch of friends who saw the need for a central platform to store,
                    share and keep track of our applied jobs and thus was born "KeepTrack".
                    We are extremely happy with the overwhelming response for this simple v1.0 product from
                    our juniors at NYU.</p>
                <p class="lead">
			KeepTrack has helped students create and track over 5000 applications so far.
                    We continue to hear your feedback and would want to make this a better platform.
			Write to us at <a style="color:blue;" href="mail:support.keeptrack@yandex.com">KeepTrack Support</a>
                </p>
            </div>

            <div class="mastfoot">
                <div class="inner">
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
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75278990-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
