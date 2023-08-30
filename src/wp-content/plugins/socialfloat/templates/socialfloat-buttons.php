<?php
/**
 * Template file for rendering the floating social media buttons.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

$selected_networks = get_option('socialfloat_networks', array());

if (!empty($selected_networks)) {
    echo '<div class="socialfloat-container">';
    echo '<ul class="socialfloat-list">';

    foreach ($selected_networks as $network) {
        echo '<li class="socialfloat-item">';
        echo '<a href="#" class="socialfloat-link socialfloat-' . esc_attr($network) . '"></a>';
        echo '</li>';
    }

    echo '</ul>';
    echo '</div>';
}
