<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom functions, filters, actions for WooCommerce.
 */
if ( ! class_exists( 'Businext_Woo' ) ) {
	class Businext_Woo {

		protected static $instance = null;

		public function __construct() {
			// Disable Woocommerce cart fragments on home page.
			add_action( 'wp_enqueue_scripts', array( $this, 'dequeue_woocommerce_cart_fragments' ), 11 );

			add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'header_add_to_cart_fragment' ) );

			add_filter( 'woocommerce_checkout_fields', array( $this, 'override_checkout_fields' ) );

			add_action( 'wp_head', array( $this, 'init' ) );

			add_action( 'after_switch_theme', array( $this, 'change_woocommerce_image_dimensions' ), 1 );

			/* Begin hook for shop archive */
			add_filter( 'insight_sw_loop_action', array( $this, 'change_swatches_position' ) );
			add_filter( 'loop_shop_per_page', array( $this, 'loop_shop_per_page' ), 20 );

			add_filter( 'woocommerce_pagination_args', array( $this, 'override_pagination_args' ) );

			// Add link to the product title
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			add_action( 'woocommerce_shop_loop_item_title', array(
				$this,
				'template_loop_product_title',
			), 10 );

			/* End hook for shop archive */

			/*
			 * Begin hooks for single product
			 */

			// Remove tab heading in on single product pages.
			add_filter( 'woocommerce_product_description_heading', array(
				$this,
				'remove_product_description_heading',
			) );
			add_filter( 'woocommerce_product_additional_information_heading', array(
				$this,
				'remove_product_additional_information_heading',
			) );

			add_filter( 'woocommerce_review_gravatar_size', array( $this, 'woocommerce_review_gravatar_size' ) );


			add_filter( 'woosw_button_position_archive', function () {
				return '0';
			} );
			add_filter( 'woosw_button_position_single', function () {
				return '0';
			} );

			// Hide default smart compare button
			add_filter( 'filter_wooscp_button_archive', function () {
				return '0';
			} );
			add_filter( 'filter_wooscp_button_single', function () {
				return '0';
			} );

			/*
			 * End hooks for single product
			 */

			// Notice Cookie Confirm.
			add_action( 'wp_ajax_notice_cookie_confirm', array( $this, 'notice_cookie_confirm' ) );
			add_action( 'wp_ajax_nopriv_notice_cookie_confirm', array( $this, 'notice_cookie_confirm' ) );

			// Shortcode Product Infinity.
			add_action( 'wp_ajax_product_infinite_load', array( $this, 'product_infinite_load' ) );
			add_action( 'wp_ajax_nopriv_product_infinite_load', array( $this, 'product_infinite_load' ) );
		}

		public static function instance() {
			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function change_swatches_position() {
			return 'insight_swatches';
		}

		/**
		 * Custom product title instead of default product title
		 *
		 * @see woocommerce_template_loop_product_title()
		 */
		public function template_loop_product_title() {
			?>
			<h2 class="woocommerce-loop-product__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
			<?php
		}

		function loop_shop_per_page( $cols ) {
			if ( isset( $_GET['shop_archive_number_item'] ) && $_GET['shop_archive_number_item'] !== '' ) {
				$number = $_GET['shop_archive_number_item'];
			} else {
				$number = Businext::setting( 'shop_archive_number_item' );
			}

			return isset( $_GET['product_per_page'] ) ? wc_clean( $_GET['product_per_page'] ) : $number;
		}

		function change_woocommerce_image_dimensions() {
			global $pagenow;

			if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
				return;
			}

			$catalog = array(
				'width'  => '270',
				'height' => '350',
				'crop'   => 0,
			);

			$single = array(
				'width'  => '570',
				'height' => '9999',
				'crop'   => 0,
			);

			$thumbnail = array(
				'width'  => '150',
				'height' => '150',
				'crop'   => 1,
			);

			update_option( 'shop_catalog_image_size', $catalog );
			update_option( 'shop_single_image_size', $single );
			update_option( 'shop_thumbnail_image_size', $thumbnail );
		}

		function override_pagination_args( $args ) {
			$args['prev_text'] = sprintf( '<i class="ion-arrow-left-c"></i> %s', esc_html__( 'Prev', 'businext' ) );
			$args['next_text'] = sprintf( '%s <i class="ion-arrow-right-c"></i>', esc_html__( 'Next', 'businext' ) );

			return $args;
		}

		public function remove_product_description_heading() {
			return '';
		}

		public function remove_product_additional_information_heading() {
			return '';
		}

		public function woocommerce_review_gravatar_size() {
			return 70;
		}

		public function init() {
			if ( Businext::setting( 'single_product_up_sells_enable' ) === '0' ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
			}

			if ( Businext::setting( 'single_product_related_enable' ) === '0' ) {
				add_filter( 'woocommerce_related_products_args', array( $this, 'wc_remove_related_products' ), 10 );
			}

			// Remove Cross Sells from default position at Cart. Then add them back UNDER the Cart Table.
			remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			if ( Businext::setting( 'shopping_cart_cross_sells_enable' ) === '1' ) {
				add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );
			}
		}

		/**
		 * wc_remove_related_products
		 *
		 * Clear the query arguments for related products so none show.
		 */
		function wc_remove_related_products( $args ) {
			return array();
		}

		public function override_checkout_fields( $fields ) {
			$fields['billing']['billing_first_name']['placeholder'] = esc_html__( 'First Name *', 'businext' );
			$fields['billing']['billing_last_name']['placeholder']  = esc_html__( 'Last Name *', 'businext' );
			$fields['billing']['billing_company']['placeholder']    = esc_html__( 'Company Name', 'businext' );
			$fields['billing']['billing_email']['placeholder']      = esc_html__( 'Email Address *', 'businext' );
			$fields['billing']['billing_phone']['placeholder']      = esc_html__( 'Phone *', 'businext' );
			$fields['billing']['billing_address_1']['placeholder']  = esc_html__( 'Address *', 'businext' );
			$fields['billing']['billing_address_2']['placeholder']  = esc_html__( 'Address', 'businext' );
			$fields['billing']['billing_city']['placeholder']       = esc_html__( 'Town / City *', 'businext' );
			$fields['billing']['billing_postcode']['placeholder']   = esc_html__( 'Zip *', 'businext' );

			$fields['shipping']['shipping_first_name']['placeholder'] = esc_html__( 'First Name *', 'businext' );
			$fields['shipping']['shipping_last_name']['placeholder']  = esc_html__( 'Last Name *', 'businext' );
			$fields['shipping']['shipping_company']['placeholder']    = esc_html__( 'Company Name', 'businext' );
			$fields['shipping']['shipping_city']['placeholder']       = esc_html__( 'Town / City *', 'businext' );
			$fields['shipping']['shipping_postcode']['placeholder']   = esc_html__( 'Zip *', 'businext' );

			return $fields;
		}

		public function dequeue_woocommerce_cart_fragments() {
			if ( is_front_page() && Businext_Helper::active_woocommerce() && add_theme_support( 'woo_speed' ) ) {
				wp_dequeue_script( 'wc-cart-fragments' );
			}
		}

		/**
		 * Ensure cart contents update when products are added to the cart via AJAX
		 * ========================================================================
		 *
		 * @param $fragments
		 *
		 * @return mixed
		 */
		function header_add_to_cart_fragment( $fragments ) {
			ob_start();
			$cart_html = self::get_minicart();
			echo '' . $cart_html;
			$fragments['.mini-cart__button'] = ob_get_clean();

			return $fragments;
		}

		/**
		 * Get mini cart HTML
		 * ==================
		 *
		 * @return string
		 */
		static function get_minicart() {
			$cart_html = '';
			$qty       = WC()->cart->get_cart_contents_count();
			$cart_html .= '<div class="mini-cart__button" title="' . esc_attr__( 'View your shopping cart', 'businext' ) . '">';
			$cart_html .= '<span class="mini-cart-icon" data-count="' . $qty . '"></span>';
			$cart_html .= '</div>';

			return $cart_html;
		}

		static function render_mini_cart() {
			$header_type = Businext_Global::instance()->get_header_type();

			$enabled = Businext::setting( "header_style_{$header_type}_cart_enable" );

			if ( Businext_Helper::active_woocommerce() && in_array( $enabled, array( '1', 'hide_on_empty' ) ) ) {
				global $woocommerce;
				$cart_url = '/cart';
				if ( isset( $woocommerce ) ) {
					$cart_url = wc_get_cart_url();
				}
				$classes = 'mini-cart';
				if ( $enabled === 'hide_on_empty' ) {
					$classes .= ' hide-on-empty';
				}
				?>
				<div id="mini-cart" class="<?php echo esc_attr( $classes ); ?>"
				     data-url="<?php echo esc_url( $cart_url ); ?>">
					<?php echo self::get_minicart(); ?>
					<div class="widget_shopping_cart_content"></div>
				</div>
			<?php }
		}

		static function get_percentage_price() {
			global $product;

			if ( $product->is_type( 'simple' ) || $product->is_type( 'external' ) ) {
				$_regular_price = $product->get_regular_price();
				$_sale_price    = $product->get_sale_price();

				$percentage = round( ( ( $_regular_price - $_sale_price ) / $_regular_price ) * 100 );

				return "-{$percentage}%";
			} else {
				return esc_html__( 'Sale', 'businext' );
			}
		}

		static function get_wishlist_button_template( $args = array() ) {
			if ( ( Businext::setting( 'shop_archive_wishlist' ) !== '1' ) || ! class_exists( 'WPcleverWoosw' ) ) {
				return;
			}

			global $product;
			$product_id = $product->get_id();

			$defaults = array(
				'show_tooltip'     => true,
				'tooltip_position' => 'left',
			);
			$args     = wp_parse_args( $args, $defaults );

			$_wrapper_classes = 'product-action wishlist-btn';

			if ( $args['show_tooltip'] === true ) {
				$_wrapper_classes .= ' hint--rounded hint--bounce';
				$_wrapper_classes .= " hint--{$args['tooltip_position']}";
			}
			?>
			<div class="<?php echo esc_attr( $_wrapper_classes ); ?>"
			     aria-label="<?php echo esc_attr__( 'Add to wishlist', 'businext' ) ?>">
				<?php echo do_shortcode( '[woosw id="' . $product_id . '" type="link"]' ); ?>
			</div>
			<?php
		}

		static function get_compare_button_template( $args = array() ) {
			if ( Businext::setting( 'shop_archive_compare' ) !== '1' || wp_is_mobile() || ! class_exists( 'WPcleverWooscp' ) ) {
				return;
			}

			global $product;
			$product_id = $product->get_id();

			$defaults = array(
				'show_tooltip'     => true,
				'tooltip_position' => 'left',
			);
			$args     = wp_parse_args( $args, $defaults );

			$_wrapper_classes = 'product-action compare-btn';

			if ( $args['show_tooltip'] === true ) {
				$_wrapper_classes .= ' hint--rounded hint--bounce';
				$_wrapper_classes .= " hint--{$args['tooltip_position']}";
			}
			?>
			<div class="<?php echo esc_attr( $_wrapper_classes ); ?>"
			     aria-label="<?php echo esc_attr__( 'Compare', 'businext' ) ?>">
				<?php echo do_shortcode( '[wooscp id="' . $product_id . '" type="link"]' ); ?>
			</div>
			<?php
		}

		public function product_infinite_load() {
			$args = array(
				'post_type'      => $_POST['post_type'],
				'posts_per_page' => $_POST['posts_per_page'],
				'orderby'        => $_POST['orderby'],
				'order'          => $_POST['order'],
				'paged'          => $_POST['paged'],
				'post_status'    => 'publish',
			);

			if ( ! empty( $_POST['taxonomies'] ) ) {
				$args = Businext_VC::get_tax_query_of_taxonomies( $args, $_POST['taxonomies'] );
			}

			if ( in_array( $args['orderby'], array( 'meta_value', 'meta_value_num' ) ) ) {
				$args['meta_key'] = $_POST['meta_key'];
			}

			if ( isset( $_POST['minPrice'] ) && isset( $_POST['maxPrice'] ) ) {
				$args['meta_query'] = array(
					array(
						'key'     => '_price',
						'value'   => array( $_POST['minPrice'], $_POST['maxPrice'] ),
						'compare' => 'BETWEEN',
						'type'    => 'NUMERIC',
					),
				);
			}

			$style = 'grid';
			if ( isset( $_POST['style'] ) ) {
				$style = $_POST['style'];
			}

			$businext_query = new WP_Query( $args );

			$response = array(
				'max_num_pages' => $businext_query->max_num_pages,
				'found_posts'   => $businext_query->found_posts,
				'count'         => $businext_query->post_count,
			);

			ob_start();

			if ( $businext_query->have_posts() ) :
				if ( $style === 'grid-simple' ) {
					/**
					 * Trim zeros in price decimals
					 **/
					add_filter( 'woocommerce_price_trim_zeros', '__return_true' );

					//Change tooltip position of current style.
					add_filter( 'woocommerce_add_to_cart_tooltip_position', function ( $position ) {
						return 'none';
					} );
					while ( $businext_query->have_posts() ) : $businext_query->the_post();
						wc_get_template_part( 'content', 'product-grid-simple' ); endwhile;
				} else {
					while ( $businext_query->have_posts() ) : $businext_query->the_post();
						wc_get_template_part( 'content', 'product' ); endwhile;
				}
			endif;
			wp_reset_postdata();

			$template = ob_get_contents();
			ob_clean();

			$response['template'] = $template;

			echo json_encode( $response );

			wp_die();
		}

		public function notice_cookie_confirm() {
			setcookie( 'notice_cookie_confirm', 'yes', time() + 365 * 86400, COOKIEPATH, COOKIE_DOMAIN );

			wp_die();
		}
	}

	new Businext_Woo();
}
