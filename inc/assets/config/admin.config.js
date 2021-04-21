const path = require('path'),
	  settings = require('./settings');

module.exports = {
	entry: settings.themeLocation + "/admin/js/app.js",

	output: {
		path: settings.themeLocation + "/admin",
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
	mode: 'development'
}