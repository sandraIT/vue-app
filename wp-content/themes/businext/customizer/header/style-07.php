<?php
$section  = 'header_style_07';
$priority = 1;
$prefix   = 'header_style_07_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'overlay',
	'label'    => esc_html__( 'Header Overlay', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
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
	'priority' => $priority ++,
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
	'priority' => $priority ++,
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
	'priority' => $priority ++,
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
	'priority' => $priority ++,
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
	'priority' => $priority ++,
	'default'  => '0',
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
	'priority'  => $priority ++,
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
			'title'      => '(+00)888.666.88',
			'sub_title'  => 'Give Us a Call',
			'icon_class' => 'ion-ios-telephone-outline',
		),
		array(
			'title'      => 'home@business.com',
			'sub_title'  => 'Send Us a Mess',
			'icon_class' => 'ion-ios-email-outline',
		),
		array(
			'title'      => 'Mon - Fri: 09:00 - 17:00',
			'sub_title'  => 'Support 24/7',
			'icon_class' => 'ion-ios-clock-outline',
		),
		array(
			'title'      => '183 Parkways, CA, USA',
			'sub_title'  => 'Office Address',
			'icon_class' => 'ion-ios-location-outline',
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
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.header-07 .page-header-inner',
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
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#eee',
	'output'      => array(
		array(
			'element'  => '.header-07 .page-header-inner',
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
	'priority'    => $priority ++,
	'default'     => '0 0 10px rgba(0, 0, 0, 0.07)',
	'output'      => array(
		array(
			'element'  => '.header-07 .page-header-inner',
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
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '#fff',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.header-07 .page-header-inner',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'header_icon_color',
	'label'       => esc_html__( 'Icon Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of icons on header.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#222',
	'output'      => array(
		array(
			'element'  => '
			.header-07 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle,
			.header-07 .popup-search-wrap i,
			.header-07 .mini-cart .mini-cart-icon,
			.header-07 .header-social-networks a,
			.header-07 .page-open-mobile-menu i
			',
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
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#D93030',
	'output'      => array(
		array(
			'element'  => '
			.header-07 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover,
			.header-07 .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:focus,
			.header-07 .wpml-ls-legacy-dropdown-click .wpml-ls-current-language:hover>a,
			.header-07 .popup-search-wrap:hover i,
			.header-07 .mini-cart .mini-cart-icon:hover,
			.header-07 .header-social-networks a:hover,
			.header-07 .page-open-mobile-menu:hover i
			',
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
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#D93030',
	'output'      => array(
		array(
			'element'  => '.header-07 .header-info .info-icon',
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
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#D93030',
	'output'      => array(
		array(
			'element'  => '.header-07 .mini-cart .mini-cart-icon:after',
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
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.header-07 .mini-cart .mini-cart-icon:after',
			'property' => 'color',
		),
	),
) );

/*--------------------------------------------------------------
# Navigation
--------------------------------------------------------------*/

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Main Menu Level 1', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'navigation_margin',
	'label'     => esc_html__( 'Menu Margin', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
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
				'.desktop-menu .header-07 .menu__container',
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
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => '41px',
		'bottom' => '41px',
		'left'   => '14px',
		'right'  => '14px',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.desktop-menu .header-07 .menu--primary .menu__container > li > a',
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
	'priority'  => $priority ++,
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
				'.desktop-menu .header-07  .menu--primary .menu__container > li',
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
	'priority'    => $priority ++,
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
			'element' => '.header-07 .menu--primary a',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'navigation_item_font_size',
	'label'       => esc_html__( 'Font Size', 'businext' ),
	'description' => esc_html__( 'Controls the font size for main menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 15,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.header-07 .menu--primary a',
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
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#222',
	'output'      => array(
		array(
			'element'  => '
			.header-07 .menu--primary a
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
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#D93030',
	'output'      => array(
		array(
			'element'  => '
            .header-07 .menu--primary li:hover > a,
            .header-07 .menu--primary > ul > li > a:hover,
            .header-07 .menu--primary > ul > li > a:focus,
            .header-07 .menu--primary .current-menu-ancestor > a,
            .header-07 .menu--primary .current-menu-item > a
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
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '.header-07 .menu--primary .menu__container > li > a',
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
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '',
	'output'      => array(
		array(
			'element'  => '
            .header-07 .menu--primary .menu__container > li > a:hover,
            .header-07 .menu--primary .menu__container > li.current-menu-item > a',
			'property' => 'background-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Button', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'button_text',
	'label'    => esc_html__( 'Button Text', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Request a Quote', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'button_link',
	'label'    => esc_html__( 'Button link', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '#',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'radio-buttonset',
	'settings' => $prefix . 'button_link_target',
	'label'    => esc_html__( 'Open link in a new tab.', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '0',
	'choices'  => array(
		'0' => esc_html__( 'No', 'businext' ),
		'1' => esc_html__( 'Yes', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => $prefix . 'button_color',
	'label'       => esc_html__( 'Button Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of button.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'choices'     => array(
		'color'      => esc_attr__( 'Color', 'businext' ),
		'background' => esc_attr__( 'Background', 'businext' ),
		'border'     => esc_attr__( 'Border', 'businext' ),
	),
	'default'     => array(
		'color'      => '#fff',
		'background' => '#D93030',
		'border'     => '#D93030',
	),
	'output'      => array(
		array(
			'choice'   => 'color',
			'element'  => '.header-07 .tm-button',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-07 .tm-button',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-07 .tm-button',
			'property' => 'background-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => $prefix . 'button_hover_color',
	'label'       => esc_html__( 'Button Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of button when hover.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'choices'     => array(
		'color'      => esc_attr__( 'Color', 'businext' ),
		'background' => esc_attr__( 'Background', 'businext' ),
		'border'     => esc_attr__( 'Border', 'businext' ),
	),
	'default'     => array(
		'color'      => '#D93030',
		'background' => 'rgba(0, 0, 0, 0)',
		'border'     => '#D93030',
	),
	'output'      => array(
		array(
			'choice'   => 'color',
			'element'  => '.header-07 .tm-button:hover',
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => '.header-07 .tm-button:hover',
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => '.header-07 .tm-button:hover',
			'property' => 'background-color',
		),
	),
) );
