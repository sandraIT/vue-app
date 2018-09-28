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
>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php while ( $businext_query->have_posts() ) :
				$businext_query->the_post();

				$_meta = unserialize( get_post_meta( get_the_ID(), 'insight_testimonial_options', true ) );
				?>
				<div class="swiper-slide">

					<div class="testimonial-item">

						<div class="testimonial-content">
							<?php if ( isset( $_meta['rating'] ) && $_meta['rating'] !== '' ): ?>
								<div class="testimonial-rating">
									<?php Businext_Templates::get_rating_template( $_meta['rating'] ); ?>
								</div>
							<?php endif; ?>

							<div class="testimonial-desc"><?php the_content(); ?></div>
						</div>

						<div class="testimonial-info">
							<?php if ( has_post_thumbnail() ): ?>
								<?php
								$full_image_size = get_the_post_thumbnail_url( null, 'full' );
								$image_url       = Businext_Helper::aq_resize( array(
									'url'    => $full_image_size,
									'width'  => 60,
									'height' => 60,
									'crop'   => true,
								) );
								?>
								<div class="post-thumbnail">
									<img src="<?php echo esc_url( $image_url ); ?>"
									     alt="<?php echo esc_attr( get_the_title() ); ?>"/>
								</div>
							<?php endif; ?>

							<div class="testimonial-main-info">
								<h6 class="testimonial-name"><?php the_title(); ?></h6>

								<?php if ( isset( $_meta['by_line'] ) ) : ?>
									<div
										class="testimonial-by-line"><?php echo esc_html( $_meta['by_line'] ); ?></div>
								<?php endif; ?>
							</div>
						</div>

					</div>

				</div>

			<?php endwhile; ?>
		</div>
	</div>
</div>
