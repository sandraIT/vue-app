<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom template tags for this theme.
 */
class Businext_Templates {

	public static function pre_loader() {
		if ( Businext::setting( 'pre_loader_enable' ) !== '1' ) {
			return;
		}

		$style = Businext::setting( 'pre_loader_style' );

		if ( $style === 'random' ) {
			$style = array_rand( Businext_Helper::$preloader_style );
		}
		?>

		<div id="page-preloader" class="page-loading clearfix">
			<div class="page-load-inner">
				<div class="preloader-wrap">
					<div class="wrap-2">
						<?php get_template_part( 'components/preloader/style', $style ); ?>
					</div>
				</div>
			</div>
		</div>

		<?php
	}

	public static function top_bar() {
		$top_bar_type = Businext_Helper::get_post_meta( 'top_bar_type', '' );

		if ( $top_bar_type === '' ) {
			$top_bar_type = Businext::setting( 'global_top_bar' );
		}

		if ( $top_bar_type !== 'none' ) {
			get_template_part( 'components/top-bars/top-bar', $top_bar_type );
		}
	}

	public static function top_bar_button( $type = '01' ) {
		$button_text        = Businext::setting( "top_bar_style_{$type}_button_text" );
		$button_link        = Businext::setting( "top_bar_style_{$type}_button_link" );
		$button_link_target = Businext::setting( "top_bar_style_{$type}_button_link_target" );
		$button_classes     = 'top-bar-button';
		?>
		<?php if ( $button_link !== '' && $button_text !== '' ) : ?>
			<a class="<?php echo esc_attr( $button_classes ); ?>"
			   href="<?php echo esc_url( $button_link ); ?>"
				<?php if ( $button_link_target === '1' ) : ?>
					target="_blank"
				<?php endif; ?>
			>
				<?php echo esc_html( $button_text ); ?>
			</a>
		<?php endif;
	}

	public static function top_bar_info() {
		$type = Businext_Global::instance()->get_top_bar_type();
		$info = Businext::setting( "top_bar_style_{$type}_info" );

		if ( ! empty( $info ) ) {
			?>
			<ul class="top-bar-info">
				<?php
				foreach ( $info as $item ) {
					$url  = isset( $item['url'] ) ? $item['url'] : '';
					$icon = isset( $item['icon_class'] ) ? $item['icon_class'] : '';
					$text = isset( $item['text'] ) ? $item['text'] : '';
					?>
					<li class="info-item">
						<?php if ( $url !== '' ) : ?>
						<a href="<?php echo esc_url( $url ); ?>" class="info-link">
							<?php endif; ?>

							<?php if ( $icon !== '' ) : ?>
								<i class="info-icon <?php echo esc_attr( $icon ); ?>"></i>
							<?php endif; ?>

							<?php echo '<span class="info-text">' . $text . '</span>'; ?>

							<?php if ( $url !== '' ) : ?>
						</a>
					<?php endif; ?>
					</li>
				<?php } ?>
			</ul>
			<?php
		}
	}

	public static function top_bar_office() {
		$type    = Businext_Global::instance()->get_top_bar_type();
		$offices = Businext::setting( "top_bar_style_{$type}_office" );

		if ( ! empty( $offices ) ) { ?>
			<div id="top-bar-office-wrapper" class="top-bar-office-wrapper">
				<?php
				$i                    = 1;
				$office_switcher      = '';
				$office_output        = '';
				$office_active_output = '';
				foreach ( $offices as $office ) : ?>
					<?php
					$id              = "office_$i";
					$office_switcher .= sprintf( '<li>
                                        <a href="#%s">%s</a>
                                    </li>', $id, $office['name'] );

					if ( $i == 1 ) {
						$office_active_output = $office['name'];
					}

					ob_start();
					?>
					<ul class="office" id="<?php echo esc_attr( $id ); ?>"
						<?php if ( $i == 1 ) {
							echo 'style="display: block"';
						} ?>
					>
						<?php if ( isset( $office['fax'] ) ) : ?>
							<li>
								<div class="office-content-wrap">
									<i class="ion-ios-telephone"></i>
									<?php printf( '<span>%s</span>', $office['fax'] ); ?>
								</div>
							</li>
						<?php endif; ?>
						<?php if ( isset( $office['address'] ) ) : ?>
							<li>
								<div class="office-content-wrap">
									<i class="ion-android-map"></i>
									<?php printf( '<span>%s</span>', $office['address'] ); ?>
								</div>
							</li>
						<?php endif; ?>
						<?php if ( isset( $office['time'] ) ) : ?>
							<li>
								<div class="office-content-wrap">
									<i class="ion-clock"></i>
									<?php printf( '<span>%s</span>', $office['time'] ); ?>
								</div>
							</li>
						<?php endif; ?>
					</ul>
					<?php
					$office_output .= ob_get_contents();
					ob_clean();

					$i ++;
					?>
				<?php endforeach; ?>
				<div class="offices">
					<?php echo '' . $office_output; ?>
				</div>
				<div class="office-switcher">
					<div class="active">
	                    <span>
		                    <?php echo '' . $office_active_output; ?>
	                    </span>
					</div>
					<ul class="office-list">
						<?php echo '' . $office_switcher; ?>
					</ul>
				</div>
			</div>
			<?php
		}
	}

	public static function top_bar_social_networks() {
		$type   = Businext_Global::instance()->get_top_bar_type();
		$enable = Businext::setting( "top_bar_style_{$type}_social_networks_enable" );

		if ( $enable !== '1' ) {
			return;
		}
		?>
		<div class="top-bar-social-network">
			<?php Businext_Templates::social_icons( array(
				'display'        => 'icon',
				'tooltip_enable' => false,
			) ); ?>
		</div>
		<?php
	}

	public static function top_bar_language_switcher() {
		$type   = Businext_Global::instance()->get_top_bar_type();
		$enable = Businext::setting( "top_bar_style_{$type}_language_switcher_enable" );

		if ( $enable !== '1' ) {
			return;
		}

		self::language_switcher_template();
	}

	public static function header() {
		$type = Businext_Global::instance()->get_header_type();

		get_template_part( 'components/headers/header', $type );
	}

	public static function header_info_slider( $args = array() ) {
		$header_type = Businext_Global::instance()->get_header_type();

		$info = Businext::setting( "header_style_{$header_type}_info" );
		if ( empty( $info ) ) {
			return;
		}

		$defaults = array(
			'lg_items' => 3,
			'gutter'   => 30,
		);
		$args     = wp_parse_args( $args, $defaults );
		?>
		<div class="header-info">
			<div class="tm-swiper v-center"
			     data-lg-items="<?php echo esc_attr( $args['lg_items'] ); ?>"
			     data-md-items="2"
			     data-sm-items="1"
			     data-lg-gutter="<?php echo esc_attr( $args['gutter'] ); ?>"
			     data-loop="1"
			     data-autoplay="4000"
			>
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php foreach ( $info as $item ) { ?>
							<div class="swiper-slide">
								<div class="info-item">
									<?php if ( isset( $item['icon_class'] ) && $item['icon_class'] !== '' ) : ?>
										<div class="info-icon">
											<span class="<?php echo esc_attr( $item['icon_class'] ); ?>"></span>
										</div>
									<?php endif; ?>

									<div class="info-content">
										<?php if ( isset( $item['title'] ) && $item['title'] !== '' ) : ?>
											<?php echo '<h6 class="info-title">' . $item['title'] . '</h6>'; ?>
										<?php endif; ?>

										<?php if ( isset( $item['sub_title'] ) && $item['sub_title'] !== '' ) : ?>
											<?php echo '<div class="info-sub-title">' . $item['sub_title'] . '</div>'; ?>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	public static function header_search_button() {
		$header_type = Businext_Global::instance()->get_header_type();

		$enabled = Businext::setting( "header_style_{$header_type}_search_enable" );

		if ( '1' === $enabled ) {
			?>
			<div class="popup-search-wrap">
				<a href="javascript:void(0)" id="btn-open-popup-search" class="btn-open-popup-search"><i
						class="ion-ios-search-strong"></i></a>
			</div>
			<?php
		}
	}

	public static function header_search_form() {
		$header_type = Businext_Global::instance()->get_header_type();

		$enabled = Businext::setting( "header_style_{$header_type}_search_enable" );

		if ( '1' === $enabled ) {
			?>
			<div class="header-search-form-wrap">
				<?php get_search_form(); ?>
			</div>
			<?php
		}
	}

	public static function header_button( $args = array() ) {
		$header_type = Businext_Global::instance()->get_header_type();

		$button_text        = Businext::setting( "header_style_{$header_type}_button_text" );
		$button_link        = Businext::setting( "header_style_{$header_type}_button_link" );
		$button_link_target = Businext::setting( "header_style_{$header_type}_button_link_target" );
		$button_classes     = 'tm-button style-flat';

		$defaults = array(
			'extra_class' => '',
		);

		$args = wp_parse_args( $args, $defaults );

		if ( $args['extra_class'] !== '' ) {
			$button_classes .= " {$args['extra_class']}";
		}

		$header_button_classes = $button_classes . ' tm-button-nm header-on-top-button';
		$sticky_button_classes = $button_classes . ' tm-button-sm header-sticky-button';
		?>
		<?php if ( $button_link !== '' && $button_text !== '' ) : ?>
			<div class="header-button">
				<a class="<?php echo esc_attr( $header_button_classes ); ?>"
				   href="<?php echo esc_url( $button_link ); ?>"
					<?php if ( $button_link_target === '1' ) : ?>
						target="_blank"
					<?php endif; ?>
				>
					<?php echo esc_html( $button_text ); ?>
				</a>
				<a class="<?php echo esc_attr( $sticky_button_classes ); ?>"
				   href="<?php echo esc_url( $button_link ); ?>"
					<?php if ( $button_link_target === '1' ) : ?>
						target="_blank"
					<?php endif; ?>
				>
					<?php echo esc_html( $button_text ); ?>
				</a>
			</div>
		<?php endif;
	}

	public static function header_open_mobile_menu_button() {
		?>
		<div id="page-open-mobile-menu" class="page-open-mobile-menu">
			<div class="inner">
				<div class="icon"><i></i></div>
			</div>
		</div>
		<?php
	}

	public static function header_open_canvas_menu_button( $args = array() ) {
		$defaults = array(
			'menu_title' => false,
		);
		$args     = wp_parse_args( $args, $defaults );
		?>
		<div id="page-open-main-menu" class="page-open-main-menu">
			<?php if ( $args['menu_title'] ) : ?>
				<h6 class="page-open-main-menu-title"><?php esc_html_e( 'Menu', 'businext' ); ?></h6>
			<?php endif; ?>
			<div><i></i></div>
		</div>
		<?php
	}

	public static function header_social_networks( $args = array() ) {
		$header_type = Businext_Global::instance()->get_header_type();

		$social_enable = Businext::setting( "header_style_{$header_type}_social_networks_enable" );
		?>
		<?php if ( $social_enable === '1' ) : ?>
			<div class="header-social-networks">
				<div class="inner">
					<?php

					$defaults = array(
						'tooltip_position' => 'top',
					);

					$args = wp_parse_args( $args, $defaults );

					self::social_icons( $args );
					?>
				</div>
			</div>
		<?php endif; ?>
		<?php
	}

	public static function header_text() {
		$type = Businext_Global::instance()->get_header_type();

		$text = Businext::setting( "header_style_{$type}_text" );
		?>
		<?php if ( $text !== '' ) : ?>
			<div class="header-text">
				<?php echo wp_kses( $text, 'businext-default' ); ?>
			</div>
		<?php endif; ?>
		<?php
	}

	public static function header_language_switcher() {
		$header_type = Businext_Global::instance()->get_header_type();

		$enabled = Businext::setting( "header_style_{$header_type}_language_switcher_enable" );

		if ( $enabled !== '1' ) {
			return;
		}

		self::language_switcher_template();
	}

	public static function language_switcher_template() {
		$args = array(
			'show_names'       => 1,
			'display_names_as' => 'slug',
			'show_flags'       => 1,
			'hide_if_empty'    => 0,
		);
		?>
		<div id="switcher-language-wrapper" class="switcher-language-wrapper">
			<?php if ( defined( 'ICL_SITEPRESS_VERSION' ) ) { ?>
				<?php do_action( 'wpml_add_language_selector' ); ?>

				<script>
                    jQuery( document ).ready( function ( $ ) {
                        var img = $( '#switcher-language-wrapper' ).find( '.wpml-ls-item-toggle' ).children( 'img' );
                        img.wrap( '<div class="wpml-ls-item-toggle-flag"></div>' );
                    } );
				</script>
			<?php } else { ?>
				<div
					class="wpml-ls-statics-shortcode_actions wpml-ls wpml-ls-legacy-dropdown-click js-wpml-ls-legacy-dropdown-click">
					<ul>
						<li class="wpml-ls-slot-shortcode_actions wpml-ls-item wpml-ls-item-en wpml-ls-current-language wpml-ls-first-item wpml-ls-item-legacy-dropdown-click">
							<a href="#" class="js-wpml-ls-item-toggle wpml-ls-item-toggle">
								<div class="wpml-ls-item-toggle-flag">
									<img class="wpml-ls-flag"
									     src="<?php echo BUSINEXT_THEME_IMAGE_URI . '/flags/en.png'; ?>"
									     alt="en" title="English">
								</div>
								<span class="wpml-ls-native">English</span>
							</a>

							<ul class="js-wpml-ls-sub-menu wpml-ls-sub-menu">

								<li class="wpml-ls-slot-shortcode_actions wpml-ls-item wpml-ls-item-fr">
									<a href="#">
										<img class="wpml-ls-flag"
										     src="<?php echo BUSINEXT_THEME_IMAGE_URI . '/flags/fr.png'; ?>" alt="fr"
										     title="French">
										<span class="wpml-ls-native">French</span>
									</a>
								</li>


								<li class="wpml-ls-slot-shortcode_actions wpml-ls-item wpml-ls-item-de wpml-ls-last-item">
									<a href="#">
										<img class="wpml-ls-flag"
										     src="<?php echo BUSINEXT_THEME_IMAGE_URI . '/flags/de.png'; ?>" alt="de"
										     title="German">
										<span class="wpml-ls-native">German</span>
									</a>
								</li>

							</ul>

						</li>

					</ul>
				</div>
			<?php } ?>
		</div>
		<?php
	}

	public static function slider( $template_position ) {
		$slider          = Businext_Global::instance()->get_slider_alias();
		$slider_position = Businext_Global::instance()->get_slider_position();

		if ( ! function_exists( 'rev_slider_shortcode' ) || $slider === '' || $slider_position !== $template_position ) {
			return;
		}

		?>
		<div id="page-slider" class="page-slider">
			<?php echo do_shortcode( '[rev_slider ' . $slider . ']' ); ?>
		</div>
		<?php
	}

	public static function title_bar() {
		$type = Businext_Global::instance()->get_title_bar_type();

		if ( $type === 'none' ) {
			return;
		}

		get_template_part( 'components/title-bars/title-bar', $type );
	}

	public static function get_title_bar_title() {
		$title = Businext_Helper::get_post_meta( 'page_title_bar_custom_heading', '' );

		if ( $title === '' ) {
			if ( is_category() || is_tax() ) {
				$title = Businext::setting( 'title_bar_archive_category_title' ) . single_cat_title( '', false );
			} elseif ( is_home() ) {
				$title = Businext::setting( 'title_bar_home_title' ) . single_tag_title( '', false );
			} elseif ( is_tag() ) {
				$title = Businext::setting( 'title_bar_archive_tag_title' ) . single_tag_title( '', false );
			} elseif ( is_author() ) {
				$title = Businext::setting( 'title_bar_archive_author_title' ) . '<span class="vcard">' . get_the_author() . '</span>';
			} elseif ( is_year() ) {
				$title = Businext::setting( 'title_bar_archive_year_title' ) . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'businext' ) );
			} elseif ( is_month() ) {
				$title = Businext::setting( 'title_bar_archive_month_title' ) . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'businext' ) );
			} elseif ( is_day() ) {
				$title = Businext::setting( 'title_bar_archive_day_title' ) . get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'businext' ) );
			} elseif ( is_post_type_archive() ) {
				if ( function_exists( 'is_shop' ) && is_shop() ) {
					$title = esc_html__( 'Shop', 'businext' );
				} else {
					$title = sprintf( esc_html__( 'Archives: %s', 'businext' ), post_type_archive_title( '', false ) );
				}
			} elseif ( is_search() ) {
				$title = Businext::setting( 'title_bar_search_title' ) . '"' . get_search_query() . '"';
			} elseif ( is_singular( 'post' ) ) {
				$title = Businext::setting( 'title_bar_single_blog_title' );
				if ( $title === '' ) {
					$title = get_the_title();
				}
			} elseif ( is_singular( 'portfolio' ) ) {
				$title = Businext::setting( 'title_bar_single_portfolio_title' );
				if ( $title === '' ) {
					$title = get_the_title();
				}
			} elseif ( is_singular( 'product' ) ) {
				$title = Businext::setting( 'title_bar_single_product_title' );
				if ( $title === '' ) {
					$title = get_the_title();
				}
			} else {
				$title = get_the_title();
			}
		}

		?>
		<div class="page-title-bar-heading">
			<h1 class="heading">
				<?php echo wp_kses( $title, array(
					'span' => array(
						'class' => array(),
					),
				) ); ?>
			</h1>
		</div>
		<?php
	}

	public static function get_title_bar_button() {
		$type = Businext_Global::instance()->get_title_bar_type();

		if ( $type === 'none' ) {
			return;
		}

		$button_text        = Businext::setting( "title_bar_{$type}_button_text" );
		$button_link        = Businext::setting( "title_bar_{$type}_button_link" );
		$button_link_target = Businext::setting( "title_bar_{$type}_button_link_target" );
		?>
		<div class="tm-button-wrapper tm-animation move-up animate">
			<a class="tm-button style-flat tm-button-custom tm-button-primary has-icon icon-right"
			   href="<?php echo esc_url( $button_link ); ?>"
				<?php if ( $button_link_target === '_blank' ) : ?>
					target="_blank"
				<?php endif; ?>
			>
				<span class="button-text"><?php echo esc_html( $button_text ); ?></span>
				<span class="button-icon">
					<i class="ion-arrow-right-c"></i>
				</span>
			</a>
		</div>
		<?php
	}

	public static function paging_nav( $query = false ) {
		global $wp_query, $wp_rewrite;
		if ( $query === false ) {
			$query = $wp_query;
		}

		// Don't print empty markup if there's only one page.
		if ( $query->max_num_pages < 2 ) {
			return;
		}

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		$page_num_link = html_entity_decode( get_pagenum_link() );
		$query_args    = array();
		$url_parts     = explode( '?', $page_num_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$page_num_link = esc_url( remove_query_arg( array_keys( $query_args ), $page_num_link ) );
		$page_num_link = trailingslashit( $page_num_link ) . '%_%';

		$format = '';
		if ( $wp_rewrite->using_index_permalinks() && ! strpos( $page_num_link, 'index.php' ) ) {
			$format = 'index.php/';
		}
		if ( $wp_rewrite->using_permalinks() ) {
			$format .= user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' );
		} else {
			$format .= '?paged=%#%';
		}

		// Set up paginated links.

		$args  = array(
			'base'      => $page_num_link,
			'format'    => $format,
			'total'     => $query->max_num_pages,
			'current'   => max( 1, $paged ),
			'mid_size'  => 1,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="ion-arrow-left-c"></i>' . esc_html__( 'Prev', 'businext' ),
			'next_text' => esc_html__( 'Next', 'businext' ) . '<i class="ion-arrow-right-c"></i>',
			'type'      => 'array',
		);
		$pages = paginate_links( $args );

		if ( is_array( $pages ) ) {
			echo '<ul class="page-pagination">';
			foreach ( $pages as $page ) {
				printf( '<li>%s</li>', $page );
			}
			echo '</ul>';
		}
	}

	public static function page_links() {
		wp_link_pages( array(
			'before'           => '<div class="page-links">',
			'after'            => '</div>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'nextpagelink'     => esc_html__( 'Next', 'businext' ),
			'previouspagelink' => esc_html__( 'Prev', 'businext' ),
		) );
	}

	public static function post_nav_links() {
		$args = array(
			'prev_text'          => '%title',
			'next_text'          => '%title',
			'in_same_term'       => false,
			'excluded_terms'     => '',
			'taxonomy'           => 'category',
			'screen_reader_text' => esc_html__( 'Post navigation', 'businext' ),
		);

		$previous = get_previous_post_link( '<div class="nav-previous">%link</div>', $args['prev_text'], $args['in_same_term'], $args['excluded_terms'], $args['taxonomy'] );
		$previous = str_replace( 'rel="prev">', 'rel="prev">' . '<div><span class="ion-arrow-left-c"></span>' . esc_html__( 'Prev', 'businext' ) . '</div>', $previous );

		$next = get_next_post_link( '<div class="nav-next">%link</div>', $args['next_text'], $args['in_same_term'], $args['excluded_terms'], $args['taxonomy'] );
		$next = str_replace( 'rel="next">', 'rel="next">' . '<div>' . esc_html__( 'Next', 'businext' ) . '<span class="ion-arrow-right-c"></span></div>', $next );

		// Only add markup if there's somewhere to navigate to.
		if ( $previous || $next ) { ?>

			<nav class="navigation post-navigation" role="navigation">
				<?php echo '<h2 class="screen-reader-text">' . $args['screen_reader_text'] . '</h2>'; ?>

				<div class="nav-links">
					<?php echo '<div class="previous nav-item">' . $previous . '</div>'; ?>
					<?php echo '<div class="next nav-item">' . $next . '</div>'; ?>
				</div>
			</nav>
			<?php
		}
	}

	public static function comment_navigation( $args = array() ) {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			$defaults = array(
				'container_id'    => '',
				'container_class' => 'navigation comment-navigation',
			);
			$args     = wp_parse_args( $args, $defaults );
			?>
			<nav id="<?php echo esc_attr( $args['container_id'] ); ?>"
			     class="<?php echo esc_attr( $args['container_class'] ); ?>">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'businext' ); ?></h2>

				<div class="comment-nav-links">
					<?php paginate_comments_links( array(
						'prev_text' => esc_html__( 'Prev', 'businext' ),
						'next_text' => esc_html__( 'Next', 'businext' ),
						'type'      => 'list',
					) ); ?>
				</div>
			</nav>
			<?php
		}
		?>
		<?php
	}

	public static function comment_template( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div>
			<div class="comment-content">
				<div class="comment-header">
					<?php
					printf( '<h6 class="fn">%s</h6>', get_comment_author_link() );
					?>
					<div class="comment-datetime">
						<?php echo get_comment_date() . ' ' . esc_html__( 'at', 'businext' ) . ' ' . get_comment_time(); ?>
					</div>
				</div>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-messages"><?php esc_html_e( 'Your comment is awaiting moderation.', 'businext' ) ?></em>
					<br/>
				<?php endif; ?>
				<div class="comment-text"><?php comment_text(); ?></div>
				<div class="comment-actions">
					<?php comment_reply_link( array_merge( $args, array(
						'depth'      => $depth,
						'max_depth'  => $args['max_depth'],
						'reply_text' => esc_html__( 'Reply', 'businext' ),
					) ) ); ?>
					<?php edit_comment_link( '' . esc_html__( 'Edit', 'businext' ) ); ?>
				</div>
			</div>
		</div>
		<?php
	}

	public static function comment_form() {
		$commenter = wp_get_current_commenter();
		$req       = get_option( 'require_name_email' );
		$aria_req  = '';
		if ( $req ) {
			$aria_req = " aria-required='true'";
		}

		$fields = array(
			'author' => '<div class="row"><div class="col-sm-4 comment-form-author"><input id="author" placeholder="' . esc_attr__( 'Your Name *', 'businext' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" ' . $aria_req . '/></div>',
			'email'  => '<div class="col-sm-4 comment-form-email"><input id="email" placeholder="' . esc_attr__( 'Your Email *', 'businext' ) . '" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . '/></div>',
			'url'    => '<div class="col-sm-4 comment-form-url"><input id="url" placeholder="' . esc_attr__( 'Website', 'businext' ) . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" ' . $aria_req . '/></div></div>',
		);

		$comment_field = '<div class="row"><div class="col-md-12 comment-form-comment"><textarea id="comment" placeholder="' . esc_attr__( 'Your Comment', 'businext' ) . '" name="comment" aria-required="true"></textarea></div></div>';

		$comments_args = array(
			// Change the title of send button.
			'label_submit'        => esc_html__( 'Post Comment', 'businext' ),
			// Change the title of the reply section.
			'title_reply'         => esc_html__( 'Leave A Comment', 'businext' ),
			// Remove "Text or HTML to be displayed after the set of comment fields".
			'comment_notes_after' => '',
			'fields'              => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field'       => $comment_field,
		);
		comment_form( $comments_args );
	}

	public static function post_author() {
		?>
		<div class="entry-author">
			<div class="author-info">
				<div class="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'email' ), '80' ); ?>
				</div>
				<div class="author-description">
					<h5 class="author-name"><?php the_author(); ?></h5>

					<div class="author-biographical-info">
						<?php the_author_meta( 'description' ); ?>
					</div>

					<?php
					$email_address = get_the_author_meta( 'email_address' );
					$facebook      = get_the_author_meta( 'facebook' );
					$twitter       = get_the_author_meta( 'twitter' );
					$google_plus   = get_the_author_meta( 'google_plus' );
					$instagram     = get_the_author_meta( 'instagram' );
					$linkedin      = get_the_author_meta( 'linkedin' );
					$pinterest     = get_the_author_meta( 'pinterest' );
					?>
					<?php if ( $facebook || $twitter || $google_plus || $instagram || $linkedin || $email_address ) : ?>
						<div class="author-social-networks">
							<?php if ( $email_address ) : ?>
								<a class="hint--bounce hint--top"
								   aria-label="<?php echo esc_attr__( 'Email', 'businext' ) ?>"
								   href="mailto:<?php echo esc_url( $email_address ); ?>" target="_blank">
									<i class="ion-email"></i>
								</a>
							<?php endif; ?>

							<?php if ( $facebook ) : ?>
								<a class="hint--bounce hint--top"
								   aria-label="<?php echo esc_attr__( 'Facebook', 'businext' ) ?>"
								   href="<?php echo esc_url( $facebook ); ?>" target="_blank">
									<i class="ion-social-facebook"></i>
								</a>
							<?php endif; ?>

							<?php if ( $twitter ) : ?>
								<a class="hint--bounce hint--top"
								   aria-label="<?php echo esc_attr__( 'Twitter', 'businext' ) ?>"
								   href="<?php echo esc_url( $twitter ); ?>" target="_blank">
									<i class="ion-social-twitter"></i>
								</a>
							<?php endif; ?>

							<?php if ( $google_plus ) : ?>
								<a class="hint--bounce hint--top"
								   aria-label="<?php echo esc_attr__( 'Google +', 'businext' ) ?>"
								   href="<?php echo esc_url( $google_plus ); ?>" target="_blank">
									<i class="ion-social-googleplus"></i>
								</a>
							<?php endif; ?>

							<?php if ( $instagram ) : ?>
								<a class="hint--bounce hint--top"
								   aria-label="<?php echo esc_attr__( 'Instagram', 'businext' ) ?>"
								   href="<?php echo esc_url( $google_plus ); ?>" target="_blank">
									<i class="ion-social-instagram-outline"></i>
								</a>
							<?php endif; ?>

							<?php if ( $linkedin ) : ?>
								<a class="hint--bounce hint--top"
								   aria-label="<?php echo esc_attr__( 'Linkedin', 'businext' ) ?>"
								   href="<?php echo esc_url( $linkedin ); ?>" target="_blank">
									<i class="ion-social-linkedin"></i>
								</a>
							<?php endif; ?>

							<?php if ( $pinterest ) : ?>
								<a class="hint--bounce hint--top"
								   aria-label="<?php echo esc_attr__( 'Pinterest', 'businext' ) ?>"
								   href="<?php echo esc_url( $pinterest ); ?>" target="_blank">
									<i class="ion-social-pinterest"></i>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php
	}

	public static function post_sharing( $args = array() ) {
		$social_sharing = Businext::setting( 'social_sharing_item_enable' );
		if ( ! empty( $social_sharing ) ) {
			?>
			<div class="post-share">
				<div class="post-share-title heading-color"><?php esc_html_e( 'Share', 'businext' ); ?></div>
				<div class="post-share-list">
					<?php self::get_sharing_list( $args ); ?>
				</div>
			</div>
			<?php
		}
	}

	public static function portfolio_like() {
		if ( ! class_exists( 'Businext_Post_Like' ) || Businext::setting( 'single_portfolio_meta_like_enable' ) !== '1' ) {
			return;
		}

		?>
		<span class="post-likes">
			<?php
			$businext_post_like = new Businext_Post_Like();
			$businext_post_like->get_simple_likes_button( get_the_ID() );
			?>
		</span>
		<?php
	}

	public static function portfolio_view() {
		if ( Businext::setting( 'single_portfolio_meta_view_enable' ) === '1' && function_exists( 'the_views' ) ) : ?>
			<div class="post-view">
				<i class="ion-eye"></i>
				<?php the_views(); ?>
			</div>
			<?php
		endif;
	}

	public static function portfolio_sharing( $args = array() ) {
		$social_sharing = Businext::setting( 'single_portfolio_share_enable' );
		if ( ! empty( $social_sharing ) && Businext::setting( 'single_portfolio_share_enable' ) === '1' ) {
			?>
			<div class="portfolio-share">
				<h6 class="portfolio-share-title"><?php esc_html_e( 'Share:', 'businext' ); ?></h6>
				<div class="portfolio-sharing-list"><?php self::get_sharing_list( $args ); ?></div>
			</div>
			<?php
		}
	}

	public static function portfolio_sharing_2( $args = array() ) {
		$social_sharing = Businext::setting( 'single_portfolio_share_enable' );
		if ( ! empty( $social_sharing ) && Businext::setting( 'single_portfolio_share_enable' ) === '1' ) {
			?>
			<div class="post-share">
				<div class="post-share-toggle">
					<span class="ion-android-share-alt"></span>
					<div class="post-share-list">
						<?php self::get_sharing_list( $args ); ?>
					</div>
				</div>
			</div>
			<?php
		}
	}

	public static function portfolio_view_project_button( $portfolio_url ) {
		if ( $portfolio_url !== '' ) : ?>
			<div class="portfolio-link">
				<a class="tm-button-view-project"
				   href="<?php echo esc_url( $portfolio_url ); ?>"><?php esc_html_e( 'Visit Site', 'businext' ); ?>
					<span class="ion-android-arrow-dropright-circle"></span>
				</a>
			</div>
		<?php endif;
	}

	public static function portfolio_details() {
		$portfolio_client = Businext_Helper::get_post_meta( 'portfolio_client', '' );
		$portfolio_date   = Businext_Helper::get_post_meta( 'portfolio_date', '' );
		$portfolio_awards = Businext_Helper::get_post_meta( 'portfolio_awards', '' );
		$portfolio_team   = Businext_Helper::get_post_meta( 'portfolio_team', '' );
		?>
		<ul class="portfolio-details-list">
			<?php if ( $portfolio_date !== '' ) : ?>
				<li>
					<label><?php esc_html_e( 'Date', 'businext' ); ?></label>
					<span><?php echo esc_html( $portfolio_date ); ?></span>
				</li>
			<?php endif; ?>
			<?php if ( $portfolio_client !== '' ) : ?>
				<li>
					<label><?php esc_html_e( 'Client', 'businext' ); ?></label>
					<span><?php echo esc_html( $portfolio_client ); ?></span>
				</li>
			<?php endif; ?>
			<?php if ( $portfolio_awards !== '' ) : ?>
				<li>
					<label><?php esc_html_e( 'Awards', 'businext' ); ?></label>

					<?php echo '<span>' . $portfolio_awards . '</span>'; ?>
				</li>
			<?php endif; ?>
			<?php if ( $portfolio_team !== '' ) : ?>
				<li>
					<label><?php esc_html_e( 'My Team', 'businext' ); ?></label>

					<?php echo '<span>' . $portfolio_team . '</span>'; ?>
				</li>
			<?php endif; ?>
		</ul>
		<?php
	}

	public static function portfolio_link_pages() {
		$args = array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'businext' ),
			'after'  => '</div>',
		);
		wp_link_pages( $args );
	}

	public static function product_sharing( $args = array() ) {
		$social_sharing = Businext::setting( 'social_sharing_item_enable' );
		if ( ! empty( $social_sharing ) ) {
			?>
			<div class="product-share meta-item">
				<h6><?php esc_html_e( 'Share:', 'businext' ); ?></h6>
				<div class="product-sharing-list"><?php self::get_sharing_list( $args ); ?></div>
			</div>
			<?php
		}
	}

	public static function get_sharing_list( $args = array() ) {
		$defaults       = array(
			'target' => '_blank',
		);
		$args           = wp_parse_args( $args, $defaults );
		$social_sharing = Businext::setting( 'social_sharing_item_enable' );
		if ( ! empty( $social_sharing ) ) {
			$social_sharing_order = Businext::setting( 'social_sharing_order' );
			foreach ( $social_sharing_order as $social ) {
				if ( in_array( $social, $social_sharing, true ) ) {
					if ( $social === 'facebook' ) {
						if ( ! wp_is_mobile() ) {
							$facebook_url = 'http://www.facebook.com/sharer.php?m2w&s=100&p&#91;url&#93;=' . rawurlencode( get_permalink() ) . '&p&#91;images&#93;&#91;0&#93;=' . wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) . '&p&#91;title&#93;=' . rawurlencode( get_the_title() );
						} else {
							$facebook_url = 'https://m.facebook.com/sharer.php?u=' . rawurlencode( get_permalink() );
						}
						?>
						<a class="hint--bounce hint--top facebook" target="<?php echo esc_attr( $args['target'] ); ?>"
						   aria-label="<?php echo esc_attr__( 'Facebook', 'businext' ) ?>"
						   href="<?php echo esc_url( $facebook_url ); ?>">
							<i class="ion-social-facebook"></i>
						</a>
						<?php
					} elseif ( $social === 'twitter' ) {
						?>
						<a class="hint--bounce hint--top twitter" target="<?php echo esc_attr( $args['target'] ); ?>"
						   aria-label="<?php echo esc_attr__( 'Twitter', 'businext' ) ?>"
						   href="https://twitter.com/share?text=<?php echo rawurlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ); ?>&url=<?php echo rawurlencode( get_permalink() ); ?>">
							<i class="ion-social-twitter"></i>
						</a>
						<?php
					} elseif ( $social === 'google_plus' ) {
						?>
						<a class="hint--bounce hint--top google-plus"
						   target="<?php echo esc_attr( $args['target'] ); ?>"
						   aria-label="<?php echo esc_attr__( 'Google+', 'businext' ) ?>"
						   href="https://plus.google.com/share?url=<?php echo rawurlencode( get_permalink() ); ?>">
							<i class="ion-social-googleplus"></i>
						</a>
						<?php
					} elseif ( $social === 'tumblr' ) {
						?>
						<a class="hint--bounce hint--top tumblr" target="<?php echo esc_attr( $args['target'] ); ?>"
						   aria-label="<?php echo esc_attr__( 'Tumblr', 'businext' ) ?>"
						   href="http://www.tumblr.com/share/link?url=<?php echo rawurlencode( get_permalink() ); ?>&amp;name=<?php echo rawurlencode( get_the_title() ); ?>">
							<i class="ion-social-tumblr"></i>
						</a>
						<?php

					} elseif ( $social === 'linkedin' ) {
						?>
						<a class="hint--bounce hint--top linkedin" target="<?php echo esc_attr( $args['target'] ); ?>"
						   aria-label="<?php echo esc_attr__( 'Linkedin', 'businext' ) ?>"
						   href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo rawurlencode( get_permalink() ); ?>&amp;title=<?php echo rawurlencode( get_the_title() ); ?>">
							<i class="ion-social-linkedin"></i>
						</a>
						<?php
					} elseif ( $social === 'email' ) {
						?>
						<a class="hint--bounce hint--top email" target="<?php echo esc_attr( $args['target'] ); ?>"
						   aria-label="<?php echo esc_attr__( 'Email', 'businext' ) ?>"
						   href="mailto:?subject=<?php echo rawurlencode( get_the_title() ); ?>&amp;body=<?php echo rawurlencode( get_permalink() ); ?>">
							<i class="ion-android-mail"></i>
						</a>
						<?php
					}
				}
			}
		}
	}

	public static function post_likes() {
		if ( ! class_exists( 'Businext_Post_Like' ) ) {
			return;
		}
		?>
		<div class="post-likes">
			<?php
			$businext_post_like = new Businext_Post_Like();
			$businext_post_like->get_simple_likes_button( get_the_ID() );
			?>
		</div>
		<?php
	}

	public static function social_icons( $args = array() ) {
		$defaults    = array(
			'link_classes'     => '',
			'display'          => 'icon',
			'tooltip_enable'   => true,
			'tooltip_position' => 'top',
			'tooltip_skin'     => 'default',
		);
		$args        = wp_parse_args( $args, $defaults );
		$social_link = Businext::setting( 'social_link' );

		if ( ! empty( $social_link ) ) {
			$social_link_target = Businext::setting( 'social_link_target' );

			$args['link_classes'] .= ' social-link';
			if ( $args['tooltip_enable'] ) {
				$args['link_classes'] .= ' hint--bounce';
				$args['link_classes'] .= " hint--{$args['tooltip_position']}";
				$args['link_classes'] .= " hint--{$args['tooltip_skin']}";
			}
			foreach ( $social_link as $key => $row_values ) {
				?>
				<a class="<?php echo esc_attr( $args['link_classes'] ); ?>"
					<?php if ( $args['tooltip_enable'] ) : ?>
						aria-label="<?php echo esc_attr( $row_values['tooltip'] ); ?>"
					<?php endif; ?>
                   href="<?php echo esc_url( $row_values['link_url'] ); ?>"
                   data-hover="<?php echo esc_attr( $row_values['tooltip'] ); ?>"
					<?php if ( $social_link_target === '1' ) : ?>
						target="_blank"
					<?php endif; ?>
				>
					<?php if ( in_array( $args['display'], array( 'icon', 'icon_text' ), true ) ) : ?>
						<i class="social-icon <?php echo esc_attr( $row_values['icon_class'] ); ?>"></i>
					<?php endif; ?>
					<?php if ( in_array( $args['display'], array( 'text', 'icon_text' ), true ) ) : ?>
						<span class="social-text"><?php echo esc_html( $row_values['tooltip'] ); ?></span>
					<?php endif; ?>
				</a>
				<?php
			}
		}
	}

	public static function string_limit_words( $string, $word_limit ) {
		$words = explode( ' ', $string, $word_limit + 1 );
		if ( count( $words ) > $word_limit ) {
			array_pop( $words );
		}

		return implode( ' ', $words );
	}

	public static function string_limit_characters( $string, $limit ) {
		$string = substr( $string, 0, $limit );
		$string = substr( $string, 0, strripos( $string, " " ) );

		return $string;
	}

	public static function excerpt( $args = array() ) {
		$defaults = array(
			'limit' => 55,
			'after' => '&hellip;',
			'type'  => 'word',
		);
		$args     = wp_parse_args( $args, $defaults );

		$excerpt = '';

		if ( $args['type'] === 'word' ) {
			$excerpt = self::string_limit_words( get_the_excerpt(), $args['limit'] );
		} elseif ( $args['type'] === 'character' ) {
			$excerpt = self::string_limit_characters( get_the_excerpt(), $args['limit'] );
		}
		if ( $excerpt !== '' && $excerpt !== '&nbsp;' ) {
			printf( '<p>%s %s</p>', $excerpt, $args['after'] );
		}
	}

	public static function render_sidebar( $template_position = 'left' ) {
		$sidebar1         = Businext_Global::instance()->get_sidebar_1();
		$sidebar2         = Businext_Global::instance()->get_sidebar_2();
		$sidebar_position = Businext_Global::instance()->get_sidebar_position();

		if ( $sidebar1 !== 'none' ) {
			$classes = 'page-sidebar';
			$classes .= ' page-sidebar-' . $template_position;
			if ( $template_position === 'left' ) {
				if ( $sidebar_position === 'left' && $sidebar1 !== 'none' ) {
					self::get_sidebar( $classes, $sidebar1, true );
				}
				if ( $sidebar_position === 'right' && $sidebar1 !== 'none' && $sidebar2 !== 'none' ) {
					self::get_sidebar( $classes, $sidebar2 );
				}
			} elseif ( $template_position === 'right' ) {
				if ( $sidebar_position === 'right' && $sidebar1 !== 'none' ) {
					self::get_sidebar( $classes, $sidebar1, true );
				}
				if ( $sidebar_position === 'left' && $sidebar1 !== 'none' && $sidebar2 !== 'none' ) {
					self::get_sidebar( $classes, $sidebar2 );
				}
			}
		}
	}

	public static function get_sidebar( $classes, $name, $first_sidebar = false ) {
		?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<div class="page-sidebar-inner" itemscope="itemscope">
				<div class="page-sidebar-content">
					<?php self::generated_sidebar( $name ); ?>
				</div>

				<?php
				$special_sidebar = Businext_Global::instance()->get_sidebar_special();
				?>
				<?php if ( $first_sidebar === true && $special_sidebar !== 'none' && is_active_sidebar( $special_sidebar ) ) : ?>
					<div class="page-sidebar-special">
						<?php dynamic_sidebar( $special_sidebar ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}

	/**
	 * @param $name
	 * Name of dynamic sidebar
	 * Check sidebar is active then dynamic it.
	 */
	public static function generated_sidebar( $name ) {
		if ( is_active_sidebar( $name ) ) {
			dynamic_sidebar( $name );
		}
	}

	public static function image_placeholder( $width, $height ) {
		echo '<img src="http://via.placeholder.com/' . $width . 'x' . $height . '?text=' . esc_html__( 'No+Image', 'businext' ) . '" alt="thumbnail"/>';
	}

	public static function grid_filters( $post_type = 'post', $filter_enable, $filter_align, $filter_counter, $filter_wrap = '0', $total = 0 ) {
		if ( $filter_enable == 1 ) :
			switch ( $post_type ) {
				case 'case_study' :
					$_categories = get_terms( array(
						'taxonomy'   => 'case_study_category',
						'hide_empty' => true,
					) );
					$_catPrefix  = 'case_study_category';
					break;
				case 'service' :
					$_categories = get_terms( array(
						'taxonomy'   => 'service_category',
						'hide_empty' => true,
					) );
					$_catPrefix  = 'service_category';
					break;
				case 'portfolio' :
					$_categories = get_terms( array(
						'taxonomy'   => 'portfolio_category',
						'hide_empty' => true,
					) );
					$_catPrefix  = 'portfolio_category';
					break;
				case 'product' :
					$_categories = get_terms( array(
						'taxonomy'   => 'product_cat',
						'hide_empty' => true,
					) );

					$_catPrefix = 'product_cat';
					break;
				default :
					$_categories = get_terms( array(
						'taxonomy'   => 'category',
						'hide_empty' => true,
					) );

					$_catPrefix = 'category';
					break;
			}

			$filter_classes = array( 'tm-filter-button-group', $filter_align );
			if ( $filter_counter == 1 ) {
				$filter_classes[] = 'show-filter-counter';
			}
			?>

			<div class="<?php echo implode( ' ', $filter_classes ); ?>"
				<?php
				if ( $filter_counter == 1 ) {
					echo 'data-filter-counter="true"';
				}
				?>
			>
				<?php if ( $filter_wrap == '1' ) { ?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php } ?>

							<div class="tm-filter-button-group-inner">
								<a href="javascript:void(0);" class="btn-filter current"
								   data-filter="*" data-filter-count="<?php echo esc_attr( $total ); ?>">
									<span class="filter-text"><?php esc_html_e( 'All', 'businext' ); ?></span>
								</a>
								<?php
								foreach ( $_categories as $term ) {
									printf( '<a href="javascript:void(0);" class="btn-filter" data-filter="%s" data-ajax-filter="%s" data-filter-count="%s"><span class="filter-text">%s</span></a>', esc_attr( ".{$_catPrefix}-{$term->slug}" ), esc_attr( "{$_catPrefix}:{$term->slug}" ), $term->count, $term->name );
								}
								?>
							</div>

							<?php if ( $filter_wrap == '1' ) { ?>
						</div>
					</div>
				</div>
			<?php } ?>

			</div>
			<?php
		endif;
	}

	public static function grid_pagination( $businext_query, $number, $pagination, $pagination_align, $pagination_button_text ) {
		if ( $pagination !== '' && $businext_query->found_posts > $number ) { ?>
			<div class="tm-grid-pagination">
				<?php if ( $pagination === 'loadmore_alt' || $pagination === 'loadmore' || $pagination === 'infinite' ) { ?>
					<div class="inner" style="text-align:<?php echo esc_attr( $pagination_align ); ?>">
						<div class="tm-loader"></div>
					</div>

					<div class="inner" style="text-align:<?php echo esc_attr( $pagination_align ); ?>">
						<?php if ( $pagination === 'loadmore' ) { ?>
							<a href="#" class="tm-button style-flat tm-button-primary tm-grid-loadmore-btn">
								<span><?php echo esc_html( $pagination_button_text ); ?></span>
							</a>
						<?php } ?>
					</div>
				<?php } elseif ( $pagination === 'pagination' ) { ?>
					<?php Businext_Templates::paging_nav( $businext_query ); ?>
				<?php } ?>
			</div>
			<div class="tm-grid-messages" style="display: none;">
				<?php esc_html_e( 'All items displayed.', 'businext' ); ?>
			</div>
			<?php
		}
	}

	/**
	 * Echo rating html template.
	 *
	 * @param int $rating
	 */
	public static function get_rating_template( $rating = 5 ) {
		$full_stars = intval( $rating );
		$template   = '';

		$template .= str_repeat( '<span class="ion-ios-star"></span>', $full_stars );

		$half_star = floatval( $rating ) - $full_stars;

		if ( $half_star != 0 ) {
			$template .= '<span class="ion-ios-star-half"></span>';
		}

		$empty_stars = intval( 5 - $rating );
		$template    .= str_repeat( '<span class="ion-ios-star-outline"></span>', $empty_stars );

		echo '' . $template;
	}
}
