<?php
$section  = 'shop_archive';
$priority = 1;
$prefix   = 'shop_archive_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'shop_archive_new_days',
	'label'       => esc_html__( 'New Badge (Days)', 'businext' ),
	'description' => esc_html__( 'If the product was published within the newness time frame display the new badge.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '90',
	'choices'     => array(
		'0'  => esc_html__( 'None', 'businext' ),
		'1'  => esc_html__( '1 day', 'businext' ),
		'2'  => esc_html__( '2 days', 'businext' ),
		'3'  => esc_html__( '3 days', 'businext' ),
		'4'  => esc_html__( '4 days', 'businext' ),
		'5'  => esc_html__( '5 days', 'businext' ),
		'6'  => esc_html__( '6 days', 'businext' ),
		'7'  => esc_html__( '7 days', 'businext' ),
		'8'  => esc_html__( '8 days', 'businext' ),
		'9'  => esc_html__( '9 days', 'businext' ),
		'10' => esc_html__( '10 days', 'businext' ),
		'15' => esc_html__( '15 days', 'businext' ),
		'20' => esc_html__( '20 days', 'businext' ),
		'25' => esc_html__( '25 days', 'businext' ),
		'30' => esc_html__( '30 days', 'businext' ),
		'60' => esc_html__( '60 days', 'businext' ),
		'90' => esc_html__( '90 days', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'shop_archive_compare',
	'label'       => esc_html__( 'Compare', 'businext' ),
	'description' => esc_html__( 'Turn on to display compare button', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'shop_archive_wishlist',
	'label'       => esc_html__( 'Wishlist', 'businext' ),
	'description' => esc_html__( 'Turn on to display love button', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'number',
	'settings'    => 'shop_archive_number_item',
	'label'       => esc_html__( 'Number items', 'businext' ),
	'description' => esc_html__( 'Controls the number of products display on shop archive page', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 8,
	'choices'     => array(
		'min'  => 1,
		'max'  => 30,
		'step' => 1,
	),
) );
