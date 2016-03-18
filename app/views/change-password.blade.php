{{--@extends('layouts.main')--}}
@extends('layouts.users.userdefault')
    @section('meta')
	{{-- Extending the meta from main layout --}}
	@parent
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
        <meta name="keywords" content="job search,job track, application track,internships,co-op,co-op track">
    @stop

    @section('title')
	{{-- Write your Page Title Here --}}
        Change Password | KeepTrack
    @stop

    @section('stylesheets')
	@parent
        <style type="text/css">
            .form-control{border-radius: 0px;}
            .welcome-heading {
                background-color: #FFF;
                padding: 10px;
                font-size: 20px;
                font-family: "Open Sans",Tahoma,Ubuntu,Helvetica;
                font-weight: 300;
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.106);
                text-align: center;
            }
            .col-center{
                float: none;
                margin: 0 auto;
            }
            .password-change-form{
                background-color: #FFF;
                box-shadow: 0 0 2px rgba(0, 0, 0, 0.118);
                font-family: "Open Sans",Tahoma,Ubuntu,Helvetica;
                font-weight: 300;
                margin: 3px auto 10px;
                padding: 50px 10px;
                line-height: 2;
            }
            .form-group label{
                font-size: 14px;
                font-weight: 300;
                padding-top: 1px;
            }
        </style>
    @stop

    @section('content')

        <div class="welcome-heading col-xs-12">
            <span class="glyphicon glyphicon-lock" style="font-size: 16px; color: #888; padding-right:5px;"></span>
            Change Password
        </div>

        <div class="password-change-form col-xs-12">
            <div class="col-center col-md-6">

                @if(Session::has('errorMessage'))
                    <div class="col-xs-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>

                            <span class="glyphicon glyphicon-exclamation-sign" style="padding-right:5px;"></span>
                            {{ Session::get('errorMessage') }}
                        </div>
                    </div>
                @endif

                @if($errors->has())
                    <div class="col-xs-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>

                            <span class="glyphicon glyphicon-exclamation-sign" style="padding-right:5px;"></span>
                            {{ Session::get('message') }}
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                {{ Form::open(array('url' => 'pchandler','class'=>'form-signin','role'=>'form')) }}
                <div class="form-group">
                    <label for="email" class="col-xs-12 col-md-5">Old Password</label>
                    <div style="margin-bottom: 20px" class="input-group col-xs-12 col-md-7">
                        <input type="password" id="op" class="form-control" name="op" value="" placeholder="Enter your old password" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-xs-12 col-md-5">New Password</label>
                    <div class="input-group col-xs-12 col-md-7" style="margin-bottom: 25px">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" placeholder="Enter your new Password" name="np" class="form-control" id="np" >
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-success btn-block col-md-4" type="submit" style="font-size: 14px;">Change Password</button>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    @stop

    @section('js')
        {{-- Include your page JS Here --}}
        @parent
{{--            {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}--}}
    @stop