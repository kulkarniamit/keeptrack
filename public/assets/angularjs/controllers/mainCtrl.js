/**
 * Created by amit on 3/20/16.
 */

angular.module('mainCtrl', [])

    // inject the Comment service into our controller
    .controller('mainController', function($scope, $http, Job) {
        // object to hold all the data for the new comment form
        $scope.commentData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the comments first and bind it to the $scope.comments object
        // use the function we created in our service
        // GET ALL COMMENTS ==============
        Job.get()
            .success(function(data) {
                $scope.jobs = data;
                $scope.loading = false;
            });

        // function to handle submitting the form
        // SAVE A COMMENT ================
        $scope.submitComment = function() {
            $scope.loading = true;

            // save the comment. pass in comment data from the form
            // use the function we created in our service
            Job.save($scope.commentData)
                .success(function(data) {

                    // if successful, we'll need to refresh the comment list
                    Job.get()
                        .success(function(getData) {
                            $scope.jobs = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {
                    console.log(data);
                });
        };

        // function to handle deleting a job
        // DELETE A JOB ====================================================
        $scope.deleteJob = function(id) {
            $scope.loading = true;

            // use the function we created in our service
            Job.destroy(id)
                .success(function(data) {
                 //if successful, we'll need to refresh the comment list
                    Job.get()
                        .success(function(getData) {
                            $scope.jobs = getData;
                            $scope.loading = false;
                        });
                });
        };

    });