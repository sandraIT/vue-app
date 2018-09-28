<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles.
 */
if ( ! class_exists( 'Businext_Enqueue' ) ) {
	class Businext_Enqueue {

		protected static $instance = null;

		public function __construct() {
			add_filter( 'stylesheet_uri', array( $this, 'use_minify_stylesheet' ), 10, 2 );

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

			add_filter( 'wpcf7_load_js', '__return_false' );
			add_filter( 'wpcf7_load_css', '__return_false' );

			add_action( 'init', array( $this, 'remove_hint_from_swatches' ), 99 );

			add_action( 'wp_enqueue_scripts', array( $this, 'dequeue_woocommerce_styles_scripts' ), 99 );
			add_action( 'wp_enqueue_scripts', array( $this, 'dequeue_woo_smart_wishlist_scripts' ), 99 );
		}

		function use_minify_stylesheet( $stylesheet, $stylesheet_dir ) {
			if ( file_exists( get_template_directory_uri() . '/style.min.css' ) ) {
				$stylesheet = get_template_directory_uri() . '/style.min.css';
			}

			return $stylesheet;
		}

		function dequeue_woocommerce_styles_scripts() {
			if ( function_exists( 'is_woocommerce' ) ) {
				if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
					// Scripts + Styles from Woo Smart Compare
					wp_dequeue_script( 'wooscp-frontend' );
					wp_dequeue_script( 'dragarrange' );
					wp_dequeue_script( 'tableHeadFixer' );
				}
			}
		}

		function dequeue_woo_smart_wishlist_scripts() {
			if ( ! class_exists( 'WPcleverWoosw' ) ) {
				return;
			}

			// Dequeue feather font
			wp_dequeue_style( 'feather' );
			wp_dequeue_script( 'woosw-frontend' );
		}

		function enqueue_woocommerce_styles_scripts() {
			wp_enqueue_script( 'wooscp-frontend' );
			wp_enqueue_script( 'dragarrange' );
			wp_enqueue_script( 'tableHeadFixer' );

			wp_enqueue_script( 'woosw-frontend' );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function remove_hint_from_swatches() {
			add_action( 'wp_enqueue_scripts', array(
				$this,
				'remove_hint',
			) );

		}

		public function remove_hint() {
			wp_dequeue_style( 'hint' );
		}

		/**
		 * Enqueue scripts & styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			$post_type = get_post_type();
			$min       = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG == true ? '' : '.min';

			// Remove prettyPhoto, default light box of woocommerce.
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );

			// Prevent enqueue ihotspot on all pages then only enqueue when use.
			wp_dequeue_script( 'ihotspot-js' );
			wp_dequeue_style( 'ihotspot' );

			// Remove font awesome from Yith Wishlist plugin.
			//wp_dequeue_style( 'yith-wcwl-font-awesome' );

			wp_register_style( 'font-ion', BUSINEXT_THEME_URI . '/assets/fonts/ion/font-ion.min.css', null, null );

			wp_register_style( 'spinkit', BUSINEXT_THEME_URI . '/assets/libs/spinkit/spinkit.css', null, null );

			wp_register_style( 'justifiedGallery', BUSINEXT_THEME_URI . '/assets/libs/justifiedGallery/justifiedGallery.min.css', null, '3.6.3' );
			wp_register_script( 'justifiedGallery', BUSINEXT_THEME_URI . '/assets/libs/justifiedGallery/jquery.justifiedGallery.min.js', array( 'jquery' ), '3.6.3', true );

			wp_register_style( 'lightgallery', BUSINEXT_THEME_URI . '/assets/libs/lightGallery/css/lightgallery.min.css', null, '1.6.4' );
			wp_register_script( 'lightgallery', BUSINEXT_THEME_URI . "/assets/libs/lightGallery/js/lightgallery-all{$min}.js", array(
				'jquery',
				'picturefill',
				'mousewheel',
			), null, true );

			wp_register_style( 'swiper', BUSINEXT_THEME_URI . '/assets/libs/swiper/css/swiper.min.css', null, '4.0.3' );
			wp_register_script( 'swiper', BUSINEXT_THEME_URI . "/assets/libs/swiper/js/swiper{$min}.js", array( 'jquery' ), '4.0.3', true );

			wp_register_style( 'magnific-popup', BUSINEXT_THEME_URI . '/assets/libs/magnific-popup/magnific-popup.css' );
			wp_register_script( 'magnific-popup', BUSINEXT_THEME_URI . '/assets/libs/magnific-popup/jquery.magnific-popup.js', array( 'jquery' ), BUSINEXT_THEME_VERSION, true );

			wp_register_style( 'growl', BUSINEXT_THEME_URI . '/assets/libs/growl/css/jquery.growl.min.css', null, '1.3.3' );
			wp_register_script( 'growl', BUSINEXT_THEME_URI . "/assets/libs/growl/js/jquery.growl{$min}.js", array( 'jquery' ), '1.3.3', true );

			wp_register_script( 'time-circle', BUSINEXT_THEME_URI . "/assets/libs/time-circle/TimeCircles{$min}.js", array( 'jquery' ), '1.3.3', true );

			/*
			 * Begin Register scripts to be enqueued later using the wp_enqueue_script() function.
			 */

			wp_register_script( 'slimscroll', BUSINEXT_THEME_URI . '/assets/libs/slimscroll/jquery.slimscroll.min.js', array( 'jquery' ), '1.3.8', true );
			wp_register_script( 'easing', BUSINEXT_THEME_URI . '/assets/libs/easing/jquery.easing.min.js', array( 'jquery' ), '1.3', true );
			wp_register_script( 'matchheight', BUSINEXT_THEME_URI . '/assets/libs/matchHeight/jquery.matchHeight-min.js', array( 'jquery' ), BUSINEXT_THEME_VERSION, true );
			wp_register_script( 'gmap3', BUSINEXT_THEME_URI . '/assets/libs/gmap3/gmap3.min.js', array( 'jquery' ), BUSINEXT_THEME_VERSION, true );
			wp_register_script( 'countdown', BUSINEXT_THEME_URI . '/assets/libs/jquery.countdown/js/jquery.countdown.min.js', array( 'jquery' ), BUSINEXT_THEME_VERSION, true );
			wp_register_script( 'typed', BUSINEXT_THEME_URI . '/assets/libs/typed/typed.min.js', array( 'jquery' ), null, true );

			// Fix Wordpress old version not registered this script.
			if ( ! wp_script_is( 'imagesloaded', 'registered' ) ) {
				wp_register_script( 'imagesloaded', BUSINEXT_THEME_URI . '/assets/libs/imagesloaded/imagesloaded.min.js', array( 'jquery' ), null, true );
			}

			wp_register_script( 'isotope-masonry', BUSINEXT_THEME_URI . '/assets/libs/isotope/js/isotope.pkgd.min.js', array( 'jquery' ), BUSINEXT_THEME_VERSION, true );
			wp_register_script( 'isotope-packery', BUSINEXT_THEME_URI . '/assets/libs/packery-mode/packery-mode.pkgd.min.js', array(
				'jquery',
				'imagesloaded',
				'isotope-masonry',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'sticky-kit', BUSINEXT_THEME_URI . '/assets/js/jquery.sticky-kit.min.js', array(
				'jquery',
				'businext-script',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'smooth-scroll', BUSINEXT_THEME_URI . '/assets/libs/smooth-scroll-for-web/SmoothScroll.min.js', array(
				'jquery',
			), '1.4.6', true );

			wp_register_script( 'picturefill', BUSINEXT_THEME_URI . '/assets/libs/picturefill/picturefill.min.js', array( 'jquery' ), null, true );

			wp_register_script( 'mousewheel', BUSINEXT_THEME_URI . "/assets/libs/mousewheel/jquery.mousewheel{$min}.js", array( 'jquery' ), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'lazyload', BUSINEXT_THEME_URI . "/assets/libs/lazyload/lazyload{$min}.js", array(), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'tween-max', BUSINEXT_THEME_URI . '/assets/libs/tween-max/TweenMax.min.js', array(
				'jquery',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'firefly', BUSINEXT_THEME_URI . "/assets/js/firefly{$min}.js", array(
				'jquery',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'wavify', BUSINEXT_THEME_URI . "/assets/js/wavify{$min}.js", array(
				'jquery',
				'tween-max',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'odometer', BUSINEXT_THEME_URI . '/assets/libs/odometer/odometer.min.js', array(
				'jquery',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'counter-up', BUSINEXT_THEME_URI . '/assets/libs/counterup/jquery.counterup.min.js', array(
				'jquery',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'counter', BUSINEXT_THEME_URI . "/assets/js/counter{$min}.js", array(
				'jquery',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'chart-js', BUSINEXT_THEME_URI . '/assets/libs/chart/Chart.min.js', array(
				'jquery',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'advanced-chart', BUSINEXT_THEME_URI . "/assets/js/advanced-chart{$min}.js", array(
				'jquery',
				'waypoints',
				'chart-js',
			), BUSINEXT_THEME_VERSION, true );

			wp_register_script( 'circle-progress', BUSINEXT_THEME_URI . '/assets/libs/circle-progress/circle-progress.min.js', array( 'jquery' ), null, true );
			wp_register_script( 'circle-progress-chart', BUSINEXT_THEME_URI . "/assets/js/circle-progress-chart{$min}.js", array(
				'jquery',
				'waypoints',
				'circle-progress',
			), null, true );

			wp_register_script( 'businext-pricing', BUSINEXT_THEME_URI . "/assets/js/pricing{$min}.js", array(
				'jquery',
				'matchheight',
			), null, true );

			wp_register_script( 'businext-accordion', BUSINEXT_THEME_URI . "/assets/js/accordion{$min}.js", array( 'jquery' ), BUSINEXT_THEME_VERSION, true );

			/*
			 * Enqueue the theme's style.css.
			 * This is recommended because we can add inline styles there
			 * and some plugins use it to do exactly that.
			 */
			wp_enqueue_style( 'businext-style', get_stylesheet_uri() );
			wp_enqueue_style( 'font-ion' );
			wp_enqueue_style( 'swiper' );
			wp_enqueue_style( 'spinkit' );

			/*
			 * End register scripts
			 */

			if ( Businext::setting( 'header_sticky_enable' ) ) {
				wp_enqueue_script( 'headroom', BUSINEXT_THEME_URI . "/assets/js/headroom{$min}.js", array( 'jquery' ), BUSINEXT_THEME_VERSION, true );
			}

			if ( Businext::setting( 'smooth_scroll_enable' ) ) {
				wp_enqueue_script( 'smooth-scroll' );
			}

			wp_enqueue_script( 'matchheight' );
			wp_enqueue_script( 'jquery-smooth-scroll', BUSINEXT_THEME_URI . '/assets/libs/smooth-scroll/jquery.smooth-scroll.min.js', array( 'jquery' ), BUSINEXT_THEME_VERSION, true );
			wp_enqueue_script( 'swiper' );
			wp_enqueue_script( 'waypoints', BUSINEXT_THEME_URI . '/assets/libs/waypoints/jquery.waypoints.min.js', array( 'jquery' ), BUSINEXT_THEME_VERSION, true );
			wp_enqueue_script( 'smartmenus', BUSINEXT_THEME_URI . "/assets/libs/smartmenus/jquery.smartmenus{$min}.js", array( 'jquery' ), BUSINEXT_THEME_VERSION, true );
			//wp_enqueue_script( 'slimscroll' );

			wp_enqueue_style( 'perfect-scrollbar', BUSINEXT_THEME_URI . '/assets/libs/perfect-scrollbar/css/perfect-scrollbar.min.css' );
			wp_enqueue_style( 'perfect-scrollbar-woosw', BUSINEXT_THEME_URI . '/assets/libs/perfect-scrollbar/css/custom-theme.css' );
			wp_enqueue_script( 'perfect-scrollbar', BUSINEXT_THEME_URI . '/assets/libs/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js', array( 'jquery' ), BUSINEXT_THEME_VERSION, true );

			if ( Businext::setting( 'notice_cookie_enable' ) && ! isset( $_COOKIE['notice_cookie_confirm'] ) ) {
				wp_enqueue_script( 'growl' );
				wp_enqueue_style( 'growl' );
			}

			if ( Businext::setting( 'lazy_load_images' ) ) {
				wp_enqueue_script( 'lazyload' );
			}

			//  Enqueue styles & scripts for single portfolio pages.
			if ( is_singular() ) {

				switch ( $post_type ) {
					case 'portfolio':
						$single_portfolio_sticky = Businext::setting( 'single_portfolio_sticky_detail_enable' );
						if ( $single_portfolio_sticky == '1' ) {
							wp_enqueue_script( 'sticky-kit' );
						}

						wp_enqueue_style( 'lightgallery' );
						wp_enqueue_script( 'lightgallery' );
						break;

					case 'product':
						wp_enqueue_style( 'lightgallery' );
						wp_enqueue_script( 'lightgallery' );
						break;
				}
			}

			/*
			 * The comment-reply script.
			 */
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				if ( $post_type === 'post' ) {
					if ( Businext::setting( 'single_post_comment_enable' ) === '1' ) {
						wp_enqueue_script( 'comment-reply' );
					}
				} elseif ( $post_type === 'portfolio' ) {
					if ( Businext::setting( 'single_portfolio_comment_enable' ) === '1' ) {
						wp_enqueue_script( 'comment-reply' );
					}
				} elseif ( $post_type === 'case_study' ) {
					if ( Businext::setting( 'single_case_study_comment_enable' ) === '1' ) {
						wp_enqueue_script( 'comment-reply' );
					}
				} elseif ( $post_type === 'service' ) {
					if ( Businext::setting( 'single_service_comment_enable' ) === '1' ) {
						wp_enqueue_script( 'comment-reply' );
					}
				} else {
					wp_enqueue_script( 'comment-reply' );
				}
			}

			$maintenance_templates = Businext_Maintenance::get_maintenance_templates_dir();

			if ( is_page_template( $maintenance_templates ) || is_404() ) {
				wp_enqueue_script( 'time-circle' );
				wp_enqueue_script( 'wavify' );
				wp_enqueue_script( 'businext-maintenance', BUSINEXT_THEME_URI . "/assets/js/maintenance{$min}.js", array( 'jquery' ), BUSINEXT_THEME_VERSION, true );
			}

			wp_enqueue_script( 'wpb_composer_front_js' );

			/*
			 * Enqueue main JS
			 */
			wp_enqueue_script( 'businext-script', BUSINEXT_THEME_URI . "/assets/js/main{$min}.js", array(
				'jquery',
			), BUSINEXT_THEME_VERSION, true );

			if ( Businext_Helper::active_woocommerce() ) {
				if ( Businext::setting( 'shop_archive_quick_view' ) === '1' ) {
					if ( is_shop() || is_cart() || is_product() || ( function_exists( 'is_product_taxonomy' ) && is_product_taxonomy() ) ) {
						wp_enqueue_style( 'magnific-popup' );
						wp_enqueue_script( 'magnific-popup' );
					}
				}

				wp_enqueue_script( 'businext-woo', BUSINEXT_THEME_URI . "/assets/js/woo{$min}.js", array(
					'businext-script',
				), BUSINEXT_THEME_VERSION, true );
			}

			/*
			 * Enqueue custom variable JS
			 */

			$js_variables = array(
				'templateUrl'               => BUSINEXT_THEME_URI,
				'ajaxurl'                   => admin_url( 'admin-ajax.php' ),
				'primary_color'             => Businext::setting( 'primary_color' ),
				'header_sticky_enable'      => Businext::setting( 'header_sticky_enable' ),
				'header_sticky_height'      => Businext::setting( 'header_sticky_height' ),
				'scroll_top_enable'         => Businext::setting( 'scroll_top_enable' ),
				'lazyLoadImages'            => Businext::setting( 'lazy_load_images' ),
				'light_gallery_auto_play'   => Businext::setting( 'light_gallery_auto_play' ),
				'light_gallery_download'    => Businext::setting( 'light_gallery_download' ),
				'light_gallery_full_screen' => Businext::setting( 'light_gallery_full_screen' ),
				'light_gallery_zoom'        => Businext::setting( 'light_gallery_zoom' ),
				'light_gallery_thumbnail'   => Businext::setting( 'light_gallery_thumbnail' ),
				'light_gallery_share'       => Businext::setting( 'light_gallery_share' ),
				'mobile_menu_breakpoint'    => Businext::setting( 'mobile_menu_breakpoint' ),
				'isSingleProduct'           => is_singular( 'product' ),
				'noticeCookieEnable'        => Businext::setting( 'notice_cookie_enable' ),
				'noticeCookieConfirm'       => isset( $_COOKIE['notice_cookie_confirm'] ) ? 'yes' : 'no',
				'noticeCookieMessages'      => Businext::setting( 'notice_cookie_messages' ) . wp_kses( __( '<a id="tm-button-cookie-notice-ok" class="tm-button tm-button-xs tm-button-full-wide tm-button-primary style-outline">OK, GOT IT</a>', 'businext' ), 'businext-default' ),
				'noticeCookieOKMessages'    => Businext::setting( 'notice_cookie_ok' ),
				'like'                      => esc_html__( 'Like', 'businext' ),
				'unlike'                    => esc_html__( 'Unlike', 'businext' ),
			);
			wp_localize_script( 'businext-script', '$insight', $js_variables );

			/**
			 * Custom JS
			 */
			if ( Businext::setting( 'custom_js_enable' ) == 1 ) {
				wp_add_inline_script( 'businext-script', html_entity_decode( Businext::setting( 'custom_js' ) ) );
			}
		}
	}

	new Businext_Enqueue();
}
