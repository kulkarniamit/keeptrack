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
                {{job.company}}
<!--                {{#if job.joblink}}-->
<!--                    <a href="{{job.joblink}}" target="_blank">{{job.company}}</a>-->
<!--                {{else}}-->
<!--                    {{job.company}}-->
<!--                {{/if}}-->
            </div>
            <div class="col-md-4 col-xs-4 editdelete companyedit">
                    {{#if job.joblink}}
                        <a href="{{job.joblink}}" class="btn btn-default linkbutton" target="_blank" aria-label="Left Align">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        </a>
                    {{/if}}
                <button type="button" class="btn btn-default editbutton job-update" aria-label="Left Align">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger trashbutton job-remove" aria-label="Left Align">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </button>
            </div>
        </div>
        <div class="col-xs-12 col-md-12 jobdetailbox">
            <div class="col-md-3 col-xs-4 detaillabel">Job #</div>
            <div class="col-md-9 col-xs-8 detailinfo">
                {{#if job.jobid}}
                <div class="jobid">{{job.jobid}}</div>
                {{else}}
                <div class="jobid">NA</div>
                {{/if}}
            </div>
        </div>

        <div class="col-xs-12 col-md-12 jobdetailbox">
            <div class="col-md-3 col-xs-4 detaillabel">Role</div>
            <div class="col-md-9 col-xs-8 detailinfo">
                <div class="jobrole">{{job.role}}</div>
            </div>
        </div>

        <div class="col-xs-12 col-md-12 jobdetailbox">
            <div class="col-md-3 col-xs-4 detaillabel">Status</div>
            <div class="col-md-9 col-xs-8 detailinfo">
                <div class="jobrole">{{job.application_status}}</div>
            </div>
        </div>

        <div class="col-xs-12 col-md-12 jobdetailbox">
            <div class="col-md-3 col-xs-4 detaillabel">Applied on</div>
            <div class="col-md-9 col-xs-8 detailinfo">
                <div class="jobdate">{{job.readable_time}}</div>
            </div>
        </div>
    </div>
</script>