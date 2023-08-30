<?php
/**
 * Template file for rendering the plugin settings page.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

?>
<div class="wrap">
    <h1>SocialFloat Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('socialfloat-settings-group');
        do_settings_sections('socialfloat-settings');
        submit_button();
        ?>
    </form>
</div>
