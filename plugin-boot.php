<?php
/**
 * Plugin Name: Plugin Boot
 * Plugin URI: https://github.com/supergiulab/plugin-boot
 * Description: Boilerplate for Wordpress Plugin
 * Version: 1.0.0
 * Author: SuPerGiu
 * Author URI: https://supergiulab.com
 * License: GPL v2 or later
 * Text Domain: plugin-boot
 */
defined( 'ABSPATH' ) or die( 'You can\'t access this file' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
	Mustache_Autoloader::register();
}

use Inc\SetupPlugin;

$plugin = new SetupPlugin();

/**
 * Define Plugin PATH and URL
 */
// define('PB_PLUGIN_PATH', plugin_dir_path(__FILE__));
// define('PB_PLUGIN_URL', plugin_dir_url(__FILE__));