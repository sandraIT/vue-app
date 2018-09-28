<?php
/**
 * Theme Customizer
 *
 * @package Businext
 * @since   1.0
 */

/**
 * Setup configuration
 */
Businext_Kirki::add_config( 'theme', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/**
 * Add sections
 */
$priority = 1;

Businext_Kirki::add_section( 'layout', array(
	'title'    => esc_html__( 'Layout', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'color_', array(
	'title'    => esc_html__( 'Colors', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'background', array(
	'title'    => esc_html__( 'Background', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'typography', array(
	'title'    => esc_html__( 'Typography', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'top_bar', array(
	'title'    => esc_html__( 'Top bar', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'header', array(
	'title'    => esc_html__( 'Header', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'logo', array(
	'title'    => esc_html__( 'Logo', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'navigation', array(
	'title'    => esc_html__( 'Navigation', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'sliders', array(
	'title'    => esc_html__( 'Sliders', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'title_bar', array(
	'title'    => esc_html__( 'Page Title Bar', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'sidebars', array(
	'title'    => esc_html__( 'Sidebars', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'footer', array(
	'title'    => esc_html__( 'Footer', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'blog', array(
	'title'    => esc_html__( 'Blog', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'portfolio', array(
	'title'    => esc_html__( 'Portfolio', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'shop', array(
	'title'    => esc_html__( 'Shop', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'case_study', array(
	'title'    => esc_html__( 'Case Study', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'service', array(
	'title'    => esc_html__( 'Service', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'socials', array(
	'title'    => esc_html__( 'Social Networks', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'social_sharing', array(
	'title'    => esc_html__( 'Social Sharing', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'search', array(
	'title'    => esc_html__( 'Search', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'error404_page', array(
	'title'    => esc_html__( 'Error 404 Page', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'maintenance', array(
	'title'    => esc_html__( 'Maintenance', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'shortcode', array(
	'title'    => esc_html__( 'Shortcodes', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_panel( 'advanced', array(
	'title'    => esc_html__( 'Advanced', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'notices', array(
	'title'    => esc_html__( 'Notices', 'businext' ),
	'priority' => $priority++,
) );

Businext_Kirki::add_section( 'additional_js', array(
	'title'    => esc_html__( 'Additional JS', 'businext' ),
	'priority' => $priority++,
) );

/**
 * Load panel & section files
 */
$files = array(
	BUSINEXT_CUSTOMIZER_DIR . '/section-color.php',

	BUSINEXT_CUSTOMIZER_DIR . '/top_bar/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/top_bar/general.php',
	BUSINEXT_CUSTOMIZER_DIR . '/top_bar/style-01.php',
	BUSINEXT_CUSTOMIZER_DIR . '/top_bar/style-02.php',
	BUSINEXT_CUSTOMIZER_DIR . '/top_bar/style-03.php',
	BUSINEXT_CUSTOMIZER_DIR . '/top_bar/style-04.php',
	BUSINEXT_CUSTOMIZER_DIR . '/top_bar/style-05.php',
	BUSINEXT_CUSTOMIZER_DIR . '/top_bar/style-06.php',

	BUSINEXT_CUSTOMIZER_DIR . '/header/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/general.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/sticky.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-01.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-02.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-03.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-04.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-05.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-06.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-07.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-08.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-09.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-10.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-11.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-12.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-13.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-14.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-15.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-16.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-17.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-18.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-19.php',
	BUSINEXT_CUSTOMIZER_DIR . '/header/style-20.php',

	BUSINEXT_CUSTOMIZER_DIR . '/navigation/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/navigation/desktop-menu.php',
	BUSINEXT_CUSTOMIZER_DIR . '/navigation/off-canvas-menu.php',
	BUSINEXT_CUSTOMIZER_DIR . '/navigation/mobile-menu.php',

	BUSINEXT_CUSTOMIZER_DIR . '/section-sliders.php',

	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/general.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-01.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-02.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-03.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-04.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-05.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-06.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-07.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-08.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-09.php',
	BUSINEXT_CUSTOMIZER_DIR . '/title_bar/style-10.php',

	BUSINEXT_CUSTOMIZER_DIR . '/footer/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/footer/general.php',
	BUSINEXT_CUSTOMIZER_DIR . '/footer/style-01.php',
	BUSINEXT_CUSTOMIZER_DIR . '/footer/style-02.php',
	BUSINEXT_CUSTOMIZER_DIR . '/footer/style-03.php',
	BUSINEXT_CUSTOMIZER_DIR . '/footer/style-04.php',
	BUSINEXT_CUSTOMIZER_DIR . '/footer/style-05.php',
	BUSINEXT_CUSTOMIZER_DIR . '/footer/footer-simple.php',

	BUSINEXT_CUSTOMIZER_DIR . '/advanced/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/advanced/advanced.php',
	BUSINEXT_CUSTOMIZER_DIR . '/advanced/pre-loader.php',
	BUSINEXT_CUSTOMIZER_DIR . '/advanced/light-gallery.php',

	BUSINEXT_CUSTOMIZER_DIR . '/section-notices.php',

	BUSINEXT_CUSTOMIZER_DIR . '/shortcode/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/shortcode/animation.php',

	BUSINEXT_CUSTOMIZER_DIR . '/section-background.php',
	BUSINEXT_CUSTOMIZER_DIR . '/section-error404.php',
	BUSINEXT_CUSTOMIZER_DIR . '/section-layout.php',
	BUSINEXT_CUSTOMIZER_DIR . '/section-logo.php',

	BUSINEXT_CUSTOMIZER_DIR . '/blog/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/blog/archive.php',
	BUSINEXT_CUSTOMIZER_DIR . '/blog/single.php',

	BUSINEXT_CUSTOMIZER_DIR . '/portfolio/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/portfolio/archive.php',
	BUSINEXT_CUSTOMIZER_DIR . '/portfolio/single.php',

	BUSINEXT_CUSTOMIZER_DIR . '/case-study/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/case-study/archive.php',
	BUSINEXT_CUSTOMIZER_DIR . '/case-study/single.php',

	BUSINEXT_CUSTOMIZER_DIR . '/service/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/service/archive.php',
	BUSINEXT_CUSTOMIZER_DIR . '/service/single.php',

	BUSINEXT_CUSTOMIZER_DIR . '/shop/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/shop/archive.php',
	BUSINEXT_CUSTOMIZER_DIR . '/shop/single.php',
	BUSINEXT_CUSTOMIZER_DIR . '/shop/cart.php',

	BUSINEXT_CUSTOMIZER_DIR . '/search/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/search/search-page.php',
	BUSINEXT_CUSTOMIZER_DIR . '/search/search-popup.php',

	BUSINEXT_CUSTOMIZER_DIR . '/maintenance/_panel.php',
	BUSINEXT_CUSTOMIZER_DIR . '/maintenance/general.php',
	BUSINEXT_CUSTOMIZER_DIR . '/maintenance/coming-soon-01.php',

	BUSINEXT_CUSTOMIZER_DIR . '/section-sharing.php',
	BUSINEXT_CUSTOMIZER_DIR . '/section-sidebars.php',
	BUSINEXT_CUSTOMIZER_DIR . '/section-socials.php',
	BUSINEXT_CUSTOMIZER_DIR . '/section-typography.php',
	BUSINEXT_CUSTOMIZER_DIR . '/section-additional-js.php',
);

Businext::require_files( $files );
