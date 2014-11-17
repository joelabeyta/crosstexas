module.exports = function(grunt) {

  grunt.initConfig({

	pkg: grunt.file.readJSON('package.json'),
	sass: {
		dist: {
			options: {
				outputStyle: 'compressed',
				sourceComments: 'map',
				includePaths: require('node-bourbon').includePaths,
			},
			files: {
				'css/style.css' : 'lib/scss/style.scss'
			}
		}
	},

	cssmin: {
		css:{
			src: 'css/style.css',
			dest: 'css/style.min.css'
		}
	},

	jshint: {
	  beforeconcat: ['lib/js/*.js']
	},

	concat: {
	  dist: {
		src: [
		  'lib/js/plugins/*',
		  'lib/js/foundation.min.js',
		  'lib/js/main.js',
		],
		dest: 'js/production.js'
	  }
	},

	uglify: {
		my_target: {
			options: {
				sourceMap: true,
				sourceMapName: 'js/sourcemap.map'
			},
			files: {
				'js/production.min.js': ['js/production.js']
			}
		}
	},

	// uncss: {
	//   dist: {
	//   	options: {
	//   		csspath: 'css/style.css'
	//   	},
	//     files: {
	//       'css/tidy.css': ['index.php', 'contact']
	//     }
	//   }
	// },

	watch: {
	  options: {
		livereload: true,
	  },
	  scripts: {
		files: ['lib/js/*.js'],
		tasks: ['concat', 'uglify'],
		options: {
		  spawn: false,
		}
	  },
	  css: {
		files: ['lib/scss/*.scss'],
		tasks: ['sass', 'cssmin'],
		options: {
		  spawn: false,
		}
	  },
	  php: {
	  	files: ['*.php'],
	  	options: {
	  		spawn: false
	  	}
	  },
	},

	connect: {
	  server: {
		options: {
		  port: 8000,
		  base: './'
		}
	  }
	},

  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-devtools');
  // grunt.loadNpmTasks('grunt-uncss');

  grunt.registerTask('default', ['watch']);
  // grunt.registerTask('uncss', ['uncss']);

};