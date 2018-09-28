<?php
$section  = 'background';
$priority = 1;
$prefix   = 'site_background_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Boxed Mode Background', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'image_body',
	'label'       => esc_html__( 'Background', 'businext' ),
	'description' => esc_html__( 'Controls outer background area in boxed mode.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '#fff',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'fixed',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Main Content Background', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'image_main_content',
	'label'       => esc_html__( 'Background', 'businext' ),
	'description' => esc_html__( 'Controls background of the main content area.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'fixed',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.site',
		),
	),
) );
