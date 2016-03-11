module.exports = function (grunt) {
    'use strict';

    var config = {
        distribute: {
            files: [
                {
                    expand: true,
                    cwd: 'site/assets/javascript/libs/',
                    src: '*.js',
                    dest: 'dist/assets/javascript/libs/'
                },
                {
                    expand: true,
                    cwd: 'site/assets/javascript/',
                    src: "*.js",
                    dest: 'dist/assets/javascript/'
                }
            ]
        }
    };

    grunt.config.set('uglify', config);
};
