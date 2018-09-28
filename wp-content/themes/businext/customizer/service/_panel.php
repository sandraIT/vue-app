<?php
$panel    = 'service';
$priority = 1;

Businext_Kirki::add_section( 'archive_service', array(
	'title'    => esc_html__( 'Service Archive', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'single_service', array(
	'title'    => esc_html__( 'Service Single', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
