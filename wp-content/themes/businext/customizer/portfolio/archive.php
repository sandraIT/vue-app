<?php
$section  = 'archive_portfolio';
$priority = 1;
$prefix   = 'archive_portfolio_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'archive_portfolio_style',
	'label'       => esc_html__( 'Portfolio Style', 'businext' ),
	'description' => esc_html__( 'Select portfolio style that display for archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'grid',
	'choices'     => array(
		'grid'    => esc_attr__( 'Grid Classic', 'businext' ),
		'metro'   => esc_attr__( 'Grid Metro', 'businext' ),
		'masonry' => esc_attr__( 'Grid Masonry', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'archive_portfolio_thumbnail_size',
	'label'    => esc_html__( 'Thumbnail Size', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '480x480',
	'choices'  => array(
		'480x480' => esc_attr__( '480x480', 'businext' ),
		'480x311' => esc_attr__( '480x311', 'businext' ),
		'481x325' => esc_attr__( '481x325', 'businext' ),
		'500x324' => esc_attr__( '500x324', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'number',
	'settings' => 'archive_portfolio_gutter',
	'label'    => esc_html__( 'Gutter', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 30,
	'choices'  => array(
		'min'  => 0,
		'step' => 1,
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => 'archive_portfolio_columns',
	'label'    => esc_html__( 'Columns', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'xs:1;sm:2;md:3;lg:3',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'archive_portfolio_overlay_style',
	'label'    => esc_html__( 'Columns', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'faded-light',
	'choices'  => array(
		'none'        => esc_attr__( 'None', 'businext' ),
		'modern'      => esc_attr__( 'Modern', 'businext' ),
		'zoom'        => esc_attr__( 'Image zoom - content below', 'businext' ),
		'zoom2'       => esc_attr__( 'Zoom and Move Up - content below', 'businext' ),
		'faded'       => esc_attr__( 'Faded', 'businext' ),
		'faded-light' => esc_attr__( 'Faded - Light', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'archive_portfolio_animation',
	'label'       => esc_html__( 'CSS Animation', 'businext' ),
	'description' => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'scale-up',
	'choices'     => array(
		'none'             => esc_attr__( 'None', 'businext' ),
		'fade-in'          => esc_attr__( 'Fade In', 'businext' ),
		'move-up'          => esc_attr__( 'Move Up', 'businext' ),
		'scale-up'         => esc_attr__( 'Scale Up', 'businext' ),
		'fall-perspective' => esc_attr__( 'Fall Perspective', 'businext' ),
		'fly'              => esc_attr__( 'Fly', 'businext' ),
		'flip'             => esc_attr__( 'Flip', 'businext' ),
		'helix'            => esc_attr__( 'Helix', 'businext' ),
		'pop-up'           => esc_attr__( 'Pop Up', 'businext' ),
	),
) );
