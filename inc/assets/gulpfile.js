var path = require('path'),
	gulp = require('gulp'),
	settings = require('./config/settings'),
	webpack = require('webpack');

const adminDest = settings.pluginLocation + '/public/admin';

gulp.task('js:plugin', function(callback) {
	webpack(require('./config/plugin.config.js'), function(err, stats) {
		if (err) {
			console.log(err.toString());
		}

		console.log(stats.toString());
		callback();
	});
});

gulp.task('js:admin', function(callback) {
	webpack(require('./config/admin.config.js'), function(err, stats) {
		if (err) {
			console.log(err.toString());
		}

		console.log(stats.toString());
		callback();
	});
});
