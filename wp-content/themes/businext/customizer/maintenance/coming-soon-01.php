<?php
$section  = 'coming_soon_01';
$priority = 1;
$prefix   = 'coming_soon_01_';

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
	'type'     => 'text',
	'settings' => $prefix . 'title',
	'label'    => esc_html__( 'Title', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => wp_kses( __( 'We are coming soon!', 'businext' ), array(
		'a'    => array(
			'href'   => array(),
			'target' => array(),
		),
		'mark' => array(),
	) ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'textarea',
	'settings' => $prefix . 'text',
	'label'    => esc_html__( 'Text', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => wp_kses( __( 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.', 'businext' ), array(
		'a'    => array(
			'href'   => array(),
			'target' => array(),
		),
		'mark' => array(),
	) ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'date',
	'settings' => $prefix . 'countdown',
	'label'    => esc_html__( 'Countdown', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => Businext_Helper::get_coming_soon_demo_date(),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'mailchimp_enable',
	'label'    => esc_html__( 'Mailchimp Form', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'businext' ),
		'1' => esc_html__( 'Show', 'businext' ),
	),
) );
