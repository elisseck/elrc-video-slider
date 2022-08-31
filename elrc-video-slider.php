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

function elrc_video_slider_assets() {;

//https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js
}

function elrc_video_slider_content() {
  $filesystem = new WP_Filesystem_Direct(NULL);
  $html = $filesystem->get_contents(plugin_dir_path(__FILE__) . 'assets/elrc-video-slider.html');
  wp_enqueue_style('elrc_video_slider_swiper_css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.min.css', [], '1.0', false);
  wp_enqueue_script('elrc_video_slider_swiper_js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.2/swiper-bundle.min.js', [], '1.0', false);
  wp_enqueue_style('elrc_video_slider_assets', plugin_dir_url(__FILE__) . 'assets/elrc-video-slider.css', [], '1.0', false);
  wp_enqueue_script('elrc_video_slick_init', plugin_dir_url(__FILE__) . 'assets/elrc-video-slider.js', [], '1.0', true);


  return $html;
}

add_action( 'init', 'elrc_video_slider_assets' );
add_shortcode('elrc-video-slider', 'elrc_video_slider_content');
