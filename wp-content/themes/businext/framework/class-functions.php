<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 */
if ( ! class_exists( 'Businext_Functions' ) ) {
	class Businext_Functions {

		protected static $instance = null;

		public function __construct() {
			add_action( 'wp_footer', array( $this, 'scroll_top' ) );
			add_action( 'wp_footer', array( $this, 'popup_search' ) );
			add_action( 'wp_footer', array( $this, 'mobile_menu_template' ) );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function popup_search() {
			$search_popup_text = Businext::setting( 'search_popup_text' );
			?>
			<div id="page-popup-search" class="page-popup-search">
				<a id="popup-search-close" href="#" class="popup-search-close"><i class="ion-ios-close-empty"></i></a>
				<div class="page-popup-search-inner">
					<?php get_search_form(); ?>
					<p class="form-description"><?php echo esc_html( $search_popup_text ); ?></p>
				</div>
			</div>
			<?php
		}

		/**
		 * Add mobile to footer
		 */
		public function mobile_menu_template() {
			?>
			<div id="page-mobile-main-menu" class="page-mobile-main-menu">
				<div class="page-mobile-menu-header">
					<div class="page-mobile-menu-logo">
						<?php
						$logo_url = Businext::setting( 'mobile_menu_logo' );
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( $logo_url ); ?>"
							     alt="<?php esc_attr__( 'Logo', 'businext' ); ?>"/>
						</a>
					</div>
					<div id="page-close-mobile-menu" class="page-close-mobile-menu">
						<span class="ion-ios-close-empty"></span>
					</div>
				</div>

				<div class="page-mobile-menu-content">
					<?php Businext::menu_mobile_primary(); ?>
				</div>
			</div>
			<?php
		}

		/**
		 * Scroll to top JS
		 */
		public function scroll_top() {
			?>
			<?php if ( Businext::setting( 'scroll_top_enable' ) ) : ?>
				<a class="page-scroll-up" id="page-scroll-up"><i class="ion-android-arrow-up"></i></a>
			<?php endif; ?>
			<?php
		}

		/**
		 * Pass a PHP string to Javasript variable
		 **/
		public function esc_js( $string ) {
			return str_replace( "\n", '\n', str_replace( '"', '\"', addcslashes( str_replace( "\r", '', (string) $string ), "\0..\37" ) ) );
		}
	}

	new Businext_Functions();
}
