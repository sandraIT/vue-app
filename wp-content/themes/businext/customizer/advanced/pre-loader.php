<?php
$section  = 'pre_loader';
$priority = 1;
$prefix   = 'pre_loader_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'enable',
	'label'    => esc_html__( 'Enable Preloader', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'No', 'businext' ),
		'1' => esc_html__( 'Yes', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => $prefix . 'style',
	'label'    => esc_html__( 'Style', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'random',
	'choices'  => Businext_Helper::get_preloader_list(),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'background_color',
	'label'       => esc_html__( 'Background Color', 'businext' ),
	'description' => esc_html__( 'Controls the background color for pre loader', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(0, 0, 0, .95)',
	'output'      => array(
		array(
			'element'  => '.page-loading',
			'property' => 'background-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'shape_color',
	'label'       => esc_html__( 'Shape Color', 'businext' ),
	'description' => esc_html__( 'Controls the background color for pre loader', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#ffffff',
	'output'      => array(
		array(
			'element'  => '
			.page-loading .sk-bg-self,
			.page-loading .sk-bg-child > div,
			.page-loading .sk-bg-child-before > div:before
			',
			'property' => 'background-color',
			'suffix'   => '!important',
		),
	),
) );
