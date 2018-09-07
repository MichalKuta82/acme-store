var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

var gulp = require('gulp');

elixir(function (mix) {
	//compile sass to css
	mix.sass('resources/assets/sass/app.scss', 'resources/assets/css');

	//combine css file
	mix.styles(
		[
			'css/app.css',
			'bower/vendor/slick-carousel/slick/slick.css'

		], 'public/css/all.css',//output file
		'resources/assets'
	);

	var bowerPath = 'bower/vendor';

	mix.scripts(
		[
			//jQuery
			bowerPath + '/jquery/dist/jquery.min.js',

			//foundation js
			bowerPath + '/foundation-sites/dist/js/foundation.min.js',

			//other dependencies
			bowerPath + '/slick-carousel/slick/slick.min.js',

			'js/acme.js',
			'js/admin/*.js',
			'js/init.js'
		], 'public/js/all.js', 'resources/assets'
	);
});