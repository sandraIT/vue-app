<?php
$panel    = 'shop';
$priority = 1;

Businext_Kirki::add_section( 'shop_archive', array(
	'title'    => esc_html__( 'Shop Archive', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'shop_single', array(
	'title'    => esc_html__( 'Shop Single', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Businext_Kirki::add_section( 'shopping_cart', array(
	'title'    => esc_html__( 'Shopping Cart', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );
