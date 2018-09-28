<?php
$section  = 'notices';
$priority = 1;
$prefix   = 'notice_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'notice_cookie_enable',
	'label'       => esc_html__( 'Cookie Notice', 'businext' ),
	'description' => esc_html__( 'The notice about cookie auto show when a user visits the site.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'textarea',
	'settings'    => 'notice_cookie_messages',
	'label'       => esc_html__( 'Cookie Notice Messages', 'businext' ),
	'description' => esc_html__( 'Enter the messages that displays for cookie notice.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => wp_kses( __( 'We use cookies to ensure that we give you the best experience on our website. If you continue to use this site we will assume that you are happy with it.', 'businext' ), 'businext-default' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'textarea',
	'settings'    => 'notice_cookie_ok',
	'label'       => esc_html__( 'Cookie Notice OK', 'businext' ),
	'description' => esc_html__( 'Enter the messages that displays for cookie notice when okay.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => wp_kses( __( 'Thank you! Hope you have the best experience on our website.', 'businext' ), 'businext-default' ),
) );
