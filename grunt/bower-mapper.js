module.exports = function (grunt) {
    'use strict';

    var config = {
        js: {
            src: [
                'jquery',
                'FitText.js',
                'letteringjs',
                'bootstrap-sass'
            ],
            dest: 'site/assets/javascript/libs'
        }
    };

    grunt.config.set('bower-mapper', config);
};
