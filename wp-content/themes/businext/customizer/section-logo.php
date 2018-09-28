<?php
$section  = 'logo';
$priority = 1;
$prefix   = 'logo_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'logo',
	'label'       => esc_html__( 'Default Logo', 'businext' ),
	'description' => esc_html__( 'Choose default logo.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'logo_dark',
	'choices'     => array(
		'logo_dark'  => esc_html__( 'Dark Logo', 'businext' ),
		'logo_light' => esc_html__( 'Light Logo', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'logo_dark',
	'label'    => esc_html__( 'Dark Version', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => BUSINEXT_THEME_IMAGE_URI . '/dark-logo.png',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'logo_light',
	'label'    => esc_html__( 'Light Version', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => BUSINEXT_THEME_IMAGE_URI . '/light-logo.png',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => $prefix . 'width',
	'label'       => esc_html__( 'Logo Width', 'businext' ),
	'description' => esc_html__( 'Ex: 200px', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '190px',
	'output'      => array(
		array(
			'element'  => '.branding__logo img,
			.error404--header .branding__logo img
			',
			'property' => 'width',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'spacing',
	'settings'    => $prefix . 'padding',
	'label'       => esc_html__( 'Logo Padding', 'businext' ),
	'description' => esc_html__( 'Ex: 30px 0px 30px 0px', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'top'    => '15px',
		'right'  => '0px',
		'bottom' => '15px',
		'left'   => '0px',
	),
	'output'      => array(
		array(
			'element'  => '.branding__logo img',
			'property' => 'padding',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Sticky Logo', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => 'sticky_logo_width',
	'label'       => esc_html__( 'Logo Width', 'businext' ),
	'description' => esc_html__( 'Controls the width of sticky header logo. Ex: 120px', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '140px',
	'output'      => array(
		array(
			'element'  => '
			.header-sticky-both .headroom.headroom--not-top .branding img,
			.header-sticky-up .headroom.headroom--not-top.headroom--pinned .branding img,
			.header-sticky-down .headroom.headroom--not-top.headroom--unpinned .branding img
			',
			'property' => 'width',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'spacing',
	'settings'    => 'sticky_logo_padding',
	'label'       => esc_html__( 'Logo Padding', 'businext' ),
	'description' => esc_html__( 'Controls the padding of sticky header logo.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'top'    => '0',
		'right'  => '0',
		'bottom' => '0',
		'left'   => '0',
	),
	'output'      => array(
		array(
			'element'  => '.headroom--not-top .branding__logo .sticky-logo',
			'property' => 'padding',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Mobile Menu Logo', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'image',
	'settings'    => 'mobile_menu_logo',
	'label'       => esc_html__( 'Logo', 'businext' ),
	'description' => esc_html__( 'Select an image file for mobile menu logo.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => BUSINEXT_THEME_IMAGE_URI . '/dark-logo.png',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => 'mobile_logo_width',
	'label'       => esc_html__( 'Logo Width', 'businext' ),
	'description' => esc_html__( 'Controls the width of mobile menu logo. Ex: 120px', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '150px',
	'output'      => array(
		array(
			'element'  => '.page-mobile-menu-logo img',
			'property' => 'width',
		),
	),
) );
