<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom filters that act independently of the theme templates
 */
if ( ! class_exists( 'Businext_Actions_Filters' ) ) {
	class Businext_Actions_Filters {

		protected static $instance = null;

		public function __construct() {
			add_filter( 'wp_kses_allowed_html', array( $this, 'wp_kses_allowed_html' ), 2, 99 );

			/* Move post count inside the link */
			add_filter( 'wp_list_categories', array( $this, 'move_post_count_inside_link_category' ) );
			/* Move post count inside the link */
			add_filter( 'get_archives_link', array( $this, 'move_post_count_inside_link_archive' ) );

			add_filter( 'comment_form_fields', array( $this, 'move_comment_field_to_bottom' ) );

			add_filter( 'embed_oembed_html', array( $this, 'add_wrapper_for_video' ), 10, 3 );
			add_filter( 'video_embed_html', array( $this, 'add_wrapper_for_video' ) ); // Jetpack.

			add_filter( 'excerpt_length', array(
				$this,
				'custom_excerpt_length',
			), 999 ); // Change excerpt length is set to 55 words by default.

			// Adds custom classes to the array of body classes.
			add_filter( 'body_class', array( $this, 'body_classes' ) );

			// Adds custom attributes to body tag.
			add_filter( 'businext_body_attributes', array( $this, 'add_attributes_to_body' ) );

			if ( ! is_admin() ) {
				add_action( 'pre_get_posts', array( $this, 'alter_search_loop' ), 1 );
				add_filter( 'pre_get_posts', array( $this, 'search_filter' ) );
				add_filter( 'pre_get_posts', array( $this, 'empty_search_filter' ) );
			}

			// Add inline style for shortcode.
			add_action( 'wp_footer', array( $this, 'shortcode_style' ), 9999 );

			add_filter( 'insightcore_bmw_nav_args', array( $this, 'add_extra_params_to_insightcore_bmw' ) );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function wp_kses_allowed_html( $allowedtags, $context ) {
			switch ( $context ) {
				case 'businext-default' :
					$allowedtags = array(
						'a'      => array(
							'id'     => array(),
							'class'  => array(),
							'style'  => array(),
							'href'   => array(),
							'target' => array(),
							'rel'    => array(),
							'title'  => array(),
						),
						'img'    => array(
							'id'     => array(),
							'class'  => array(),
							'style'  => array(),
							'src'    => array(),
							'width'  => array(),
							'height' => array(),
							'alt'    => array(),
							'srcset' => array(),
							'sizes'  => array(),
						),
						'div'    => array(
							'id'    => array(),
							'class' => array(),
							'style' => array(),
						),
						'strong' => array(
							'id'    => array(),
							'class' => array(),
							'style' => array(),
						),
						'b'      => array(
							'id'    => array(),
							'class' => array(),
							'style' => array(),
						),
						'span'   => array(
							'id'    => array(),
							'class' => array(),
							'style' => array(),
						),
						'i'      => array(
							'id'    => array(),
							'class' => array(),
							'style' => array(),
						),
						'del'    => array(
							'id'    => array(),
							'class' => array(),
							'style' => array(),
						),
						'ins'    => array(
							'id'    => array(),
							'class' => array(),
							'style' => array(),
						),
					);
					break;
			}

			return $allowedtags;
		}

		function add_extra_params_to_insightcore_bmw( $args ) {
			$args['walker'] = new Businext_Walker_Nav_Menu;

			return $args;
		}

		function move_post_count_inside_link_category( $links ) {
			// First remove span that added by woocommerce.
			$links = str_replace( '<span class="count">', '', $links );
			$links = str_replace( '</span>', '', $links );

			// Then add span again for both blog & shop.

			$links = str_replace( '</a> ', ' <span class="count">', $links );
			$links = str_replace( ')', '</span></a>', $links );
			$links = str_replace( '<span class="count">(', '<span class="count">', $links );

			return $links;
		}

		function move_post_count_inside_link_archive( $links ) {
			$links = str_replace( '</a>&nbsp;(', '<span class="count">', $links );
			$links = str_replace( ')', '</span></a>', $links );

			return $links;
		}


		function change_widget_tag_cloud_args( $args ) {
			/* set the smallest & largest size in px */
			$args['separator'] = ', ';

			return $args;
		}

		function move_comment_field_to_bottom( $fields ) {
			$comment_field = $fields['comment'];
			unset( $fields['comment'] );
			$fields['comment'] = $comment_field;

			return $fields;
		}

		function shortcode_style() {
			global $businext_shortcode_lg_css;
			global $businext_shortcode_md_css;
			global $businext_shortcode_sm_css;
			global $businext_shortcode_xs_css;
			$css = '';

			if ( $businext_shortcode_lg_css && $businext_shortcode_lg_css !== '' ) {
				$css .= $businext_shortcode_lg_css;
			}

			if ( $businext_shortcode_md_css && $businext_shortcode_md_css !== '' ) {
				$css .= "@media (max-width: 1199px) { $businext_shortcode_md_css }";
			}

			if ( $businext_shortcode_sm_css && $businext_shortcode_sm_css !== '' ) {
				$css .= "@media (max-width: 992px) { $businext_shortcode_sm_css }";
			}

			if ( $businext_shortcode_xs_css && $businext_shortcode_xs_css !== '' ) {
				$css .= "@media (max-width: 767px) { $businext_shortcode_xs_css }";
			}

			if ( $css !== '' ) : ?>
				<script>
                    var mainStyle = document.getElementById( 'businext-style-inline-css' );
                    if ( mainStyle !== null ) {
                        mainStyle.textContent += '<?php echo '' . $css; ?>';
                    }
				</script>
			<?php endif;

			/*if ( $css !== '' ) :
				$css = Businext_Minify::css( $css );
				echo '<style scoped>' . $css . '</style>';
			endif;*/
		}

		public function alter_search_loop( $query ) {
			if ( $query->is_main_query() && $query->is_search() ) {
				$number_results = Businext::setting( 'search_page_number_results' );
				$query->set( 'posts_per_page', $number_results );
			}
		}

		/**
		 * Apply filters to the search query.
		 * Determines if we only want to display posts/pages and changes the query accordingly
		 */
		public function search_filter( $query ) {
			if ( $query->is_main_query() && $query->is_search ) {
				$filter = Businext::setting( 'search_page_filter' );
				if ( $filter !== 'all' ) {
					$query->set( 'post_type', $filter );
				}
			}

			return $query;
		}

		/**
		 * Make wordpress respect the search template on an empty search
		 */
		public function empty_search_filter( $query ) {
			if ( isset( $_GET['s'] ) && empty( $_GET['s'] ) && $query->is_main_query() ) {
				$query->is_search = true;
				$query->is_home   = false;
			}

			return $query;
		}

		public function custom_excerpt_length() {
			return 999;
		}

		/**
		 * Add responsive container to embeds
		 */
		public function add_wrapper_for_video( $html, $url ) {
			$array = array(
				'youtube.com',
				'wordpress.tv',
				'vimeo.com',
				'dailymotion.com',
				'hulu.com',
			);

			if ( Businext_Helper::strposa( $url, $array ) ) {
				$html = '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
			}

			return $html;
		}

		public function add_attributes_to_body( $attrs ) {
			$site_width = Businext_Helper::get_post_meta( 'site_width', '' );
			if ( $site_width === '' ) {
				$site_width = Businext::setting( 'site_width' );
			}
			$attrs['data-site-width']    = $site_width;
			$attrs['data-content-width'] = 1200;

			$font = Businext_Helper::get_body_font();

			$attrs['data-font'] = $font;

			return $attrs;
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 *
		 * @return array
		 */
		public function body_classes( $classes ) {
			// Adds a class of group-blog to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			// Adds a class of hfeed to non-singular pages.
			if ( ! is_singular() ) {
				$classes[] = 'hfeed';
			}

			// Adds a class for mobile device.
			if ( Businext::is_mobile() ) {
				$classes[] = 'mobile';
			}

			// Adds a class for tablet device.
			if ( Businext::is_tablet() ) {
				$classes[] = 'tablet';
			}

			// Adds a class for handheld device.
			if ( Businext::is_handheld() ) {
				$classes[] = 'handheld';
				$classes[] = 'mobile-menu';
			}

			// Adds a class for desktop device.
			if ( Businext::is_desktop() ) {
				$classes[] = 'desktop';
				$classes[] = 'desktop-menu';
			}

			$custom_body_class = Businext_Helper::get_post_meta( 'body_class', '' );

			if ( $custom_body_class !== '' ) {
				$classes[] = $custom_body_class;
			}

			if ( Businext_Helper::active_woocommerce() ) {
				$classes[] = 'woocommerce';
			}

			$post_type = get_post_type();
			$classes[] = "post-type-$post_type";


			$css_animation = Businext::setting( 'shortcode_animation_enable' );

			if ( ( $css_animation === 'both' ) || ( $css_animation === 'desktop' && Businext::is_desktop() ) || ( $css_animation === 'mobile' && Businext::is_handheld() ) ) {
				$classes[] = 'page-has-animation';
			}

			$one_page_enable = Businext_Helper::get_post_meta( 'menu_one_page', '' );
			if ( $one_page_enable === '1' ) {
				$classes[] = 'one-page';
			}

			if ( is_singular( 'portfolio' ) ) {
				$style = Businext_Helper::get_post_meta( 'portfolio_layout_style', '' );
				if ( $style === '' ) {
					$style = Businext::setting( 'single_portfolio_style' );
				}
				$classes[] = "single-portfolio-style-$style";
			}

			$header_position = Businext_Helper::get_post_meta( 'header_position', '' );
			if ( $header_position !== '' ) {
				$classes[] = "page-header-$header_position";
			}

			$header_sticky_behaviour = Businext::setting( 'header_sticky_behaviour' );
			$classes[]               = "header-sticky-$header_sticky_behaviour";

			$site_layout = Businext_Helper::get_post_meta( 'site_layout', '' );
			if ( $site_layout === '' ) {
				$site_layout = Businext::setting( 'site_layout' );
			}
			$classes[] = $site_layout;

			$sidebar_status = Businext_Global::instance()->get_sidebar_status();

			if ( $sidebar_status === 'one' ) {
				$classes[] = 'page-has-sidebar page-one-sidebar';
			} elseif ( $sidebar_status === 'both' ) {
				$classes[] = 'page-has-sidebar page-both-sidebar';
			} else {
				$classes[] = 'page-has-no-sidebar';
			}

			return $classes;
		}
	}

	new Businext_Actions_Filters();
}
