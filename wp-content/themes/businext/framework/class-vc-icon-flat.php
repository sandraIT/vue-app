<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Businext_VC_Icon_Flat' ) ) {
	class Businext_VC_Icon_Flat {

		public function __construct() {
			/*
			 * Add styles & script file only on add new or edit post type.
			 */
			add_action( 'load-post.php', array( $this, 'enqueue_scripts' ) );
			add_action( 'load-post-new.php', array( $this, 'enqueue_scripts' ) );

			add_filter( 'vc_iconpicker-type-flat', array( $this, 'add_fonts' ) );

			add_action( 'vc_enqueue_font_icon_element', array( $this, 'vc_element_enqueue' ) );

			add_filter( 'businext_vc_icon_libraries', array( $this, 'add_to_libraries' ) );
		}

		public function add_to_libraries( $libraries ) {
			$libraries[ esc_html__( 'Flat', 'businext' ) ] = 'flat';

			return $libraries;
		}

		public function vc_element_enqueue( $font ) {
			switch ( $font ) {
				case 'flat':
					wp_enqueue_style( 'font-flat', BUSINEXT_THEME_URI . '/assets/fonts/flat/font-flat.min.css', null, null );
					break;
			}
		}

		public function enqueue_scripts() {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		}

		function admin_enqueue_scripts() {
			wp_enqueue_style( 'font-flat', BUSINEXT_THEME_URI . '/assets/fonts/flat/font-flat.min.css', null, null );
		}

		public function add_fonts( $icons ) {
			$new_icons = array(
				array( 'flaticon-light-bulb' => 'light bulb' ),
				array( 'flaticon-light-bulb-1' => 'light bulb 1' ),
				array( 'flaticon-sprout' => 'sprout' ),
				array( 'flaticon-goal' => 'goal' ),
				array( 'flaticon-visualization' => 'visualization' ),
				array( 'flaticon-trophy' => 'trophy' ),
				array( 'flaticon-cup' => 'cup' ),
				array( 'flaticon-panel' => 'panel' ),
				array( 'flaticon-briefcase' => 'briefcase' ),
				array( 'flaticon-bar-chart' => 'bar chart' ),
				array( 'flaticon-startup' => 'startup' ),
				array( 'flaticon-dollar' => 'dollar' ),
				array( 'flaticon-thinking' => 'thinking' ),
				array( 'flaticon-management' => 'management' ),
				array( 'flaticon-time' => 'time' ),
				array( 'flaticon-humanpictos' => 'humanpictos' ),
				array( 'flaticon-team' => 'team' ),
				array( 'flaticon-package' => 'package' ),
				array( 'flaticon-teamwork' => 'teamwork' ),
				array( 'flaticon-care' => 'care' ),
				array( 'flaticon-handshake' => 'handshake' ),
				array( 'flaticon-puzzle' => 'puzzle' ),
				array( 'flaticon-networking' => 'networking' ),
				array( 'flaticon-networking-1' => 'networking 1' ),
				array( 'flaticon-networking-2' => 'networking 2' ),
				array( 'flaticon-user' => 'user' ),
				array( 'flaticon-user-1' => 'user 1' ),
				array( 'flaticon-chat' => 'chat' ),
				array( 'flaticon-group' => 'group' ),
				array( 'flaticon-worldwide' => 'worldwide' ),
				array( 'flaticon-podium' => 'podium' ),
				array( 'flaticon-idea-1' => 'idea 1' ),
				array( 'flaticon-idea-2' => 'idea 2' ),
				array( 'flaticon-laptop' => 'laptop' ),
				array( 'flaticon-laptop-1' => 'laptop 1' ),
				array( 'flaticon-target' => 'target' ),
				array( 'flaticon-coin' => 'coin' ),
				array( 'flaticon-coin-1' => 'coin 1' ),
				array( 'flaticon-presentation' => 'presentation' ),
				array( 'flaticon-flag' => 'flag' ),
				array( 'flaticon-diamond' => 'diamond' ),
				array( 'flaticon-like' => 'like' ),
				array( 'flaticon-settings' => 'settings' ),
				array( 'flaticon-ipo' => 'ipo' ),
				array( 'flaticon-contract' => 'contract' ),
				array( 'flaticon-line-chart' => 'line chart' ),
				array( 'flaticon-idea' => 'idea' ),
				array( 'flaticon-hourglass' => 'hourglass' ),
				array( 'flaticon-money-bag' => 'money bag' ),
				array( 'flaticon-stationery' => 'stationery' ),
				array( 'flaticon-growth' => 'growth' ),
				array( 'flaticon-medal' => 'medal' ),
				array( 'flaticon-projector' => 'projector' ),
				array( 'flaticon-smile' => 'smile' ),
				array( 'flaticon-star' => 'star' ),
			);

			return array_merge( $icons, $new_icons );
		}
	}

	new Businext_VC_Icon_Flat();
}
