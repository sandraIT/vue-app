<?php
$section  = 'top_bar';
$priority = 1;
$prefix   = 'top_bar_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'global_top_bar',
	'label'    => esc_html__( 'Default Top Bar', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '01',
	'choices'  => Businext_Helper::get_top_bar_list(),
) );
