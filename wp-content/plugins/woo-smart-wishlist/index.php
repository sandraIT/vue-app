<?php
/*
Plugin Name: WooCommerce Smart Wishlist
Plugin URI: https://wpclever.net/
Description: WooCommerce Smart Wishlist is a simple but powerful tool that can help your customer save products for buy later.
Version: 1.2.5
Author: WPclever.net
Author URI: https://wpclever.net
Text Domain: woosw
Domain Path: /languages/
Requires at least: 4.0
Tested up to: 4.9.8
WC requires at least: 3.0
WC tested up to: 3.4.5
*/

defined( 'ABSPATH' ) || exit;

! defined( 'WOOSW_VERSION' ) && define( 'WOOSW_VERSION', '1.2.5' );
! defined( 'WOOSW_URI' ) && define( 'WOOSW_URI', plugin_dir_url( __FILE__ ) );
! defined( 'WOOSW_REVIEWS' ) && define( 'WOOSW_REVIEWS', 'https://wordpress.org/support/plugin/woo-smart-wishlist/reviews/?filter=5' );
! defined( 'WOOSW_CHANGELOGS' ) && define( 'WOOSW_CHANGELOGS', 'https://wordpress.org/plugins/woo-smart-wishlist/#developers' );
! defined( 'WOOSW_DISCUSSION' ) && define( 'WOOSW_DISCUSSION', 'https://wordpress.org/support/plugin/woo-smart-wishlist' );
! defined( 'WPC_URI' ) && define( 'WPC_URI', WOOSW_URI );

include( 'includes/wpc-menu.php' );
include( 'includes/wpc-dashboard.php' );

if ( ! function_exists( 'woosw_init' ) ) {
	add_action( 'plugins_loaded', 'woosw_init', 11 );

	function woosw_init() {
		// load text-domain
		load_plugin_textdomain( 'woosw', false, basename( dirname( __FILE__ ) ) . '/languages/' );

		if ( ! function_exists( 'WC' ) || ! version_compare( WC()->version, '3.0.0', '>=' ) ) {
			add_action( 'admin_notices', 'woosw_notice_wc' );

			return;
		}

		if ( ! class_exists( 'WPcleverWoosw' ) ) {
			class WPcleverWoosw {
				protected static $woosw_added = array();
				protected static $woosw_summary_default = array();

				function __construct() {
					// add query var
					add_filter( 'query_vars', array( $this, 'query_vars' ), 1 );

					add_action( 'init', array( $this, 'init' ) );

					// menu
					add_action( 'admin_menu', array( $this, 'admin_menu' ) );

					// frontend scripts
					add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );

					// backend scripts
					add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

					// add
					add_action( 'wp_ajax_wishlist_add', array( $this, 'wishlist_add' ) );
					add_action( 'wp_ajax_nopriv_wishlist_add', array( $this, 'wishlist_add' ) );

					// remove
					add_action( 'wp_ajax_wishlist_remove', array( $this, 'wishlist_remove' ) );
					add_action( 'wp_ajax_nopriv_wishlist_remove', array( $this, 'wishlist_remove' ) );

					// link
					add_filter( 'plugin_action_links', array( $this, 'action_links' ), 10, 2 );
					add_filter( 'plugin_row_meta', array( $this, 'row_meta' ), 10, 2 );

					// footer
					add_action( 'wp_footer', array( $this, 'wp_footer' ) );
				}

				function query_vars( $vars ) {
					array_push( $vars, 'woosw_id' );

					return $vars;
				}

				function init() {
					// add page
					$wishlist_page = get_page_by_path( 'wishlist', OBJECT );
					if ( ! isset( $wishlist_page ) ) {
						$wishlist_page_data = array(
							'post_status'    => 'publish',
							'post_type'      => 'page',
							'post_author'    => 1,
							'post_name'      => 'wishlist',
							'post_title'     => esc_html__( 'Wishlist', 'woosw' ),
							'post_content'   => '[woosw_list]',
							'post_parent'    => 0,
							'comment_status' => 'closed'
						);
						$wishlist_page_id   = wp_insert_post( $wishlist_page_data );
						update_option( 'woosw_page_id', $wishlist_page_id );
					}

					// rewrite
					if ( ( $page_id = self::get_page_id() ) ) {
						$page_slug = get_post_field( 'post_name', $page_id );
						if ( $page_slug != '' ) {
							add_rewrite_rule( '^' . $page_slug . '/([\w]+)/?', 'index.php?page_id=' . $page_id . '&woosw_id=$matches[1]', 'top' );
						}
					}

					// shortcode
					add_shortcode( 'woosw', array( $this, 'shortcode' ) );
					add_shortcode( 'woosw_list', array( $this, 'list_shortcode' ) );

					// add button for archive
					$woosw_button_position_archive = apply_filters( 'woosw_button_position_archive', get_option( 'woosw_button_position_archive', 'after_add_to_cart' ) );
					switch ( $woosw_button_position_archive ) {
						case 'after_title':
							add_action( 'woocommerce_shop_loop_item_title', array( $this, 'add_button' ), 11 );
							break;
						case 'after_rating':
							add_action( 'woocommerce_after_shop_loop_item_title', array( $this, 'add_button' ), 6 );
							break;
						case 'after_price':
							add_action( 'woocommerce_after_shop_loop_item_title', array( $this, 'add_button' ), 11 );
							break;
						case 'before_add_to_cart':
							add_action( 'woocommerce_after_shop_loop_item', array( $this, 'add_button' ), 9 );
							break;
						case 'after_add_to_cart':
							add_action( 'woocommerce_after_shop_loop_item', array( $this, 'add_button' ), 11 );
							break;
					}

					// add button for single
					$woosw_button_position_single = apply_filters( 'woosw_button_position_single', get_option( 'woosw_button_position_single', '31' ) );
					if ( $woosw_button_position_single != '0' ) {
						add_action( 'woocommerce_single_product_summary', array(
							$this,
							'add_button'
						), $woosw_button_position_single );
					}

					// added products
					$woosw_key = self::get_key();
					if ( get_option( 'woosw_list_' . $woosw_key ) ) {
						self::$woosw_added = get_option( 'woosw_list_' . $woosw_key );
					}
				}

				function wishlist_add() {
					$return = array( 'status' => 0 );
					if ( ( $product_id = absint( $_POST['product_id'] ) ) > 0 ) {
						$woosw_key = self::get_key();
						if ( $woosw_key == 'unauthenticated' ) {
							$return['notice'] = esc_html__( 'Please log in to use Wishlist!', 'woosw' );
						} else {
							$woosw_products = array();
							if ( get_option( 'woosw_list_' . $woosw_key ) ) {
								$woosw_products = get_option( 'woosw_list_' . $woosw_key );
							}
							if ( ! array_key_exists( $product_id, $woosw_products ) ) {
								// insert if not exists
								$woosw_products = array( $product_id => time() ) + $woosw_products;
								update_option( 'woosw_list_' . $woosw_key, $woosw_products );
								self::update_meta( $product_id, 'add' );
								$return['notice'] = esc_html__( 'Added to Wishlist!', 'woosw' );
							} else {
								$return['notice'] = esc_html__( 'Already in your Wishlist!', 'woosw' );
							}
							$return['status'] = 1;
							$return['count']  = count( $woosw_products );
							$return['value']  = self::get_items( $woosw_key );
						}
					} else {
						$return['notice'] = esc_html__( 'Have an error, please try again!', 'woosw' );
					}
					echo json_encode( $return );
					die();
				}

				function wishlist_remove() {
					$return = array( 'status' => 0 );
					if ( ( $product_id = absint( $_POST['product_id'] ) ) > 0 ) {
						$woosw_key = self::get_key();
						if ( $woosw_key == 'unauthenticated' ) {
							$return['notice'] = esc_html__( 'Please log in to use Wishlist!', 'woosw' );
						} else {
							$woosw_products = array();
							if ( get_option( 'woosw_list_' . $woosw_key ) ) {
								$woosw_products = get_option( 'woosw_list_' . $woosw_key );
							}
							if ( array_key_exists( $product_id, $woosw_products ) ) {
								unset( $woosw_products[ $product_id ] );
								update_option( 'woosw_list_' . $woosw_key, $woosw_products );
								self::update_meta( $product_id, 'remove' );
								$return['count'] = count( $woosw_products );
								if ( count( $woosw_products ) > 0 ) {
									$return['status'] = 1;
									$return['notice'] = esc_html__( 'Removed from Wishlist!', 'woosw' );
								} else {
									$return['notice'] = esc_html__( 'There are no products on your Wishlist!', 'woosw' );
								}
							} else {
								$return['notice'] = esc_html__( 'The product does not exist on your Wishlist!', 'woosw' );
							}
						}
					} else {
						$return['notice'] = esc_html__( 'Have an error, please try again!', 'woosw' );
					}
					echo json_encode( $return );
					die();
				}

				function add_button( $id = null ) {
					if ( ! $id ) {
						global $product;
						$id = $product->get_id();
					}
					if ( $id ) {
						$woosw_class = 'woosw-btn woosw-btn-' . esc_attr( $id );
						$woosw_text  = apply_filters( 'woosw_button_text', get_option( 'woosw_button_text', esc_html__( 'Add to Wishlist', 'woosw' ) ) );
						if ( array_key_exists( $id, self::$woosw_added ) ) {
							$woosw_class .= ' woosw-added';
							$woosw_text  = apply_filters( 'woosw_button_text_added', get_option( 'woosw_button_text_added', esc_html__( 'Browse Wishlist', 'woosw' ) ) );
						}
						if ( get_option( 'woosw_button_class' ) != '' ) {
							$woosw_class .= ' ' . esc_attr( get_option( 'woosw_button_class' ) );
						}
						if ( get_option( 'woosw_button_type', 'button' ) == 'button' ) {
							echo '<button class="' . esc_attr( $woosw_class ) . '" data-id="' . esc_attr( $id ) . '">' . $woosw_text . '</button>';
						} else {
							echo '<a href="#" class="' . esc_attr( $woosw_class ) . '" data-id="' . esc_attr( $id ) . '">' . $woosw_text . '</a>';
						}
					}
				}

				function shortcode( $atts ) {
					$atts = shortcode_atts( array(
						'id'   => null,
						'type' => get_option( '_woosw_button_type', 'button' )
					), $atts, 'woosw' );
					if ( ! $atts['id'] ) {
						global $product;
						$atts['id'] = $product->get_id();
					}
					if ( $atts['id'] ) {
						$woosw_class = 'woosw-btn woosw-btn-' . esc_attr( $atts['id'] );
						$woosw_text  = apply_filters( 'woosw_button_text', get_option( 'woosw_button_text', esc_html__( 'Add to Wishlist', 'woosw' ) ) );
						if ( array_key_exists( $atts['id'], self::$woosw_added ) ) {
							$woosw_class .= ' woosw-added';
							$woosw_text  = apply_filters( 'woosw_button_text_added', get_option( 'woosw_button_text_added', esc_html__( 'Browse Wishlist', 'woosw' ) ) );
						}
						if ( get_option( 'woosw_button_class' ) != '' ) {
							$woosw_class .= ' ' . esc_attr( get_option( 'woosw_button_class' ) );
						}
						if ( $atts['type'] == 'link' ) {
							return '<a href="#" class="' . esc_attr( $woosw_class ) . '" data-id="' . esc_attr( $atts['id'] ) . '">' . $woosw_text . '</a>';
						} else {
							return '<button class="' . esc_attr( $woosw_class ) . '" data-id="' . esc_attr( $atts['id'] ) . '">' . $woosw_text . '</button>';
						}
					}
				}

				function list_shortcode() {
					if ( get_query_var( 'woosw_id' ) ) {
						$key = get_query_var( 'woosw_id' );
					} else {
						$key = self::get_key();
					}
					$share_url   = urlencode( self::get_url( $key ) );
					$return_html = '<div class="woosw-list">';
					$return_html .= self::get_items( $key );
					if ( get_option( 'woosw_page_share', 'yes' ) == 'yes' ) {
						$return_html .= '<div class="woosw-share"><span class="woosw-share-label">' . esc_html__( 'Share on:', 'woosw' ) . '</span>';
						$return_html .= '<a class="woosw-share-facebook" href="https://www.facebook.com/sharer.php?u=' . $share_url . '" target="_blank">' . esc_html__( 'Facebook', 'woosw' ) . '</a>';
						$return_html .= '<a class="woosw-share-twitter" href="https://twitter.com/share?url=' . $share_url . '" target="_blank">' . esc_html__( 'Twitter', 'woosw' ) . '</a>';
						$return_html .= '<a class="woosw-share-pinterest" href="https://pinterest.com/pin/create/button/?url=' . $share_url . '" target="_blank">' . esc_html__( 'Pinterest', 'woosw' ) . '</a>';
						$return_html .= '<a class="woosw-share-google-plus" href="https://plus.google.com/share?url=' . $share_url . '" target="_blank">' . esc_html__( 'Google Plus', 'woosw' ) . '</a>';
						$return_html .= '<a class="woosw-share-mail" href="mailto:?body=' . $share_url . '" target="_blank">' . esc_html__( 'Mail', 'woosw' ) . '</a>';
						$return_html .= '</div>';
					}
					$return_html .= '</div>';

					return $return_html;
				}

				function admin_menu() {
					add_submenu_page( 'wpclever', esc_html__( 'Woo Wishlist', 'woosw' ), esc_html__( 'Woo Wishlist', 'woosw' ), 'manage_options', 'wpclever-woosw', array(
						&$this,
						'admin_menu_content'
					) );
				}

				function admin_menu_content() {
					$page_slug  = 'wpclever-woosw';
					$active_tab = isset( $_GET['tab'] ) ? esc_attr( $_GET['tab'] ) : 'settings';
					?>
                    <div class="wpclever_settings_page wrap">
                        <h1 class="wpclever_settings_page_title"><?php echo esc_html__( 'WooCommerce Smart Wishlist' ) . ' ' . WOOSW_VERSION; ?></h1>
                        <div class="wpclever_settings_page_desc about-text">
                            <p>
								<?php printf( esc_html__( 'Thank you for using our plugin! If you are satisfied, please reward it a full five-star %s rating.', 'woosw' ), '<span style="color:#ffb900">&#9733;&#9733;&#9733;&#9733;&#9733;</span>' ); ?>
                                <br/>
                                <a href="<?php echo esc_url( WOOSW_REVIEWS ); ?>"
                                   target="_blank"><?php esc_html_e( 'Reviews', 'woosw' ); ?></a> | <a
                                        href="<?php echo esc_url( WOOSW_CHANGELOGS ); ?>"
                                        target="_blank"><?php esc_html_e( 'Changelogs', 'woosw' ); ?></a>
                                | <a href="<?php echo esc_url( WOOSW_DISCUSSION ); ?>"
                                     target="_blank"><?php esc_html_e( 'Discussion', 'woosw' ); ?></a>
                            </p>
                        </div>
                        <div class="wpclever_settings_page_nav">
                            <h2 class="nav-tab-wrapper">
                                <a href="?page=<?php echo $page_slug; ?>&amp;tab=settings"
                                   class="nav-tab <?php echo $active_tab == 'settings' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Settings', 'woosw' ); ?></a>
                                <a href="?page=<?php echo $page_slug; ?>&amp;tab=premium"
                                   class="nav-tab <?php echo $active_tab == 'premium' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Premium Version', 'woosw' ); ?></a>
                            </h2>
                        </div>
                        <div class="wpclever_settings_page_content">
							<?php if ( $active_tab == 'settings' ) { ?>
                                <form method="post" action="options.php">
									<?php wp_nonce_field( 'update-options' ) ?>
                                    <table class="form-table">
                                        <tr class="heading">
                                            <th colspan="2">
												<?php esc_html_e( 'General', 'wooscp' ); ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Disable the wishlist for unauthenticated users', 'woosw' ); ?></th>
                                            <td>
                                                <select name="woosw_disable_unauthenticated">
                                                    <option
                                                            value="yes" <?php echo( get_option( 'woosw_disable_unauthenticated', 'no' ) == 'yes' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Yes', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="no" <?php echo( get_option( 'woosw_disable_unauthenticated', 'no' ) == 'no' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'No', 'woosw' ); ?>
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <th>
												<?php esc_html_e( 'Page', 'wooscp' ); ?>
                                            </th>
                                            <td>
												<?php esc_html_e( 'Settings for Wishlist page.', 'wooscp' ); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Wishlist page', 'woosw' ); ?></th>
                                            <td>
												<?php wp_dropdown_pages( array(
													'selected'          => get_option( 'woosw_page_id', '' ),
													'name'              => 'woosw_page_id',
													'show_option_none'  => esc_html__( 'Choose a page', 'woosw' ),
													'option_none_value' => '',
												) ); ?>
                                                <span class="description">
											<?php printf( esc_html__( 'Add shortcode %s to display the wishlist on a page.', 'woosw' ), '<code>[woosw_list]</code>' ); ?>
										</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Share buttons', 'woosw' ); ?></th>
                                            <td>
                                                <select name="woosw_page_share">
                                                    <option
                                                            value="yes" <?php echo( get_option( 'woosw_page_share', 'yes' ) == 'yes' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Yes', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="no" <?php echo( get_option( 'woosw_page_share', 'yes' ) == 'no' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'No', 'woosw' ); ?>
                                                    </option>
                                                </select>
                                                <span class="description">
											<?php esc_html_e( 'Enable share buttons on the wishlist page?', 'woosw' ); ?>
										</span>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <th>
												<?php esc_html_e( 'Button', 'wooscp' ); ?>
                                            </th>
                                            <td>
												<?php esc_html_e( 'Settings for "Add to Wishlist" button.', 'wooscp' ); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Type', 'woosw' ); ?></th>
                                            <td>
                                                <select name="woosw_button_type">
                                                    <option
                                                            value="button" <?php echo( get_option( 'woosw_button_type', 'button' ) == 'button' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Button', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="link" <?php echo( get_option( 'woosw_button_type', 'button' ) == 'link' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Link', 'woosw' ); ?>
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Text', 'woosw' ); ?></th>
                                            <td>
                                                <input type="text" name="woosw_button_text"
                                                       value="<?php echo get_option( 'woosw_button_text', esc_html__( 'Add to Wishlist', 'woosw' ) ); ?>"
                                                       placeholder="<?php esc_html_e( 'button text', 'woosw' ); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Text (added)', 'woosw' ); ?></th>
                                            <td>
                                                <input type="text" name="woosw_button_text_added"
                                                       value="<?php echo get_option( 'woosw_button_text_added', esc_html__( 'Browse Wishlist', 'woosw' ) ); ?>"
                                                       placeholder="<?php esc_html_e( 'button text (added)', 'woosw' ); ?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Extra class (optional)', 'woosw' ); ?></th>
                                            <td>
                                                <input type="text" name="woosw_button_class"
                                                       value="<?php echo get_option( 'woosw_button_class', '' ); ?>"/>
                                                <span class="description">
											<?php esc_html_e( 'Add extra class for action button/link, split by one space.', 'woosw' ); ?>
										</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Position on archive page', 'woosw' ); ?></th>
                                            <td>
                                                <select name="woosw_button_position_archive">
                                                    <option
                                                            value="after_title" <?php echo( get_option( 'woosw_button_position_archive', 'after_add_to_cart' ) == 'after_title' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After title', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="after_rating" <?php echo( get_option( 'woosw_button_position_archive', 'after_add_to_cart' ) == 'after_rating' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After rating', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="after_price" <?php echo( get_option( 'woosw_button_position_archive', 'after_add_to_cart' ) == 'after_price' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After price', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="before_add_to_cart" <?php echo( get_option( 'woosw_button_position_archive', 'after_add_to_cart' ) == 'before_add_to_cart' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Before add to cart', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="after_add_to_cart" <?php echo( get_option( 'woosw_button_position_archive', 'after_add_to_cart' ) == 'after_add_to_cart' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After add to cart', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="0" <?php echo( get_option( 'woosw_button_position_archive', 'after_add_to_cart' ) == '0' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'None', 'woosw' ); ?>
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Position on single page', 'woosw' ); ?></th>
                                            <td>
                                                <select name="woosw_button_position_single">
                                                    <option
                                                            value="6" <?php echo( get_option( 'woosw_button_position_single', '31' ) == '6' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After title', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="11" <?php echo( get_option( 'woosw_button_position_single', '31' ) == '11' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After price & rating', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="21" <?php echo( get_option( 'woosw_button_position_single', '31' ) == '21' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After excerpt', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="29" <?php echo( get_option( 'woosw_button_position_single', '31' ) == '29' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Before add to cart', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="31" <?php echo( get_option( 'woosw_button_position_single', '31' ) == '31' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After add to cart', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="41" <?php echo( get_option( 'woosw_button_position_single', '31' ) == '41' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After meta', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="51" <?php echo( get_option( 'woosw_button_position_single', '31' ) == '51' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'After sharing', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="0" <?php echo( get_option( 'woosw_button_position_single', '31' ) == '0' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'None', 'woosw' ); ?>
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Shortcode', 'woosw' ); ?></th>
                                            <td>
										<span class="description">
											<?php printf( esc_html__( 'You can add the button by manually, please use the shortcode %s, eg. %s for the product with ID is 99.', 'woosw' ), '<code>[woosw id="{product id}"]</code>', '<code>[woosw id="99"]</code>' ); ?>
										</span>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <th>
												<?php esc_html_e( 'Popup', 'wooscp' ); ?>
                                            </th>
                                            <td>
												<?php esc_html_e( 'Settings for the Wishlist popup.', 'wooscp' ); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Color', 'woosw' ); ?></th>
                                            <td>
												<?php $woosw_color_default = apply_filters( 'woosw_color_default', '#5fbd74' ); ?>
                                                <input type="text" name="woosw_color"
                                                       value="<?php echo get_option( 'woosw_color', $woosw_color_default ); ?>"
                                                       class="woosw_color_picker"/>
                                                <span class="description">
											<?php printf( esc_html__( 'Choose the color, default %s', 'woosw' ), '<code>' . $woosw_color_default . '</code>' ); ?>
										</span>
                                            </td>
                                        </tr>
                                        <tr class="heading">
                                            <th>
												<?php esc_html_e( 'Menu', 'wooscp' ); ?>
                                            </th>
                                            <td>
										<span style="color: red">
											This feature just available for Premium Version. Click <a
                                                    href="https://wpclever.net/downloads/woocommerce-smart-wishlist"
                                                    target="_blank">here</a> to buy, just $19.
										</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Menu(s)', 'woosw' ); ?></th>
                                            <td>
												<?php
												$nav_args  = array(
													'hide_empty' => false,
													'fields'     => 'id=>name',
												);
												$nav_menus = get_terms( 'nav_menu', $nav_args );

												$saved_menus = get_option( 'woosw_menus', array() );
												foreach ( $nav_menus as $nav_id => $nav_name ) {
													echo '<input type="checkbox" name="woosw_menus[]" value="' . $nav_id . '" ' . ( is_array( $saved_menus ) && in_array( $nav_id, $saved_menus ) ? 'checked' : '' ) . '/><label>' . $nav_name . '</label><br/>';
												}
												?>
                                                <span class="description">
											<?php esc_html_e( 'Choose the menu(s) you want to add the "wishlist menu" at the end.', 'woosw' ); ?>
										</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><?php esc_html_e( 'Action', 'woosw' ); ?></th>
                                            <td>
                                                <select name="woosw_menu_action">
                                                    <option
                                                            value="open_page" <?php echo( get_option( 'woosw_menu_action', 'open_page' ) == 'open_page' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Open page', 'woosw' ); ?>
                                                    </option>
                                                    <option
                                                            value="open_popup" <?php echo( get_option( 'woosw_menu_action', 'open_page' ) == 'open_popup' ? 'selected' : '' ); ?>>
														<?php esc_html_e( 'Open popup', 'woosw' ); ?>
                                                    </option>
                                                </select> <span class="description">
											<?php esc_html_e( 'Action when clicking on the "wishlist menu".', 'woosw' ); ?>
										</span>
                                            </td>
                                        </tr>
                                        <tr class="submit">
                                            <th colspan="2">
                                                <input type="submit" name="submit" class="button button-primary"
                                                       value="<?php esc_html_e( 'Update Options', 'woosw' ); ?>"/>
                                                <input type="hidden" name="action" value="update"/>
                                                <input type="hidden" name="page_options"
                                                       value="woosw_disable_unauthenticated,woosw_page_id,woosw_page_share,woosw_button_type,woosw_button_text,woosw_button_text_added,woosw_button_class,woosw_button_position_archive,woosw_button_position_single,woosw_color,woosw_menus,woosw_menu_action"/>
                                            </th>
                                        </tr>
                                    </table>
                                </form>
							<?php } elseif ( $active_tab == 'premium' ) { ?>
                                <div class="wpclever_settings_page_content_text">
                                    <p>Get the Premium Version just $19! <a
                                                href="https://wpclever.net/downloads/woocommerce-smart-wishlist"
                                                target="_blank">https://wpclever.net/downloads/woocommerce-smart-wishlist</a>
                                    </p>
                                    <p><strong>Extra features for Premium Version</strong></p>
                                    <ul style="margin-bottom: 0">
                                        <li>- Enable the wishlist menu</li>
                                        <li>- Get lifetime update & premium support</li>
                                    </ul>
                                </div>
							<?php } ?>
                        </div>
                    </div>
					<?php
				}

				function wp_enqueue_scripts() {
					// perfect srollbar
					wp_enqueue_style( 'perfect-scrollbar', WOOSW_URI . 'assets/libs/perfect-scrollbar/css/perfect-scrollbar.min.css' );
					wp_enqueue_style( 'perfect-scrollbar-wpc', WOOSW_URI . 'assets/libs/perfect-scrollbar/css/custom-theme.css' );
					wp_enqueue_script( 'perfect-scrollbar', WOOSW_URI . 'assets/libs/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js', array( 'jquery' ), WOOSW_VERSION, true );

					// feather icons
					wp_enqueue_style( 'feather', WOOSW_URI . 'assets/libs/feather/feather.css' );

					// main style
					wp_enqueue_style( 'woosw-frontend', WOOSW_URI . 'assets/css/frontend.css' );
					$woosw_color_default = apply_filters( 'woosw_color_default', '#5fbd74' );
					$woosw_color         = apply_filters( 'woosw_color', get_option( 'woosw_color', $woosw_color_default ) );
					$woosw_custom_css    = ".woosw-area .woosw-inner .woosw-content .woosw-content-bot .woosw-notice { background-color: {$woosw_color}; } ";
					$woosw_custom_css    .= ".woosw-area .woosw-inner .woosw-content .woosw-content-bot .woosw-content-bot-inner .woosw-page a:hover, .woosw-area .woosw-inner .woosw-content .woosw-content-bot .woosw-content-bot-inner .woosw-continue:hover { color: {$woosw_color}; } ";
					wp_add_inline_style( 'woosw-frontend', $woosw_custom_css );

					// main js
					wp_enqueue_script( 'woosw-frontend', WOOSW_URI . 'assets/js/frontend.js', array( 'jquery' ), WOOSW_VERSION, true );
					wp_localize_script( 'woosw-frontend', 'woosw_vars', array(
							'ajax_url'          => admin_url( 'admin-ajax.php' ),
							'menu_action'       => get_option( 'woosw_menu_action', 'open_page' ),
							'button_text'       => apply_filters( 'woosw_button_text', get_option( 'woosw_button_text', esc_html__( 'Add to Wishlist', 'woosw' ) ) ),
							'button_text_added' => apply_filters( 'woosw_button_text_added', get_option( 'woosw_button_text_added', esc_html__( 'Browse Wishlist', 'woosw' ) ) )
						)
					);
				}

				function admin_enqueue_scripts( $hook ) {
					wp_enqueue_style( 'woosw-backend', WOOSW_URI . 'assets/css/backend.css' );
					if ( $hook == 'wpclever_page_wpclever-woosw' ) {
						wp_enqueue_style( 'wp-color-picker' );
						wp_enqueue_script( 'woosw-backend', WOOSW_URI . 'assets/js/backend.js', array(
							'jquery',
							'wp-color-picker'
						) );
					}
				}

				function action_links( $links, $file ) {
					static $plugin;
					if ( ! isset( $plugin ) ) {
						$plugin = plugin_basename( __FILE__ );
					}
					if ( $plugin == $file ) {
						$settings_link = '<a href="' . admin_url( 'admin.php?page=wpclever-woosw&tab=settings' ) . '">' . esc_html__( 'Settings', 'woosw' ) . '</a>';
						$links[]       = '<a href="' . admin_url( 'admin.php?page=wpclever-woosw&tab=premium' ) . '">' . esc_html__( 'Premium Version', 'woosw' ) . '</a>';
						array_unshift( $links, $settings_link );
					}

					return (array) $links;
				}

				function row_meta( $links, $file ) {
					static $plugin;
					if ( ! isset( $plugin ) ) {
						$plugin = plugin_basename( __FILE__ );
					}
					if ( $plugin == $file ) {
						$row_meta = array(
							'support' => '<a href="https://wpclever.net/contact" target="_blank">' . esc_html__( 'Premium support', 'woosw' ) . '</a>',
						);

						return array_merge( $links, $row_meta );
					}

					return (array) $links;
				}

				function get_items( $key ) {
					$items_html     = '';
					$woosw_products = get_option( 'woosw_list_' . $key );
					if ( is_array( $woosw_products ) ) {
						if ( count( $woosw_products ) > 0 ) {
							$items_html .= '<table class="woosw-content-items">';
							foreach ( $woosw_products as $product_id => $product_time ) {
								$product = wc_get_product( $product_id );
								if ( ! $product ) {
									continue;
								}
								$items_html .= '<tr class="woosw-content-item woosw-content-item-' . $product_id . '" data-id="' . $product_id . '">';
								if ( self::can_edit( $key ) ) {
									$items_html .= '<td class="woosw-content-item--remove"><span></span></td>';
								}
								$items_html .= '<td class="woosw-content-item--image">' . $product->get_image() . '</td>';
								$items_html .= '<td>';
								$items_html .= '<div class="woosw-content-item--title"><a href="' . $product->get_permalink() . '">' . $product->get_name() . '</a></div>';
								$items_html .= '<div class="woosw-content-item--price">' . $product->get_price_html() . '</div>';
								$items_html .= '<div class="woosw-content-item--time">' . date_i18n( get_option( 'date_format' ), $product_time ) . '</div>';
								$items_html .= '</td>';
								$items_html .= '<td>';
								$items_html .= '<div class="woosw-content-item--stock">' . ( $product->is_in_stock() ? esc_html__( 'In stock', 'woosw' ) : esc_html__( 'Out of stock', 'woosw' ) ) . '</div>';
								$items_html .= '<div class="woosw-content-item--add">' . do_shortcode( '[add_to_cart id="' . $product_id . '"]' ) . '</div>';
								$items_html .= '</td>';
								$items_html .= '</tr>';
							}
							$items_html .= '</table>';
						} else {
							$items_html = '<div class="woosw-content-mid-notice">' . esc_html__( 'There are no products on Wishlist!', 'woosw' ) . '</div>';
						}
					}

					return $items_html;
				}

				function wp_footer() {
					?>
                    <div id="woosw-area" class="woosw-area">
                        <div class="woosw-inner">
                            <div class="woosw-content">
                                <div class="woosw-content-top">
									<?php esc_html_e( 'Wishlist', 'woosw' ); ?> <span
                                            class="woosw-count"><?php echo count( self::$woosw_added ); ?></span>
                                    <span class="woosw-close"></span>
                                </div>
                                <div class="woosw-content-mid"></div>
                                <div class="woosw-content-bot">
                                    <div class="woosw-content-bot-inner">
								<span class="woosw-page">
									<a href="<?php echo self::get_url( self::get_key() ); ?>"><?php esc_html_e( 'Open Wishlist Page', 'woosw' ); ?></a>
								</span>
                                        <span class="woosw-continue">
									<?php esc_html_e( 'Continue Shopping', 'woosw' ); ?>
								</span>
                                    </div>
                                    <div class="woosw-notice"></div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php
				}

				function update_meta( $product_id, $action = 'add' ) {
					$meta_count = 'woosw_count';
					$meta_time  = ( $action == 'add' ? 'woosw_add' : 'woosw_remove' );
					$count      = get_post_meta( $product_id, $meta_count, true );
					$new_count  = 0;
					if ( $action == 'add' ) {
						if ( $count ) {
							$new_count = absint( $count ) + 1;
						} else {
							$new_count = 1;
						}
					} elseif ( $action == 'remove' ) {
						if ( $count && ( absint( $count ) > 1 ) ) {
							$new_count = absint( $count ) - 1;
						} else {
							$new_count = 0;
						}
					}
					update_post_meta( $product_id, $meta_count, $new_count );
					update_post_meta( $product_id, $meta_time, time() );
				}

				public static function generate_key() {
					$key         = '';
					$key_str     = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
					$key_str_len = strlen( $key_str );
					for ( $i = 0; $i < 6; $i ++ ) {
						$key .= $key_str[ random_int( 0, $key_str_len - 1 ) ];
					}

					return $key;
				}

				public static function exists_key( $key ) {
					if ( get_option( 'woosw_list_' . $key ) ) {
						return true;
					} else {
						return false;
					}
				}

				public static function can_edit( $key ) {
					if ( is_user_logged_in() ) {
						if ( get_user_meta( get_current_user_id(), 'woosw_key', true ) == $key ) {
							return true;
						}
					} else {
						if ( isset( $_COOKIE['woosw_key'] ) && ( $_COOKIE['woosw_key'] == $key ) ) {
							return true;
						}
					}

					return false;
				}

				public static function get_page_id() {
					if ( get_option( 'woosw_page_id' ) ) {
						return absint( get_option( 'woosw_page_id' ) );
					} else {
						return false;
					}
				}

				public static function get_key() {
					if ( ! is_user_logged_in() && ( get_option( 'woosw_disable_unauthenticated', 'no' ) == 'yes' ) ) {
						return 'unauthenticated';
					} else {
						if ( is_user_logged_in() ) {
							// for user
							if ( ( $user_id = get_current_user_id() ) > 0 ) {
								if ( get_user_meta( $user_id, 'woosw_key', true ) == '' ) {
									$new_key = self::generate_key();
									while ( self::exists_key( $new_key ) ) {
										$new_key = self::generate_key();
									}

									update_user_meta( $user_id, 'woosw_key', $new_key );

									return $new_key;
								} else {
									return get_user_meta( $user_id, 'woosw_key', true );
								}
							}
						} else {
							// for guest
							if ( isset( $_COOKIE['woosw_key'] ) ) {
								return esc_attr( $_COOKIE['woosw_key'] );
							} else {
								$new_key = self::generate_key();
								while ( self::exists_key( $new_key ) ) {
									$new_key = self::generate_key();
								}
								setcookie( 'woosw_key', $new_key, time() + ( 3600 * 24 * 7 ), COOKIEPATH, COOKIE_DOMAIN );

								return $new_key;
							}
						}
					}
				}

				public static function get_url( $key = null ) {
					if ( ! $key ) {
						$key = self::get_key();
					}
					if ( ( $page_id = self::get_page_id() ) ) {
						if ( get_option( 'permalink_structure' ) != '' ) {
							return trailingslashit( get_permalink( $page_id ) ) . $key;
						} else {
							return get_permalink( $page_id ) . '&woosw_id=' . $key;
						}
					} else {
						return home_url( '/' ) . '#' . $key;
					}
				}

				public static function get_count( $key = null ) {
					if ( ! $key ) {
						$key = self::get_key();
					}
					$woosw_products = array();
					if ( get_option( 'woosw_list_' . $key ) ) {
						$woosw_products = get_option( 'woosw_list_' . $key );
					}

					return count( $woosw_products );
				}
			}

			new WPcleverWoosw();
		}
	}

	function woosw_notice_wc() {
		?>
        <div class="error">
            <p><?php esc_html_e( 'WooCommerce Smart Wishlist require WooCommerce version 3.0.0 or greater.', 'woosw' ); ?></p>
        </div>
		<?php
	}
}