<?php
$section  = 'shortcode_animation';
$priority = 1;
$prefix   = 'shortcode_animation_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'enable',
	'label'       => esc_html__( 'Mobile Animation', 'businext' ),
	'description' => esc_html__( 'Controls the css animations on mobile & tablet.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'desktop',
	'choices'     => array(
		'none'    => esc_html__( 'None', 'businext' ),
		'mobile'  => esc_html__( 'Only Mobile', 'businext' ),
		'desktop' => esc_html__( 'Only Desktop', 'businext' ),
		'both'    => esc_html__( 'Both', 'businext' ),
	),
) );
