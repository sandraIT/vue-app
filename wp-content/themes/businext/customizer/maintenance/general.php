<?php
$section  = 'general';
$priority = 1;
$prefix   = 'general_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'maintenance_page',
	'label'    => esc_html__( 'Page', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '',
	'choices'  => Businext_Maintenance::get_maintenance_pages(),
) );
