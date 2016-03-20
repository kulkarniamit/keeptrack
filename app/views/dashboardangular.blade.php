<!doctype html>
<html lang="en"> <head> <meta charset="UTF-8">
    <title>Welcome {{ Auth::user()->first_name}} | KeepTrack</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->


    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /assets/angularjs/ directory -->
    <script src="assets/angularjs/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <script src="assets/angularjs/services/jobapplicationservice.js"></script> <!-- load our service -->
    <script src="assets/angularjs/app.js"></script> <!-- load our application -->

    <style type="text/css">
        .welcome-heading {
            background-color: #FFF;
            padding: 10px;
            font-size: 20px;
            font-family: "Open Sans",Tahoma,Ubuntu,Helvetica;
            font-weight: 300;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.206);
        }
        .dashboard-container{
            background-color: #FFF;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.40);
            font-family: "Open Sans",Tahoma,Ubuntu,Helvetica;
            font-weight: 300;
            margin: 3px auto 10px;
            padding: 10px 10px;
            line-height: 2;
        }
        thead > tr> th{
            text-align: center;
            font-family: "Open Sans",Tahoma,Ubuntu,Helvetica;
            font-weight: 800;
        }
        tbody{
            font-size: 12px;
            text-align: center;
        }
        .metrodisplay{
            float: none;
            margin: 10px auto;
        }
        .patakha{
            padding: 1px;
            float: none;
            margin: 0 auto;
        }
        .stats{
            background-color: #339933;
            color: #fff;;
        }
        .center-content{text-align: center;}
        .jobscontainer{
            float: none;
            border: 1px solid #EEE;
            margin: 0 auto;
            overflow: hidden;
            padding: 5px;
        }
        .jobcompany{
            background-color: #CCC;
            padding:5px;
        }
        .editdelete{
            text-align: right;
        }
        .companytitle, .companyedit{
            padding: 0;
        }
        .trashbutton{
            padding:2px 6px;
            font-size:12px;
        }
        .editbutton{
            padding:2px 6px;
            font-size:12px;
        }
    </style>
</head>

<!-- declare our angular app and controller -->
<body class="container" ng-app="jobApp" ng-controller="mainController">
    <div class="col-md-8 col-md-offset-2">
        <div class="welcome-heading col-xs-12">
            Welcome {{ Auth::user()->first_name}}!
        </div>

        <div class="dashboard-container col-xs-12">
            @if (Session::has('addition_success_message'))
                <p class="alert alert-success center-content">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>

                    <span class="glyphicon glyphicon-ok-sign" style="padding-right:5px;"></span>
                    {{ Session::get('addition_success_message') }}
                </p>
            @endif

            @if (Session::has('message'))
                <p class="alert alert-success center-content">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>

                    <span class="glyphicon glyphicon-ok-sign" style="padding-right:5px;"></span>
                    {{ Session::get('message') }}
                </p>
            @endif

            <div class="metrodisplay col-xs-12 col-md-3">
                <div class="col-xs-12 col-md-12 clearfix" style="float: none; margin: 1px auto;">
                    {{--<div class="col-xs-12 col-md-6 patakha">--}}
                        {{--<div class="col-xs-12 col-md-12 stats">--}}
                            {{--<div class="col-xs-12" style="text-align: center; font-size: 14px; font-weight: 300; padding: 1px 0px;">--}}
                                {{--# Applied--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-12 no" style="text-align: center; font-size: 36px; font-weight: 800; line-height: 1.5;">--}}
                                {{--{{$numberOfApplications}}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<a href="addapplication" class="btn btn-success col-xs-12 col-md-12" style="margin-top:2px;"  title="Add a job application">--}}
                            {{--<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ADD</a>--}}
                    {{--</div>--}}
                </div>
            </div>

            {{--From tutorial and preserved for reference    --}}
            {{--<div class="comment" ng-hide="loading" ng-repeat="comment in comments">--}}
                {{--<h3>Comment #<% comment.id %> by <% comment.role %> on <% comment.applied_on %></h3>--}}
                {{--<p><% comment.company %></p>--}}
                {{--<p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>--}}
            {{--</div>--}}

            {{--An Experimental View block--}}
            <div class="col-xs-12 col-md-7 jobscontainer" ng-hide="loading" ng-repeat="job in jobs">
                <div class="col-xs-12 col-md-12 jobcompany">
                    <div class="col-md-8 companytitle">
                        <% job.company %>
                    </div>
                    <div class="col-md-4 editdelete companyedit">
                        <button type="button" class="btn btn-default editbutton" aria-label="Left Align">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>
                        <button type="button" class="btn btn-danger trashbutton" ng-click="deleteJob(job.id)" aria-label="Left Align">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </div>

                </div>
                <div class="jobdetailbox">
                    <div class="col-md-3 detaillabel">Job #</div>
                    <div class="col-md-9 detailinfo">
                        <div class="jobid"><% job.jobid %></div>
                    </div>
                </div>

                <div class="jobdetailbox">
                    <div class="col-md-3 detaillabel">Job Link</div>
                    <div class="col-md-9 detailinfo">
                        <div class="joblink"><a href="<% job.joblink %>">Link</a></div>
                    </div>
                </div>

                <div class="jobdetailbox">
                    <div class="col-md-3 detaillabel">Role</div>
                    <div class="col-md-9 detailinfo">
                        <div class="jobrole"><% job.role %></div>
                    </div>
                </div>

                <div class="jobdetailbox">
                    <div class="col-md-3 detaillabel">Applied on</div>
                    <div class="col-md-9 detailinfo">
                        <div class="jobdate"><% job.applied_on %></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>