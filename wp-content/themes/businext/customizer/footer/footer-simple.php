<?php
$section  = 'footer_simple';
$priority = 1;
$prefix   = 'footer_simple_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'textarea',
	'settings' => $prefix . 'text',
	'label'    => esc_html__( 'Copyright Text', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Copyright &copy; 2018 Businext WordPress Theme by ThemeMove', 'businext' ),
) );
