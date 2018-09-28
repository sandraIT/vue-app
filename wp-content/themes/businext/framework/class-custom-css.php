<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue custom styles.
 */
if ( ! class_exists( 'Businext_Custom_Css' ) ) {
	class Businext_Custom_Css {

		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'extra_css' ) );
		}

		/**
		 * Responsive styles.
		 *
		 * @access public
		 */
		public function extra_css() {
			$px = 'px';

			// Responsive H1 font-size.
			$heading_font_sensitive  = Businext::setting( 'heading_font_sensitive' );
			$h1_font_size_max        = Businext::setting( 'h1_font_size' );
			$h1_font_size_min        = $h1_font_size_max * $heading_font_sensitive;
			$h1_font_size_responsive = "calc($h1_font_size_min$px + ($h1_font_size_max - $h1_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H2 font-size.
			$h2_font_size_max        = Businext::setting( 'h2_font_size' );
			$h2_font_size_min        = $h2_font_size_max * $heading_font_sensitive;
			$h2_font_size_responsive = "calc($h2_font_size_min$px + ($h2_font_size_max - $h2_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H3 font-size.
			$h3_font_size_max        = Businext::setting( 'h3_font_size' );
			$h3_font_size_min        = $h3_font_size_max * $heading_font_sensitive;
			$h3_font_size_responsive = "calc($h3_font_size_min$px + ($h3_font_size_max - $h3_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H4 font-size.
			$h4_font_size_max        = Businext::setting( 'h4_font_size' );
			$h4_font_size_min        = $h4_font_size_max * $heading_font_sensitive;
			$h4_font_size_responsive = "calc($h4_font_size_min$px + ($h4_font_size_max - $h4_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H5 font-size.
			$h5_font_size_max        = Businext::setting( 'h5_font_size' );
			$h5_font_size_min        = $h5_font_size_max * $heading_font_sensitive;
			$h5_font_size_responsive = "calc($h5_font_size_min$px + ($h5_font_size_max - $h5_font_size_min) * ((100vw - 554px) / 646))";

			// Responsive H6 font-size.
			$h6_font_size_max        = Businext::setting( 'h6_font_size' );
			$h6_font_size_min        = $h6_font_size_max * $heading_font_sensitive;
			$h6_font_size_responsive = "calc($h6_font_size_min$px + ($h6_font_size_max - $h6_font_size_min) * ((100vw - 554px) / 646))";

			$body_typo     = Businext::setting( 'typography_body' );
			$_primary_font = $body_typo['font-family'];

			$extra_style = "
				.primary-font, .tm-button, button, input, select, textarea{ font-family: $_primary_font }
				.primary-font-important { font-family: $_primary_font !important }
				h1,.h1{font-size: $h1_font_size_min$px}
				h2,.h2{font-size: $h2_font_size_min$px}
				h3,.h3{font-size: $h3_font_size_min$px}
				h4,.h4{font-size: $h4_font_size_min$px}
				h5,.h5{font-size: $h5_font_size_min$px}
				h6,.h6{font-size: $h6_font_size_min$px}

				@media (min-width: 544px) and (max-width: 1199px) {
					h1,.h1{font-size: $h1_font_size_responsive}
					h2,.h2{font-size: $h2_font_size_responsive}
					h3,.h3{font-size: $h3_font_size_responsive}
					h4,.h4{font-size: $h4_font_size_responsive}
					h5,.h5{font-size: $h5_font_size_responsive}
					h6,.h6{font-size: $h6_font_size_responsive}
				}
			";

			$custom_logo_width        = Businext_Helper::get_post_meta( 'custom_logo_width', '' );
			$custom_sticky_logo_width = Businext_Helper::get_post_meta( 'custom_sticky_logo_width', '' );

			if ( $custom_logo_width !== '' ) {
				$extra_style .= ".branding__logo img { 
                    width: {$custom_logo_width} !important; 
                }";
			}

			if ( $custom_sticky_logo_width !== '' ) {
				$extra_style .= ".headroom--not-top .branding__logo .sticky-logo { 
                    width: {$custom_sticky_logo_width} !important; 
                }";
			}

			$headerStickyHeight = Businext::setting( 'header_sticky_height' );
			$stickyPadding      = $headerStickyHeight + 30;
			if ( is_admin_bar_showing() ) {
				$stickyPadding += 32;
			}

			$extra_style .= ".tm-sticky-kit.is_stuck { 
				padding-top: {$stickyPadding}px; 
			}";

			$site_width = Businext_Helper::get_post_meta( 'site_width', '' );
			if ( $site_width === '' ) {
				$site_width = Businext::setting( 'site_width' );
			}

			if ( $site_width !== '' ) {
				$extra_style .= "
				.boxed
				{
	                max-width: $site_width;
	            }";
			}

			$tmp = '';

			$site_background_color = Businext_Helper::get_post_meta( 'site_background_color', '' );
			if ( $site_background_color !== '' ) {
				$tmp .= "background-color: $site_background_color !important;";
			}

			$site_background_image = Businext_Helper::get_post_meta( 'site_background_image', '' );
			if ( $site_background_image !== '' ) {
				$site_background_repeat = Businext_Helper::get_post_meta( 'site_background_repeat', '' );
				$tmp                    .= "background-image: url( $site_background_image ) !important; background-repeat: $site_background_repeat !important;";
			}

			$site_background_position = Businext_Helper::get_post_meta( 'site_background_position', '' );
			if ( $site_background_position !== '' ) {
				$tmp .= "background-position: $site_background_position !important;";
			}

			$site_background_size = Businext_Helper::get_post_meta( 'site_background_size', '' );
			if ( $site_background_size !== '' ) {
				$tmp .= "background-size: $site_background_size !important;";
			}

			$site_background_attachment = Businext_Helper::get_post_meta( 'site_background_attachment', '' );
			if ( $site_background_attachment !== '' ) {
				$tmp .= "background-attachment: $site_background_attachment !important;";
			}

			if ( $tmp !== '' ) {
				$extra_style .= "body { $tmp; }";
			}

			$tmp = '';

			$content_background_color = Businext_Helper::get_post_meta( 'content_background_color', '' );
			if ( $content_background_color !== '' ) {
				$tmp .= "background-color: $content_background_color !important;";
			}

			$content_background_image = Businext_Helper::get_post_meta( 'content_background_image', '' );
			if ( $content_background_image !== '' ) {
				$content_background_repeat = Businext_Helper::get_post_meta( 'content_background_repeat', '' );
				$tmp                       .= "background-image: url( $content_background_image ) !important; background-repeat: $content_background_repeat !important;";
			}

			$content_background_position = Businext_Helper::get_post_meta( 'content_background_position', '' );
			if ( $content_background_position !== '' ) {
				$tmp .= "background-position: $content_background_position !important;";
			}

			if ( $tmp !== '' ) {
				$extra_style .= ".site { $tmp; }";
			}

			$tmp = '';

			$content_padding = Businext_Helper::get_post_meta( 'content_padding' );
			if ( $content_padding === '0' ) {
				$tmp .= 'padding-top: 0 !important;';
				$tmp .= 'padding-bottom: 0 !important;';
			} elseif ( $content_padding === 'top' ) {
				$tmp .= 'padding-top: 0 !important;';
			} elseif ( $content_padding === 'bottom' ) {
				$tmp .= 'padding-bottom: 0 !important;';
			}

			if ( $tmp !== '' ) {
				$extra_style .= ".page-content { $tmp; }";
			}

			$extra_style .= $this->primary_color_css();
			$extra_style .= $this->secondary_color_css();
			$extra_style .= $this->header_css();
			$extra_style .= $this->sidebar_css();
			$extra_style .= $this->title_bar_css();
			$extra_style .= $this->mobile_menu_css();
			$extra_style .= $this->light_gallery_css();

			//$extra_style = Businext_Minify::css( $extra_style );

			wp_add_inline_style( 'businext-style', html_entity_decode( $extra_style, ENT_QUOTES ) );
		}

		function header_css() {
			$header_type = Businext_Global::instance()->get_header_type();
			$css         = '';

			$nav_bg_type = Businext::setting( "header_style_{$header_type}_navigation_background_type" );

			if ( $nav_bg_type === 'gradient' ) {

				$gradient = Businext::setting( "header_style_{$header_type}_navigation_background_gradient" );
				$_color_1 = $gradient['from'];
				$_color_2 = $gradient['to'];

				$css .= "
				.header-$header_type .header-below {
					background: {$_color_1};
                    background: -webkit-linear-gradient(-136deg, {$_color_2} 0%, {$_color_1} 100%);
                    background: linear-gradient(-136deg, {$_color_2} 0%, {$_color_1} 100%);
				}";
			}

			return $css;
		}

		function sidebar_css() {
			$css = '';

			$page_sidebar1  = Businext_Global::instance()->get_sidebar_1();
			$page_sidebar2  = Businext_Global::instance()->get_sidebar_2();
			$sidebar_status = Businext_Global::instance()->get_sidebar_status();

			if ( 'none' !== $page_sidebar1 ) {

				if ( $sidebar_status === 'both' ) {
					$sidebars_breakpoint = Businext::setting( 'both_sidebar_breakpoint' );
				} else {
					$sidebars_breakpoint = Businext::setting( 'one_sidebar_breakpoint' );
				}

				$sidebars_below = Businext::setting( 'sidebars_below_content_mobile' );

				if ( 'none' !== $page_sidebar2 ) {
					$sidebar_width  = Businext::setting( 'dual_sidebar_width' );
					$sidebar_offset = Businext::setting( 'dual_sidebar_offset' );
					$content_width  = 100 - $sidebar_width * 2;
				} else {
					$sidebar_width  = Businext_Global::instance()->get_single_sidebar_width();
					$sidebar_offset = Businext::setting( 'single_sidebar_offset' );
					$content_width  = 100 - $sidebar_width;
				}

				$css .= "
				@media (min-width: {$sidebars_breakpoint}px) {
					.page-sidebar {
						flex: 0 0 $sidebar_width%;
						max-width: $sidebar_width%;
					}
					.page-main-content {
						flex: 0 0 $content_width%;
						max-width: $content_width%;
					}
				}
				@media (min-width: 1200px) {
					.page-sidebar-left .page-sidebar-inner {
						padding-right: $sidebar_offset;
					}
					.page-sidebar-right .page-sidebar-inner {
						padding-left: $sidebar_offset;
					}
				}";

				$_max_width_breakpoint = $sidebars_breakpoint - 1;

				if ( $sidebars_below === '1' ) {
					$css .= "
					@media (max-width: {$_max_width_breakpoint}px) {
						.page-sidebar {
							margin-top: 100px;
						}
					
						.page-main-content {
							-webkit-order: -1;
							-moz-order: -1;
							order: -1;
						}
					}";
				}
			}

			return $css;
		}

		function title_bar_css() {
			$css = $title_bar_tmp = $overlay_tmp = '';

			$bg_color   = Businext_Helper::get_post_meta( 'page_title_bar_background_color', '' );
			$bg_image   = Businext_Helper::get_post_meta( 'page_title_bar_background', '' );
			$bg_overlay = Businext_Helper::get_post_meta( 'page_title_bar_background_overlay', '' );

			if ( $bg_color !== '' ) {
				$title_bar_tmp .= "background-color: {$bg_color}!important;";
			}

			if ( $bg_image !== '' ) {
				$title_bar_tmp .= "background-image: url({$bg_image})!important;";
			}

			if ( $bg_overlay !== '' ) {
				$overlay_tmp .= "background-color: {$bg_overlay}!important;";
			}

			if ( $title_bar_tmp !== '' ) {
				$css .= ".page-title-bar-inner{ {$title_bar_tmp} }";
			}

			if ( $overlay_tmp !== '' ) {
				$css .= ".page-title-bar-overlay{ {$overlay_tmp} }";
			}

			return $css;
		}

		function mobile_menu_css() {
			$css = '';

			$bg_type  = Businext::setting( 'mobile_menu_bg_type' );
			$_color_1 = Businext::setting( 'mobile_menu_bg_color_1' );
			$_color_2 = Businext::setting( 'mobile_menu_bg_color_2' );
			if ( $bg_type === 'gradient' ) {
				$css .= ".page-mobile-main-menu {
                	background: {$_color_2};
                    background: -webkit-linear-gradient(-151deg, {$_color_1} 0%,{$_color_2} 100%);
                    background: linear-gradient(-151deg, {$_color_1} 0%,{$_color_2} 100%);
                }";
			} else {
				$css .= ".page-mobile-main-menu {
                	background: {$_color_1};
                }";
			}

			return $css;
		}

		function primary_color_css() {
			$color     = Businext::setting( 'primary_color' );
			$secondary = Businext::setting( 'secondary_color' );
			$alpha90   = Businext_Color::hex2rgba( $color, '0.9' );
			$alpha80   = Businext_Color::hex2rgba( $color, '0.8' );
			$alpha70   = Businext_Color::hex2rgba( $color, '0.7' );
			$alpha40   = Businext_Color::hex2rgba( $color, '0.4' );
			$alpha33   = Businext_Color::hex2rgba( $color, '0.33' );
			$alpha13   = Businext_Color::hex2rgba( $color, '0.13' );
			$alpha09   = Businext_Color::hex2rgba( $color, '0.09' );
			$alpha14   = Businext_Color::hex2rgba( $color, '0.14' );

			// Color.
			$css = "
				input[type='text']:focus,
                input[type='email']:focus,
                input[type='url']:focus,
                input[type='password']:focus,
                input[type='search']:focus,
                input[type='number']:focus,
                input[type='tel']:focus,
                input[type='range']:focus,
                input[type='date']:focus,
                input[type='month']:focus,
                input[type='week']:focus,
                input[type='time']:focus,
                input[type='datetime']:focus,
                input[type='datetime-local']:focus,
                input[type='color']:focus, textarea:focus,
                select:focus,
                mark,
                .page-close-mobile-menu:hover,
                .growl-close:hover,
                .primary-color,
                .tm-button.style-flat.tm-button-primary:hover,
				.tm-button.style-outline.tm-button-primary,
				.tm-button.style-text.tm-button-primary,
				.tm-button.style-text.tm-button-primary:hover .button-icon,
				.tm-button.style-border-text-02.tm-button-primary .button-icon,
				.tm-button.style-border-text-02.tm-button-primary:hover .button-text,
				.tm-box-icon .tm-button .button-icon,
				.tm-box-icon .tm-button:hover,
				.tm-box-icon.style-1 .icon,
				.tm-box-icon.style-3 .icon,
				.tm-box-icon.style-5 .icon,
				.tm-box-icon.style-7 .icon,
				.tm-box-icon.style-9 .icon,
				.tm-box-icon.style-13 .icon,
				.tm-box-icon.style-14 .icon,
				.tm-box-icon.style-15 .icon,
				.tm-box-icon.style-20 .tm-box-icon__btn:hover,
				.tm-box-icon.style-21 .icon,
				.tm-counter.style-01 .number-wrap,
				.tm-counter.style-02 .text,
				.tm-counter.style-05 .icon,
				.tm-counter.style-05 .number-wrap,
				.tm-counter.style-06 .number-wrap,
				.tm-circle-progress-chart .chart-icon,
				.tm-maps.overlay-style-02 .middle-dot,
				.tm-product-banner-slider .tm-product-banner-btn,
				.tm-countdown.skin-dark .number,
				.tm-countdown.skin-dark .separator,
				.tm-drop-cap.style-1 .drop-cap,
				.typed-text mark,
				.typed-text .typed-cursor,
				.tm-twitter.style-slider-quote .tweet-info:before,
				.tm-twitter.style-slider-quote .tweet-text a,
				.tm-twitter .tweet:before,
				.tm-heading.modern-with-separator .heading,
				.tm-info-boxes .box-icon,
				.tm-info-boxes .tm-button .button-icon,
				.tm-team-member .social-networks a:hover,
				.tm-instagram .instagram-user-name,
				.tm-blog .post-title a:hover,
				.tm-blog .post-categories a:hover,
				.tm-blog.style-list .post-read-more .btn-icon,
				.tm-blog.style-list .post-categories,
				.tm-blog.style-list .post-author-meta a:hover,
				.tm-blog.style-grid_classic_01 .post-read-more .btn-icon,
				.tm-blog.style-grid_classic_02 .post-categories,
				.tm-blog.style-grid_classic_02 .post-author-meta a:hover,
				.tm-blog.style-01 .post-categories,
				.tm-blog.style-grid_classic_04 .post-date span,
				.tm-blog.style-metro .post-date span,
				.tm-blog.style-carousel_02 .post-read-more a,
				.tm-blog.style-carousel_02 .post-read-more .btn-icon,
				.tm-portfolio [data-overlay-animation='faded-light'] .post-overlay-title a:hover,
				.tm-portfolio [data-overlay-animation='faded-light'] .post-overlay-categories a:hover,
				.tm-portfolio [data-overlay-animation='zoom'] .post-overlay-title a:hover,
				.tm-portfolio [data-overlay-animation='zoom'] .post-overlay-categories a:hover,
				.tm-portfolio [data-overlay-animation='zoom2'] .post-item-wrapper:hover .post-overlay-title,
				.tm-portfolio.style-full-wide-slider .post-overlay-categories a:hover,
				.tm-case-study .post-title a:hover,
				.tm-case-study .post-categories,
				.tm-case-study.style-simple-list .grid-item:hover .post-title,
				.tm-service .post-read-more .btn-icon,
				.tm-service-feature.style-01 .icon,
				.tm-category-feature.style-01 .icon,
				.tm-product.style-grid .woosw-btn.woosw-added,
				.tm-product.style-grid .wooscp-btn.wooscp-btn-added,
				.tm-pricing .feature-icon,
				.tm-pricing.style-1 .price-wrap-inner,
				.tm-pricing.style-1 .tm-pricing-list li:before,
				.tm-pricing.style-2 .price-wrap-inner,
				.tm-pricing.style-2 .tm-pricing-list li:before,
				.tm-pricing.style-3 .price-wrap-inner,
				.tm-pricing-rotate-box .tm-pricing-list li:before,
				.tm-service-pricing-menu .service-cost,
				.tm-testimonial.style-3 .testimonial-by-line,
				.tm-testimonial.style-8 .testimonial-name,
				.tm-team-member.style-2 .position,
				.tm-list .marker,
				.tm-list .link:hover,
				.tm-accordion.style-1 .accordion-title:hover,
				.tm-accordion.style-1 .active .accordion-title,
				.tm-social-networks .link:hover,
				.woosw-area .woosw-inner .woosw-content .woosw-content-top .woosw-close:hover,
				.woosw-area .woosw-inner .woosw-content .woosw-content-bot .woosw-content-bot-inner .woosw-page a:hover,
				.woosw-continue:hover,
				.skin-primary .wpcf7-text.wpcf7-text, .skin-primary .wpcf7-textarea,
				.tm-menu .menu-price,
				.page-content .tm-custom-menu.style-1 .menu a:hover,
				.post-share a:hover,
				.post-share-toggle,
				.single-post .post-categories a:hover,
				.single-post .post-meta .meta-icon, .single-post .post-meta .sl-icon,
				.single-post .entry-banner .post-meta a:hover,
				.related-posts .related-post-title a:hover,
				.single-portfolio .related-portfolio-wrap .post-overlay-title a:hover,
				.single-portfolio .portfolio-categories a:hover,
				.single-case_study .entry-banner .post-categories,
				.tm-posts-widget .post-date:before,
				.simple-footer .social-networks a:hover,
				.widget_recent_entries .post-date:before,
				.tm-mailchimp-form.style-3 .form-submit,
				.tm-mailchimp-form.style-5 .form-submit:hover,
				.tm-mailchimp-form.style-6 .form-submit,
				.page-sidebar-fixed .widget a:hover,
				.top-bar-office-wrapper .office-list a:hover,
				.menu--primary .menu-item-feature,
				.nav-links a:hover:after,
				.page-main-content .search-form .search-submit:hover .search-btn-icon,
				.widget_search .search-submit:hover .search-btn-icon, .widget_product_search .search-submit:hover .search-btn-icon,
				.nav-links a:hover div,
				.page-links > span, .page-links > a:hover, .page-links > a:focus,
				.comment-nav-links li a:hover, .comment-nav-links li a:focus,
				.page-pagination li a:hover, .page-pagination li a:focus
				{ 
					color: {$color} 
				}";

			// Color Important.
			$css .= "
                .primary-color-important,
				.primary-color-hover-important:hover
				 {
                      color: {$color}!important;
				 }";

			// Background Color.
			$css .= "
                .primary-background-color,
                .hint--primary:after,
                .page-scroll-up,
                .widget_calendar #today,
                .top-bar-01 .top-bar-button,
                .desktop-menu .header-09 .header-special-button,
                .tm-accordion.style-2 .accordion-title:after,
                .tm-accordion.style-3 .active .accordion-title,
                .tm-accordion.style-3 .accordion-title:hover,
				.tm-maps.overlay-style-01 .animated-dot .middle-dot,
				.tm-maps.overlay-style-01 .animated-dot div[class*='signal'],
				.tm-card.style-2 .icon:before,
				.tm-gallery .overlay,
				.tm-grid-wrapper .btn-filter:after,
				.tm-grid-wrapper .filter-counter,
				.tm-blog.style-list .post-quote,
				.tm-blog.style-grid_classic_01 .post-date,
				.tm-blog.style-grid_classic_02 .post-date,
				.tm-blog.style-01 .post-read-more,
				.tm-blog.style-grid_classic_04 .post-categories a,
				.tm-blog.style-metro .post-categories a,
				.tm-blog.style-grid_classic_05 .post-categories a,
				.tm-portfolio [data-overlay-animation='zoom2'] .post-item-wrapper:hover .post-read-more,
				.tm-case-study.style-grid .post-thumbnail-wrap:hover .post-read-more,
				.tm-service.style-01 .post-item-wrap:hover .btn-circle-read-more,
				.tm-service.style-carousel_02 .post-info:after,
				.tm-service.style-carousel_04 .post-read-more a:after,
				.tm-service.style-carousel_05 .post-item-wrap:hover .post-read-more,
				.tm-service-feature.style-01 .current .post-item-wrap,
				.tm-service-feature.style-01 .grid-item:hover .post-item-wrap,
				.tm-category-feature.style-01 .current .cat-item-wrap,
				.tm-category-feature.style-01 .grid-item:hover .cat-item-wrap,
				.tm-drop-cap.style-2 .drop-cap,
				.tm-box-icon.style-5 .content-wrap:after,
				.tm-box-icon.style-9 .content-wrap:after,
				.tm-box-icon.style-10 .icon,
				.tm-box-icon.style-13 .tm-box-icon__btn,
				.tm-box-icon.style-14 .tm-box-icon__btn:after,
				.tm-box-icon.style-20 .tm-box-icon__btn:after,
				.tm-box-icon.style-21 .content:after,
				.tm-icon.style-01 .icon,
				.tm-contact-form-7.style-02 .wpcf7-submit:hover,
				.tm-contact-form-7.style-03 .wpcf7-submit:hover,
				.tm-mailchimp-form.style-2 .form-submit,
				.tm-mailchimp-form.style-2 .form-submit:hover,
				.tm-mailchimp-form.style-9 .form-submit:hover,
				.tm-contact-form-7.style-07 .wpcf7-submit,
				.tm-contact-form-7.style-07 .wpcf7-submit:hover,
				.tm-card.style-1,
				.tm-counter.style-05 .counter-wrap:after,
				.tm-list.style-modern-icon .marker,
				.tm-list.style-modern-icon-02 .marker,
				.tm-list.style-modern-icon-05 .list-item:hover .marker,
				.tm-rotate-box .box,
				.tm-social-networks.style-solid-rounded-icon .item:hover .link,
				.tm-social-networks.style-solid-rounded-icon-02 .item:hover .link,
				.tm-separator.style-thick-short-line .separator-wrap,
				.tm-button.style-flat.tm-button-primary,
				.tm-button.style-outline.tm-button-primary:hover,
				.tm-button.style-border-icon,
				.tm-button.style-modern,
				.tm-callout-box.style-01,
				.tm-heading.thick-separator .separator:after,
				.tm-heading.modern-with-separator-02 .heading:after,
				.tm-box-icon.style-8 .icon,
				.tm-testimonial.style-2 .testimonial-item:after,
				.tm-gradation .count-wrap:before, .tm-gradation .count-wrap:after,
				.vc_progress_bar .vc_general.vc_single_bar .vc_bar,
				.tm-popup-video.style-poster-02 .video-play,
				.tm-swiper .swiper-nav-button:hover,
				.tm-swiper .swiper-pagination-bullet:hover:before,
				.tm-swiper .swiper-pagination-bullet.swiper-pagination-bullet-active:before,
				.tm-testimonial.style-4 .swiper-custom-btn:hover,
				.tm-testimonial.style-5 .line:after,
				.tm-testimonial-list .testimonial-icon,
				.tm-timeline.style-01 .heading:before,
				.tm-timeline.style-01 .dot:after,
				.tm-slider-button.style-02 .slider-btn:hover,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-style-businext-01 .vc_tta-tab.vc_active > a,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-style-businext-01 .vc_tta-tab:hover > a,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-style-businext-01 .vc_active .vc_tta-panel-heading,
				.post-share .post-share-list a:hover,   
				.single-post .post-quote-overlay,
				.page-sidebar .widget_pages .current-menu-item,
				.page-sidebar .widget_nav_menu .current-menu-item,
				.page-sidebar .insight-core-bmw .current-menu-item,
				.post-type-service .page-sidebar .widget_pages .current-menu-item,
				.post-type-service .page-sidebar .widget_nav_menu .current-menu-item,
				.post-type-service .page-sidebar .insight-core-bmw .current-menu-item,
				.page-sidebar .widget_pages a:hover,
				.page-sidebar .widget_nav_menu a:hover,
				.page-sidebar .insight-core-bmw a:hover,
				.widget_archive a:hover,
				.widget_categories a:hover,
				.widget_categories .current-cat-ancestor > a,
				.widget_categories .current-cat-parent  > a,
				.widget_categories .current-cat  > a,
				.portfolio-details-gallery .gallery-item .overlay,
				.tagcloud a:hover,
				.single-post .post-tags a:hover,
				.tm-search-form .category-list a:hover,
				.select2-container--default .select2-results__option--highlighted[aria-selected]
				{
					background-color: {$color};
				}";

			$css .= "
                .primary-background-color-important,
				.primary-background-color-hover-important:hover,
				.wooscp-area .wooscp-inner .wooscp-bar .wooscp-bar-btn,
				.lg-progress-bar .lg-progress
				{
					background-color: {$color}!important;
				}";

			$css .= "
                .btn-view-full-map
				{
					background-color: {$alpha70};
				}";

			$css .= "
                .tm-popup-video.style-poster-01 .video-overlay
				{
					background-color: {$alpha80};
				}";

			$css .= "
                .tm-timeline.style-01 .dot
				{
					background-color: {$alpha09};
				}";

			$css .= "
                .tm-timeline.style-01 .dot:before
				{
					background-color: {$alpha14};
				}";

			// Border.
			$css .= "
				.primary-border-color,
                input[type='text']:focus,
                input[type='email']:focus,
                input[type='url']:focus,
                input[type='password']:focus,
                input[type='search']:focus,
                input[type='number']:focus,
                input[type='tel']:focus,
                input[type='range']:focus,
                input[type='date']:focus,
                input[type='month']:focus,
                input[type='week']:focus,
                input[type='time']:focus,
                input[type='datetime']:focus,
                input[type='datetime-local']:focus,
                input[type='color']:focus, textarea:focus,
                select:focus,
                .header-search-form-wrap .search-form .search-field:focus,
                .widget .mc4wp-form input[type=email]:focus,
				.tm-button.style-outline.tm-button-primary,
				.tm-button.style-flat.tm-button-primary,
				.tm-button.style-border-icon,
				.tm-button.style-border-text-02.tm-button-primary:hover:after,
				.tm-box-icon.style-13:hover .content-wrap,
				.tm-service.style-01 .post-read-more,
				.tm-case-study.style-grid .post-thumbnail-wrap:hover .post-read-more,
				.tm-pricing.style-1 .inner,
				.tm-pricing.style-3.tm-pricing-featured .inner:after,
				.tm-contact-form-7.style-02 .wpcf7-text:focus,
				.tm-contact-form-7.style-02 .wpcf7-date:focus,
				.tm-contact-form-7.style-02 .wpcf7-select:focus,
				.tm-contact-form-7.style-02 .wpcf7-textarea:focus,
				.tm-contact-form-7.style-03 .wpcf7-text:focus,
				.tm-contact-form-7.style-03 .wpcf7-date:focus,
				.tm-contact-form-7.style-03 .wpcf7-select:focus,
				.tm-contact-form-7.style-03 .wpcf7-textarea:focus,
				.tm-list.style-modern-icon-05 .marker,
				.tm-mailchimp-form.style-9 input[type='email']:focus,
				.tm-swiper .swiper-nav-button:hover,
				.tm-swiper .swiper-pagination-bullet:hover:before, .tm-swiper .swiper-pagination-bullet.swiper-pagination-bullet-active:before,
				.tm-social-networks.style-solid-rounded-icon .item:hover .link,
				.tm-social-networks.style-solid-rounded-icon-02 .item:hover .link,
				.tm-testimonial.style-4 .swiper-custom-btn:hover,
				.widget_archive a:hover,
				.widget_categories a:hover,
				.widget_categories .current-cat-ancestor > a,
				.widget_categories .current-cat-parent > a,
				.widget_categories .current-cat > a,
				.widget_pages .current-menu-item, .widget_nav_menu .current-menu-item, .insight-core-bmw .current-menu-item,
				.post-type-service .page-sidebar .widget_pages .current-menu-item,
				.post-type-service .page-sidebar .widget_nav_menu .current-menu-item,
				.post-type-service .page-sidebar .insight-core-bmw .current-menu-item,
				.post-share-toggle:hover
				{
					border-color: {$color};
				}";


			// Border Important.
			$css .= "
                .primary-border-color-important,
				.primary-border-color-hover-important:hover,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-style-businext-02 .vc_tta-tab:hover > a,
				.wpb-js-composer .vc_tta.vc_general.vc_tta-style-businext-02 .vc_tta-tab.vc_active > a,
				.tm-maps.overlay-style-02 .animated-dot .signal2,
				.lg-outer .lg-thumb-item.active, .lg-outer .lg-thumb-item:hover,
				#fp-nav ul li a.active span, .fp-slidesNav ul li a.active span
				{
					border-color: {$color}!important;
				}";

			// Border Top.
			$css .= "
                .tm-grid-wrapper .filter-counter:before,
                .hint--primary.hint--top-left:before,
                .hint--primary.hint--top-right:before,
                .hint--primary.hint--top:before 
                {
					border-top-color: {$color};
				}";

			// Border Right.
			$css .= "
                .hint--primary.hint--right:before
                {
					border-right-color: {$color};
				}";

			// Border Bottom.
			$css .= "
                .hint--primary.hint--bottom-left:before,
                .hint--primary.hint--bottom-right:before,
                .hint--primary.hint--bottom:before
                {
					border-bottom-color: {$color};
				}";

			$css .= "
                blockquote,
                .hint--primary.hint--left:before
                {
                    border-left-color: {$color};
                }";

			$css .= "
				.tm-box-icon.style-8:hover .icon {
					box-shadow: 0 2px 30px $alpha33;
				}   
				";

			$css .= "
				.tm-box-icon.style-10:hover .icon {
					box-shadow: 0 2px 30px $alpha40;
				}   
				";

			$css .= "
				.tm-popup-video.style-poster-01 
				{
					box-shadow: 0 0 40px $alpha40;
				}";

			$css .= ".tm-maps.overlay-style-02 .animated-dot .signal2
			{
				box-shadow: inset 0 0 35px 10px {$color};
			}";

			$css .= ".tm-contact-form-7 textarea:focus, .tm-contact-form-7 input:focus, .tm-contact-form-7 select:focus
			{
				box-shadow: 0 0 30px {$alpha13}; 
			}";

			$css .= ".testimonial-info svg *
			{
				fill: {$color}; 
			}";

			$css .= "
			.tm-box-icon.style-4 .icon:before {
				background-image: linear-gradient(-146deg, {$color} 5%, #ffffff 100%);
			}
			";

			$css .= "
			.tm-box-icon.style-7 .icon:before {
				background-image: linear-gradient({$color} 0%, #ffffff 100%);
			}
			";

			$css .= "
			.tm-heading.medium-separator .separator:after,
			.tm-heading.above-medium-separator .separator:after,
			.tm-pricing-rotate-box .title
			 {
				background-color: $color;
				background-image: linear-gradient(136deg, {$color} 0%, {$secondary} 100%);
			}";

			$css .= "
			.tm-contact-form-7.style-06 input[type='submit'],
			.tm-contact-form-7.style-06 input[type='reset'],
			.tm-contact-form-7.style-06 button
			 {
				background-color: $color;
				background-image: linear-gradient(136deg, {$color} 0%, {$secondary} 50%,  {$color} 100%);
			}";

			$css .= "
			.tm-mailchimp-form.style-8 .form-submit
			 {
				background-color: $color;
				background-image: linear-gradient(-136deg, {$color} 0%, {$secondary} 50%,  {$color} 100%);
			}";

			$css .= "
			.tm-popup-video.style-poster-02 .video-play {
				box-shadow: 0 2px 20px {$color};
			}
			";

			$css .= "
			.tm-box-icon.style-13 .icon:before {
				background-image: linear-gradient(0deg, #FFFFFF 32%, {$color} 100%);
			}
			";

			if ( Businext_Helper::active_woocommerce() ) {
				$css .= "
				.woocommerce .cart_list.product_list_widget a:hover,
				.woocommerce ul.product_list_widget li .product-title:hover,
				.woocommerce.single-product div.product .product-meta a:hover,
                .woocommerce.single-product div.product .single_add_to_cart_button:hover,
                .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
                .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
                .woocommerce .quantity button:hover span,
                .woocommerce nav.woocommerce-pagination ul li a:focus,
                .woocommerce nav.woocommerce-pagination ul li a:hover,
				.woocommerce-Price-amount, .amount, .woocommerce div.product p.price, .woocommerce div.product span.price,
				.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover,
				.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce a.button.alt:hover, .woocommerce input.button.alt:hover, .button:hover,
				.woocommerce-Price-amount, .amount, .woocommerce div.product p.price, .woocommerce div.product span.price {
					color: {$color}
				}";

				$css .= "
				.woocommerce-MyAccount-navigation .is-active a,
				.woocommerce-MyAccount-navigation a:hover,
                .tm-product.style-grid .woocommerce_loop_add_to_cart_wrap a:hover,
                .tm-product.style-grid .quickview-icon:hover,
                .tm-product.style-grid .wooscp-btn:hover,
                .tm-product.style-grid .woosw-btn:hover,
                .widget_product_categories a:hover,
                .widget_product_categories .current-cat > a,
                .single-product .woosw-btn:hover,
                .single-product .wooscp-btn:hover,
				.woocommerce.single-product div.product .single_add_to_cart_button,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
				.woocommerce .widget_price_filter .price_slider_amount .button:hover { 
					background-color: {$color}; 
				}";

				$css .= "
				.woocommerce.single-product div.product .single_add_to_cart_button,
				.single-product .woosw-btn:hover,
				.single-product .wooscp-btn:hover,
				body.woocommerce-cart table.cart td.actions .coupon .input-text:focus,
				.woocommerce div.quantity .qty:focus,
				.woocommerce .widget_price_filter .price_slider_amount .button:hover,
				.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.button.alt, .woocommerce input.button.alt, .button {
					border-color: {$color};
				}";

				$css .= "
                .mini-cart .widget_shopping_cart_content,
				.woocommerce.single-product div.product .woocommerce-tabs ul.tabs li.active,
				.woocommerce .select2-container .select2-choice {
					border-bottom-color: {$color};
				}";
			}

			return $css;
		}

		function secondary_color_css() {
			$color = Businext::setting( 'secondary_color' );

			// Color.
			$css = "
				.secondary-color,
				.topbar a,
				.tm-button.tm-button-secondary.style-text,
				.tm-button.tm-button-secondary.style-text:hover .button-icon,
				.tm-button.style-border-text-02.tm-button-secondary .button-icon,
				.tm-button.style-border-text-02.tm-button-secondary:hover .button-text,
				.tm-button,
				.tm-button.style-flat.tm-button-secondary:hover,
				.tm-box-icon.style-4 .icon,
				.tm-box-icon.style-10 .icon,
				.tm-contact-form-7.style-04 .wpcf7-submit:hover,
				.tm-contact-form-7.style-04 .wpcf7-form-control-wrap,
				.tm-contact-form-7.style-07 .wpcf7-form-control-wrap,
				.tm-twitter.style-slider-quote .tweet-text a:hover,
				.tm-blog.style-list .post-categories a:hover,
				.tm-blog.style-grid_classic_02 .post-categories a:hover,
				.tm-blog.style-01 .post-categories a:hover,
				.tm-portfolio [data-overlay-animation='faded'] .post-overlay-title a:hover,
				.tm-portfolio [data-overlay-animation='faded'] .post-overlay-categories,
				.tm-portfolio [data-overlay-animation='modern'] .post-overlay-title a:hover,
				.tm-portfolio [data-overlay-animation='modern'] .post-overlay-categories,
				.tm-portfolio.style-full-wide-slider .post-overlay-categories,
				.tm-portfolio.style-full-wide-slider .post-overlay-title a:hover,
				.tm-popup-video .video-button,
				.tm-mailchimp-form.style-6 input[type='email'],
				.tm-mailchimp-form.style-2 .form-submit:hover,
				.tm-mailchimp-form.style-5 .form-submit,
				.single-portfolio .portfolio-link a,
				.single-portfolio .portfolio-link a:hover span,
				.related-portfolio-item .post-overlay-categories,
				.single-post .post-link a,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-title>a,
				.comment-list .comment-datetime:before
				{
					color: {$color} 
				}";

			// Color Important.
			$css .= "
				.secondary-color-important,
				.secondary-color-hover-important:hover
				{
					color: {$color}!important;
				}";

			// Background Color.
			$css .= "
				.secondary-background-color,
				.tm-blog.style-01 .post-read-more:hover,
				.tm-box-icon.style-14 .content-wrap:before,
				.tm-heading.above-thick-separator .separator:after,
				.tm-heading.beside-thick-separator:before,
				.tm-button.style-flat.tm-button-secondary,
				.tm-button.style-outline.tm-button-secondary:hover,
				.tm-button.style-modern:after,
				.tm-button.style-border-icon:after,
				.tm-contact-form-7.style-04 .wpcf7-submit,
				.tm-list.style-modern-icon-02 .list-item:hover .marker,
				.widget_archive .count,
				.widget_categories .count,
				.widget_product_categories .count,
				.top-bar-01 .top-bar-button:hover,
				.tm-search-form .search-submit:hover,
				.tm-contact-form-7.style-07 .wpcf7-submit:after,
				.tm-contact-form-7.style-07 .wpcf7-form-control-wrap:after,
				.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-tab>a,
				.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-tabs.vc_tta-color-secondary.vc_tta-style-modern .vc_tta-tab > a,
				.vc_tta-color-secondary.vc_tta-style-modern .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-color-secondary.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-body,
				.vc_tta-color-secondary.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-color-secondary.vc_tta-style-flat .vc_tta-tab>a,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel:not(.vc_active) .vc_tta-panel-heading:focus,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel:not(.vc_active) .vc_tta-panel-heading:hover,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-tab:not(.vc_active) >a:focus,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-tab:not(.vc_active) >a:hover
				{
					background-color: {$color};
				}";

			$css .= "
				.secondary-background-color-important,
				.secondary-background-color-hover-important:hover,
				.mejs-controls .mejs-time-rail .mejs-time-current
				{
					background-color: {$color}!important;
				}";

			$css .= ".secondary-border-color,
				.tm-button.style-outline.tm-button-secondary,
				.tm-button.style-border-text-02.tm-button-secondary:hover:after,
				.tm-button.style-border-icon:hover,
				.tm-contact-form-7.style-04 .wpcf7-submit,
				.tm-contact-form-7.style-07 .wpcf7-text:focus,
				.tm-contact-form-7.style-07 .wpcf7-date:focus,
				.tm-contact-form-7.style-07 .wpcf7-select:focus,
				.tm-contact-form-7.style-07 .wpcf7-textarea:focus,
				.tm-pricing.style-2 .inner,
				.vc_tta-color-secondary.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-heading,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-controls-icon::after,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-controls-icon::before,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body::after,
				.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body::before,
				.vc_tta-tabs.vc_tta-color-secondary.vc_tta-style-outline .vc_tta-tab > a
				{
					border-color: {$color};
				}";


			$css .= ".secondary-border-color-important,
				.secondary-border-color-hover-important:hover,
				.tm-button.style-flat.tm-button-secondary
				{
					border-color: {$color}!important;
				}";

			if ( Businext_Helper::active_woocommerce() ) {
				$css .= "
				.woocommerce .cart.shop_table td.product-subtotal,
				.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.button.alt, .woocommerce input.button.alt, .button
				{
					color: {$color}
				}";

				$css .= "
				.tm-product-search-form .search-submit:hover,
				.woocommerce .cats .product-category:hover .cat-text,
				.woocommerce .products div.product .product-overlay
				{ 
					background-color: {$color}; 
				}";

				$css .= "
				.woocommerce.single-product div.product .images .thumbnails .item img:hover,
				.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce a.button.alt:hover, .woocommerce input.button.alt:hover, .button:hover {
					border-color: {$color};
				}";
			}

			return $css;
		}

		function light_gallery_css() {
			$css                    = '';
			$primary_color          = Businext::setting( 'primary_color' );
			$secondary_color        = Businext::setting( 'secondary_color' );
			$cutom_background_color = Businext::setting( 'light_gallery_custom_background' );
			$background             = Businext::setting( 'light_gallery_background' );

			$tmp = '';

			if ( $background === 'primary' ) {
				$tmp .= "background-color: {$primary_color} !important;";
			} elseif ( $background === 'secondary' ) {
				$tmp .= "background-color: {$secondary_color} !important;";
			} else {
				$tmp .= "background-color: {$cutom_background_color} !important;";
			}

			$css .= ".lg-backdrop { $tmp }";

			return $css;
		}

		function get_typo_css( $typography ) {
			$css = '';

			if ( ! empty( $typography ) ) {
				foreach ( $typography as $attr => $value ) {
					if ( $attr === 'subsets' ) {
						continue;
					}
					if ( $attr === 'font-family' ) {
						$css .= "{$attr}: \"{$value}\", Helvetica, Arial, sans-serif;";
					} elseif ( $attr === 'variant' ) {
						$css .= "font-weight: {$value};";
					} else {
						$css .= "{$attr}: {$value};";
					}
				}
			}

			return $css;
		}
	}

	new Businext_Custom_Css();
}
