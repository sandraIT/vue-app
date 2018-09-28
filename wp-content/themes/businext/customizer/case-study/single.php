<?php
$section  = 'single_case_study';
$priority = 1;
$prefix   = 'single_case_study_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'banner_enable',
	'label'       => esc_html__( 'Banner Visibility', 'businext' ),
	'description' => esc_html__( 'Turn on to display big banner section above main content on single case study posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Hide', 'businext' ),
		'1' => esc_html__( 'Show', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'banner_background',
	'label'       => esc_html__( 'Banner Background', 'businext' ),
	'description' => esc_html__( 'Controls the background of banner.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => array(
		'background-color'      => '#222',
		'background-image'      => BUSINEXT_THEME_IMAGE_URI . '/case-study-banner.jpg',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.single-case_study .entry-banner',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'comment_enable',
	'label'       => esc_html__( 'Comments', 'businext' ),
	'description' => esc_html__( 'Turn on to display comments on single case study posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );
