<?php
$section  = 'error404_page';
$priority = 1;
$prefix   = 'error404_page_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'logo',
	'label'    => esc_html__( 'Logo', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'light',
	'choices'  => array(
		'light' => esc_html__( 'Light', 'businext' ),
		'dark'  => esc_html__( 'Dark', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => 'error404_page_title',
	'label'       => esc_html__( 'Title', 'businext' ),
	'description' => esc_html__( 'Controls the title that display on error 404 page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Sorry, we couldn\'t find the page you\'re looking for.', 'businext' ),
) );
