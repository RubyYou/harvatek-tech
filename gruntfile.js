module.exports = function(grunt){

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		uglify:{
			build: {
				src: ['scripts/components/js/script.js'],
				dest: 'scripts/script.js'
			}
		},// uglify
		compass:{
			dev:{
				options:{
					cssDir : "scripts/css",
					sassDir : "scripts/components/sass",
					javascriptsDir : "scripts/components/js",
					outputStyle: "nested"
				}//options
			}//dev
		},
		watch:{
			options:{ livereload:true },
			script:{
				files:['scripts/components/js/*.js'],
				tasks:['uglify']
			},//script
			sass:{
				files:['scripts/components/sass/*.scss'],
				tasks:['compass:dev']
			},//sass
			html:{
				files:['**/*.php']
			}//html
		}// watch [automation & livereload]

	});//initConfig

	grunt.loadNpmTasks('grunt-contrib-uglify'); 
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.registerTask('default','watch');

}// exports