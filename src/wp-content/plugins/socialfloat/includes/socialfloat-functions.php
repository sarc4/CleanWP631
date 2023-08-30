<?php
/**
 * Provides general helper functions for the SocialFloat plugin.
 */

// Exit if accessed directly.
if ( !defined('ABSPATH') ) {
    exit;
}

// Function to enqueue styles and scripts.
function socialfloat_enqueue_assets() {
    wp_enqueue_style('socialfloat-style', SOCIALFLOAT_PLUGIN_URL . 'assets/css/socialfloat-style.css', array(), '1.0');
    wp_enqueue_script('socialfloat-script', SOCIALFLOAT_PLUGIN_URL . 'assets/js/socialfloat-script.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'socialfloat_enqueue_assets');

// Function to display floating social buttons.
function socialfloat_display_site_buttons() {

    $selected_networks = get_option('socialfloat_networks', array());

    if ( !empty( $selected_networks ) ) {
        echo '<div class="socialfloat-container">';
        echo '<ul class="socialfloat-list">';

        foreach ( $selected_networks as $network ) {
            echo '<li class="socialfloat-item">';
            echo '<a href="#" class="socialfloat-link socialfloat-' . esc_attr($network) . '"></a>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>';
    }

}

// Function to display floating feed social buttons.
function socialfloat_display_feed_buttons() {
    $selected_networks = get_option('socialfloat_networks', array());

    if (!empty($selected_networks)) {
        echo '<div class="socialfloat-feed-container">';
        echo '<ul class="socialfloat-feed-list">';

        foreach ($selected_networks as $network) {
            echo '<li class="socialfloat-feed-item">';
            echo '<a href="#" class="socialfloat-feed-link socialfloat-' . esc_attr($network) . '"></a>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>';
    }
}
