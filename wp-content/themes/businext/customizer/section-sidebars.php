<?php
$section             = 'sidebars';
$priority            = 1;
$prefix              = 'sidebars_';
$sidebar_positions   = Businext_Helper::get_list_sidebar_positions();
$registered_sidebars = Businext_Helper::get_registered_sidebars();

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => sprintf( '<div class="desc">
			<strong class="insight-label insight-label-info">%s</strong>
			<p>%s</p>
			<p>%s</p>
		</div>', esc_html__( 'IMPORTANT NOTE: ', 'businext' ), esc_html__( 'Sidebar 2 can only be used if sidebar 1 is selected.', 'businext' ), esc_html__( 'Sidebar position option will control the position of sidebar 1. If sidebar 2 is selected, it will display on the opposite side.', 'businext' ) ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'General Settings', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'one_sidebar_breakpoint',
	'label'       => esc_html__( 'One Sidebar Breakpoint', 'businext' ),
	'description' => esc_html__( 'Controls the breakpoint when has only one sidebar to make the sidebar 100% width.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'postMessage',
	'default'     => 992,
	'choices'     => array(
		'min'  => 460,
		'max'  => 1300,
		'step' => 10,
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'both_sidebar_breakpoint',
	'label'       => esc_html__( 'Both Sidebars Breakpoint', 'businext' ),
	'description' => esc_html__( 'Controls the breakpoint when has both sidebars to make sidebars 100% width.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'postMessage',
	'default'     => 1199,
	'choices'     => array(
		'min'  => 460,
		'max'  => 1300,
		'step' => 10,
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'sidebars_below_content_mobile',
	'label'       => esc_html__( 'Sidebars Below Content', 'businext' ),
	'description' => esc_html__( 'Move sidebars display after main content on smaller screens.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'No', 'businext' ),
		'1' => esc_html__( 'Yes', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Single Sidebar Layouts', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'single_sidebar_width',
	'label'       => esc_html__( 'Single Sidebar Width', 'businext' ),
	'description' => esc_html__( 'Controls the width of the sidebar when only one sidebar is present. Input value as % unit. Ex: 33.33333', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '25',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => 'single_sidebar_offset',
	'label'       => esc_html__( 'Single Sidebar Offset', 'businext' ),
	'description' => esc_html__( 'Controls the offset of the sidebar when only one sidebar is present. Enter value including any valid CSS unit. Ex: 70px.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Dual Sidebar Layouts', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'dual_sidebar_width',
	'label'       => esc_html__( 'Dual Sidebar Width', 'businext' ),
	'description' => esc_html__( 'Controls the width of sidebars when dual sidebars are present. Enter value including any valid CSS unit. Ex: 33.33333.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '25',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'dimension',
	'settings'    => 'dual_sidebar_offset',
	'label'       => esc_html__( 'Dual Sidebar Offset', 'businext' ),
	'description' => esc_html__( 'Controls the offset of sidebars when dual sidebars are present. Enter value including any valid CSS unit. Ex: 70px.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Pages', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on all pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on all pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );


Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on all pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Search Page', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'search_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on search results page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'blog_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'search_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on search results page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'search_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'search_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on search page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
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
	'settings'    => 'home_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on front latest posts page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'blog_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'home_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on front latest posts page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'home_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'home_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar front latest posts page.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Blog Posts', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'post_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on single blog post pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'post_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on single blog post pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'post_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'post_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on single blog post pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
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
	'settings'    => 'blog_archive_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on blog archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'blog_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'blog_archive_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on blog archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'blog_archive_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'blog_archive_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on blog archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Portfolio Posts', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'portfolio_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on single portfolio pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'portfolio_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on single portfolio pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'portfolio_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'portfolio_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on single portfolio pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
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
	'settings'    => 'portfolio_archive_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on portfolio archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'portfolio_archive_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on portfolio archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'portfolio_archive_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'portfolio_archive_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on portfolio archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Single Product', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on single product pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'shop_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on single product pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'product_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'right',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on single product pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
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
	'settings'    => 'product_archive_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on product archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'shop_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_archive_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on product archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'product_archive_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'product_archive_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on product archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Single Case Study', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'case_study_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on single case study pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'case_study_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'case_study_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on single case study pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'case_study_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'case_study_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on single case study pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Case Study Archive', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'case_study_archive_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on case study archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'case_study_archive_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on case study archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'case_study_archive_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'case_study_archive_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on case study archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Single Service', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on single service pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on single service pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'service_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on single service pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'service_page_single_sidebar_width',
	'label'       => esc_html__( 'Single Sidebar Width', 'businext' ),
	'description' => esc_html__( 'Controls the width of the sidebar when only one sidebar is present. Input value as % unit. Ex: 33.33333. This setting will be override global sidebar with, If leave blank then use global sidebar width.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '33.333333',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Service Archive', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_archive_page_sidebar_1',
	'label'       => esc_html__( 'Sidebar 1', 'businext' ),
	'description' => esc_html__( 'Select sidebar 1 that will display on service archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_archive_page_sidebar_2',
	'label'       => esc_html__( 'Sidebar 2', 'businext' ),
	'description' => esc_html__( 'Select sidebar 2 that will display on service archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'none',
	'choices'     => $registered_sidebars,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => 'service_archive_page_sidebar_position',
	'label'    => esc_html__( 'Sidebar Position', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'left',
	'choices'  => $sidebar_positions,
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'service_archive_page_sidebar_special',
	'label'       => esc_html__( 'Special Sidebar', 'businext' ),
	'description' => esc_html__( 'Select special sidebar that will display below of first sidebar on service archive pages.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'special_sidebar',
	'choices'     => $registered_sidebars,
) );
