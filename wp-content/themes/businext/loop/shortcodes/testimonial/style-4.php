<?php
extract( $businext_shortcode_atts );
$slider_classes = 'tm-swiper';

$slider_classes .= " equal-height";

if ( $nav !== '' ) {
	$slider_classes .= " nav-style-$nav";
}

if ( $pagination !== '' ) {
	$slider_classes .= " pagination-style-$pagination";
}
?>

<div class="<?php echo esc_attr( trim( $slider_classes ) ); ?>"
	<?php if ( $carousel_items_display !== '' ) {
		$arr = explode( ';', $carousel_items_display );
		foreach ( $arr as $value ) {
			$tmp = explode( ':', $value );
			echo ' data-' . $tmp[0] . '-items="' . $tmp[1] . '"';
		}
	}
	?>

	<?php if ( $carousel_gutter !== '' ) {
		$arr = explode( ';', $carousel_gutter );
		foreach ( $arr as $value ) {
			$tmp = explode( ':', $value );
			echo ' data-' . $tmp[0] . '-gutter="' . $tmp[1] . '"';
		}
	}
	?>

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

	 data-equal-height="1"

	 data-effect="fade"
>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php while ( $businext_query->have_posts() ) :
				$businext_query->the_post();

				$_meta = unserialize( get_post_meta( get_the_ID(), 'insight_testimonial_options', true ) );
				?>
				<div class="swiper-slide">

					<?php
					$_style = '';
					if ( has_post_thumbnail() ):
						$full_image_size = get_the_post_thumbnail_url( null, 'full' );
						$image_url       = Businext_Helper::aq_resize( array(
							'url'    => $full_image_size,
							'width'  => 1920,
							'height' => 650,
							'crop'   => true,
						) );

						$_style = "background-image: url( {$image_url} );";

					endif;
					?>
					<div class="testimonial-item"
						<?php if ( $_style !== '' ) : ?>
							style="<?php echo esc_attr( $_style ); ?>"
						<?php endif; ?>
					>
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-md-push-6 col-sm-9 col-sm-push-3 testimonial-content">
									<div class="testimonial-info">
										<svg width="91px" height="77px" viewBox="0 0 91 77" version="1.1"
										     xmlns="http://www.w3.org/2000/svg"
										     xmlns:xlink="http://www.w3.org/1999/xlink">
											<defs></defs>
											<g id="44-About-us-03" stroke="none" stroke-width="1" fill="none"
											   fill-rule="evenodd"
											   transform="translate(-1412.000000, -3567.000000)">
												<g id="testimonials"
												   transform="translate(0.000000, 3457.000000)"
												   fill="#006EFD" fill-rule="nonzero">
													<g id="right-quotation-mark"
													   transform="translate(1412.000000, 110.000000)">
														<path
															d="M31.5005746,0 L10.5001915,0 C7.58313115,0 5.1041374,1.02095087 3.06206104,3.06227798 C1.02094241,5.10398818 0,7.58300248 0,10.5002786 L0,31.5000697 C0,34.4171542 1.02036777,36.8957854 3.06206104,38.9371126 C5.10394586,40.9782481 7.58370578,41.9995821 10.5001915,41.9995821 L22.7501596,41.9995821 C24.2080194,41.9995821 25.4478994,42.5102491 26.4688418,43.5308168 C27.4897842,44.55081 28.0000638,45.7910833 28.0000638,47.2501045 L28.0000638,48.9991293 C28.0000638,52.8639935 26.632614,56.1624501 23.8984804,58.8973726 C21.1641553,61.6309542 17.8649598,62.9982238 13.9997446,62.9982238 L10.5001915,62.9982238 C9.55165368,62.9982238 8.73164347,63.3455004 8.03862853,64.0377549 C7.34618823,64.7300094 6.99968076,65.550601 6.99968076,66.4985721 L6.99968076,73.4994602 C6.99968076,74.4458989 7.34618823,75.2680229 8.03862853,75.960469 C8.73221811,76.6525319 9.55146214,77 10.5001915,77 L13.9999362,77 C17.7919806,77 21.410484,76.2606247 24.8560209,74.7845558 C28.3013664,73.3082953 31.2816371,71.3115989 33.7974077,68.7958073 C36.3126038,66.2798243 38.3089005,63.3001035 39.7853403,59.8545379 C41.2615886,56.409164 42,52.7908221 42,48.9993209 L42,10.4995124 C42,7.58223629 40.9790576,5.10341353 38.9377474,3.06208643 C36.8964372,1.02075933 34.4168689,0 31.5005746,0 Z"
															id="Shape"></path>
														<path
															d="M87.9367338,3.06227798 C85.8955779,1.02095087 83.4163474,0 80.4992338,0 L59.4992338,0 C56.5821202,0 54.1030812,1.02095087 52.0617338,3.06227798 C50.0205779,5.10417973 49,7.58300248 49,10.5002786 L49,31.5000697 C49,34.4171542 50.0205779,36.8957854 52.0617338,38.9371126 C54.1030812,40.9782481 56.5823117,41.9995821 59.4992338,41.9995821 L71.7494254,41.9995821 C73.2073117,41.9995821 74.4481721,42.5102491 75.4689415,43.5308168 C76.4887533,44.5513846 77.0001915,45.7910833 77.0001915,47.2501045 L77.0001915,48.9991293 C77.0001915,52.8639935 75.6327167,56.1624501 72.8979586,58.8973726 C70.1637752,61.6309542 66.8652857,62.9982238 62.9996169,62.9982238 L59.4992338,62.9982238 C58.5514448,62.9982238 57.7306535,63.3455004 57.0383921,64.0377549 C56.345556,64.7300094 55.9986592,65.550601 55.9986592,66.4985721 L55.9986592,73.4994602 C55.9986592,74.4458989 56.345556,75.2680229 57.0383921,75.960469 C57.7304619,76.6525319 58.5512533,77 59.4992338,77 L62.9996169,77 C66.7911559,77 70.4095337,76.2606247 73.8555166,74.7845558 C77.3003503,73.3082953 80.2802923,71.3115989 82.7963004,68.7958073 C85.3121169,66.2798243 87.3095994,63.2993373 88.7851084,59.8545379 C90.261192,56.4099301 91,52.7908221 91,48.9993209 L91,10.4995124 C90.9994254,7.58223629 89.9794221,5.10341353 87.9367338,3.06227798 Z"
															id="Shape"></path>
													</g>
												</g>
											</g>
										</svg>

										<?php if ( isset( $_meta['rating'] ) && $_meta['rating'] !== '' ): ?>
											<div class="testimonial-rating">
												<?php Businext_Templates::get_rating_template( $_meta['rating'] ); ?>
											</div>
										<?php endif; ?>

										<div class="testimonial-desc"><?php the_content(); ?></div>

										<div class="testimonial-footer">
											<div class="testimonial-main-info">
												<h6 class="testimonial-name"><?php the_title(); ?></h6>

												<?php if ( isset( $_meta['by_line'] ) ) : ?>
													<div class="testimonial-by-line">
														<?php echo esc_html( $_meta['by_line'] ); ?>
													</div>
												<?php endif; ?>

											</div>

											<div class="swiper-custom-action-wrap">
												<a class="swiper-custom-btn btn-prev-slider">
													<span class="ion-ios-arrow-back"></span>
												</a>
												<a class="swiper-custom-btn btn-next-slider">
													<span class="ion-ios-arrow-forward"></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			<?php endwhile; ?>
		</div>
	</div>
</div>

<script>
	(
		function( $ ) {
			$( window ).on( 'load', function() {
				var $slider = $( '<?php echo "#$css_id"; ?>' );
				var $sliderInstance = $slider.find( '.swiper-container' ).first()[ 0 ].swiper;

				$slider.on( 'click', '.swiper-custom-btn', function() {
					if ( $( this ).hasClass( 'btn-prev-slider' ) ) {
						$sliderInstance.slidePrev();
					} else {
						$sliderInstance.slideNext();
					}
				} );
			} );
		}( jQuery )
	);
</script>
