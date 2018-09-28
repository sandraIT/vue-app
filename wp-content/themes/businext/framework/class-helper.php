<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper functions
 */
if ( ! class_exists( 'Businext_Helper' ) ) {
	class Businext_Helper {

		static $preloader_style = array();

		function __construct() {
			self::$preloader_style = array(
				'rotating-plane'  => esc_attr__( 'Rotating Plane', 'businext' ),
				'double-bounce'   => esc_attr__( 'Double Bounce', 'businext' ),
				'three-bounce'    => esc_attr__( 'Three Bounce', 'businext' ),
				'wave'            => esc_attr__( 'Wave', 'businext' ),
				'wandering-cubes' => esc_attr__( 'Wandering Cubes', 'businext' ),
				'pulse'           => esc_attr__( 'Pulse', 'businext' ),
				'chasing-dots'    => esc_attr__( 'Chasing dots', 'businext' ),
				'circle'          => esc_attr__( 'Circle', 'businext' ),
				'cube-grid'       => esc_attr__( 'Cube Grid', 'businext' ),
				'fading-circle'   => esc_attr__( 'Fading Circle', 'businext' ),
				'folding-cube'    => esc_attr__( 'Folding Cube', 'businext' ),
			);
		}

		public static function get_preloader_list() {
			$list = self::$preloader_style + array( 'random' => esc_attr__( 'Random', 'businext' ) );

			return $list;
		}

		public static function get_post_meta( $name, $default = false ) {
			global $businext_page_options;
			if ( $businext_page_options != false && isset( $businext_page_options[ $name ] ) ) {
				return $businext_page_options[ $name ];
			}

			return $default;
		}

		public static function get_the_post_meta( $options, $name, $default = false ) {
			if ( $options != false && isset( $options[ $name ] ) ) {
				return $options[ $name ];
			}

			return $default;
		}

		/**
		 * @return array
		 */
		public static function get_list_revslider() {
			global $wpdb;
			$revsliders = array(
				'' => esc_html__( 'Select a slider', 'businext' ),
			);

			if ( function_exists( 'rev_slider_shortcode' ) ) {

				$table_name = $wpdb->prefix . "revslider_sliders";
				$query      = $wpdb->prepare( "SELECT * FROM $table_name WHERE type != %s ORDER BY title ASC", 'template' );
				$results    = $wpdb->get_results( $query );
				if ( ! empty( $results ) ) {
					foreach ( $results as $result ) {
						$revsliders[ $result->alias ] = $result->title;
					}
				}
			}

			return $revsliders;
		}

		/**
		 * @return array|int|WP_Error
		 */
		public static function get_all_menus() {
			$args = array(
				'hide_empty' => true,
			);

			$menus   = get_terms( 'nav_menu', $args );
			$results = array();

			foreach ( $menus as $key => $menu ) {
				$results[ $menu->slug ] = $menu->name;
			}
			$results[''] = esc_html__( 'Default Menu', 'businext' );

			return $results;
		}

		/**
		 * @param bool $default_option
		 *
		 * @return array
		 */
		public static function get_registered_sidebars( $default_option = false, $empty_option = true ) {
			global $wp_registered_sidebars;
			$sidebars = array();
			if ( $empty_option == true ) {
				$sidebars['none'] = esc_html__( 'No Sidebar', 'businext' );
			}
			if ( $default_option == true ) {
				$sidebars['default'] = esc_html__( 'Default', 'businext' );
			}
			foreach ( $wp_registered_sidebars as $sidebar ) {
				$sidebars[ $sidebar['id'] ] = $sidebar['name'];
			}

			return $sidebars;
		}

		/**
		 * Get list sidebar positions
		 *
		 * @return array
		 */
		public static function get_list_sidebar_positions( $default = false ) {
			$positions = array(
				'left'  => esc_html__( 'Left', 'businext' ),
				'right' => esc_html__( 'Right', 'businext' ),
			);


			if ( $default == true ) {
				$positions['default'] = esc_html__( 'Default', 'businext' );
			}

			return $positions;
		}

		/**
		 * Get content of file
		 *
		 * @param string $path
		 *
		 * @return mixed
		 */
		static function get_file_contents( $path = '' ) {
			$content = '';

			if ( $path === '' || ! file_exists( $path ) ) {
				return $content;
			}

			global $wp_filesystem;
			Businext::require_file( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
			$content = $wp_filesystem->get_contents( $path );

			return $content;
		}

		static function the_file_contents( $path ) {
			$content = self::get_file_contents( $path );

			echo "{$content}";
		}

		/**
		 * @param $var
		 *
		 * Output anything in debug bar.
		 */
		public static function d( $var ) {
			if ( ! class_exists( 'Debug_Bar' ) || ! function_exists( 'kint_debug_ob' ) ) {
				return;
			}

			ob_start( 'kint_debug_ob' );
			d( $var );
			ob_end_flush();
		}

		public static function strposa( $haystack, $needle, $offset = 0 ) {
			if ( ! is_array( $needle ) ) {
				$needle = array( $needle );
			}
			foreach ( $needle as $query ) {
				if ( strpos( $haystack, $query, $offset ) !== false ) {
					return true;
				} // stop on first true result
			}

			return false;
		}

		/**
		 * Get size information for all currently-registered image sizes.
		 *
		 * @global $_wp_additional_image_sizes
		 * @uses   get_intermediate_image_sizes()
		 * @return array $sizes Data for all currently-registered image sizes.
		 */
		public static function get_image_sizes() {
			global $_wp_additional_image_sizes;

			$sizes = array( 'full' => 'full' );

			foreach ( get_intermediate_image_sizes() as $_size ) {
				if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
					$_size_w                               = get_option( "{$_size}_size_w" );
					$_size_h                               = get_option( "{$_size}_size_h" );
					$sizes["$_size {$_size_w}x{$_size_h}"] = $_size;
				} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
					$sizes["$_size {$_wp_additional_image_sizes[ $_size ]['width']}x{$_wp_additional_image_sizes[ $_size ]['height']}"] = $_size;
				}
			}

			return $sizes;
		}

		public static function get_attachment_info( $attachment_id ) {
			$attachment     = get_post( $attachment_id );
			$attachment_url = wp_get_attachment_url( $attachment_id );

			return array(
				'alt'         => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
				'caption'     => $attachment->post_excerpt,
				'description' => $attachment->post_content,
				'href'        => get_permalink( $attachment->ID ),
				'src'         => $attachment_url,
				'title'       => $attachment->post_title,
			);
		}

		public static function w3c_iframe( $iframe ) {
			$iframe = str_replace( 'frameborder="0"', '', $iframe );
			$iframe = str_replace( 'frameborder="no"', '', $iframe );
			$iframe = str_replace( 'scrolling="no"', '', $iframe );
			$iframe = str_replace( 'gesture="media"', '', $iframe );
			$iframe = str_replace( 'allow="encrypted-media"', '', $iframe );

			return $iframe;
		}

		public static function get_md_media_query() {
			return '@media (max-width: 991px)';
		}

		public static function get_sm_media_query() {
			return '@media (max-width: 767px)';
		}

		public static function get_xs_media_query() {
			return '@media (max-width: 554px)';
		}

		public static function aq_resize( $args = array() ) {
			$defaults = array(
				'url'     => '',
				'width'   => null,
				'height'  => null,
				'crop'    => true,
				'single'  => true,
				'upscale' => false,
				'echo'    => false,
			);

			$args  = wp_parse_args( $args, $defaults );
			$image = aq_resize( $args['url'], $args['width'], $args['height'], $args['crop'], $args['single'], $args['upscale'] );

			if ( $image === false ) {
				$image = $args['url'];
			}

			return $image;
		}

		public static function get_lazy_load_image( $args = array() ) {
			$defaults = array(
				'url'         => '',
				'width'       => null,
				'height'      => null,
				'crop'        => true,
				'single'      => true,
				'upscale'     => false,
				'echo'        => false,
				'placeholder' => '',
				'src'         => '',
				'alt'         => '',
				'full_size'   => false,
			);

			$args = wp_parse_args( $args, $defaults );

			if ( ! isset( $args['lazy'] ) ) {
				$lazy_load_enable = Businext::setting( 'lazy_image_enable' );

				if ( $lazy_load_enable ) {
					$args['lazy'] = true;
				} else {
					$args['lazy'] = false;
				}
			}

			$image      = false;
			$attributes = array();

			if ( $args['full_size'] === false ) {
				$image = aq_resize( $args['url'], $args['width'], $args['height'], $args['crop'], $args['single'], $args['upscale'] );
			}

			if ( $image === false ) {
				$image = $args['url'];
			}

			$output   = '';
			$_classes = '';

			if ( $args['lazy'] === true ) {
				if ( $args['full_size'] === false ) {
					$placeholder_w = round( $args['width'] / 10 );
					$placeholder_h = $args['height'];

					if ( $args['height'] !== 9999 ) {
						$placeholder_h = round( $args['height'] / 10 );
					}
				} else {
					$placeholder_w = 50;
					$placeholder_h = 9999;
					$args['crop']  = false;
				}

				$placeholder_image = aq_resize( $image, $placeholder_w, $placeholder_h, $args['crop'], $args['single'], $args['upscale'] );

				$attributes[] = 'src="' . $placeholder_image . '"';
				$attributes[] = 'data-src="' . $image . '"';

				if ( $args['width'] !== '' && $args['width'] !== null ) {
					$attributes[] = 'width="' . $args['width'] . '"';
				}

				if ( $args['height'] !== '' && $args['height'] !== null && $args['height'] !== 9999 ) {
					$attributes[] = 'height="' . $args['height'] . '"';
				}

				$_classes .= ' tm-lazy-load';
			} else {
				$attributes[] = 'src="' . $image . '"';
			}

			$attributes[] = 'alt="' . $args['alt'] . '"';

			if ( $_classes !== '' ) {
				$attributes[] = 'class="' . $_classes . '"';
			}

			$output .= '<img ' . implode( ' ', $attributes ) . ' />';

			if ( $args['echo'] === true ) {
				echo '' . $output;
			} else {
				return $output;
			}
		}

		public static function get_attachment_url_by_id( $id = '', $size = 'full', $width = '', $height = '' ) {
			$url = wp_get_attachment_image_url( $id, 'full' );

			if ( $url === false ) {
				return false;
			}

			if ( $size !== 'full' && $size !== 'custom' ) {
				$_sizes = explode( 'x', $size );
				$width  = $_sizes[0];
				$height = $_sizes[1];
			}

			if ( $size !== 'full' && $width !== '' && $height !== '' ) {
				$url = aq_resize( $url, $width, $height, true );
			}

			return $url;
		}

		public static function get_attachment_by_id( $id = '', $size = 'full', $width = '', $height = '', $echo = true ) {
			$url = wp_get_attachment_image_url( $id, 'full' );

			self::get_attachment_by_url( $url, $size, $width, $height, $echo );
		}

		public static function get_attachment_by_url( $url = '', $size = 'full', $width = '', $height = '', $echo = true ) {
			$image = false;

			if ( $url === false || $url === '' ) {
				return false;
			}

			if ( $size !== 'full' && $size !== 'custom' ) {
				$_sizes = explode( 'x', $size );
				$width  = $_sizes[0];
				$height = $_sizes[1];
			}

			if ( $size !== 'full' && $width !== '' && $height !== '' ) {
				$image = Businext_Helper::get_lazy_load_image( array(
					'url'    => $url,
					'width'  => $width,
					'height' => $height,
					'crop'   => true,
					'echo'   => false,

				) );
			} else {
				$image = Businext_Helper::get_lazy_load_image( array(
					'url'       => $url,
					'echo'      => false,
					'full_size' => true,
				) );
			}

			if ( $echo ) {
				echo '' . $image;
			} else {
				return $image;
			}
		}

		public static function get_animation_list( $args = array() ) {
			return array(
				'none'             => esc_html__( 'None', 'businext' ),
				'fade-in'          => esc_html__( 'Fade In', 'businext' ),
				'move-up'          => esc_html__( 'Move Up', 'businext' ),
				'move-down'        => esc_html__( 'Move Down', 'businext' ),
				'move-left'        => esc_html__( 'Move Left', 'businext' ),
				'move-right'       => esc_html__( 'Move Right', 'businext' ),
				'scale-up'         => esc_html__( 'Scale Up', 'businext' ),
				'fall-perspective' => esc_html__( 'Fall Perspective', 'businext' ),
				'fly'              => esc_html__( 'Fly', 'businext' ),
				'flip'             => esc_html__( 'Flip', 'businext' ),
				'helix'            => esc_html__( 'Helix', 'businext' ),
				'pop-up'           => esc_html__( 'Pop Up', 'businext' ),
			);
		}

		public static function get_animation_classes( $animation = 'move-up' ) {
			$classes = '';
			if ( $animation === '' ) {
				$animation = 'move-up';
			}

			if ( $animation !== 'none' ) {
				$classes .= " tm-animation $animation";
			}

			return $classes;
		}

		public static function get_grid_animation_classes( $animation = 'move-up' ) {
			$classes = '';
			if ( $animation === '' ) {
				$animation = 'move-up';
			}

			if ( $animation !== 'none' ) {
				$classes .= " has-animation $animation";
			}

			return $classes;
		}

		public static function get_css_prefix( $property, $value ) {
			$css = '';
			switch ( $property ) {
				case 'border-radius' :
					$css = "-moz-border-radius: {$value};-webkit-border-radius: {$value};border-radius: {$value};";
					break;

				case 'box-shadow' :
					$css = "-moz-box-shadow: {$value};-webkit-box-shadow: {$value};box-shadow: {$value};";
					break;

				case 'order' :
					$css = "-webkit-order: $value; -moz-order: $value; order: $value;";
					break;
			}

			return $css;
		}

		public static function get_shortcode_css_color_inherit( $attr = 'color', $color = '', $custom = '', $gradient = '' ) {
			$primary_color   = Businext::setting( 'primary_color' );
			$secondary_color = Businext::setting( 'secondary_color' );

			$gradient = isset( $gradient ) ? $gradient : '';

			$css = '';
			switch ( $color ) {
				case 'primary' :
					$css = "$attr: {$primary_color};";
					break;

				case 'secondary' :
					$css = "$attr: {$secondary_color};";
					break;

				case 'custom' :
					if ( $custom !== '' ) {
						$css = "$attr: {$custom};";
					}

					break;

				case 'transparent' :
					$css = "$attr: transparent;";
					break;

				case 'gradient' :
					$css = $gradient;

					if ( $attr === 'color' ) {
						$css .= 'color:transparent;-webkit-background-clip: text;background-clip: text;';
					}

					break;
			}

			return $css;
		}

		public static function get_list_hotspot() {
			$businext_post_args = array(
				'post_type'      => 'points_image',
				'posts_per_page' => -1,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'post_status'    => 'publish',
			);

			$results = array();

			$businext_query = new WP_Query( $businext_post_args );

			if ( $businext_query->have_posts() ) :
				while ( $businext_query->have_posts() ) : $businext_query->the_post();
					$title             = get_the_title();
					$results[ $title ] = get_the_ID();
				endwhile;
			endif;
			wp_reset_postdata();

			return $results;
		}

		public static function get_vc_icon_template( $args = array() ) {

			$defaults = array(
				'type'         => '',
				'icon'         => '',
				'class'        => '',
				'parent_hover' => '',
			);

			$args         = wp_parse_args( $args, $defaults );

			vc_icon_element_fonts_enqueue( $args['type'] );

			switch ( $args['type'] ) {
				case 'linea_svg':
					$icon = str_replace( 'linea-', '', $args['icon'] );
					$_svg = BUSINEXT_THEME_URI . "/assets/svg/linea/{$icon}.svg";
					?>
					<div class="icon">
						<div class="tm-svg"
						     data-svg="<?php echo esc_url( $_svg ); ?>"
							<?php if ( isset( $args['svg_animate'] ) ): ?>
								data-type="<?php echo esc_attr( $args['svg_animate'] ); ?>"
							<?php endif; ?>
							<?php if ( $args['parent_hover'] !== '' ) : ?>
								data-hover="<?php echo esc_attr( $args['parent_hover'] ); ?>"
							<?php endif; ?>
						></div>
					</div>
					<?php
					break;
				default:
					?>
					<div class="icon">
						<span class="<?php echo esc_attr( $args['icon'] ); ?>"></span>
					</div>
					<?php
					break;
			}
		}

		public static function get_top_bar_list( $default_option = false ) {

			$results = array(
				'none' => esc_html__( 'Hide', 'businext' ),
				'01'   => esc_html__( 'Top Bar 01', 'businext' ),
				'02'   => esc_html__( 'Top Bar 02', 'businext' ),
				'03'   => esc_attr__( 'Top Bar 03', 'businext' ),
				'04'   => esc_attr__( 'Top Bar 04', 'businext' ),
				'05'   => esc_attr__( 'Top Bar 05', 'businext' ),
				'06'   => esc_attr__( 'Top Bar 06', 'businext' ),
			);

			if ( $default_option === true ) {
				$results = array( '' => esc_html__( 'Default', 'businext' ) ) + $results;
			}

			return $results;
		}

		public static function get_header_list( $default_option = false ) {

			$headers = array(
				'none' => esc_html__( 'Hide', 'businext' ),
				'01'   => esc_html__( 'Header 01', 'businext' ),
				'02'   => esc_html__( 'Header 02', 'businext' ),
				'03'   => esc_attr__( 'Header 03', 'businext' ),
				'04'   => esc_attr__( 'Header 04', 'businext' ),
				'05'   => esc_attr__( 'Header 05', 'businext' ),
				'06'   => esc_attr__( 'Header 06', 'businext' ),
				'07'   => esc_attr__( 'Header 07', 'businext' ),
				'08'   => esc_attr__( 'Header 08', 'businext' ),
				'09'   => esc_attr__( 'Header 09', 'businext' ),
				'10'   => esc_attr__( 'Header 10', 'businext' ),
				'11'   => esc_attr__( 'Header 11', 'businext' ),
				'12'   => esc_attr__( 'Header 12', 'businext' ),
				'13'   => esc_attr__( 'Header 13', 'businext' ),
				'14'   => esc_attr__( 'Header 14', 'businext' ),
				'15'   => esc_attr__( 'Header 15', 'businext' ),
				'16'   => esc_attr__( 'Header 16', 'businext' ),
				'17'   => esc_attr__( 'Header 17', 'businext' ),
				'18'   => esc_attr__( 'Header 18', 'businext' ),
				'19'   => esc_attr__( 'Header 19', 'businext' ),
				'20'   => esc_attr__( 'Header 20', 'businext' ),
			);

			if ( $default_option === true ) {
				$headers = array( '' => esc_html__( 'Default', 'businext' ) ) + $headers;
			}

			return $headers;
		}

		public static function get_title_bar_list( $default_option = false ) {

			$results = array(
				'none' => esc_html__( 'Hide', 'businext' ),
				'01'   => esc_html__( 'Style 01', 'businext' ),
				'02'   => esc_html__( 'Style 02', 'businext' ),
				'03'   => esc_attr__( 'Style 03', 'businext' ),
				'04'   => esc_attr__( 'Style 04', 'businext' ),
				'05'   => esc_attr__( 'Style 05', 'businext' ),
				'06'   => esc_attr__( 'Style 06', 'businext' ),
				'07'   => esc_attr__( 'Style 07', 'businext' ),
				'08'   => esc_attr__( 'Style 08', 'businext' ),
				'09'   => esc_attr__( 'Style 09', 'businext' ),
				'10'   => esc_attr__( 'Style 10', 'businext' ),
			);

			if ( $default_option === true ) {
				$results = array( 'default' => esc_html__( 'Default', 'businext' ) ) + $results;
			}

			return $results;
		}

		public static function get_coming_soon_demo_date() {
			$date = date( 'm/d/Y', strtotime( '+2 months', strtotime( date( 'Y/m/d' ) ) ) );

			return $date;
		}

		/**
		 * process aspect ratio fields
		 */
		public static function process_chart_aspect_ratio( $ar = '4:3', $width = 500 ) {
			$AR = explode( ':', $ar );

			$rat1 = $AR[0];
			$rat2 = $AR[1];

			$height = ( $width / $rat1 ) * $rat2;

			return $height;
		}

		public static function get_body_font() {
			$font = Businext::setting( 'typography_body' );

			if ( isset( $font['font-family'] ) ) {
				return "{$font['font-family']} Helvetica, Arial, sans-serif";
			}

			return 'Helvetica, Arial, sans-serif';
		}

		/**
		 * Check woocommerce plugin active
		 *
		 * @return boolean true if plugin activated
		 */
		public static function active_woocommerce() {
			if ( class_exists( 'WooCommerce' ) ) {
				return true;
			}

			return false;
		}

		public static function get_swiper_pagination_attributes( $pagination = '' ) {
			$attrs = '';

			if ( isset( $pagination ) && $pagination !== '' ) {
				$attrs .= ' data-pagination="1"';

				if ( $pagination === '8' ) {
					$attrs .= ' data-pagination-type="fraction"';
				} elseif ( in_array( $pagination, array( '7', '9' ), true ) ) {
					$attrs .= ' data-pagination-bullets="number"';
				}
			}

			echo "{$attrs}";
		}
	}

	new Businext_Helper();
}
