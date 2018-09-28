<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Businext_Widgets' ) ) {
	class Businext_Widgets {

		public function __construct() {
			$this->require_widgets();
			// Register widget areas.
			add_action( 'widgets_init', array(
				$this,
				'register_sidebars',
			) );

			add_action( 'widgets_init', array(
				$this,
				'register_widgets',
			) );


			add_filter( 'widget_title', array( $this, 'repair_categories_empty_title' ), 10, 3 );
		}

		public function repair_categories_empty_title( $title, $instance, $base ) {
			if ( $base == 'categories' ) {
				if ( trim( $instance['title'] ) == '' ) {
					return '';
				}
			}

			return $title;
		}

		/**
		 * Register widget area.
		 *
		 * @access public
		 * @link   https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		public function register_sidebars() {

			$defaults = array(
				'before_widget' => '<div id="%1$s" class="widget tm-animation move-up %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			);

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'blog_sidebar',
				'name'        => esc_html__( 'Blog Sidebar', 'businext' ),
				'description' => esc_html__( 'Add widgets here.', 'businext' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'page_sidebar',
				'name'        => esc_html__( 'Page Sidebar', 'businext' ),
				'description' => esc_html__( 'Add widgets here.', 'businext' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'shop_sidebar',
				'name'        => esc_html__( 'Shop Sidebar', 'businext' ),
				'description' => esc_html__( 'Add widgets here.', 'businext' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'service_sidebar',
				'name'        => esc_html__( 'Service Sidebar 01', 'businext' ),
				'description' => esc_html__( 'Add widgets here.', 'businext' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'service_sidebar_02',
				'name'        => esc_html__( 'Service Sidebar 02', 'businext' ),
				'description' => esc_html__( 'Add widgets here.', 'businext' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'service_sidebar_03',
				'name'        => esc_html__( 'Service Sidebar 03', 'businext' ),
				'description' => esc_html__( 'Add widgets here.', 'businext' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'case_study_sidebar',
				'name'        => esc_html__( 'Case Study Sidebar', 'businext' ),
				'description' => esc_html__( 'Add widgets here.', 'businext' ),
			) ) );

			register_sidebar( array_merge( $defaults, array(
				'id'          => 'special_sidebar',
				'name'        => esc_html__( 'Special Sidebar', 'businext' ),
				'description' => esc_html__( 'Special sidebar will be display right after first sidebar.', 'businext' ),
			) ) );
		}

		public function require_widgets() {
			$files = array(
				BUSINEXT_WIDGETS_DIR . '/facebook-page.php',
				BUSINEXT_WIDGETS_DIR . '/posts.php',
			);

			Businext::require_files( $files );
		}

		public function register_widgets() {
			register_widget( 'TM_Posts_Widget' );
			register_widget( 'TM_Facebook_Page_Widget' );
		}

	}

	new Businext_Widgets();
}
