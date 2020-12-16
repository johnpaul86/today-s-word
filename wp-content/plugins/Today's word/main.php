<?php
/*
Plugin Name: Today's word
Description: This is an assignment plugin for implesys. This plugin displays as widget and search for words from word post type from the WordPress core.
Version: 1.0
Author: John
Author URI: https://www.linkedin.com/in/johnpaul-ob-83910889/
*/

define( 'TW_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( TW_PLUGIN_DIR . 'class.widget.php' );
require_once( TW_PLUGIN_DIR . 'display.widget.php' );

add_action( 'wp_enqueue_scripts', 'tw_styles_scripts' );

function tw_styles_scripts() {
	wp_enqueue_style('tw_widget_css', trailingslashit( plugin_dir_url( __FILE__ ) ).'css/style.css', array(), '1.0', false);
	wp_enqueue_script( 'tw_widget_js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/widget.js', array('jquery'), '1.0' );
	wp_localize_script( 'tw_widget_js', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
}