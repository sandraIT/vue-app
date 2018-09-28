<?php
$panel    = 'navigation';
$priority = 1;

Businext_Kirki::add_section( 'navigation', array(
	'title'    => esc_html__( 'Desktop Menu', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'navigation_minimal', array(
	'title'    => esc_html__( 'Off Canvas Menu', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'navigation_mobile', array(
	'title'    => esc_html__( 'Mobile Menu', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
