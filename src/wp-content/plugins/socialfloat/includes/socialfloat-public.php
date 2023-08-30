<?php
/**
 * Handles the public-facing functionality of the SocialFloat plugin.
 */
class SocialFloat_Public {

    private static $instance;

    public static function instance() {
        
        if ( !isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        add_filter( 'the_content', array( $this, 'add_buttons_to_content' ) );
    }

    // Function to add floating buttons to content.
    public function add_buttons_to_content( $content ) {

        $enable_site  = get_option( 'socialfloat_enable_site', false );
        $enable_feed  = get_option( 'socialfloat_enable_feed', false );
        
        $show_in_feed = false;
        $show_in_site = false;

        global $post;
        $post_type = $post->post_type;

        if( $enable_feed && $post_type == 'post' && !is_single() ) {
            $show_in_feed = true;
        }

        if( ( $enable_site && is_single() ) || ( $enable_site && is_page() )) {
            $show_in_site = true;
        }

        if ( $show_in_site ) {
            ob_start();
            socialfloat_display_site_buttons();
            $site_buttons_html = ob_get_clean();
    
            $content .= $site_buttons_html;
        }
    
        if ( $show_in_feed ) {
            ob_start();
            socialfloat_display_feed_buttons();
            $feed_buttons_html = ob_get_clean();
            
            $content .= $feed_buttons_html;
        }

        return $content;

    }

    // Function to add floating buttons to post feed images on hover.
    public function add_buttons_to_post_images($content) {
        // Check if the "socialfloat_enable_feed" option is enabled.
        $enable_feed = get_option('socialfloat_enable_feed', false);

        if ($enable_feed && is_single()) {
            // Wrap post images with a container.
            $content = preg_replace_callback(
                '/<img [^>]+>/',
                array($this, 'add_buttons_to_image_callback'),
                $content
            );
        }

        return $content;
    }

    // Callback function to wrap post images and add buttons on hover.
    private function add_buttons_to_image_callback($matches) {
        $image = $matches[0];

        // Add buttons container and image inside it.
        $image_with_buttons = '<div class="socialfloat-post-image">';
        $image_with_buttons .= $image;

        // Add social buttons.
        ob_start();
        socialfloat_display_site_buttons();
        $buttons_html = ob_get_clean();
        $image_with_buttons .= '<div class="socialfloat-buttons">' . $buttons_html . '</div>';

        $image_with_buttons .= '</div>';
        return $image_with_buttons;
    }
}

SocialFloat_Public::instance();
