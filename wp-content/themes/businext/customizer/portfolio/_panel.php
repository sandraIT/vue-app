<?php
$panel    = 'portfolio';
$priority = 1;

Businext_Kirki::add_section( 'archive_portfolio', array(
	'title'    => esc_html__( 'Portfolio Archive', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'single_portfolio', array(
	'title'    => esc_html__( 'Portfolio Single', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
