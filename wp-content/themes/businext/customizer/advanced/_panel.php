<?php
$panel    = 'advanced';
$priority = 1;

Businext_Kirki::add_section( 'advanced', array(
	'title'    => esc_html__( 'Advanced', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'pre_loader', array(
	'title'    => esc_html__( 'Pre Loader', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'light_gallery', array(
	'title'    => esc_html__( 'Light Gallery', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
