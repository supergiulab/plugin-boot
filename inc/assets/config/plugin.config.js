const path = require('path'),
	  webpack = require('webpack'),
	  settings = require('./settings');

module.exports = {
	entry: settings.pluginLocation + "/js/app.js",
	output: {
		path: settings.basepluginLocation + "/public",
		filename: "app.min.js"
	},
	module: {
		rules: [
		{
			test: /\.js$/,
			exclude: /node_modules/,
			use: {
				loader: 'babel-loader',
				options: {
					presets: ['@babel/preset-env']
				}
			}
		}
		]
	},
	// plugins: [
	// 	new webpack.ProvidePlugin({
	// 		$: 'jquery',
	// 		jQuery: 'jquery',
	// 		'window.jQuery': 'jquery',
	// 	}),
	// ],
	resolve: {
		modules: ['node_modules'],
		alias: {
			'bootstrap.min' : 'bootstrap/dist/js/bootstrap.min.js',
			'owl' : 'owl.carousel/dist/owl.carousel.min.js',
			'masonry-layout' : 'masonry-layout/dist/masonry.pkgd.min.js',
			'waypoints' : 'waypoints/lib/jquery.waypoints.min.js'
		}
	},
	mode: 'production'
	//mode: 'development'
}
