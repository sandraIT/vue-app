<?php
$section  = 'header';
$priority = 1;
$prefix   = 'header_';

$headers = Businext_Helper::get_header_list( true );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'global_header',
	'label'       => esc_html__( 'Default Header', 'businext' ),
	'description' => esc_html__( 'Select default header type for your site.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '01',
	'choices'     => Businext_Helper::get_header_list(),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_page_header_type',
	'label'       => esc_html__( 'Single Page', 'businext' ),
	'description' => esc_html__( 'Select default header type that displays on all single pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $headers,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_post_header_type',
	'label'       => esc_html__( 'Single Blog', 'businext' ),
	'description' => esc_html__( 'Select default header type that displays on all single blog post pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $headers,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_product_header_type',
	'label'       => esc_html__( 'Single Product', 'businext' ),
	'description' => esc_html__( 'Select default header type that displays on all single product pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $headers,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_portfolio_header_type',
	'label'       => esc_html__( 'Single Portfolio', 'businext' ),
	'description' => esc_html__( 'Select default header type that displays on all single portfolio pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $headers,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_service_header_type',
	'label'       => esc_html__( 'Single Service', 'businext' ),
	'description' => esc_html__( 'Select default header type that displays on all single service pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '20',
	'choices'     => $headers,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'single_case_study_header_type',
	'label'       => esc_html__( 'Single Case Study', 'businext' ),
	'description' => esc_html__( 'Select default header type that displays on all single case study pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '',
	'choices'     => $headers,
) );
