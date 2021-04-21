var path = require('path'),
	gulp = require('gulp'),
	settings = require('./config/settings'),
	webpack = require('webpack'),
	browserSync = require('browser-sync').create(),
	icludecss = require('gulp-cssimport'),
	postcss = require('gulp-postcss'),
	rgba = require('postcss-hexrgba'),
	sass = require("gulp-sass"),
	sourcemaps = require("gulp-sourcemaps"),
	cssnano = require("cssnano"),
	autoprefixer = require('autoprefixer'),
	cssvars = require('postcss-simple-vars'),
	nested = require('postcss-nested'),
	cssImport = require('postcss-import'),
	mixins = require('postcss-mixins'),
	colorFunctions = require('postcss-color-function');

const entryCss = settings.pluginLocation + '/css/style.scss';
const entryAdminCss = settings.pluginLocation + '/admin/css/style.scss';
const adminDest = settings.pluginLocation + '/public/admin';

let sassOpt = {
	errLogToConsole: true,
	outputStyle: "expanded" // "compressed"
}

gulp.task('css:plugin', (done) => {
	gulp.src(entryCss)
	.pipe(sass(sassOpt).on('error', sass.logError))
	.pipe( sourcemaps.init({ loadMaps: true }) )
	.pipe(icludecss())
	.pipe(postcss([ autoprefixer(), cssnano() ]))
	.pipe( sourcemaps.write( './' ) )
	.pipe(gulp.dest(settings.basepluginLocation + '/public'))
	.pipe(browserSync.reload({stream: true}))
	done();
});

gulp.task('css:admin', (done) => {
	gulp.src(entryAdminCss)
	.pipe(sass(sassOpt).on('error', sass.logError))
	.pipe( sourcemaps.init({ loadMaps: true }) )
	.pipe(postcss([ autoprefixer(), cssnano() ]))
	.pipe( sourcemaps.write( './' ) )
	.pipe(gulp.dest(adminDest))
	.pipe(browserSync.reload({stream: true}))
	done();
});

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

gulp.task('watch', function() {
	// browserSync.init({
	// 	notify: false,
	// 	proxy: settings.urlToPreview,
	// 	ghostMode: false
	// });

	// gulp.watch('./**/*.php', function() {
	// 	browserSync.reload();
	// });
	gulp.watch(settings.pluginLocation + '/commons/css/**/*.scss', gulp.parallel('waitPluginStyles', 'waitAdminStyles'));
	gulp.watch(settings.pluginLocation + '/plugin/css/**/*.scss', gulp.parallel('waitPluginStyles'));
	gulp.watch([settings.pluginLocation + '/plugin/js/app.js', settings.pluginLocation + '/plugin/js/mods/*.js'], gulp.parallel('waitPluginScripts'));
	gulp.watch(settings.pluginLocation + '/admin/css/**/*.scss', gulp.parallel('waitAdminStyles'));
	gulp.watch([settings.pluginLocation + '/admin/js/app.js', settings.pluginLocation + '/admin/js/mods/*.js'], gulp.parallel('waitAdminScripts'));
});

gulp.task('waitPluginStyles', gulp.series('css:plugin', function() {
	return gulp.src(settings.pluginLocation + '/public/style.css')
	.pipe(browserSync.stream());
}));

gulp.task('waitPluginScripts', gulp.series('js:plugin', function(cb) {
	browserSync.reload();
	cb();
}));

gulp.task('waitAdminStyles', gulp.series('css:admin', function() {
	return gulp.src(settings.pluginLocation + '/public/admin/style.css')
	.pipe(browserSync.stream());
}));

gulp.task('waitAdminScripts', gulp.series('js:admin', function(cb) {
	browserSync.reload();
	cb();
}));
