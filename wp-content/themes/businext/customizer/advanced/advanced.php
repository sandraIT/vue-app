<?php
$section  = 'advanced';
$priority = 1;
$prefix   = 'advanced_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'smooth_scroll_enable',
	'label'       => esc_html__( 'Smooth Scroll', 'businext' ),
	'description' => esc_html__( 'Smooth scrolling experience for websites.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'scroll_top_enable',
	'label'       => esc_html__( 'Go To Top Button', 'businext' ),
	'description' => esc_html__( 'Turn on to show go to top button.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'toggle',
	'settings' => 'lazy_load_images',
	'label'    => esc_html__( 'Lazy Load Images', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 0,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => 'google_api_key',
	'label'       => esc_html__( 'Google Api Key', 'businext' ),
	'description' => sprintf( wp_kses( __( 'Follow <a href="%s" target="_blank">this link</a> and click <strong>GET A KEY</strong> button.', 'businext' ), array(
		'a'      => array(
			'href'   => array(),
			'target' => array(),
		),
		'strong' => array(),
	) ), esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key' ) ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'AIzaSyDPRJ5WltWsdOPLeOVfbImGhuUrkd8KbJU',
	'transport'   => 'postMessage',
) );
