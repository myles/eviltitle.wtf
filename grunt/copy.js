module.exports = function (grunt) {
    'use strict';

    var config = {
        distribute: [
            {
                expand: true,
                src: ['./site/*.php'],
                dest: ['dist/']
            }
        ]
    };

    grunt.config.set('copy', config);
};
