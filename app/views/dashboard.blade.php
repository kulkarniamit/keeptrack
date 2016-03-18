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
                /*border: 1px solid #000;*/
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

        </style>
    @stop

    @section('content')

        <div class="welcome-heading col-xs-12">
            Welcome {{ Auth::user()->first_name}}!
        </div>

        <div class="dashboard-container col-xs-12">
            @if (Session::has('addition_success_message'))
                <div class="col-xs-12">
                    <p class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>

                        <span class="glyphicon glyphicon-ok-sign" style="padding-right:5px;"></span>
                        {{ Session::get('addition_success_message') }}
                    </p>
                </div>
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
            <div class="col-center col-md-12">
                <div class="page-desc col-xs-12  table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>JOB #</th>
                            <th>Company</th>
                            <th>Job Description</th>
                            <th>Role</th>
                            <th>Applied on</th>
                        </tr>
                        </thead>
                        <tbody>

                        @for ($i = 0; $i < count($allApplications); $i++)
                            <tr class="clickableRow" href="#">
                                <td>{{ $i+1 }}</td>
                                <td>{{$allApplications[$i]->jobid}}</td>
                                <td>{{$allApplications[$i]->company}}</td>
                                <td>
                                    @if ($allApplications[$i]->joblink != '')
                                        <a href="{{$allApplications[$i]->joblink}}" title="Link to Job Description">Link</a>
                                        {{--{{$allApplications[$i]->joblink}}--}}
                                    @else
                                        No link found
                                    @endif
                                </td>
                                <td>{{$allApplications[$i]->role}}</td>
                                <td>{{date("l, jS F Y", strtotime($allApplications[$i]->applied_on))}}</td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                    <div class="col-xs-12 col-md-7 col-center" style="text-align: center;">
                        {{ $allApplications->links() }}
                    </div>
                </div>

            </div>
        </div>
    @stop

    @section('js')
        {{-- Include your page JS Here --}}
        @parent
            {{--{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}--}}
    @stop