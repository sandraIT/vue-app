<?php
$section  = 'top_bar_style_03';
$priority = 1;
$prefix   = 'top_bar_style_03_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'language_switcher_enable',
	'label'       => esc_html__( 'Language Switcher', 'businext' ),
	'description' => esc_html__( 'Controls the display the language switcher', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Hide', 'businext' ),
		'1' => esc_html__( 'Show', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'social_networks_enable',
	'label'       => esc_html__( 'Social Networks', 'businext' ),
	'description' => esc_html__( 'Controls the display the social networks', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
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
		'field' => 'text',
	),
	'default'   => array(
		array(
			'text'       => '1 800 977 78 80',
			'url'        => 'tel:18009777880',
			'icon_class' => 'ion-ios-telephone',
		),
		array(
			'text'       => '3rd Avenue, San Francisco',
			'url'        => '',
			'icon_class' => 'ion-android-map',
		),
		array(
			'text'       => 'Mon-fri: 8am - 7pm',
			'url'        => '',
			'icon_class' => 'ion-clock',
		),
	),
	'fields'    => array(
		'text'       => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Title', 'businext' ),
			'default' => '',
		),
		'url'        => array(
			'type'    => 'text',
			'label'   => esc_html__( 'Link', 'businext' ),
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
	'settings'  => $prefix . 'padding_top',
	'label'     => esc_html__( 'Padding top', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.top-bar-03',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'padding_bottom',
	'label'     => esc_html__( 'Padding bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.top-bar-03',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'typography',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'These settings control the typography of texts of top bar section.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '600',
		'line-height'    => '1.78',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.top-bar-03, .top-bar-03 a',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'font_size',
	'label'     => esc_html__( 'Font size', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 14,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.top-bar-03, .top-bar-03 a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'bg_color',
	'label'       => esc_html__( 'Background', 'businext' ),
	'description' => esc_html__( 'Controls the background color of top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#1a0272',
	'output'      => array(
		array(
			'element'  => '.top-bar-03',
			'property' => 'background-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'border_width',
	'label'     => esc_html__( 'Border Bottom Width', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 1,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.top-bar-03',
			'property' => 'border-bottom-width',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'border_color',
	'label'       => esc_html__( 'Border Bottom Color', 'businext' ),
	'description' => esc_html__( 'Controls the border bottom color of top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(216, 216, 216, 0.2)',
	'output'      => array(
		array(
			'element'  => '.top-bar-03',
			'property' => 'border-bottom-color',
		),
		array(
			'element'  => '.top-bar-03 .top-bar-office-wrapper .office .office-content-wrap',
			'property' => 'border-left-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'text_color',
	'label'       => esc_html__( 'Text', 'businext' ),
	'description' => esc_html__( 'Controls the color of text on top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.top-bar-03',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'link_color',
	'label'       => esc_html__( 'Link Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of links on top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.top-bar-03 a',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color when hover of links on top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#ff8f19',
	'output'      => array(
		array(
			'element'  => '.top-bar-03 a:hover, .top-bar-03 a:focus',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'icon_color',
	'label'       => esc_html__( 'Icons Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of icons.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#ff8f19',
	'output'      => array(
		array(
			'element'  => '.top-bar-03 .top-bar-info .info-icon',
			'property' => 'color',
		),
	),
) );
