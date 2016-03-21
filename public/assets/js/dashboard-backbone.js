/**
 * Created by amit on 3/20/16.
 */
/**
 * BACKBONE CODE
 */

$.fn.serializeObject = function() {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

Handlebars.registerHelper('ifCond', function (v1, operator, v2, options) {

    switch (operator) {
        case '==':
            return (v1 == v2) ? options.fn(this) : options.inverse(this);
        case '===':
            return (v1 === v2) ? options.fn(this) : options.inverse(this);
        case '<':
            return (v1 < v2) ? options.fn(this) : options.inverse(this);
        case '<=':
            return (v1 <= v2) ? options.fn(this) : options.inverse(this);
        case '>':
            return (v1 > v2) ? options.fn(this) : options.inverse(this);
        case '>=':
            return (v1 >= v2) ? options.fn(this) : options.inverse(this);
        case '&&':
            return (v1 && v2) ? options.fn(this) : options.inverse(this);
        case '||':
            return (v1 || v2) ? options.fn(this) : options.inverse(this);
        default:
            return options.inverse(this);
    }
});

/**
 * Creating a View to handle DYK form submission
 */
var DykFormV = Backbone.View.extend({
    el: '#job-update-form',

    events: {
        "submit": "submit"
    },

    initialize: function () {
    },
    submit: function (e) {
        e.preventDefault();
        debugger;
        var self    = this;
        //var source  =   $(e.currentTarget).find('textarea');
        //var sourceText  =   source.val();
        //source.val($.trim(sourceText));
        var dykDetails = $(e.currentTarget).serializeObject();
        this.model.save(dykDetails,{
            success:function(user,response,options){
                $('input[name=dyk-fact]').focus();
                if(response.success === false){
                    // Call the Modal and show the error
                    var errorMsg = '';
                    for(var x in response.error){
                        errorMsg += response.error[x]+"<br/>";
                    }
                    var glyphiconForTitle = '<span class="glyphicon glyphicon-exclamation-sign" style="padding-right:5px"></span>';
                    var title   =   'Please correct the error';
                    bootbox.dialog({
                        message: errorMsg,
                        title: glyphiconForTitle+title,
                        onEscape: function() {},
                        buttons: {
                            success: {
                                label: "OK",
                                className: "btn-primary",
                                callback: function() {
                                }
                            }
                        }
                    });
                    return false;
                }
                self.$el[0].reset();
                self.model.set(self.model.defaults);
                var newDyk  =   new dykM(response);

                // Addition of model to collection is going to trigger
                // an add event which does an append to collection view.
                // Since we want to prepend the new model, we silence that
                // event callback and perform our own prepend here

                // ^ Oh,no we make use of flags and tackle that :)

                newDykCollectionView.collection.add(newDyk,{newDykAdded:true});
            },
            error:function(model, error){
                alert(error);
            }
        });
    }
});

/**
 * Creating a model Class to hold 1 Job
 */
var dykM =   Backbone.Model.extend({
    urlRoot: 'api/jobs',
    defaults:{
        id              :   null,
        company         :   '',
        jobid           :   '',
        joblink         :   '',
        role            :   '',
        applied_on      :   '',
    },
    parse   :   function(model, options){
        if(model.source !== undefined){
            // model.source is optional, hence cannot be called everytime
            // Also parse() is called before success() callback.
            var parsedSource    =   model.source.parseURL();
            model.source = parsedSource;
        }
        return model;
    }
});

/**
 *  Creating a collection Class to hold these dyk models
 */
var dykC    =   Backbone.Collection.extend({
    model   : dykM,
    url     : 'api/jobs'
});

/**
 *  Creating a Collection View to show all DYK's
 */
var dykCV   =   Backbone.View.extend({
    el      :   "#content",
    initialize  :   function(){

        this.collection.fetch({
            success: function(collection, response, options){
                if(!collection.length){
                    $('#dyk-intro-box').show();
                }
            }
        });
        this.listenTo(this.collection,
            'remove',
            function(model, collection){
                if(!collection.length){
                    $('#dyk-intro-box').show();
                }
            }
        );
        var self = this;
        //self.infiniScroll = new Backbone.InfiniScroll(self.collection,
        //    {
        //        success: self.appendRender,
        //        pageSize:   3,
        //        includePage:    true
        //    }
        //);
        //setInterval(function(){
        //    /**
        //     * Update the timings of posts to reflect the
        //     * moment in real time
        //     */
        //    self.collection.each(function(model){
        //        var friendly_time = moment(model.get('created_at'), "YYYY-MM-DD HH:mm:ss").fromNow();
        //        if(friendly_time !== model.get('c_at_readable')){
        //            // The moment has changed, Update it in view
        //            model.set("c_at_readable",friendly_time);
        //        }
        //    });
        //},5000);

        /**
         * Send the reference of 'this'
         * so that people can use 'this' in
         * the function list
         */
        this.collection.on("add", this.addOne,this);
    },
    addOne      :   function(newDYK,collection,options){
        var newModelView = new dykMV({model: newDYK});

        if(typeof(options.newDykAdded) === "boolean"){
            /*
             * Prepend the data if the added DYK is new
             */
            this.$el.prepend(newModelView.render().$el.fadeIn('800'));
        }
        else{
            this.$el.append(newModelView.render().$el.fadeIn('800'));
        }
    },
    render      :   function(){
    }
});

/**
 *  Creating a Model View to render 1 DYK
 */

var dykMV   =   Backbone.View.extend({
    tagName     :   "div",
    className   :   "dyk-story",

    initialize  :   function(){
        this.listenTo(this.model, 'change', this.render);
        this.listenTo(this.model, 'destroy', this.removeDykView);
    },
    template    :   Handlebars.compile($('#item-template').html()),
    events: {
        "click .js-ikt"         :   "updateIktCounter",
        "click .job-remove"     :   "removeDyk",
        "click .js-ikt-list"    :   "fetchIktList",
        "click .job-update"     :   "updateJob",
        "submit"                :   "submit"
    },
    fetchIktList:function(e){
        if(this.model.get('ikt_count') !== '0'){
            this.fetchList(this.model,"ikt",'Students who knew this');
        }
    },
    fetchList   :   function(model,identifier,title){
        model.fetch(
            {
                data: { list: identifier},
                success:function(model,response){
                    var names = "";
                    for(var i=0; i < response.length; i++){
                        var userEntry   =   '<a href="'+response[i].unl+'">'+
                            '<div class="dyk-list-entries clearfix">'+
                            '<div class="pp-tn pull-left">'+
                            '<img src="'+response[i].pp+'" width="50" height="50"/>'+
                            '</div>'+
                            '<div class="dyk-entries-name">'+
                            response[i].name+
                            '</div>'+
                            '</div>'+
                            '</a>';

                        names+=userEntry;
                    }
                    var glyphiconForTitle = '<span class="glyphicon glyphicon-align-justify" style="padding-right:5px"></span>';
                    bootbox.dialog({
                        message: names,
                        title: glyphiconForTitle+title,
                        onEscape: function() {},
                        buttons: {
                            success: {
                                label: "OK",
                                className: "btn-primary",
                                callback: function() {
                                }
                            }
                        }
                    });
                }
            }
        );
    },
    updateIktCounter: function(e){
        e.preventDefault();
        if(this.model.get('allow_vote')){
            var ikt_count   =   this.model.get("ikt_count");
            this.model.set("ikt_count",++ikt_count);
            this.model.set("allow_vote",false);
            this.model.set("updated_option",1);
            this.model.set("chosen_option","You knew this");
            this.model.save({updated_option:1},{patch:true,
                success:    function(){
                }
            });
        }
    },
    removeDyk: function(e){
        e.preventDefault();
        var self=this;
        var glyphiconForTitle = '<span class="glyphicon glyphicon-trash" style="padding-right:5px"></span>';
        bootbox.dialog({
            message: "Are you sure you want to delete this job?",
            onEscape: function() {},
            title: glyphiconForTitle+"Confirm Deletion",
            buttons: {
                success: {
                    label: "Yes",
                    className: "btn-success",
                    callback: function() {
                        self.model.destroy({
                            success:    function(model, response){
                                if(response.deleteSuccess){
                                    //self.$el.fadeOut("slow",function(){
                                    //    self.remove();
                                    //    Backbone.View.prototype.remove.call(self);
                                    //});
                                    self.$el.slideUp("slow",function(){
                                        self.remove();
                                        Backbone.View.prototype.remove.call(self);
                                    });
                                }
                                else{
                                    // Something went wrong at server

                                    var glyphiconForTitle = '<span class="glyphicon glyphicon-trash" style="padding-right:5px"></span>';
                                    bootbox.dialog({
                                        message :   'Something went wrong, try in a few minutes',
                                        onEscape: function() {},
                                        title   :   glyphiconForTitle+'Deletion status',
                                        buttons :{
                                            success :   {
                                                label: "OK",
                                                className: "btn-default",
                                                callback: function() {}
                                            }
                                        }
                                    });
                                }
                            }
                        });
                    }
                },
                danger: {
                    label: "No",
                    className: "btn-default",
                    callback: function() {
                    }
                }
            }
        });
    },
    updateJob: function(e){
        e.preventDefault();
        var self=this;
        var company = self.model.get('company');
        var jobid   = self.model.get('jobid');
        var jobrole = self.model.get('role');
        var appliedon = self.model.get('applied_on');
        var joblink = self.model.get('joblink');
        var glyphiconForTitle = '<span class="glyphicon glyphicon-pencil" style="padding-right:5px"></span>';
        bootbox.dialog({
                title: glyphiconForTitle+"Update Job Application",
                message: '<div class="row">  ' +
                '<div class="col-md-12"> ' +
                '<form class="form-horizontal" id="job-update-form" action="api/jobs/"> ' +
                    '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="name">Job #</label> ' +
                        '<div class="col-md-6"> ' +
                            '<input id="jobid" name="jobid" type="text" value="'+jobid+'" class="form-control input-md">' +
                        '</div> ' +
                    '</div>'+
                    '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="name">Company</label> ' +
                        '<div class="col-md-6"> ' +
                            '<input id="company" name="company" type="text" value="'+company+'" class="form-control input-md">' +
                        '</div> ' +
                    '</div>'+
                    '<div class="form-group"> ' +
                        '<label class="col-md-4 control-label" for="name">Role</label> ' +
                        '<div class="col-md-6"> ' +
                            '<input id="role" name="role" type="text" value="'+jobrole+'" class="form-control input-md">' +
                        '</div> ' +
                    '</div>'+
                    //'<div class="form-group"> ' +
                    //    '<div class="col-sm-offset-2 col-sm-8">'+
                    //        '<button type="submit" class="btn btn-success btn-block">Update</button>'+
                    //    '</div>'+
                    //'</div>'+
                '</form> '+
                '</div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                            var jobUpdateDetails = $('#job-update-form').serializeObject();
                            //self.model.set('company',$('#company').val());
                            //self.model.set('jobid',$('#jobid').val());
                            //self.model.set('role',$('#role').val());
                            self.model.save(jobUpdateDetails,{patch:true,
                                success:function(user,response,options){
                                    debugger;
                                    if(response.updateSuccess === false){
                                        // Call the Modal and show the error
                                        var errorMsg = '';
                                        for(var x in response.error){
                                            errorMsg += response.error[x]+"<br/>";
                                        }
                                        var glyphiconForTitle = '<span class="glyphicon glyphicon-exclamation-sign" style="padding-right:5px"></span>';
                                        var title   =   'Please correct the error';
                                        bootbox.dialog({
                                            message: errorMsg,
                                            title: glyphiconForTitle+title,
                                            onEscape: function() {},
                                            buttons: {
                                                success: {
                                                    label: "OK",
                                                    className: "btn-primary",
                                                    callback: function() {
                                                    }
                                                }
                                            }
                                        });
                                        return false;
                                    }
                                    else{
                                        self.model.set('company',$('#company').val());
                                        self.model.set('jobid',$('#jobid').val());
                                        self.model.set('role',$('#role').val());
                                    }
                                },
                                error:function(model, error){
                                    alert(error);
                                }
                            });
                        }
                    }
                }
            }
        );
    },
    removeDykView: function(e){
        /**
         * Reference:http://stackoverflow.com/questions/6569704/destroy-or-remove-a-view-in-backbone-js
         */
//                                this.undelegateEvents();
        this.$el.removeData().unbind();
    },
    render: function(){
        // Debugging
        //console.log(this.model.toJSON());
        var output  =   this.template({'job':this.model.toJSON()});
        this.$el.html(output);
        return this;
    }
});

var newDykMI    =   new dykM();
var DykFormVI   =   new DykFormV({model:newDykMI});
var newDykCollection    =   new dykC();
var newDykCollectionView=   new dykCV({ collection: newDykCollection });