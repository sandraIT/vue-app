<?php
$section  = 'social_sharing';
$priority = 1;
$prefix   = 'social_sharing_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'multicheck',
	'settings'    => $prefix . 'item_enable',
	'label'       => esc_attr__( 'Sharing Links', 'businext' ),
	'description' => esc_html__( 'Check to the box to enable social share links.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array( 'facebook', 'twitter', 'linkedin', 'google_plus' ),
	'choices'     => array(
		'facebook'    => esc_attr__( 'Facebook', 'businext' ),
		'twitter'     => esc_attr__( 'Twitter', 'businext' ),
		'linkedin'    => esc_attr__( 'Linkedin', 'businext' ),
		'google_plus' => esc_attr__( 'Google+', 'businext' ),
		'tumblr'      => esc_attr__( 'Tumblr', 'businext' ),
		'email'       => esc_attr__( 'Email', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'sortable',
	'settings'    => $prefix . 'order',
	'label'       => esc_attr__( 'Order', 'businext' ),
	'description' => esc_html__( 'Controls the order of social share links.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'facebook',
		'twitter',
		'google_plus',
		'tumblr',
		'linkedin',
		'email',
	),
	'choices'     => array(
		'facebook'    => esc_attr__( 'Facebook', 'businext' ),
		'twitter'     => esc_attr__( 'Twitter', 'businext' ),
		'google_plus' => esc_attr__( 'Google+', 'businext' ),
		'tumblr'      => esc_attr__( 'Tumblr', 'businext' ),
		'linkedin'    => esc_attr__( 'Linkedin', 'businext' ),
		'email'       => esc_attr__( 'Email', 'businext' ),
	),
) );
