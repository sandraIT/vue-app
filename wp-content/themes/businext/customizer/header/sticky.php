<?php
$section  = 'header_sticky';
$priority = 1;
$prefix   = 'header_sticky_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => $prefix . 'enable',
	'label'       => esc_html__( 'Enable', 'businext' ),
	'description' => esc_html__( 'Enable this option to turn on header sticky feature.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'behaviour',
	'label'       => esc_html__( 'Behaviour', 'businext' ),
	'description' => esc_html__( 'Controls the behaviour of header sticky when you scroll down to page', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'both',
	'choices'     => array(
		'both' => esc_html__( 'Sticky on scroll up/down', 'businext' ),
		'up'   => esc_html__( 'Sticky on scroll up', 'businext' ),
		'down' => esc_html__( 'Sticky on scroll down', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'height',
	'label'     => esc_html__( 'Height', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 70,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.headroom--not-top .page-header-inner',
			'property' => 'height',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'padding_top',
	'label'     => esc_html__( 'Padding top', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.headroom--not-top .page-header-inner',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'padding_bottom',
	'label'     => esc_html__( 'Padding bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.headroom--not-top .page-header-inner',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'spacing',
	'settings'    => $prefix . 'item_padding',
	'label'       => esc_html__( 'Item Padding', 'businext' ),
	'description' => esc_html__( 'Controls the navigation item level 1 padding of navigation when sticky.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'top'    => '25px',
		'bottom' => '26px',
		'left'   => '18px',
		'right'  => '18px',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => array(
				'.desktop-menu .headroom--not-top.headroom--not-top .menu--primary .menu__container > li > a',
				'.desktop-menu .headroom--not-top.headroom--not-top .menu--primary .menu__container > ul > li >a',
			),
			'property' => 'padding',
		),
	),
) );
