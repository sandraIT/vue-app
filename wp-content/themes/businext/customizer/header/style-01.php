<?php
$section  = 'header_style_01';
$priority = 1;
$prefix   = 'header_style_01_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'overlay',
	'label'    => esc_html__( 'Header Overlay', 'businext' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'No', 'businext' ),
		'1' => esc_html__( 'Yes', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'logo',
	'label'    => esc_html__( 'Logo', 'businext' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => 'dark',
	'choices'  => array(
		'light' => esc_html__( 'Light', 'businext' ),
		'dark'  => esc_html__( 'Dark', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'search_enable',
	'label'    => esc_html__( 'Search', 'businext' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'businext' ),
		'1' => esc_html__( 'Show', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'cart_enable',
	'label'    => esc_html__( 'Mini Cart', 'businext' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '1',
	'choices'  => array(
		'0'             => esc_html__( 'Hide', 'businext' ),
		'1'             => esc_html__( 'Show', 'businext' ),
		'hide_on_empty' => esc_html__( 'Hide On Empty', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'social_networks_enable',
	'label'    => esc_html__( 'Social Networks', 'businext' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'businext' ),
		'1' => esc_html__( 'Show', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'language_switcher_enable',
	'label'    => esc_html__( 'Language Switcher', 'businext' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '1',
	'choices'  => array(
		'0' => esc_html__( 'Hide', 'businext' ),
		'1' => esc_html__( 'Show', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'repeater',
	'settings'  => $prefix . 'info',
	'label'     => esc_html__( 'Info List', 'businext' ),
	'section'   => $section,
	'priority'  => $priority++,
	'choices'   => array(
		'labels' => array(
			'add-new-row' => esc_html__( 'Add new info', 'businext' ),
		),
	),
	'row_label' => array(
		'type'  => 'field',
		'field' => 'title',
	),
	'default'   => array(
		array(
			'title'      => 'Open Time',
			'sub_title'  => 'Mon-fri: 8am-7pm',
			'icon_class' => 'ion-clock',
		),
		array(
			'title'      => 'Call us',
			'sub_title'  => '(+00)888.666.88',
			'icon_class' => 'ion-ios-telephone',
		),
		array(
			'title'      => 'Office Address',
			'sub_title'  => '183 Donato Parkways, CA, USA',
			'icon_class' => 'ion-android-map',
		),
		array(
			'title'      => 'Sales Department',
			'sub_title'  => '+122 123 4567',
			'icon_class' => 'ion-ios-chatboxes',
		),
	),
	'fields'    => array(
		'title'      => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Title', 'businext' ),
			'default' => '',
		),
		'sub_title'  => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Sub Title', 'businext' ),
			'default' => '',
		),
		'icon_class' => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Icon Class', 'businext' ),
			'default' => '',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'border_width',
	'label'     => esc_html__( 'Border Bottom Width', 'businext' ),
	'section'   => $section,
	'priority'  => $priority++,
	'default'   => 1,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.header-01 .page-header-inner',
			'property' => 'border-bottom-width',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'border_color',
	'label'       => esc_html__( 'Border Bottom Color', 'businext' ),
	'description' => esc_html__( 'Controls the border bottom color.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#eee',
	'output'      => array(
		array(
			'element'  => '.header-01 .page-header-inner',
			'property' => 'border-bottom-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => $prefix . 'box_shadow',
	'label'       => esc_html__( 'Box Shadow', 'businext' ),
	'description' => esc_html__( 'Input box shadow for header. For ex: 0 0 5px #ccc', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'output'      => array(
		array(
			'element'  => '.header-01 .page-header-inner',
			'property' => 'box-shadow',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'businext' ),
	'description' => esc_html__( 'Controls the background of header.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => array(
		'background-color'      => 'rgba(255, 255, 255, 1)',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.header-01 .page-header-inner',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'header_icon_color',
	'label'       => esc_html__( 'Icon Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of icons on header.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#222',
	'output'      => array(
		array(
			'element'  => '.header-01 .page-open-mobile-menu i',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'header_icon_hover_color',
	'label'       => esc_html__( 'Icon Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color when hover of icons on header.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => Businext::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.header-01 .page-open-mobile-menu:hover i',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'header_info_icon_color',
	'label'       => esc_html__( 'Info Icon Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of info icons.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => Businext::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.header-01 .header-info .info-icon',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'cart_badge_background_color',
	'label'       => esc_html__( 'Cart Badge Background Color', 'businext' ),
	'description' => esc_html__( 'Controls the background color of cart badge.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.header-01 .mini-cart .mini-cart-icon:after',
			'property' => 'background-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'cart_badge_color',
	'label'       => esc_html__( 'Cart Badge Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of cart badge.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#222',
	'output'      => array(
		array(
			'element'  => '.header-01 .mini-cart .mini-cart-icon:after',
			'property' => 'color',
		),
	),
) );

/*--------------------------------------------------------------
# Navigation
--------------------------------------------------------------*/

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__( 'Main Menu Level 1', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'navigation_background_type',
	'label'    => esc_html__( 'Background Type', 'businext' ),
	'section'  => $section,
	'priority' => $priority++,
	'default'  => 'solid',
	'choices'  => array(
		'solid'    => esc_html__( 'Solid', 'businext' ),
		'gradient' => esc_html__( 'Gradient', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'            => 'multicolor',
	'settings'        => $prefix . 'navigation_background_gradient',
	'label'           => esc_attr__( 'Background Gradient', 'businext' ),
	'section'         => $section,
	'priority'        => $priority++,
	'choices'         => array(
		'from' => esc_attr__( 'From', 'businext' ),
		'to'   => esc_attr__( 'To', 'businext' ),
	),
	'default'         => array(
		'from' => Businext::PRIMARY_COLOR,
		'to'   => Businext::SECONDARY_COLOR,
	),
	'active_callback' => array(
		array(
			'setting'  => $prefix . 'navigation_background_type',
			'operator' => '==',
			'value'    => 'gradient',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'            => 'color-alpha',
	'settings'        => $prefix . 'navigation_background',
	'label'           => esc_html__( 'Background Color', 'businext' ),
	'description'     => esc_html__( 'Controls the background color for main menu', 'businext' ),
	'section'         => $section,
	'priority'        => $priority++,
	'transport'       => 'auto',
	'default'         => Businext::PRIMARY_COLOR,
	'output'          => array(
		array(
			'element'  => '.header-01 .header-below',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => $prefix . 'navigation_background_type',
			'operator' => '==',
			'value'    => 'solid',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'navigation_margin',
	'label'     => esc_html__( 'Menu Margin', 'businext' ),
	'section'   => $section,
	'priority'  => $priority++,
	'transport' => 'auto',
	'default'   => array(
		'top'    => '0px',
		'bottom' => '0px',
		'left'   => '0px',
		'right'  => '0px',
	),
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-01 .menu__container',
			),
			'property' => 'margin',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'navigation_item_padding',
	'label'     => esc_html__( 'Item Padding', 'businext' ),
	'section'   => $section,
	'priority'  => $priority++,
	'default'   => array(
		'top'    => '21px',
		'bottom' => '21px',
		'left'   => '14px',
		'right'  => '14px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-01 .menu--primary .menu__container > li > a',
			),
			'property' => 'padding',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'navigation_item_margin',
	'label'     => esc_html__( 'Item Margin', 'businext' ),
	'section'   => $section,
	'priority'  => $priority++,
	'default'   => array(
		'top'    => '0px',
		'bottom' => '0px',
		'left'   => '0px',
		'right'  => '0px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-01  .menu--primary .menu__container > li',
			),
			'property' => 'margin',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'navigation_typography',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'These settings control the typography for menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '600',
		'line-height'    => '1.26',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.header-01 .menu--primary a',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'navigation_item_font_size',
	'label'       => esc_html__( 'Font Size', 'businext' ),
	'description' => esc_html__( 'Controls the font size for main menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 15,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.header-01 .menu--primary a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_color',
	'label'       => esc_html__( 'Color', 'businext' ),
	'description' => esc_html__( 'Controls the color for main menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '
			.header-01 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle,
			.header-01 .popup-search-wrap i,
			.header-01 .mini-cart .mini-cart-icon,
			.header-01 .header-social-networks a,
			.header-01 .menu--primary a
			',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_hover_color',
	'label'       => esc_html__( 'Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color when hover for main menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => 'rgba(255, 255, 255, 0.5)',
	'output'      => array(
		array(
			'element'  => '
			.header-01 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover,
			.header-01 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:focus,
			.header-01 .wpml-ls-legacy-dropdown-click .wpml-ls-current-language:hover>a,
			.header-01 .popup-search-wrap:hover i,
			.header-01 .mini-cart .mini-cart-icon:hover,
			.header-01 .header-social-networks a:hover,
            .header-01 .menu--primary li:hover > a,
            .header-01 .menu--primary > ul > li > a:hover,
            .header-01 .menu--primary > ul > li > a:focus,
            .header-01 .menu--primary .current-menu-ancestor > a,
            .header-01 .menu--primary .current-menu-item > a
            ',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_background_color',
	'label'       => esc_html__( 'Background Color', 'businext' ),
	'description' => esc_html__( 'Controls the background color for main menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '.header-01 .menu--primary .menu__container > li > a',
			'property' => 'background-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'navigation_link_hover_background_color',
	'label'       => esc_html__( 'Hover Background Color', 'businext' ),
	'description' => esc_html__( 'Controls the background color when hover for main menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
            .header-01 .menu--primary .menu__container > li > a:hover,
            .header-01 .menu--primary .menu__container > li.current-menu-item > a',
			'property' => 'background-color',
		),
	),
) );
