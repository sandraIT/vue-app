<?php
$section  = 'layout';
$priority = 1;
$prefix   = 'site_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'layout',
	'label'       => esc_html__( 'Layout', 'businext' ),
	'description' => esc_html__( 'Controls the site layout.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'wide',
	'choices'     => array(
		'boxed' => esc_html__( 'Boxed', 'businext' ),
		'wide'  => esc_html__( 'Wide', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => $prefix . 'width',
	'label'       => esc_html__( 'Site Width', 'businext' ),
	'description' => esc_html__( 'Controls the overall site width. Enter value including any valid CSS unit, ex: 1200px.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1200px',
) );
