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

    private $path;
    private $root;
    private $version;

    public function __construct($path, $root, $version){
        $this->path    = $path;
        $this->root    = $root;
        $this->version = $version;

        /**
         * Hooks And Filters
         */
        add_action( 'init', array($this, 'init') );
        add_action( 'admin_menu', array($this, 'add_option_page') );

        /**
         * Register Plugin Scripts and Styles
         */
        add_action( 'wp_enqueue_scripts', array($this, 'register_assets') );
        add_action( 'admin_enqueue_scripts', array($this, 'register_admin_assets') );
    }

    /** Activation */
    public function activation_hook() {
        // wp_die(var_dump("Plugin Activated"));
    }

    /** Deactivation */
    public function deactivation_hook() {
        // wp_die(var_dump("Plugin Deactivated"));
    }

    /** Plugin Init */
    public function init() {
        // var_dump("Plugin Init");
    }

    /** Admin Option Page */
    public function add_option_page() {}

    /** Register Assets */
    public function register_assets() {
        // var_dump("Plugin Assets");
    }

    /** Register Admin Assets */
    public function register_admin_assets() {
        // var_dump("Plugin Admin Assets");
    }
}