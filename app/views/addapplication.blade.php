@extends('layouts.users.userdefault')
    @section('meta')
	{{-- Extending the meta from main layout --}}
	@parent
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
        <meta name="keywords" content="job search,job track, application track,internships,co-op,co-op track">
    @stop

    @section('title')
	{{-- Write your Page Title Here --}}
        Add a job application | KeepTrack
    @stop

    @section('stylesheets')
	@parent
        {{HTML::Style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker3.standalone.min.css')}}

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
            .input-group.date .input-group-addon{
                cursor: pointer;
            }
            .datepicker table tr td.active.active, .datepicker table tr td.active.highlighted.active, .datepicker table tr td.active.highlighted:active, .datepicker table tr td.active:active{
                background-color: #5cb85c;
            }

        </style>
    @stop

    @section('content')

        <div class="welcome-heading col-xs-12">
            <span class="glyphicon glyphicon-list-alt" style="font-size: 18px; color: #888; padding-right:5px;"></span>
            Add a job you applied
        </div>

        <div class="reg-form col-xs-12">
            @if(Session::has('message'))
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
            @endif

            <div class="col-center col-md-6">
                {{ Form::open(array('url' => 'addapplication','class'=>'form-horizontal','role'=>'form')) }}
                <div class="form-group">
                    <label for="inputtext0" class="col-sm-4 control-label">Job #</label>
                    <div class="col-sm-8">
                        <input type="text" name="jobid" value="{{Input::old('jobid')}}" class="form-control" id="inputtext0" data-validetta="required" placeholder="Enter the Job ID" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputtext1" class="col-sm-4 control-label">Company</label>
                    <div class="col-sm-8">
                        <input type="text" name="company" value="{{Input::old('company')}}" class="form-control" id="inputtext1" data-validetta="required" placeholder="Enter the company name" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputtext2" class="col-sm-4 control-label">Job Role</label>
                    <div class="col-sm-8">
                        <input type="text" name="role" value="{{Input::old('role')}}"  class="form-control" id="inputtext2"  data-validetta="required" placeholder="Job Role (For example: Graduate Java Intern)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputtext3" class="col-sm-4 control-label">Job Link</label>
                    <div class="col-sm-8">
                        <input type="text" name="joblink" value="{{Input::old('joblink')}}"  class="form-control" id="inputtext3"  data-validetta="required" placeholder="Enter the hyperlink to the job page (optional)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Applied Date</label>
                    <div class="col-sm-8">
                        <div class="input-group date">
                            <input type="text" name='appliedon' class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>

                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success btn-block">Add this Job</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    @stop

    @section('js')
        {{-- Include your page JS Here --}}
        @parent
        {{HTML::Script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js')}}
        <script>
            $('.input-group.date').datepicker({
                /* For more options, visit: http://eternicode.github.io/bootstrap-datepicker/ */
                clearBtn: true,
                orientation: "bottom auto",
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true,
                orientation: "bottom auto",
                todayBtn: "linked",
                format: "yyyy-mm-dd",
                endDate: "0d"
            });

            /* http://stackoverflow.com/questions/18329789/bootstrap-datepicker-default-date */
            var today = new Date();
            $(".input-group.date").datepicker("setDate", today);
            $(".input-group.date").datepicker('update');

        </script>
    @stop