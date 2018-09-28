<?php
$section  = 'navigation_mobile';
$priority = 1;
$prefix   = 'mobile_menu_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => $prefix . 'breakpoint',
	'label'       => esc_html__( 'Breakpoint', 'businext' ),
	'description' => esc_html__( 'Controls the breakpoint of the mobile menu.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
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
	'settings'    => $prefix . 'bg_type',
	'label'       => esc_html__( 'Background Type', 'businext' ),
	'description' => esc_html__( 'Controls the background type of the mobile menu.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 'solid',
	'choices'     => array(
		'solid'    => esc_html__( 'Solid', 'businext' ),
		'gradient' => esc_html__( 'Gradient', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'bg_color_1',
	'label'       => esc_html__( 'Color', 'businext' ),
	'description' => esc_html__( 'Controls the background color of the mobile menu.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => '#222',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'            => 'color-alpha',
	'settings'        => $prefix . 'bg_color_2',
	'label'           => esc_html__( 'Color 2', 'businext' ),
	'description'     => esc_html__( 'Controls the background color of the mobile menu. Use when background type is gradient', 'businext' ),
	'section'         => $section,
	'priority'        => $priority++,
	'default'         => '#2AC3DB',
	'active_callback' => array(
		array(
			'setting'  => 'mobile_menu_bg_type',
			'operator' => '==',
			'value'    => 'gradient',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'radio-buttonset',
	'settings'  => $prefix . 'text_align',
	'label'     => esc_html__( 'Text Align', 'businext' ),
	'section'   => $section,
	'priority'  => $priority++,
	'transport' => 'auto',
	'default'   => 'left',
	'choices'   => array(
		'left'   => esc_html__( 'Left', 'businext' ),
		'center' => esc_html__( 'Center', 'businext' ),
		'right'  => esc_html__( 'Right', 'businext' ),
	),
	'output'    => array(
		array(
			'element'  => '.page-mobile-main-menu .menu__container',
			'property' => 'text-align',
		),
	),
) );

// Level 1.

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__( 'Level 1', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'typo',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'Controls the typography for all mobile menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '700',
		'line-height'    => '1.5',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.page-mobile-main-menu .menu__container a',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'item_padding',
	'label'     => esc_html__( 'Item Padding', 'businext' ),
	'section'   => $section,
	'priority'  => $priority++,
	'default'   => array(
		'top'    => '16px',
		'bottom' => '16px',
		'left'   => '0',
		'right'  => '0',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.page-mobile-main-menu .menu__container > li > a',
			),
			'property' => 'padding',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'item_font_size',
	'label'       => esc_html__( 'Font Size', 'businext' ),
	'description' => esc_html__( 'Controls the font size of items level 1.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 18,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 8,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .menu__container > li > a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_color',
	'label'       => esc_html__( 'Link Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of items level 1.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => 'rgba(255, 255, 255, 0.7)',
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .menu__container > li > a',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color when hover of items level 1.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .menu__container > li > a:hover,
            .page-mobile-main-menu .menu__container > li.opened > a',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'divider_color',
	'label'       => esc_html__( 'Divider Color', 'businext' ),
	'description' => esc_html__( 'Controls the divider color between items level 1', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#333',
	'output'      => array(
		array(
			'element'  => '
			.page-mobile-main-menu .menu__container > li + li > a,
			.page-mobile-main-menu .menu__container > li.opened > a',
			'property' => 'border-color',
		),
		array(
			'element'  => '.page-mobile-main-menu .widget-title, .page-mobile-main-menu .widgettitle',
			'property' => 'border-bottom-color',
		),
	),
) );

// Mobile Menu Drop down Menu.

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__( 'Sub Items', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'spacing',
	'settings'  => $prefix . 'sub_item_padding',
	'label'     => esc_html__( 'Item Padding', 'businext' ),
	'section'   => $section,
	'priority'  => $priority++,
	'default'   => array(
		'top'    => '10px',
		'bottom' => '10px',
		'left'   => '0',
		'right'  => '0',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.page-mobile-main-menu .sub-menu a,
				.page-mobile-main-menu .children a',
			),
			'property' => 'padding',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'sub_item_typo',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'Controls the typography for sub items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '500',
		'line-height'    => '1.5',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '
			.page-mobile-main-menu .sub-menu a,
			.page-mobile-main-menu .children a',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'sub_item_font_size',
	'label'       => esc_html__( 'Font Size', 'businext' ),
	'description' => esc_html__( 'Controls the font size of sub items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 15,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 8,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '
			.page-mobile-main-menu .sub-menu a,
			.page-mobile-main-menu .children a,
			.page-mobile-main-menu .tm-list__item
			',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'sub_link_color',
	'label'       => esc_html__( 'Link Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of sub items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => 'rgba(255, 255, 255, 0.7)',
	'output'      => array(
		array(
			'element'  => '
			.page-mobile-main-menu .sub-menu a,
			.page-mobile-main-menu .children a,
			.page-mobile-main-menu .tm-list__item',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'sub_link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color when hover of sub items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '
			.page-mobile-main-menu .sub-menu a:hover,
			.page-mobile-main-menu .children a:hover,
            .page-mobile-main-menu .tm-list__item:hover,
            .page-mobile-main-menu .sub-menu .opened > a',
			'property' => 'color',
		),
	),
) );

// Widget Title

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'widget_title_typo',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'Controls the typography for all mobile menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '700',
		'line-height'    => '1.5',
		'letter-spacing' => '1px',
		'text-transform' => 'uppercase',
	),
	'output'      => array(
		array(
			'element' => '.page-mobile-main-menu .widgettitle',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'widget_title_font_size',
	'label'       => esc_html__( 'Font Size', 'businext' ),
	'description' => esc_html__( 'Controls the font size of widget title in sub mega menu.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 14,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 8,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .widgettitle',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'widget_title_color',
	'label'       => esc_html__( 'Widget Title Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of widget title.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-mobile-main-menu .widgettitle',
			'property' => 'color',
		),
	),
) );
