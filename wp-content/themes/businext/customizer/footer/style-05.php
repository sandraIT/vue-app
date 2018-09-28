<?php
$section  = 'footer_05';
$priority = 1;
$prefix   = 'footer_05_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'widget_title_typography',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'Controls the typography of footer widget title.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '700',
		'font-size'      => '18px',
		'line-height'    => '1.2',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.footer-style-05 .widgettitle',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'widget_title_color',
	'label'     => esc_html__( 'Widget Title Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto    ',
	'default'   => '#222',
	'output'    => array(
		array(
			'element'  => '.footer-style-05 .widgettitle',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'widget_title_border_color',
	'label'     => esc_html__( 'Widget Title Border Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => 'rgba(0, 0, 0, 0)',
	'output'    => array(
		array(
			'element'  => '.footer-style-05 .widgettitle',
			'property' => 'border-bottom-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'widget_title_margin_bottom',
	'label'     => esc_html__( 'Widget Title Margin Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 21,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.footer-style-05 .widgettitle',
			'property' => 'margin-bottom',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'typography',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'Controls the typography of footer widget title.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '500',
		'font-size'      => '15px',
		'line-height'    => '1.66',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '
			.footer-style-05,
			.footer-style-05 a,
			',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'text_color',
	'label'     => esc_html__( 'Text Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#888',
	'output'    => array(
		array(
			'element'  => '.footer-style-05, .footer-style-05 .widget_text',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'link_color',
	'label'     => esc_html__( 'Link Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#888',
	'output'    => array(
		array(
			'element'  => '
			.footer-style-05 a,
            .footer-style-05 .widget_recent_entries li a,
            .footer-style-05 .widget_recent_comments li a,
            .footer-style-05 .widget_archive li a,
            .footer-style-05 .widget_categories li a,
            .footer-style-05 .widget_meta li a,
            .footer-style-05 .widget_product_categories li a,
            .footer-style-05 .widget_rss li a,
            .footer-style-05 .widget_pages li a,
            .footer-style-05 .widget_nav_menu li a,
            .footer-style-05 .insight-core-bmw li a
			',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'link_hover_color',
	'label'     => esc_html__( 'Link Hover Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#3556DF',
	'output'    => array(
		array(
			'element'  => '
			.footer-style-05 a:hover,
            .footer-style-05 .widget_recent_entries li a:hover,
            .footer-style-05 .widget_recent_comments li a:hover,
            .footer-style-05 .widget_archive li a:hover,
            .footer-style-05 .widget_categories li a:hover,
            .footer-style-05 .widget_meta li a:hover,
            .footer-style-05 .widget_product_categories li a:hover,
            .footer-style-05 .widget_rss li a:hover,
            .footer-style-05 .widget_pages li a:hover,
            .footer-style-05 .widget_nav_menu li a:hover,
            .footer-style-05 .insight-core-bmw li a:hover 
			',
			'property' => 'color',
		),
	),
) );
