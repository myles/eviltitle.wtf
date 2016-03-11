module.exports = function (grunt) {
    'use strict';

    var config = {
        distribute: {
            files: [{
                expand: true,
                cwd: './site',
                src: '*.php',
                dest: './dist/'
            }]
        }
    };

    grunt.config.set('copy', config);
};
