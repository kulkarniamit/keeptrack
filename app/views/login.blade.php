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
        Login | KeepTrack
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
            /* New addons */
            .login-form{
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
            Login
        </div>

        <div class="login-form col-xs-12">
            <div class="col-center col-md-8">
                @if (Session::has('status'))
                    {{--If there was a password reset request, show the success message--}}
                    <p class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>

                        <span class="glyphicon glyphicon-ok-sign" style="padding-right:5px;"></span>
                        Password change successful. Please Login with your new password.
                    </p>
                @endif

                @if (Session::has('registration_success_message'))
                    <div class="col-xs-12">
                        <p class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>

                            <span class="glyphicon glyphicon-ok-sign" style="padding-right:5px;"></span>
                            {{ Session::get('registration_success_message') }}
                        </p>
                    </div>
                @endif

                @if(Session::has('login_error'))
                    <p class="alert alert-danger"><span class="glyphicon glyphicon-exclamation-sign" style="padding-right:5px;"></span>
                        {{ Session::get('login_error') }}
                    </p>
                @endif

                {{ Form::open(array('url' => 'login','class'=>'form-signin','role'=>'form')) }}
                <div class="form-group">
                    <label for="email" class="col-md-3">Email address</label>
                    <div style="margin-bottom: 20px" class="input-group col-md-9">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" id="email" class="form-control" name="email" value="" placeholder="Email-ID" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3">Password</label>
                    <div class="input-group col-md-9" style="margin-bottom: 25px">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" placeholder="password" name="password" class="form-control" id="password" >
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-sm-offset-3 col-sm-9" style="padding: 0 5px;">
                        <div class="checkbox">
                            <label style="font-size:12px;">
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-success btn-block" type="submit" style="font-size: 14px;">Sign in</button>
                {{--<div class="form-group clearfix">--}}
                    {{--<div class="col-sm-12" style="padding:10px 0; text-align: center;">--}}
                        {{--<label style="font-size:12px;">--}}
                            {{--<a href="/password/remind" title="Forgor your password?">Forgot password?</a>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{ Form::close() }}

            </div>
        </div>
    @stop

    @section('js')
        {{-- Include your page JS Here --}}
        @parent
            {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
    @stop