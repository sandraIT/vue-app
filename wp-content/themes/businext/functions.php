<?php
/**
 * Define constant
 */
$theme = wp_get_theme();

if ( ! empty( $theme['Template'] ) ) {
	$theme = wp_get_theme( $theme['Template'] );
}

if ( ! defined( 'DS' ) ) {
	define( 'DS', DIRECTORY_SEPARATOR );
}

define( 'BUSINEXT_THEME_NAME', $theme['Name'] );
define( 'BUSINEXT_THEME_VERSION', $theme['Version'] );
define( 'BUSINEXT_THEME_DIR', get_template_directory() );
define( 'BUSINEXT_THEME_URI', get_template_directory_uri() );
define( 'BUSINEXT_THEME_IMAGE_DIR', get_template_directory() . DS . 'assets' . DS . 'images' );
define( 'BUSINEXT_THEME_IMAGE_URI', get_template_directory_uri() . DS . 'assets' . DS . 'images' );
define( 'BUSINEXT_CHILD_THEME_URI', get_stylesheet_directory_uri() );
define( 'BUSINEXT_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'BUSINEXT_FRAMEWORK_DIR', get_template_directory() . DS . 'framework' );
define( 'BUSINEXT_CUSTOMIZER_DIR', BUSINEXT_THEME_DIR . DS . 'customizer' );
define( 'BUSINEXT_WIDGETS_DIR', BUSINEXT_THEME_DIR . DS . 'widgets' );
define( 'BUSINEXT_VC_MAPS_DIR', BUSINEXT_THEME_DIR . DS . 'vc-extend' . DS . 'vc-maps' );
define( 'BUSINEXT_VC_PARAMS_DIR', BUSINEXT_THEME_DIR . DS . 'vc-extend' . DS . 'vc-params' );
define( 'BUSINEXT_VC_SHORTCODE_CATEGORY', esc_html__( 'By', 'businext' ) . ' ' . BUSINEXT_THEME_NAME );
define( 'BUSINEXT_PROTOCOL', is_ssl() ? 'https' : 'http' );

require_once BUSINEXT_FRAMEWORK_DIR . '/class-static.php';

$files = array(
	BUSINEXT_FRAMEWORK_DIR . '/class-init.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-global.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-actions-filters.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-admin.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-compatible.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-customize.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-enqueue.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-functions.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-helper.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-minify.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-color.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-maintenance.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-import.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-instagram.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-kirki.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-metabox.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-plugins.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-post-like.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-query.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-custom-css.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-templates.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-aqua-resizer.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-visual-composer.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-vc-icon-ion.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-vc-icon-themify.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-vc-icon-pe-stroke-7.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-vc-icon-flat.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-walker-nav-menu.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-widget.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-widgets.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-footer.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-post-type-blog.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-post-type-portfolio.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-post-type-service.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-post-type-case_study.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-woo.php',
	BUSINEXT_FRAMEWORK_DIR . '/class-walker-nav-menu-extra-items.php',
	BUSINEXT_FRAMEWORK_DIR . '/tgm-plugin-activation.php',
	BUSINEXT_FRAMEWORK_DIR . '/tgm-plugin-registration.php',
);

/**
 * Load Framework.
 */
Businext::require_files( $files );

/**
 * Init the theme
 */
Businext_Init::instance();
