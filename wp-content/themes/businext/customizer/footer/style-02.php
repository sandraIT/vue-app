<?php
$section  = 'footer_02';
$priority = 1;
$prefix   = 'footer_02_';

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'widget_title_color',
	'label'     => esc_html__( 'Widget Title Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#fff',
	'output'    => array(
		array(
			'element'  => '.footer-style-02 .widgettitle',
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
			'element'  => '.footer-style-02 .widgettitle',
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
	'default'   => 16,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.footer-style-02 .widgettitle',
			'property' => 'margin-bottom',
			'units'    => 'px',
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
	'default'   => 'rgba(255, 255, 255, 0.8)',
	'output'    => array(
		array(
			'element'  => '.footer-style-02, .footer-style-02 .widget_text',
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
	'default'   => 'rgba(255, 255, 255, 0.8)',
	'output'    => array(
		array(
			'element'  => '
			.footer-style-02 a,
            .footer-style-02 .widget_recent_entries li a,
            .footer-style-02 .widget_recent_comments li a,
            .footer-style-02 .widget_archive li a,
            .footer-style-02 .widget_categories li a,
            .footer-style-02 .widget_meta li a,
            .footer-style-02 .widget_product_categories li a,
            .footer-style-02 .widget_rss li a,
            .footer-style-02 .widget_pages li a,
            .footer-style-02 .widget_nav_menu li a,
            .footer-style-02 .insight-core-bmw li a
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
	'default'   => '#21C674',
	'output'    => array(
		array(
			'element'  => '
			.footer-style-02 a:hover,
            .footer-style-02 .widget_recent_entries li a:hover,
            .footer-style-02 .widget_recent_comments li a:hover,
            .footer-style-02 .widget_archive li a:hover,
            .footer-style-02 .widget_categories li a:hover,
            .footer-style-02 .widget_meta li a:hover,
            .footer-style-02 .widget_product_categories li a:hover,
            .footer-style-02 .widget_rss li a:hover,
            .footer-style-02 .widget_pages li a:hover,
            .footer-style-02 .widget_nav_menu li a:hover,
            .footer-style-02 .insight-core-bmw li a:hover 
			',
			'property' => 'color',
		),
	),
) );
