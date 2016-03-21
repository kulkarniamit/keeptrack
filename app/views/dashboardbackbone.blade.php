@extends('layouts.users.userdefault')
    @section('meta')
	{{-- Extending the meta from main layout --}}
	@parent
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
        <meta name="keywords" content="job search,job track, application track,internships,co-op,co-op track">
    @stop

    @section('title')
	{{-- Write your Page Title Here --}}
        Welcome {{ Auth::user()->first_name}} | KeepTrack
    @stop

    @section('stylesheets')
	@parent
        {{ HTML::style('assets/css/modaloverrides.css')}}

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
                margin: 10px auto;
                overflow: hidden;
                padding: 5px;
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.208);
            }
            .jobcompany{
                background-color: #eee;
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
    @stop

    @section('content')

        <div class="welcome-heading col-xs-12">
            Welcome {{ Auth::user()->first_name}}!
        </div>

        <div class="dashboard-container col-xs-12">
            @if (Session::has('addition_success_message'))
                {{--<div class="col-xs-12">--}}
                    <p class="alert alert-success center-content">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>

                        <span class="glyphicon glyphicon-ok-sign" style="padding-right:5px;"></span>
                        {{ Session::get('addition_success_message') }}
                    </p>
                {{--</div>--}}
            @endif

            @if (Session::has('message'))
                {{--<div class="col-xs-12">--}}
                    <p class="alert alert-success center-content">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>

                        <span class="glyphicon glyphicon-ok-sign" style="padding-right:5px;"></span>
                        {{ Session::get('message') }}
                    </p>
                {{--</div>--}}
            @endif

            <div class="metrodisplay col-xs-12 col-md-3">
                <div class="col-xs-12 col-md-12 clearfix" style="float: none; margin: 1px auto;">
                    <div class="col-xs-12 col-md-6 patakha">
                        <div class="col-xs-12 col-md-12 stats">
                            <div class="col-xs-12" style="text-align: center; font-size: 14px; font-weight: 300; padding: 1px 0px;">
                                # Applied
                            </div>
                            <div class="col-xs-12 no" style="text-align: center; font-size: 36px; font-weight: 800; line-height: 1.5;">
                                {{$numberOfApplications}}
                            </div>
                        </div>
                        <a href="addapplication" class="btn btn-success col-xs-12 col-md-12" style="margin-top:2px;"  title="Add a job application">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ADD</a>
                    </div>
                </div>
            </div>

            {{--An Experimental View block--}}
            <div id="content">

            </div>

            {{--<div class="col-xs-12 col-md-7 jobscontainer">--}}
                {{--<div class="col-xs-12 col-md-12 jobcompany">--}}
                    {{--<div class="col-md-8 companytitle">--}}
                        {{--Hewlett-Packard--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 editdelete companyedit">--}}
                        {{--<button type="button" class="btn btn-default editbutton" aria-label="Left Align">--}}
                            {{--<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>--}}
                        {{--</button>--}}
                        {{--<button type="button" class="btn btn-danger trashbutton" aria-label="Left Align">--}}
                            {{--<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>--}}
                        {{--</button>--}}
                    {{--</div>--}}

                {{--</div>--}}
                {{--<div class="jobdetailbox">--}}
                    {{--<div class="col-md-3 detaillabel">Job #</div>--}}
                    {{--<div class="col-md-9 detailinfo">--}}
                        {{--<div class="jobid">978978</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="jobdetailbox">--}}
                    {{--<div class="col-md-3 detaillabel">Job Link</div>--}}
                    {{--<div class="col-md-9 detailinfo">--}}
                        {{--<div class="joblink"><a href="http://www.google.com">Link</a></div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="jobdetailbox">--}}
                    {{--<div class="col-md-3 detaillabel">Role</div>--}}
                    {{--<div class="col-md-9 detailinfo">--}}
                        {{--<div class="jobrole">System Software Intern</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="jobdetailbox">--}}
                    {{--<div class="col-md-3 detaillabel">Applied on</div>--}}
                    {{--<div class="col-md-9 detailinfo">--}}
                        {{--<div class="jobdate">26th Jan, 2016</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            </div>
        </div>
    @stop

    @section('js')
        {{-- Include your page JS Here --}}
        @parent
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js')}}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js')}}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0-alpha.2/handlebars.min.js')}}
        {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.2.0/bootbox.min.js')}}
        @include('layouts.users.job-story-template')
        {{ HTML::script('assets/js/dashboard-backbone.js') }}

    @stop