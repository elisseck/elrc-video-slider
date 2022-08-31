<?php
/**
* Plugin Name: elrc-video-slider
* Plugin URI: https://github.com/elisseck/elrc-video-slider
* Description: ELRC Video Slider
* Version: 0.1
* Author: Eli Lisseck
* Author URI: https://elisseck.com
**/

require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-direct.php';

function elrc_video_slider_assets() {
  wp_register_style('elrc-video-slider-style', plugins_url(__FILE__) . 'assets/elrc-video-slider.css', array(), '1.0', 'all');
}

function elrc_video_slider_content() {
  $filesystem = new WP_Filesystem_Direct(NULL);
  $html = $filesystem->get_contents(plugin_dir_path(__FILE__) . 'assets/elrc-video-slider.html');
  wp_enqueue_style('elrc_video_slider_assets');

  return $html;
}

add_action( 'init', 'elrc_video_slider_assets' );
add_shortcode('elrc-video-slider', 'elrc_video_slider_content');
