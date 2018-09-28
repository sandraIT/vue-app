<?php

vc_add_params( 'vc_separator', array(
	array(
		'heading'     => esc_html__( 'Position', 'businext' ),
		'description' => esc_html__( 'Make the separator position absolute with column', 'businext' ),
		'type'        => 'dropdown',
		'param_name'  => 'position',
		'value'       => array(
			esc_html__( 'None', 'businext' )   => '',
			esc_html__( 'Top', 'businext' )    => 'top',
			esc_html__( 'Bottom', 'businext' ) => 'bottom',
		),
		'std'         => '',
	),
) );
