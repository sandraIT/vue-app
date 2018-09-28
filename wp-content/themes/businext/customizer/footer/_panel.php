<?php
$panel    = 'footer';
$priority = 1;

Businext_Kirki::add_section( 'footer', array(
	'title'    => esc_html__( 'General', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'footer_01', array(
	'title'    => esc_html__( 'Style 01', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'footer_02', array(
	'title'    => esc_html__( 'Style 02', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'footer_03', array(
	'title'    => esc_html__( 'Style 03', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'footer_04', array(
	'title'    => esc_html__( 'Style 04', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'footer_05', array(
	'title'    => esc_html__( 'Style 05', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'footer_simple', array(
	'title'    => esc_html__( 'Footer Simple', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
