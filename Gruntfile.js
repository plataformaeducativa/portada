module.exports = function (grunt) {
	grunt.initConfig({
		//Preprocesador css
        stylus: {
            compile: {
                options: {
                    compress: true,
                    linenos: false
                },
                files: [{
                    'css/estilo.css': 'stylus/*.styl',
                }]
            }
        },
	    // Compilar Jade
		jade: {
            compile: {
                options: {
                    client: false,
                    pretty: true
                },
                files: {
					'index.html': 'jade/index.jade',
				}
            }
        },
        //Observar cambios
		watch: {
			options: {
				nospawn: true,
				livereload: true
			},
			//observar de stylus
			stylesheets: {
				files: ['stylus/estilo.styl', 'css/estilo.css'],
				tasks: ['stylus']
			},
            //observar el jade
			jade: {
				files: ["jade/*.jade"],
				tasks: ["jade"]
			}
		},
	});

	//Cargo las tareas
	grunt.loadNpmTasks('grunt-contrib-stylus');
	grunt.loadNpmTasks('grunt-contrib-jade');
	grunt.loadNpmTasks('grunt-contrib-watch');
	// Run Default task(s).
	grunt.registerTask('default', ['stylus','jade','watch']);
};