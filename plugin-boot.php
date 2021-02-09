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

// Define Plugin Data
$root    = plugin_dir_url(__FILE__);
$version = get_file_data(__FILE__, array('Version'), 'plugin');

// Setup Plugin
use Inc\SetupPlugin;
$plugin = new SetupPlugin($dir, $data);

// Activation and Deactivation Hooks
register_activation_hook(__FILE__, array($plugin, 'activation_hook'));
register_deactivation_hook(__FILE__, array($plugin, 'deactivation_hook'));