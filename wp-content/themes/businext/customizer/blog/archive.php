<?php
$section  = 'blog_archive';
$priority = 1;
$prefix   = 'blog_archive_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => $prefix . 'style',
	'label'       => esc_html__( 'Blog Style', 'businext' ),
	'description' => esc_html__( 'Select blog style that display for archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__( 'Large Image', 'businext' ),
		'2' => esc_html__( 'Grid Classic', 'businext' ),
		'3' => esc_html__( 'Grid Masonry', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => $prefix . 'columns',
	'label'       => esc_html__( 'Grid Layout Columns', 'businext' ),
	'description' => esc_html__( 'Select columns for blog.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '2',
	'choices'     => array(
		'2' => esc_html__( '2 Columns', 'businext' ),
		'3' => esc_html__( '3 Columns', 'businext' ),
		'4' => esc_html__( '4 Columns', 'businext' ),
	),
) );
