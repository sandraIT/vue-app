<?php

class WPBakeryShortCode_TM_Gmaps extends WPBakeryShortCode {

	public function convertAttributesToNewMarker( $atts ) {
		if ( isset( $atts['markers'] ) && strlen( $atts['markers'] ) > 0 ) {
			$markers = vc_param_group_parse_atts( $atts['markers'] );

			if ( ! is_array( $markers ) ) {
				$temp         = explode( ',', $atts['markers'] );
				$paramMarkers = array();

				foreach ( $temp as $marker ) {
					$data = explode( '|', $marker );

					$newMarker            = array();
					$newMarker['address'] = isset( $data[0] ) ? $data[0] : '';
					$newMarker['icon']    = isset( $data[1] ) ? $data[1] : '';
					$newMarker['title']   = isset( $data[2] ) ? $data[2] : '';
					$newMarker['info']    = isset( $data[3] ) ? $data[3] : '';

					$paramMarkers[] = $newMarker;
				}

				$atts['markers'] = urlencode( json_encode( $paramMarkers ) );

			}

			return $atts;
		}
	}
}

vc_map( array(
	'name'     => esc_html__( 'Google Maps', 'businext' ),
	'base'     => 'tm_gmaps',
	'icon'     => 'insight-i insight-i-map',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'params'   => array(
		array(
			'heading'     => esc_html__( 'Height', 'businext' ),
			'description' => esc_html__( 'Enter map height (in pixels or %)', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'map_height',
			'value'       => '480',
		),
		array(
			'heading'     => esc_html__( 'Width', 'businext' ),
			'description' => esc_html__( 'Enter map width (in pixels or %)', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'map_width',
			'value'       => '100%',
		),
		array(
			'heading'    => esc_html__( 'Button', 'businext' ),
			'type'       => 'vc_link',
			'param_name' => 'button',
			'value'      => esc_html__( 'Button', 'businext' ),
		),
		array(
			'heading'     => esc_html__( 'Zoom Level', 'businext' ),
			'description' => esc_html__( 'Map zoom level', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'zoom',
			'value'       => 16,
			'max'         => 17,
			'min'         => 0,
		),
		array(
			'type'       => 'checkbox',
			'param_name' => 'zoom_enable',
			'value'      => array(
				esc_html__( 'Enable mouse scroll wheel zoom', 'businext' ) => 'yes',
			),
		),
		array(
			'heading'     => esc_html__( 'Map Type', 'businext' ),
			'description' => esc_html__( 'Choose a map type', 'businext' ),
			'type'        => 'dropdown',
			'admin_label' => true,
			'param_name'  => 'map_type',
			'value'       => array(
				esc_html__( 'Roadmap', 'businext' )   => 'roadmap',
				esc_html__( 'Satellite', 'businext' ) => 'satellite',
				esc_html__( 'Hybrid', 'businext' )    => 'hybrid',
				esc_html__( 'Terrain', 'businext' )   => 'terrain',
			),
		),
		array(
			'heading'     => esc_html__( 'Map Style', 'businext' ),
			'description' => esc_html__( 'Choose a map style. This approach changes the style of the Roadmap types (base imagery in terrain and satellite views is not affected, but roads, labels, etc. respect styling rules)', 'businext' ),
			'type'        => 'image_radio',
			'admin_label' => true,
			'param_name'  => 'map_style',
			'value'       => array(
				'grayscale'               => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/greyscale.png',
					'title' => esc_attr__( 'Grayscale', 'businext' ),
				),
				'subtle_grayscale'        => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/subtle-grayscale.png',
					'title' => esc_attr__( 'Subtle Grayscale', 'businext' ),
				),
				'apple_paps_esque'        => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/apple-maps-esque.png',
					'title' => esc_attr__( 'Apple Maps-esque', 'businext' ),
				),
				'pale_dawn'               => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/pale-dawn.png',
					'title' => esc_attr__( 'Pale Dawn', 'businext' ),
				),
				'midnight_commander'      => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/midnight-commander.png',
					'title' => esc_attr__( 'Midnight Commander', 'businext' ),
				),
				'blue_water'              => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/blue-water.png',
					'title' => esc_attr__( 'Blue Water', 'businext' ),
				),
				'retro'                   => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/retro.png',
					'title' => esc_attr__( 'Retro', 'businext' ),
				),
				'paper'                   => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/paper.png',
					'title' => esc_attr__( 'Paper', 'businext' ),
				),
				'ultra_light_with_labels' => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/ultra-light-with-labels.png',
					'title' => esc_attr__( 'Ultra Light with Labels', 'businext' ),
				),
				'shades_of_grey'          => array(
					'url'   => BUSINEXT_THEME_IMAGE_URI . '/maps/shades-of-grey.png',
					'title' => esc_attr__( 'Shades Of Grey', 'businext' ),
				),
			),
			'std'         => 'ultra_light_with_labels',
		),
		array(
			'type'       => 'checkbox',
			'param_name' => 'overlay_enable',
			'value'      => array(
				esc_html__( 'Use overlay instead of marker items', 'businext' ) => '1',
			),
		),
		array(
			'heading'    => esc_html__( 'Overlay Style', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'overlay_style',
			'value'      => array(
				esc_html__( 'Style 01', 'businext' ) => '01',
				esc_html__( 'Style 02', 'businext' ) => '02',
			),
			'std'        => '01',
		),
		array(
			'group'       => esc_html__( 'Markers', 'businext' ),
			'heading'     => esc_html__( 'Markers', 'businext' ),
			'description' => esc_html__( 'You can add multiple markers to the map', 'businext' ),
			'type'        => 'param_group',
			'param_name'  => 'markers',
			'value'       => urlencode( json_encode( array(
				array(
					'address' => '40.7590615,-73.969231',
				),
			) ) ),
			'params'      => array(
				array(
					'heading'     => esc_html__( 'Address or Coordinate', 'businext' ),
					'description' => sprintf( wp_kses( __( 'Enter address or coordinate. Find coordinates using the name and/or address of the place using <a href="%s" target="_blank">this simple tool here.</a>', 'businext' ), array(
						'a' => array(
							'href'   => array(),
							'target' => array(),
						),
					) ), esc_url( 'http://universimmedia.pagesperso-orange.fr/geo/loc.htm' ) ),
					'type'        => 'textfield',
					'param_name'  => 'address',
					'admin_label' => true,
				),
				array(
					'heading'     => esc_html__( 'Marker icon', 'businext' ),
					'description' => esc_html__( 'Choose a image for marker address', 'businext' ),
					'type'        => 'attach_image',
					'param_name'  => 'icon',
				),
				array(
					'heading'    => esc_html__( 'Marker Title', 'businext' ),
					'type'       => 'textfield',
					'param_name' => 'title',
				),
				array(
					'heading'     => esc_html__( 'Marker Information', 'businext' ),
					'description' => esc_html__( 'Content for info window', 'businext' ),
					'type'        => 'textarea',
					'param_name'  => 'info',
				),
			),
		),
		array(
			'heading'     => esc_html__( 'Google Maps API Key (optional)', 'businext' ),
			'description' => sprintf( wp_kses( __( 'Follow <a href="%s" target="_blank">this link</a> and click <strong>GET A KEY</strong> button. If you leave it empty, the API Key will be put in by default from our key.', 'businext' ), array(
				'a'      => array(
					'href'   => array(),
					'target' => array(),
				),
				'strong' => array(),
			) ), esc_url( 'https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key' ) ),
			'type'        => 'textfield',
			'param_name'  => 'api_key',
		),
	),
) );
