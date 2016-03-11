module.exports = function (grunt) {
    'use strict';

    var config = {
        options: {
            includePaths: [
                './bower_components/bootstrap-sass/assets/stylesheets/'
            ],
            sourceMap: true
        },
        dev: {
            files: {
                'site/assets/css/style.css': 'site/assets/sass/style.scss'
            }
        },
        distribute: {
            options: {
                outputStyle: 'compressed'
            },
            files: {
                'dist/assets/css/style.css': 'site/assets/sass/style.scss'
            }
        }
    };

    grunt.config.set('sass', config);
};
