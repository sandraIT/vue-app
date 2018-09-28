<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Businext_Metabox' ) ) {
	class Businext_Metabox {

		/**
		 * Businext_Metabox constructor.
		 */
		public function __construct() {
			add_filter( 'insight_core_meta_boxes', array( $this, 'register_meta_boxes' ) );
			add_filter( 'businext_page_meta_box_presets', array( $this, 'page_meta_box_presets' ) );
		}

		public function page_meta_box_presets( $presets ) {
			$presets[] = 'color_preset';

			return $presets;
		}

		/**
		 * Register Metabox
		 *
		 * @param $meta_boxes
		 *
		 * @return array
		 */
		public function register_meta_boxes( $meta_boxes ) {
			$page_registered_sidebars = Businext_Helper::get_registered_sidebars( true );

			$general_options = array(
				array(
					'title'  => esc_attr__( 'Layout', 'businext' ),
					'fields' => array(
						array(
							'id'      => 'site_layout',
							'type'    => 'select',
							'title'   => esc_attr__( 'Layout', 'businext' ),
							'desc'    => esc_attr__( 'Controls the layout of this page.', 'businext' ),
							'options' => array(
								''      => esc_html__( 'Default', 'businext' ),
								'boxed' => esc_html__( 'Boxed', 'businext' ),
								'wide'  => esc_html__( 'Wide', 'businext' ),
							),
							'default' => '',
						),
						array(
							'id'    => 'site_width',
							'type'  => 'text',
							'title' => esc_attr__( 'Site Width', 'businext' ),
							'desc'  => esc_attr__( 'Controls the site width for this page. Enter value including any valid CSS unit, ex: 1200px. Leave blank to use global setting.', 'businext' ),
						),
						array(
							'id'      => 'content_padding',
							'type'    => 'switch',
							'title'   => esc_attr__( 'Page Content Padding', 'businext' ),
							'default' => '1',
							'options' => array(
								'0'      => esc_html__( 'No Padding', 'businext' ),
								'1'      => esc_html__( 'Default', 'businext' ),
								'top'    => esc_html__( 'No Top Padding', 'businext' ),
								'bottom' => esc_html__( 'No Bottom Padding', 'businext' ),
							),
						),
					),
				),
				array(
					'title'  => esc_attr__( 'Color', 'businext' ),
					'fields' => array(
						array(
							'id'      => 'color_preset',
							'type'    => 'select',
							'title'   => esc_attr__( 'Color Preset', 'businext' ),
							'desc'    => esc_attr__( 'Select a preset of color for this page.', 'businext' ),
							'options' => array(
								'-1' => esc_html__( 'None', 'businext' ),
								'01' => esc_html__( 'Preset 01', 'businext' ),
								'02' => esc_html__( 'Preset 02', 'businext' ),
								'03' => esc_html__( 'Preset 03', 'businext' ),
								'04' => esc_html__( 'Preset 04', 'businext' ),
								'05' => esc_html__( 'Preset 05', 'businext' ),
								'06' => esc_html__( 'Preset 06', 'businext' ),
								'07' => esc_html__( 'Preset 07', 'businext' ),
								'08' => esc_html__( 'Preset 08', 'businext' ),
								'09' => esc_html__( 'Preset 09', 'businext' ),
								'10' => esc_html__( 'Preset 10', 'businext' ),
								'11' => esc_html__( 'Preset 11', 'businext' ),
								'12' => esc_html__( 'Preset 12', 'businext' ),
								'13' => esc_html__( 'Preset 13', 'businext' ),
								'14' => esc_html__( 'Preset 14', 'businext' ),
								'15' => esc_html__( 'Preset 15', 'businext' ),
								'16' => esc_html__( 'Preset 16', 'businext' ),
								'17' => esc_html__( 'Preset 17', 'businext' ),
								'18' => esc_html__( 'Preset 18', 'businext' ),
							),
							'default' => '-1',
						),
					),
				),
				array(
					'title'  => esc_attr__( 'Background', 'businext' ),
					'fields' => array(
						array(
							'id'      => 'site_background_message',
							'type'    => 'message',
							'title'   => esc_attr__( 'Info', 'businext' ),
							'message' => esc_attr__( 'These options controls the background on boxed mode.', 'businext' ),
						),
						array(
							'id'    => 'site_background_color',
							'type'  => 'color',
							'title' => esc_attr__( 'Background Color', 'businext' ),
							'desc'  => esc_attr__( 'Controls the background color of the outer background area in boxed mode of this page.', 'businext' ),
						),
						array(
							'id'    => 'site_background_image',
							'type'  => 'media',
							'title' => esc_attr__( 'Background Image', 'businext' ),
							'desc'  => esc_attr__( 'Controls the background image of the outer background area in boxed mode of this page.', 'businext' ),
						),
						array(
							'id'      => 'site_background_repeat',
							'type'    => 'select',
							'title'   => esc_attr__( 'Background Repeat', 'businext' ),
							'desc'    => esc_attr__( 'Controls the background repeat of the outer background area in boxed mode of this page.', 'businext' ),
							'options' => array(
								'no-repeat' => esc_html__( 'No repeat', 'businext' ),
								'repeat'    => esc_html__( 'Repeat', 'businext' ),
								'repeat-x'  => esc_html__( 'Repeat X', 'businext' ),
								'repeat-y'  => esc_html__( 'Repeat Y', 'businext' ),
							),
						),
						array(
							'id'      => 'site_background_attachment',
							'type'    => 'select',
							'title'   => esc_attr__( 'Background Attachment', 'businext' ),
							'desc'    => esc_attr__( 'Controls the background attachment of the outer background area in boxed mode of this page.', 'businext' ),
							'options' => array(
								''       => esc_html__( 'Default', 'businext' ),
								'fixed'  => esc_html__( 'Fixed', 'businext' ),
								'scroll' => esc_html__( 'Scroll', 'businext' ),
							),
						),
						array(
							'id'    => 'site_background_position',
							'type'  => 'text',
							'title' => esc_html__( 'Background Position', 'businext' ),
							'desc'  => esc_attr__( 'Controls the background position of the outer background area in boxed mode of this page.', 'businext' ),
						),
						array(
							'id'    => 'site_background_size',
							'type'  => 'text',
							'title' => esc_html__( 'Background Size', 'businext' ),
							'desc'  => esc_attr__( 'Controls the background size of the outer background area in boxed mode of this page.', 'businext' ),
						),
						array(
							'id'      => 'content_background_message',
							'type'    => 'message',
							'title'   => esc_attr__( 'Info', 'businext' ),
							'message' => esc_attr__( 'These options controls the background of main content on this page.', 'businext' ),
						),
						array(
							'id'    => 'content_background_color',
							'type'  => 'color',
							'title' => esc_attr__( 'Background Color', 'businext' ),
							'desc'  => esc_attr__( 'Controls the background color of main content on this page.', 'businext' ),
						),
						array(
							'id'    => 'content_background_image',
							'type'  => 'media',
							'title' => esc_attr__( 'Background Image', 'businext' ),
							'desc'  => esc_attr__( 'Controls the background image of main content on this page.', 'businext' ),
						),
						array(
							'id'      => 'content_background_repeat',
							'type'    => 'select',
							'title'   => esc_attr__( 'Background Repeat', 'businext' ),
							'desc'    => esc_attr__( 'Controls the background repeat of main content on this page.', 'businext' ),
							'options' => array(
								'no-repeat' => esc_html__( 'No repeat', 'businext' ),
								'repeat'    => esc_html__( 'Repeat', 'businext' ),
								'repeat-x'  => esc_html__( 'Repeat X', 'businext' ),
								'repeat-y'  => esc_html__( 'Repeat Y', 'businext' ),
							),
						),
						array(
							'id'    => 'content_background_position',
							'type'  => 'text',
							'title' => esc_html__( 'Background Position', 'businext' ),
							'desc'  => esc_attr__( 'Controls the background position of main content on this page.', 'businext' ),
						),
					),
				),
				array(
					'title'  => esc_attr__( 'Header', 'businext' ),
					'fields' => array(
						array(
							'id'      => 'top_bar_type',
							'type'    => 'select',
							'title'   => esc_attr__( 'Top Bar Type', 'businext' ),
							'desc'    => esc_attr__( 'Select top bar type that displays on this page.', 'businext' ),
							'default' => '',
							'options' => Businext_Helper::get_top_bar_list( true ),
						),
						array(
							'id'      => 'header_type',
							'type'    => 'select',
							'title'   => esc_attr__( 'Header Type', 'businext' ),
							'desc'    => esc_attr__( 'Select header type that displays on this page.', 'businext' ),
							'default' => '',
							'options' => Businext_Helper::get_header_list( true ),
						),
						array(
							'id'      => 'menu_display',
							'type'    => 'select',
							'title'   => esc_attr__( 'Primary menu', 'businext' ),
							'desc'    => esc_attr__( 'Select which menu displays on this page.', 'businext' ),
							'default' => '',
							'options' => Businext_Helper::get_all_menus(),
						),
						array(
							'id'      => 'menu_one_page',
							'type'    => 'switch',
							'title'   => esc_attr__( 'One Page Menu', 'businext' ),
							'default' => '0',
							'options' => array(
								'0' => esc_html__( 'Disable', 'businext' ),
								'1' => esc_html__( 'Enable', 'businext' ),
							),
						),
						array(
							'id'      => 'custom_logo',
							'type'    => 'media',
							'title'   => esc_attr__( 'Custom Logo', 'businext' ),
							'desc'    => esc_attr__( 'Select custom logo for this page.', 'businext' ),
							'default' => '',
						),
						array(
							'id'      => 'custom_logo_width',
							'type'    => 'text',
							'title'   => esc_attr__( 'Custom Logo Width', 'businext' ),
							'desc'    => esc_attr__( 'Controls the width of logo. For ex: 150px', 'businext' ),
							'default' => '',
						),
						array(
							'id'      => 'custom_sticky_logo_width',
							'type'    => 'text',
							'title'   => esc_attr__( 'Custom Sticky Logo Width', 'businext' ),
							'desc'    => esc_attr__( 'Controls the width of sticky logo. For ex: 150px', 'businext' ),
							'default' => '',
						),
					),
				),
				array(
					'title'  => esc_attr__( 'Page Title Bar', 'businext' ),
					'fields' => array(
						array(
							'id'      => 'page_title_bar_layout',
							'type'    => 'select',
							'title'   => esc_attr__( 'Layout', 'businext' ),
							'default' => 'default',
							'options' => Businext_Helper::get_title_bar_list( true ),
						),
						array(
							'id'      => 'page_title_bar_background_color',
							'type'    => 'color',
							'title'   => esc_attr__( 'Background Color', 'businext' ),
							'default' => '',
						),
						array(
							'id'      => 'page_title_bar_background',
							'type'    => 'media',
							'title'   => esc_attr__( 'Background Image', 'businext' ),
							'default' => '',
						),
						array(
							'id'      => 'page_title_bar_background_overlay',
							'type'    => 'color',
							'title'   => esc_attr__( 'Background Overlay', 'businext' ),
							'default' => '',
						),
						array(
							'id'    => 'page_title_bar_custom_heading',
							'type'  => 'text',
							'title' => esc_attr__( 'Custom Heading Text', 'businext' ),
							'desc'  => esc_attr__( 'Insert custom heading for the page title bar. Leave blank to use default.', 'businext' ),
						),
					),
				),
				array(
					'title'  => esc_attr__( 'Sidebars', 'businext' ),
					'fields' => array(
						array(
							'id'      => 'page_sidebar_1',
							'type'    => 'select',
							'title'   => esc_html__( 'Sidebar 1', 'businext' ),
							'desc'    => esc_html__( 'Select sidebar 1 that will display on this page.', 'businext' ),
							'default' => 'default',
							'options' => $page_registered_sidebars,
						),
						array(
							'id'      => 'page_sidebar_2',
							'type'    => 'select',
							'title'   => esc_html__( 'Sidebar 2', 'businext' ),
							'desc'    => esc_html__( 'Select sidebar 2 that will display on this page.', 'businext' ),
							'default' => 'default',
							'options' => $page_registered_sidebars,
						),
						array(
							'id'      => 'page_sidebar_position',
							'type'    => 'switch',
							'title'   => esc_html__( 'Sidebar Position', 'businext' ),
							'default' => 'default',
							'options' => Businext_Helper::get_list_sidebar_positions( true ),
						),
					),
				),
				array(
					'title'  => esc_attr__( 'Sliders', 'businext' ),
					'fields' => array(
						array(
							'id'      => 'revolution_slider',
							'type'    => 'select',
							'title'   => esc_attr__( 'Revolution Slider', 'businext' ),
							'desc'    => esc_attr__( 'Select the unique name of the slider.', 'businext' ),
							'options' => Businext_Helper::get_list_revslider(),
						),
						array(
							'id'      => 'slider_position',
							'type'    => 'select',
							'title'   => esc_attr__( 'Slider Position', 'businext' ),
							'default' => 'below',
							'options' => array(
								'above' => esc_attr__( 'Above Header', 'businext' ),
								'below' => esc_attr__( 'Below Header', 'businext' ),
							),
						),
					),
				),
				array(
					'title'  => esc_attr__( 'Footer', 'businext' ),
					'fields' => array(
						array(
							'id'      => 'footer_page',
							'type'    => 'select',
							'title'   => esc_attr__( 'Footer Page', 'businext' ),
							'default' => 'default',
							'options' => Businext_Footer::get_list_footers( true ),
						),
					),
				),
				array(
					'title'  => esc_attr__( 'Custom', 'businext' ),
					'fields' => array(
						array(
							'id'      => 'body_class',
							'type'    => 'text',
							'title'   => esc_attr__( 'Body Class', 'businext' ),
							'desc'    => esc_attr__( 'Add a class name to body and refer to it in custom CSS.', 'businext' ),
							'default' => '',
						),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_page_options',
				'title'      => esc_html__( 'Page Options', 'businext' ),
				'post_types' => array( 'page' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => $general_options,
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_post_options',
				'title'      => esc_html__( 'Page Options', 'businext' ),
				'post_types' => array( 'post' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array_merge( array(
							array(
								'title'  => esc_attr__( 'Post', 'businext' ),
								'fields' => array(
									array(
										'id'      => 'post_style',
										'type'    => 'select',
										'title'   => esc_attr__( 'Style', 'businext' ),
										'default' => '',
										'options' => array(
											''   => esc_html__( 'Default', 'businext' ),
											'01' => esc_html__( 'Style 01', 'businext' ),
											'02' => esc_html__( 'Style 02', 'businext' ),
										),
									),
									array(
										'id'    => 'post_gallery',
										'type'  => 'gallery',
										'title' => esc_attr__( 'Gallery Format', 'businext' ),
									),
									array(
										'id'    => 'post_video',
										'type'  => 'textarea',
										'title' => esc_html__( 'Video Format', 'businext' ),
									),
									array(
										'id'    => 'post_audio',
										'type'  => 'textarea',
										'title' => esc_html__( 'Audio Format', 'businext' ),
									),
									array(
										'id'    => 'post_quote_text',
										'type'  => 'text',
										'title' => esc_html__( 'Quote Format - Source Text', 'businext' ),
									),
									array(
										'id'    => 'post_quote_name',
										'type'  => 'text',
										'title' => esc_html__( 'Quote Format - Source Name', 'businext' ),
									),
									array(
										'id'    => 'post_quote_url',
										'type'  => 'text',
										'title' => esc_html__( 'Quote Format - Source Url', 'businext' ),
									),
									array(
										'id'    => 'post_link',
										'type'  => 'text',
										'title' => esc_html__( 'Link Format', 'businext' ),
									),
								),
							),
						), $general_options ),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_product_options',
				'title'      => esc_html__( 'Page Options', 'businext' ),
				'post_types' => array( 'product' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => $general_options,
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_portfolio_options',
				'title'      => esc_html__( 'Page Options', 'businext' ),
				'post_types' => array( 'portfolio' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array_merge( array(
							array(
								'title'  => esc_attr__( 'Portfolio', 'businext' ),
								'fields' => array(
									array(
										'id'      => 'portfolio_layout_style',
										'type'    => 'select',
										'title'   => esc_attr__( 'Single Portfolio Style', 'businext' ),
										'desc'    => esc_attr__( 'Select style of this single portfolio post page.', 'businext' ),
										'default' => '',
										'options' => array(
											''             => esc_html__( 'Default', 'businext' ),
											'left_details' => esc_html__( 'Left Details', 'businext' ),
											'flat'         => esc_html__( 'Flat', 'businext' ),
											'slider'       => esc_html__( 'Image Slider', 'businext' ),
											'video'        => esc_html__( 'Video', 'businext' ),
											'fullscreen'   => esc_html__( 'Fullscreen', 'businext' ),
										),
									),
									array(
										'id'    => 'portfolio_gallery',
										'type'  => 'gallery',
										'title' => esc_attr__( 'Gallery', 'businext' ),
									),
									array(
										'id'    => 'portfolio_video_url',
										'type'  => 'textarea',
										'title' => esc_html__( 'Video Url', 'businext' ),
									),
									array(
										'id'    => 'portfolio_client',
										'type'  => 'text',
										'title' => esc_html__( 'Client', 'businext' ),
									),
									array(
										'id'    => 'portfolio_date',
										'type'  => 'text',
										'title' => esc_html__( 'Date', 'businext' ),
									),
									array(
										'id'    => 'portfolio_awards',
										'type'  => 'editor',
										'title' => esc_html__( 'Awards', 'businext' ),
									),
									array(
										'id'    => 'portfolio_team',
										'type'  => 'editor',
										'title' => esc_html__( 'Team', 'businext' ),
									),
									array(
										'id'    => 'portfolio_url',
										'type'  => 'text',
										'title' => esc_html__( 'Url', 'businext' ),
									),
								),
							),
						), $general_options ),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_case_study_options',
				'title'      => esc_html__( 'Page Options', 'businext' ),
				'post_types' => array( 'case_study' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => $general_options,
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_service_options',
				'title'      => esc_html__( 'Page Options', 'businext' ),
				'post_types' => array( 'service' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array_merge( array(
							array(
								'title'  => esc_attr__( 'Service', 'businext' ),
								'fields' => array(
									array(
										'id'      => 'service_style',
										'type'    => 'select',
										'title'   => esc_attr__( 'Single Service Style', 'businext' ),
										'desc'    => esc_attr__( 'Select style of this single service post page.', 'businext' ),
										'default' => '',
										'options' => array(
											''   => esc_html__( 'Default', 'businext' ),
											'01' => esc_html__( 'Style 01', 'businext' ),
											'02' => esc_html__( 'Style 02', 'businext' ),
										),
									),
									array(
										'id'      => 'service_cost',
										'type'    => 'text',
										'title'   => esc_html__( 'Cost', 'businext' ),
										'desc'    => esc_html__( 'Enter cost for this service.', 'businext' ),
										'default' => '',
									),
								),
							),
						), $general_options ),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_testimonial_options',
				'title'      => esc_html__( 'Testimonial Options', 'businext' ),
				'post_types' => array( 'testimonial' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array(
							array(
								'title'  => esc_html__( 'Testimonial Details', 'businext' ),
								'fields' => array(
									array(
										'id'      => 'by_line',
										'type'    => 'text',
										'title'   => esc_html__( 'By Line', 'businext' ),
										'desc'    => esc_html__( 'Enter a byline for the customer giving this testimonial (for example: "CEO of Thememove").', 'businext' ),
										'default' => '',
									),
									array(
										'id'      => 'url',
										'type'    => 'text',
										'title'   => esc_html__( 'Url', 'businext' ),
										'desc'    => esc_html__( 'Enter a URL that applies to this customer (for example: http://www.thememove.com/).', 'businext' ),
										'default' => '',
									),
									array(
										'id'      => 'rating',
										'type'    => 'select',
										'title'   => esc_attr__( 'Rating', 'businext' ),
										'default' => '',
										'options' => array(
											''  => esc_html__( 'Select a rating', 'businext' ),
											'1' => esc_html__( '1 Star', 'businext' ),
											'2' => esc_html__( '2 Stars', 'businext' ),
											'3' => esc_html__( '3 Stars', 'businext' ),
											'4' => esc_html__( '4 Stars', 'businext' ),
											'5' => esc_html__( '5 Stars', 'businext' ),
										),
									),
								),
							),
						),
					),
				),
			);

			$meta_boxes[] = array(
				'id'         => 'insight_footer_options',
				'title'      => esc_html__( 'Footer Options', 'businext' ),
				'post_types' => array( 'ic_footer' ),
				'context'    => 'normal',
				'priority'   => 'high',
				'fields'     => array(
					array(
						'type'  => 'tabpanel',
						'items' => array(
							array(
								'title'  => esc_html__( 'Effect', 'businext' ),
								'fields' => array(
									array(
										'id'      => 'effect',
										'type'    => 'switch',
										'title'   => esc_attr__( 'Footer Effect', 'businext' ),
										'default' => '',
										'options' => array(
											''         => esc_html__( 'Normal', 'businext' ),
											'parallax' => esc_html__( 'Parallax', 'businext' ),
										),
									),
								),
							),
							array(
								'title'  => esc_html__( 'Styling', 'businext' ),
								'fields' => array(
									array(
										'id'      => 'style',
										'type'    => 'select',
										'title'   => esc_attr__( 'Footer Style', 'businext' ),
										'default' => '01',
										'options' => array(
											'01' => esc_html__( 'Style 01', 'businext' ),
											'02' => esc_html__( 'Style 02', 'businext' ),
											'03' => esc_html__( 'Style 03', 'businext' ),
											'04' => esc_html__( 'Style 04', 'businext' ),
											'05' => esc_html__( 'Style 05', 'businext' ),
										),
									),
								),
							),
						),
					),
				),
			);

			return $meta_boxes;
		}

	}

	new Businext_Metabox();
}
