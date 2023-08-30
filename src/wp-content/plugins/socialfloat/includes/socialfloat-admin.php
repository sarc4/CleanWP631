<?php
/**
 * Handles the administration functionality of the SocialFloat plugin.
 */
class SocialFloat_Admin {

    private static $instance;

    public static function instance() {

        if ( !isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        // Add admin menu.
        add_action('admin_menu', array($this, 'add_admin_menu'));

        // Register settings.
        add_action('admin_init', array($this, 'register_settings'));

        // Add settings.
        add_action('admin_init', array($this, 'add_settings'));
    }

    // Add admin menu page.
    public function add_admin_menu() {

        add_menu_page(
            'SocialFloat Settings',
            'SocialFloat',
            'manage_options',
            'socialfloat-settings',
            array($this, 'admin_page_callback'),
            'dashicons-share',
            50
        );

    }

    // Callback function to render admin page.
    public function admin_page_callback() {
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
        <?php
    }

    // Register plugin settings.
    public function register_settings() {

        // Register social networks setting.
        register_setting(
            'socialfloat-settings-group',
            'socialfloat_networks',
            array($this, 'sanitize_networks')
        );

        // Register enable site setting.
        register_setting(
            'socialfloat-settings-group',
            'socialfloat_enable_site',
            array($this, 'sanitize_enable_site')
        );
        
        // Register enable feed setting.
        register_setting(
            'socialfloat-settings-group',
            'socialfloat_enable_feed',
            array($this, 'sanitize_enable_feed')
        );

    }

    // Add plugin settings.
    public function add_settings() {
        
        // Add settings section.
        add_settings_section(
            'socialfloat-settings-section',
            'Social Media Networks',
            array($this, 'settings_section_callback'),
            'socialfloat-settings'
        );

        // Add setting network fields.
        add_settings_field(
            'socialfloat-networks',
            'Select Networks',
            array($this, 'networks_field_callback'),
            'socialfloat-settings',
            'socialfloat-settings-section'
        );

        // Add setting enable site field.
        add_settings_field(
            'socialfloat-enable-site',
            'Enable icons on Site Pages',
            array($this, 'enable_site_callback'),
            'socialfloat-settings',
            'socialfloat-settings-section'
        );
        
        // Add setting enable post field.
        add_settings_field(
            'socialfloat-enable-feed',
            'Enable icons on Blog posts',
            array($this, 'enable_feed_callback'),
            'socialfloat-settings',
            'socialfloat-settings-section'
        );

    }

    public function sanitize_networks( $input ) {

        $allowed_networks = array('facebook', 'whatsapp', 'twitter', 'linkedin', 'pinterest' );
        
        if ( !is_array( $input ) ) {
            $input = array();
        }
    
        return array_intersect($input, $allowed_networks);
    
    }

    public function settings_section_callback() {
        echo 'Choose the social media networks to display:';
    }

    public function networks_field_callback() {
        $selected_networks = get_option( 'socialfloat_networks', array() );

        $networks = array(
            'facebook'  => 'Facebook',
            'whatsapp'  => 'WhatsApp',
            'twitter'   => 'Twitter',
            'linkedin'  => 'LinkedIn',
            'pinterest' => 'Pinterest',
        );

        foreach ( $networks as $network_id => $network_label ) {
            echo '<label><input type="checkbox" name="socialfloat_networks[]" value="' . $network_id . '" ';

            checked( in_array( $network_id, $selected_networks ) );

            echo '/> ' . esc_html($network_label) . '</label><br>';
        }
    }
    
    public function enable_site_callback() {
        $enable_site = get_option( 'socialfloat_enable_site', false );
        
        echo '<label><input type="checkbox" name="socialfloat_enable_site" value="1" ' . checked(1, $enable_site, false) . '> Enable icons on Site Pages</label>';
        echo '<p class="description">If enabled, icons will be displayed on all single pages and posts pages, to share the current page.</p>';
    }
    
    public function enable_feed_callback() {
        $enable_feed = get_option( 'socialfloat_enable_feed', false );
        
        echo '<label><input type="checkbox" name="socialfloat_enable_feed" value="1" ' . checked(1, $enable_feed, false) . '> Enable icons on Blog Posts</label>';
        echo '<p class="description">If enabled, icons will be displayed on blog entries, to share the post.</p>';
    }

}

SocialFloat_Admin::instance();
