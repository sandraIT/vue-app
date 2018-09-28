<?php
$section  = 'archive_case_study';
$priority = 1;
$prefix   = 'archive_case_study_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'archive_case_study_style',
	'label'    => esc_html__( 'Style', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'grid',
	'choices'  => array(
		'grid'         => esc_attr__( 'Grid', 'businext' ),
		'grid-caption' => esc_attr__( 'Grid Caption', 'businext' ),
		'modern-list'  => esc_attr__( 'Modern List', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'archive_case_study_thumbnail_size',
	'label'    => esc_html__( 'Thumbnail Size', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '370x250',
	'choices'  => array(
		'480x480' => esc_attr__( '480x480', 'businext' ),
		'370x250' => esc_attr__( '370x250', 'businext' ),
		'570x385' => esc_attr__( '570x385', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'number',
	'settings' => 'archive_case_study_gutter',
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
	'settings' => 'archive_case_study_columns',
	'label'    => esc_html__( 'Columns', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'xs:1;sm:2;md:3;lg:3',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'archive_case_study_animation',
	'label'       => esc_html__( 'CSS Animation', 'businext' ),
	'description' => esc_html__( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'move-up',
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
