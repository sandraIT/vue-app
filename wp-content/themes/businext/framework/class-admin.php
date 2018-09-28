<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do nothing if not an admin page.
if ( ! is_admin() ) {
	return;
}

/**
 * Hook & filter that run only on admin pages.
 */
if ( ! class_exists( 'Businext_Admin' ) ) {
	class Businext_Admin {

		protected static $instance = null;

		public function __construct() {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Enqueue scrips & styles.
		 *
		 * @access public
		 */
		public function enqueue_scripts() {
			wp_enqueue_style( 'businext-admin', BUSINEXT_THEME_URI . '/assets/admin/css/style.min.css' );
			$screen = get_current_screen();
			if ( $screen->id === 'nav-menus' ) {
				wp_enqueue_media();
				wp_enqueue_script( 'menu-image-hover', BUSINEXT_THEME_URI . '/assets/admin/js/attach.js', array( 'jquery' ), null, true );
			}
		}

	}

	new Businext_Admin();
}
