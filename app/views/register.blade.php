{{--@extends('layouts.main')--}}
    @section('meta')
	{{-- Extending the meta from main layout --}}
	@parent
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
        <meta name="keywords" content="job search,job track, application track,internships,co-op,co-op track">
    @stop

    @section('title')
	{{-- Write your Page Title Here --}}
        Registration | KeepTrack
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
            .reg-form{
                background-color: #FFF;
                box-shadow: 0 0 2px rgba(0, 0, 0, 0.118);
                font-family: "Open Sans",Tahoma,Ubuntu,Helvetica;
                font-weight: 300;
                margin: 3px auto 10px;
                padding: 50px 10px;
                line-height: 2;
            }
            .form-horizontal .control-label{
                font-size: 14px;
                font-weight: 300;
                padding-top: 1px;
            }
            .reg-message > .alert{
                margin-bottom: 10px;
            }

        </style>
    @stop

    @section('content')

        <div class="welcome-heading col-xs-12">
            <span class="glyphicon glyphicon-list-alt" style="font-size: 18px; color: #888; padding-right:5px;"></span>
            User Registration
        </div>

        <div class="reg-form col-xs-12">
            {{-- Display whatever validation errors occur --}}

            @if(Session::has('message'))
                @if($errors->has())
                    <div class="col-xs-12">
                        <div class="alert alert-danger alert-dismissible  fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                {{--<span class="sr-only">Close</span>--}}
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
                {{--@else--}}
                    {{--<div class="col-xs-12">--}}
                        {{--<p class="alert alert-success">--}}
                            {{--<button type="button" class="close" data-dismiss="alert">--}}
                                {{--<span aria-hidden="true">&times;</span>--}}
                                {{--<span class="sr-only">Close</span>--}}
                            {{--</button>--}}

                            {{--<span class="glyphicon glyphicon-ok-sign" style="padding-right:5px;"></span>--}}
                            {{--{{ Session::get('message') }}--}}
                        {{--</p>--}}
                    {{--</div>--}}
                @endif
            @endif

            <div class="col-center col-md-6">
                {{ Form::open(array('url' => 'register','class'=>'form-horizontal','role'=>'form')) }}
                <div class="form-group">
                    <label for="inputtext0" class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" name="username" value="{{Input::old('username')}}" class="form-control" id="inputtext0" data-validetta="required" placeholder="Pick a username" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputtext1" class="col-sm-4 control-label">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="firstname" value="{{Input::old('firstname')}}" class="form-control" id="inputtext1" data-validetta="required" placeholder="First Name" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputtext2" class="col-sm-4 control-label">Last Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="lastname" value="{{Input::old('lastname')}}"  class="form-control" id="inputtext2"  data-validetta="required" placeholder="Last Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputtext3" class="col-sm-4 control-label">School</label>
                    <div class="col-sm-8">
                        <input type="text" name="school" value="{{Input::old('school')}}"  class="form-control" id="inputtext3"  data-validetta="required" placeholder="Enter your school name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" value="{{Input::old('email')}}" class="form-control" id="inputEmail3"  data-validetta="required,email" placeholder="Enter your Email ID">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" value="{{Input::old('password')}}" class="form-control" id="inputPassword3" data-validetta="required"  placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="optionsRadios1" class="col-sm-4 control-label">Gender</label>
                    <div class="col-sm-8">
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="gender" id="optionsRadios1" value="M" <?php if(Input::old('gender')== "M") { echo 'checked="checked"'; } ?>>
                                Male
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="gender" id="optionsRadios2" value="F" <?php if(Input::old('gender')== "F") { echo 'checked="checked"'; } ?>>
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success btn-block">Register</button>
                    </div>
                </div>
                {{ Form::close() }}

            </div>
        </div>
    @stop

    @section('js')
        {{-- Include your page JS Here --}}
        @parent
    @stop