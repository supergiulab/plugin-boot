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

/**
 * Define Plugin PATH and URL
 */
define('PB_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PB_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Require Dependencies
 */
require_once PB_PLUGIN_PATH . '/inc/settings.php';
require_once PB_PLUGIN_PATH . '/inc/template-tags.php';
require_once PB_PLUGIN_PATH . '/inc/hooks.php';

/**
 * Hooks And Filters
 */
add_action('init', 'plugin_boot_init');
add_action('admin_menu', 'plugin_boot_add_option_page');
register_activation_hook(__FILE__, 'plugin_boot_activation_hook');
register_deactivation_hook(__FILE__, 'plugin_boot_deactivation_hook');

/**
 * Register Plugin Scripts and Styles
 */
add_action( 'wp_enqueue_scripts', 'plugin_boot_register_assets' );
add_action( 'admin_enqueue_scripts', 'plugin_boot_register_admin_assets' );

/**
 * Methods
 */
/** Activation */
function plugin_boot_activation_hook() {}

/** Deactivation */
function plugin_boot_deactivation_hook() {}

/** Plugin Init */
function plugin_boot_init() {}

/** Admin Option Page */
function plugin_boot_add_option_page() {}

/** Register Assets */
function plugin_boot_register_assets() {}

/** Register Admin Assets */
function plugin_boot_register_admin_assets() {}