<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Businext {

	const PRIMARY_FONT = 'Montserrat';
	const PRIMARY_COLOR = '#006efd';
	const SECONDARY_COLOR = '#00d2dd';
	const HEADING_COLOR = '#222';

	/**
	 * is_tablet
	 *
	 * @return bool
	 */
	public static function is_tablet() {
		if ( ! class_exists( 'Mobile_Detect' ) ) {
			return false;
		}

		return Mobile_Detect::instance()->isTablet();
	}

	/**
	 * is_mobile
	 *
	 * @return bool
	 */
	public static function is_mobile() {
		if ( ! class_exists( 'Mobile_Detect' ) ) {
			return false;
		}

		if ( self::is_tablet() ) {
			return false;
		}

		return Mobile_Detect::instance()->isMobile();
	}

	/**
	 * is_handheld
	 *
	 * @return bool
	 */
	public static function is_handheld() {
		return ( self::is_mobile() || self::is_tablet() );
	}

	/**
	 * is_desktop
	 *
	 * @since 0.9.8
	 * @return bool
	 */
	public static function is_desktop() {
		return ! self::is_handheld();
	}

	/**
	 * Get settings for Kirki
	 *
	 * @param string $setting
	 *
	 * @return mixed
	 */
	public static function setting( $setting = '' ) {
		$settings = Businext_Kirki::get_option( 'theme', $setting );

		return $settings;
	}

	/**
	 * Requirement one file.
	 *
	 * @param string $file path of file
	 */
	public static function require_file( $file = '' ) {
		if ( file_exists( $file ) ) {
			require_once $file;
		} else {
			wp_die( esc_html__( 'Could not load theme file: ', 'businext' ) . $file );
		}
	}

	/**
	 * Requirement multi files.
	 *
	 * @param array $files array path of files
	 */
	public static function require_files( $files = array() ) {
		if ( empty( $files ) ) {
			return;
		}

		foreach ( $files as $file ) {
			if ( file_exists( $file ) ) {
				require_once $file;
			} else {
				wp_die( esc_html__( 'Could not load theme file: ', 'businext' ) . $file );
			}
		}
	}

	/**
	 * Primary Menu
	 */
	public static function menu_primary( $args = array() ) {
		$defaults = array(
			'theme_location' => 'primary',
			'container'      => 'ul',
			'menu_class'     => 'menu__container sm sm-simple',
		);
		$args     = wp_parse_args( $args, $defaults );

		if ( has_nav_menu( 'primary' ) && class_exists( 'Businext_Walker_Nav_Menu' ) ) {
			$args['walker'] = new Businext_Walker_Nav_Menu;
		}

		$menu = Businext_Helper::get_post_meta( 'menu_display', '' );

		if ( $menu !== '' ) {
			$args['menu'] = $menu;
		}

		wp_nav_menu( $args );
	}

	/**
	 * Off Canvas Menu
	 */
	public static function off_canvas_menu_primary() {
		self::menu_primary( array(
			'menu_class' => 'menu__container',
			'menu_id'    => 'off-canvas-menu-primary',
		) );
	}

	/**
	 * Mobile Menu
	 */
	public static function menu_mobile_primary() {
		self::menu_primary( array(
			'menu_class' => 'menu__container',
			'menu_id'    => 'mobile-menu-primary',
		) );
	}

	/**
	 * Logo
	 */
	public static function branding_logo() {
		$logo_url       = Businext_Helper::get_post_meta( 'custom_logo', '' );
		$logo_light_url = Businext::setting( 'logo_light' );
		$logo_dark_url  = Businext::setting( 'logo_dark' );
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php if ( $logo_url !== '' ) { ?>
				<img src="<?php echo esc_url( $logo_url ); ?>"
				     alt="<?php bloginfo( 'name' ); ?>" class="main-logo">
			<?php } else { ?>
				<img src="<?php echo esc_url( $logo_light_url ); ?>"
				     alt="<?php bloginfo( 'name' ); ?>" class="light-logo">
				<img src="<?php echo esc_url( $logo_dark_url ); ?>"
				     alt="<?php bloginfo( 'name' ); ?>" class="dark-logo">
			<?php } ?>
		</a>
		<?php
	}

	/**
	 * Adds custom attributes to the body tag.
	 */
	public static function body_attributes() {
		$attrs = apply_filters( 'businext_body_attributes', array() );

		$attrs_string = '';
		if ( ! empty( $attrs ) ) {
			foreach ( $attrs as $attr => $value ) {
				$attrs_string .= " {$attr}=" . '"' . esc_attr( $value ) . '"';
			}
		}

		echo '' . $attrs_string;
	}

	/**
	 * Adds custom classes to the header.
	 *
	 * @param string $class extra class
	 */
	public static function top_bar_class( $class = '' ) {
		$classes = array( 'page-top-bar' );

		$type = Businext_Global::instance()->get_top_bar_type();

		$classes[] = "top-bar-{$type}";

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'businext_top_bar_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}

	/**
	 * Adds custom classes to the header.
	 */
	public static function header_class( $class = '' ) {
		$classes = array( 'page-header' );

		$header_type = Businext_Global::instance()->get_header_type();

		$classes[] = "header-{$header_type}";

		$_overlay_enable = Businext::setting( "header_style_{$header_type}_overlay" );

		if ( $_overlay_enable === '1' ) {
			$classes[] = 'header-layout-fixed';
		}

		$_logo     = Businext::setting( "header_style_{$header_type}_logo" );
		$classes[] = "{$_logo}-logo-version";

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'businext_header_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}

	/**
	 * Adds custom classes to the branding.
	 */
	public static function branding_class( $class = '' ) {
		$classes = array( 'branding' );

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'businext_branding_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}

	/**
	 * Adds custom classes to the navigation.
	 */
	public static function navigation_class( $class = '' ) {
		$classes = array( 'navigation page-navigation' );

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'businext_navigation_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}

	/**
	 * Adds custom classes to the footer.
	 */
	public static function footer_class( $class = '' ) {
		$classes = array( 'page-footer' );

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {
			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		$classes = apply_filters( 'businext_footer_class', $classes, $class );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}
}
