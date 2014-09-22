module.exports = function(grunt) {
 
    grunt.initConfig({
        compass: {
            dist: {
                options: {
                    raw: "\
                        require 'modular-scale'\n\
                        project_path = '.'\n\
                        preferred_syntax = :scss\n\
                        css_dir = './css'\n\
                        sass_dir = './sass'\n\
                        images_dir = './imgs'\n\
                        relative_assets = true\n\
                        line_comments = false\n\
                    "
                }
            }
        }
    });
 
    // loading modules
    grunt.loadNpmTasks('grunt-contrib-compass');
 
    grunt.registerTask('default', ['compass']);
 