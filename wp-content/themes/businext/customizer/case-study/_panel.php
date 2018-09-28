<?php
$panel    = 'case_study';
$priority = 1;

Businext_Kirki::add_section( 'archive_case_study', array(
	'title'    => esc_html__( 'Case Study Archive', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'single_case_study', array(
	'title'    => esc_html__( 'Case Study Single', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
