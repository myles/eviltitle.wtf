module.exports = function (grunt) {
    'use strict';

    var config = {
        site: [
            './site/assets/images/toronto.png',
            './site/assets/css/style.*',
            './site/assets/fonts/',
            './site/assets/javascript/libs/'
        ],
        dist: [
            './dist/'
        ]
    };

    grunt.config.set('clean', config);
};
