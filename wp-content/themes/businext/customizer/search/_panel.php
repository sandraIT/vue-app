<?php
$panel    = 'search';
$priority = 1;

Businext_Kirki::add_section( 'search_page', array(
	'title'    => esc_html__( 'Search Page', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'search_popup', array(
	'title'    => esc_html__( 'Search Popup', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
