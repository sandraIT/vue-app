<?php
$section  = 'socials';
$priority = 1;
$prefix   = 'social_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'social_link_target',
	'label'    => esc_html__( 'Open link in a new tab.', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'No', 'businext' ),
		'1' => esc_html__( 'Yes', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'repeater',
	'settings'  => 'social_link',
	'section'   => $section,
	'priority'  => $priority ++,
	'choices'   => array(
		'labels' => array(
			'add-new-row' => esc_html__( 'Add new social network', 'businext' ),
		),
	),
	'row_label' => array(
		'type'  => 'field',
		'field' => 'tooltip',
	),
	'default'   => array(
		array(
			'tooltip'    => esc_html__( 'Facebook', 'businext' ),
			'icon_class' => 'ion-social-facebook',
			'link_url'   => 'https://facebook.com',
		),
		array(
			'tooltip'    => esc_html__( 'Twitter', 'businext' ),
			'icon_class' => 'ion-social-twitter',
			'link_url'   => 'https://twitter.com',
		),
		array(
			'tooltip'    => esc_html__( 'Vimeo', 'businext' ),
			'icon_class' => 'ion-social-vimeo',
			'link_url'   => 'https://www.vimeo.com',
		),
		array(
			'tooltip'    => esc_html__( 'Linkedin', 'businext' ),
			'icon_class' => 'ion-social-linkedin',
			'link_url'   => 'https://www.linkedin.com',
		),
	),
	'fields'    => array(
		'tooltip'    => array(
			'type'        => 'text',
			'label'       => esc_html__( 'Tooltip', 'businext' ),
			'description' => esc_html__( 'Enter your hint text for your icon', 'businext' ),
			'default'     => '',
		),
		'icon_class' => array(
			'type'        => 'text',
			'label'       => esc_html__( 'Icon Class', 'businext' ),
			'description' => esc_html__( 'This will be the icon class for your link', 'businext' ),
			'default'     => '',
		),
		'link_url'   => array(
			'type'        => 'text',
			'label'       => esc_html__( 'Link URL', 'businext' ),
			'description' => esc_html__( 'This will be the link URL', 'businext' ),
			'default'     => '',
		),
	),
) );
