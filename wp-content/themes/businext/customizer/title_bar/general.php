<?php
$section  = 'title_bar';
$priority = 1;
$prefix   = 'title_bar_';

$title_bar_stylish = Businext_Helper::get_title_bar_list( true );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'layout',
	'label'       => esc_html__( 'Default Title Bar', 'businext' ),
	'description' => esc_html__( 'Select default title bar that displays on all pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '01',
	'choices'     => Businext_Helper::get_title_bar_list(),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'search_title',
	'label'       => esc_html__( 'Search Heading', 'businext' ),
	'description' => esc_html__( 'Enter text prefix that displays on search results page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Search results for: ', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'home_title',
	'label'       => esc_html__( 'Home Heading', 'businext' ),
	'description' => esc_html__( 'Enter text that displays on front latest posts page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Blog', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_category_title',
	'label'       => esc_html__( 'Archive Category Heading', 'businext' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive category page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Category: ', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_tag_title',
	'label'       => esc_html__( 'Archive Tag Heading', 'businext' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive tag page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Tag: ', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_author_title',
	'label'       => esc_html__( 'Archive Author Heading', 'businext' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive author page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Author: ', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_year_title',
	'label'       => esc_html__( 'Archive Year Heading', 'businext' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive year page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Year: ', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_month_title',
	'label'       => esc_html__( 'Archive Month Heading', 'businext' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive month page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Month: ', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'archive_day_title',
	'label'       => esc_html__( 'Archive Day Heading', 'businext' ),
	'description' => esc_html__( 'Enter text prefix that displays on archive day page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Day: ', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'single_blog_title',
	'label'       => esc_html__( 'Single Blog Heading', 'businext' ),
	'description' => esc_html__( 'Enter text that displays on single blog posts. Leave blank to use post title.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Blog', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'single_portfolio_title',
	'label'       => esc_html__( 'Single Portfolio Heading', 'businext' ),
	'description' => esc_html__( 'Enter text that displays on single portfolio pages. Leave blank to use portfolio title.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Portfolio', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'single_product_title',
	'label'       => esc_html__( 'Single Product Heading', 'businext' ),
	'description' => esc_html__( 'Enter text that displays on single product pages. Leave blank to use product title.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Shop', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_page_title_bar_layout',
	'label'       => esc_html__( 'Single Page Title Bar Layout', 'businext' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'default',
	'choices'     => $title_bar_stylish,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_title_bar_layout',
	'label'       => esc_html__( 'Single Blog Page Title Bar Layout', 'businext' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single blog post pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $title_bar_stylish,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_product_title_bar_layout',
	'label'       => esc_html__( 'Single Product Page Title Bar Layout', 'businext' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single product pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'default',
	'choices'     => $title_bar_stylish,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_portfolio_title_bar_layout',
	'label'       => esc_html__( 'Single Portfolio Page Title Bar Layout', 'businext' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single profolio pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'default',
	'choices'     => $title_bar_stylish,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_case_study_title_bar_layout',
	'label'       => esc_html__( 'Single Case Study Page Title Bar Layout', 'businext' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single case study post pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $title_bar_stylish,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_service_title_bar_layout',
	'label'       => esc_html__( 'Single Service Page Title Bar Layout', 'businext' ),
	'description' => esc_html__( 'Select default Title Bar that displays on all single service post pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '06',
	'choices'     => $title_bar_stylish,
) );
