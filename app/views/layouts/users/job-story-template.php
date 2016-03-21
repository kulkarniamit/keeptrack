<?php
/**
 * Created by PhpStorm.
 * User: amit
 * Date: 3/20/16
 * Time: 6:00 PM
 */
?>
<script id="item-template" type="text/x-handlebars-template">
    <div class="col-xs-12 col-md-7 jobscontainer">
        <div class="col-xs-12 col-md-12 jobcompany">
            <div class="col-md-8 col-xs-8 companytitle">
                {{#if job.joblink}}
                    <a href="{{job.joblink}}">{{job.company}}</a>
                {{else}}
                    {{job.company}}
                {{/if}}
            </div>
            <div class="col-md-4 col-xs-4 editdelete companyedit">
                <button type="button" class="btn btn-default editbutton job-update" aria-label="Left Align">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger trashbutton job-remove" aria-label="Left Align">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>

        </div>
        <div class="jobdetailbox">
            <div class="col-md-3 col-xs-3 detaillabel">Job #</div>
            <div class="col-md-9 col-xs-9 detailinfo">
                <div class="jobid">{{job.jobid}}</div>
            </div>
        </div>

<!--        <div class="jobdetailbox">-->
<!--            <div class="col-md-3 detaillabel">Job Link</div>-->
<!--            <div class="col-md-9 detailinfo">-->
<!--                {{#if job.joblink}}-->
<!--                    <div class="joblink"><a href="{{job.joblink}}">Link</a></div>-->
<!--                {{else}}-->
<!--                    <div class="joblink">No link found</div>-->
<!--                {{/if}}-->
<!--            </div>-->
<!--        </div>-->

        <div class="jobdetailbox">
            <div class="col-md-3 col-xs-3 detaillabel">Role</div>
            <div class="col-md-9 col-xs-9 detailinfo">
                <div class="jobrole">{{job.role}}</div>
            </div>
        </div>

        <div class="jobdetailbox">
            <div class="col-md-3 col-xs-3 detaillabel">Applied on</div>
            <div class="col-md-9 col-xs-9 detailinfo">
                <div class="jobdate">{{job.readable_time}}</div>
            </div>
        </div>
    </div>

<!--        <div class="dyk-head clearfix">-->
<!--            <a href="{{dyk.owner_profile}}">-->
<!--                <img src="{{dyk.owner_profile_picture}}" class="pull-left profile-thumbnail" width="50" height="50"/>-->
<!--            </a>-->
<!--            <div style="float:left; width:390px;">-->
<!--                <div>-->
<!--                    <a style="font-weight: bold;" href="{{dyk.owner_profile}}">{{dyk.owner_firstname}} {{dyk.owner_lastname}}</a> has shared a fact-->
<!--                    {{#if dyk.owner}}-->
<!--                        <button type="button" class="btn btn-default btn-sm pull-right js-remove" style="padding: 1px 4px; font-size: 11px;color: #777;">-->
<!--                        <span class="glyphicon glyphicon-trash"></span>-->
<!--                    </button>-->
<!--                    {{/if}}-->
<!--                </div>-->
<!--                <div class="dyk-sdetail-view" style="float:left; padding-right:10px;" title="{{dyk.created_at}}"><span style="margin-right: 5px;" class="glyphicon glyphicon-time"></span>-->
<!--                        Shared {{dyk.c_at_readable}}-->
<!--                </div>-->
<!--                <div class="dyk-sdetail-view"><span class="glyphicon glyphicon-globe" style="margin-right: 5px;"></span>{{dyk.target_audience}}</div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="dyk-body">-->
<!--            <blockquote >{{dyk.text}}</blockquote>-->
<!--        </div>-->

</script>