module.exports = function (grunt) {
    'use strict';

    var config = {
        distribute: {
            options: {
                archive: 'eviltitle-wtf.zip'
            },
            files: [{
                expand: true,
                cwd: './dist/',
                src: ['**'],
                dest: 'eviltitle.wtf'
            }]
        }
    };

    grunt.config.set('compress', config);
};
