<?php
/**
 * Plugin Name: SocialFloat
 * Description: A floating social media buttons plugin for easy content sharing.
 * Version: 1.0
 * Author: Gabriel Ceschini
 * Author URI: https://www.linkedin.com/in/gceschini/
 */

// Exit if accessed directly.
if ( !defined('ABSPATH') ) {
    exit;
}

// Define plugin constants.
define('SOCIALFLOAT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SOCIALFLOAT_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include required files.
require_once SOCIALFLOAT_PLUGIN_DIR . 'includes/socialfloat-functions.php';
require_once SOCIALFLOAT_PLUGIN_DIR . 'includes/socialfloat-admin.php';
require_once SOCIALFLOAT_PLUGIN_DIR . 'includes/socialfloat-public.php';

function socialfloat_init() {

    // Initialize admin functionality.
    if ( is_admin() ) {
        SocialFloat_Admin::instance();
    }

    // Initialize public functionality.
    SocialFloat_Public::instance();
}

add_action('plugins_loaded', 'socialfloat_init');

// Activation and deactivation hooks.
register_activation_hook(__FILE__, 'socialfloat_activate');
register_deactivation_hook(__FILE__, 'socialfloat_deactivate');

// Plugin activation function.
function socialfloat_activate() {
    // Add activation tasks here.
}

// Plugin deactivation function.
function socialfloat_deactivate() {
    // Add deactivation tasks here.
}
