<?php
/**
 * Setup Plugin
 * 
 * @package plugin-boot
 */
namespace Inc;

/** Don't load directly */
if( ! defined('ABSPATH') ) exit;

class SetupPlugin {
    public function __constructor(){
        /**
         * Hooks And Filters
         */
        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'add_option_page'));
        register_activation_hook(__FILE__, array($this, 'activation_hook'));
        register_deactivation_hook(__FILE__, array($this, 'deactivation_hook'));

        /**
         * Register Plugin Scripts and Styles
         */
        add_action( 'wp_enqueue_scripts', array($this, 'register_assets') );
        add_action( 'admin_enqueue_scripts', array($this, 'register_admin_assets') );
    }

    /** Activation */
    public function activation_hook() {}

    /** Deactivation */
    public function deactivation_hook() {}

    /** Plugin Init */
    public function init() {}

    /** Admin Option Page */
    public function add_option_page() {}

    /** Register Assets */
    public function register_assets() {}

    /** Register Admin Assets */
    public function register_admin_assets() {}
}