<?php
$section            = 'sliders';
$priority           = 1;
$prefix             = 'sliders_';
$revolution_sliders = Businext_Helper::get_list_revslider();

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Search Page', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'search_page_rev_slider',
	'label'       => esc_html__( 'Revolution Slider', 'businext' ),
	'description' => esc_html__( 'Select the unique name of the slider.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $revolution_sliders,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_page_slider_position',
	'label'    => esc_html__( 'Slider Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'below',
	'choices'  => array(
		'above' => esc_html__( 'Above Header', 'businext' ),
		'below' => esc_html__( 'Below Header', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Front Latest Posts Page', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'home_page_rev_slider',
	'label'       => esc_html__( 'Revolution Slider', 'businext' ),
	'description' => esc_html__( 'Select the unique name of the slider.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $revolution_sliders,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'home_page_slider_position',
	'label'    => esc_html__( 'Slider Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'below',
	'choices'  => array(
		'above' => esc_html__( 'Above Header', 'businext' ),
		'below' => esc_html__( 'Below Header', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Blog Archive', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'blog_archive_page_rev_slider',
	'label'       => esc_html__( 'Revolution Slider', 'businext' ),
	'description' => esc_html__( 'Select the unique name of the slider.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $revolution_sliders,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_archive_page_slider_position',
	'label'    => esc_html__( 'Slider Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'below',
	'choices'  => array(
		'above' => esc_html__( 'Above Header', 'businext' ),
		'below' => esc_html__( 'Below Header', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Portfolio Archive', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'portfolio_archive_page_rev_slider',
	'label'       => esc_html__( 'Revolution Slider', 'businext' ),
	'description' => esc_html__( 'Select the unique name of the slider.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $revolution_sliders,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'portfolio_archive_page_slider_position',
	'label'    => esc_html__( 'Slider Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'below',
	'choices'  => array(
		'above' => esc_html__( 'Above Header', 'businext' ),
		'below' => esc_html__( 'Below Header', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Product Archive', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_archive_page_rev_slider',
	'label'       => esc_html__( 'Revolution Slider', 'businext' ),
	'description' => esc_html__( 'Select the unique name of the slider.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $revolution_sliders,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'product_archive_page_slider_position',
	'label'    => esc_html__( 'Slider Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'below',
	'choices'  => array(
		'above' => esc_html__( 'Above Header', 'businext' ),
		'below' => esc_html__( 'Below Header', 'businext' ),
	),
) );
