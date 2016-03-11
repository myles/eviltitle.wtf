module.exports = function (grunt) {
    'use strict';

    grunt.registerTask('develop', [
        'bower-mapper',
        'sass:dev',
        'concurrent'
    ]);

    grunt.registerTask('distribute', [
        'clean:dist',
        'bower-mapper',
        'sass:distribute',
        'uglify:distribute',
        'copy:distribute',
        'compress:distribute'
    ]);

    grunt.registerTask('test', [
        'scsslint',
        'phplint'
    ]);

    grunt.registerTask('default', ['develop']);
};
