<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$loop = $equal_height = $auto_play = $nav = $pagination = $el_class = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-slider-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-product-banner-slider tm-swiper ' . $el_class, $this->settings['base'], $atts );

if ( $nav !== '' ) {
	$css_class .= " nav-style-$nav";
}

if ( $pagination !== '' ) {
	$css_class .= " pagination-style-$pagination";
}

if ( $equal_height === '1' ) {
	$css_class .= ' equal-height';
}

if ( $fw_image === '1' ) {
	$css_class .= ' fw-image';
}

if ( $v_center === '1' ) {
	$css_class .= ' v-center';
}

$items = (array) vc_param_group_parse_atts( $items );
?>
<?php if ( count( $items ) > 0 ) { ?>
	<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
		<?php
		if ( $items_display !== '' ) {
			$arr = explode( ';', $items_display );
			foreach ( $arr as $value ) {
				$tmp = explode( ':', $value );
				echo ' data-' . $tmp[0] . '-items="' . $tmp[1] . '"';
			}
		}
		?>

		<?php if ( $gutter > 1 ) : ?>
			data-lg-gutter="<?php echo esc_attr( $gutter ); ?>"
		<?php endif; ?>

		<?php if ( $nav !== '' ) : ?>
			data-nav="1"
		<?php endif; ?>

		<?php if ( $nav === 'custom' ) : ?>
			data-custom-nav="<?php echo esc_attr( $slider_button_id ); ?>"
		<?php endif; ?>

		<?php Businext_Helper::get_swiper_pagination_attributes( $pagination ); ?>

		<?php if ( $auto_play !== '' ) : ?>
			data-autoplay="<?php echo esc_attr( $auto_play ); ?>"
		<?php endif; ?>

		<?php if ( $loop === '1' ) : ?>
			data-loop="1"
		<?php endif; ?>
	>
		<div class="swiper-container">
			<div class="swiper-wrapper">
				<?php foreach ( $items as $item ) { ?>
					<div class="swiper-slide">
						<div>
							<div class="image-wrap">
								<div class="info"
									<?php if ( isset( $item['image'] ) ) : ?>
										<?php
										$image_url = wp_get_attachment_url( $item['image'] );

										if ( $image_size !== 'full' ) {
											$_sizes  = explode( 'x', $image_size );
											$_width  = $_sizes[0];
											$_height = $_sizes[1];

											$image_url = Businext_Helper::aq_resize( array(
												'url'    => $image_url,
												'width'  => $_width,
												'height' => $_height,
												'crop'   => true,
											) );
										}
										?>
										style="background-image: url(<?php echo esc_url( $image_url ); ?>)"
									<?php endif; ?>
								>
									<?php if ( isset( $item['sub_title'] ) ) : ?>
										<h6 class="sub-title"><?php echo esc_html( $item['sub_title'] ); ?></h6>
									<?php endif; ?>

									<?php if ( isset( $item['title'] ) ) : ?>
										<h5 class="heading"><?php echo esc_html( $item['title'] ); ?></h5>
									<?php endif; ?>

									<?php if ( isset( $item['text'] ) ) : ?>
										<div class="text"><?php echo esc_html( $item['text'] ); ?></div>
									<?php endif; ?>

									<?php
									if ( isset( $item['link'] ) ) {
										$link = vc_build_link( $item['link'] );
										if ( $link['url'] !== '' && $link['title'] !== '' ) {
											?>
											<a href="<?php echo esc_url( $link['url'] ); ?>"
											   class="tm-button style-flat tm-button-nm tm-product-banner-btn"
												<?php if ( $link['target'] !== '' ) : ?>
													target="<?php echo esc_attr( $link['target'] ); ?>"
												<?php endif; ?>
											>
												<?php echo esc_html( $link['title'] ); ?>
											</a>
											<?php
										}
									}
									?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<script>
        jQuery( document ).ready( function ( $ ) {
            var _slider = $( "<?php echo '#' . $css_id; ?>" );
            $( window ).on( 'load', function () {
                _slider.find( '.info' ).each( function () {
                    $( this ).css( {
                        minHeight: $( this ).outerWidth() + 'px'
                    } );
                } );
            } );

            $( window ).resize( function () {
                _slider.find( '.info' ).each( function () {
                    $( this ).css( {
                        minHeight: $( this ).outerWidth() + 'px'
                    } );
                } );
            } );
        } );
	</script>
<?php }
