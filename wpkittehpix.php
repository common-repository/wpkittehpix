<?php
/*
Plugin Name: WPKittehPix
Plugin URI: uri
Description: WPKittehPix is a WordPress plugin that pulls in random placeholder images based on http://placekitten.com Can be used in any page, post or text widget.
Version: 1.0
Author: Lee Rickler
Author URI: http://rickler.com
License: license
License URI: license uri
*/

function wpkittehpix_shortcode( $atts ) {
    extract( shortcode_atts( array(
        'width' => '300',
        'height' => '300',
        'hue' => isset($atts['hue']),
    ), $atts ) );
            if($hue){
        $hue = 'g/';
    } else {
        $hue = '';
    }
    $pands = '<div class="wpkittehpix">';
    $pands .= '<img src="http://placekitten.com/';
    $pands .= esc_attr($hue) . '' . esc_attr($width) . '/' . esc_attr($height) . '" />';
    $pands .= '</div>';
    return $pands;
}
add_shortcode('wpkittehpix', 'wpkittehpix_shortcode');
if ( !is_admin() ): 
    add_filter('widget_text', 'do_shortcode', 11);
endif;
?>