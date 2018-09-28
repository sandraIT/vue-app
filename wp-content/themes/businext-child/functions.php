<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue child scripts
 */
if ( ! function_exists( 'businext_child_enqueue_scripts' ) ) {
	function businext_child_enqueue_scripts() {
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG == true ? '' : '.min';

		wp_enqueue_style( 'businext-style', BUSINEXT_THEME_URI . "/style{$min}.css" );
		wp_enqueue_style( 'businext-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'businext-style' ), wp_get_theme()->get( 'Version' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'businext_child_enqueue_scripts' );
