<?php
$section  = 'navigation_minimal';
$priority = 1;
$prefix   = 'navigation_minimal_';

/*--------------------------------------------------------------
# Level 1
--------------------------------------------------------------*/
Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__( 'Main Menu Level 1', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'bg_color',
	'label'       => esc_html__( 'Background', 'businext' ),
	'description' => esc_html__( 'Controls the background color for dropdown menu', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-off-canvas-main-menu',
			'property' => 'background-color',
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
		'top'    => '0',
		'bottom' => '0',
		'left'   => '0',
		'right'  => '0',
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => array(
				'.page-off-canvas-main-menu .menu__container > li > a',
				'.page-off-canvas-main-menu .menu__container > ul > li >a',
			),
			'property' => 'padding',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'typography',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'These settings control the typography for menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '600',
		'line-height'    => '1.7',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.page-off-canvas-main-menu .menu__container a',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'item_font_size',
	'label'       => esc_html__( 'Font Size', 'businext' ),
	'description' => esc_html__( 'Controls the font size for main menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'default'     => 32,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => '.page-off-canvas-main-menu .menu__container a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_color',
	'label'       => esc_html__( 'Color', 'businext' ),
	'description' => esc_html__( 'Controls the color for main menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => Businext::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => '.page-off-canvas-main-menu .menu__container a, .page-close-main-menu
            ',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_hover_color',
	'label'       => esc_html__( 'Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color when hover for main menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => Businext::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '
            .page-off-canvas-main-menu .menu__container a:hover,
            .page-off-canvas-main-menu .menu__container a:focus,
            .page-close-main-menu:hover',
			'property' => 'color',
		),
	),
) );

/*--------------------------------------------------------------
# Main Menu Dropdown Menu
--------------------------------------------------------------*/
Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority++,
	'section'  => $section,
	'priority' => $priority++,
	'default'  => '<div class="big_title">' . esc_html__( 'Main Menu Dropdown', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'dropdown_typography',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'These settings control the typography for dropdown menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '500',
		'line-height'    => '1.7',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.page-off-canvas-main-menu .menu__container .sub-menu a',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => $prefix . 'dropdown_link_font_size',
	'label'       => esc_html__( 'Font Size', 'businext' ),
	'description' => esc_html__( 'Controls the font size for dropdown menu items.', 'businext' ),
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
			'element'  => '.page-off-canvas-main-menu .menu__container .sub-menu a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Styling
--------------------------------------------------------------*/

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'dropdown_link_color',
	'label'       => esc_html__( 'Color', 'businext' ),
	'description' => esc_html__( 'Controls the color for dropdown menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => '#999',
	'output'      => array(
		array(
			'element'  => '.page-off-canvas-main-menu .menu__container .sub-menu a, .page-off-canvas-main-menu .widgettitle',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'dropdown_link_hover_color',
	'label'       => esc_html__( 'Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color when hover for dropdown menu items.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority++,
	'transport'   => 'auto',
	'default'     => Businext::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.page-off-canvas-main-menu .menu__container .sub-menu a:hover',
			'property' => 'color',
		),
	),
) );
