<?php
$section  = 'single_service';
$priority = 1;
$prefix   = 'single_service_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'single_service_style',
	'label'    => esc_html__( 'Style', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '01',
	'choices'  => array(
		'01' => esc_attr__( 'Style 01', 'businext' ),
		'02' => esc_attr__( 'Style 02', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'comment_enable',
	'label'       => esc_html__( 'Comments', 'businext' ),
	'description' => esc_html__( 'Turn on to display comments on single case study posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );
