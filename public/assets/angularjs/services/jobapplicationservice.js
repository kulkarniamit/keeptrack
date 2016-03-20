/**
 * Created by amit on 3/20/16.
 */

angular.module('jobapplicationservice', [])

    .factory('Job', function($http) {

        return {
            // get all the jobs
            get : function() {
                return $http.get('/api/jobs');
            },

            // save a comment (pass in comment data)
            save : function(commentData) {
                return $http({
                    method: 'POST',
                    url: '/api/jobs',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(commentData)
                });
            },

            // destroy a comment
            destroy : function(id) {
                return $http.delete('/api/jobs/' + id);
            }
        }

    });
