<?php
extract( $businext_shortcode_atts );
?>
<div class="testimonial-list">
	<?php while ( $businext_query->have_posts() ) :
		$businext_query->the_post();

		$_meta = unserialize( get_post_meta( get_the_ID(), 'insight_testimonial_options', true ) );
		?>

		<div class="testimonial-item">

			<?php if ( has_post_thumbnail() ): ?>
				<?php
				$full_image_size = get_the_post_thumbnail_url( null, 'full' );
				$image_url       = Businext_Helper::aq_resize( array(
					'url'    => $full_image_size,
					'width'  => 480,
					'height' => 365,
					'crop'   => true,
				) );
				?>
				<div class="post-thumbnail">
					<img src="<?php echo esc_url( $image_url ); ?>"
					     alt="<?php echo esc_attr( get_the_title() ); ?>"/>

					<div class="testimonial-icon">
						<?php Businext_Helper::the_file_contents( BUSINEXT_THEME_DIR .'/assets/images/testimonial-icon.svg' ); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="testimonial-info">
				<h6 class="testimonial-name">
					<?php the_title(); ?>
					<?php if ( isset( $_meta['by_line'] ) ) : ?>
						<span
							class="testimonial-by-line"><?php echo esc_html( ' - ' . $_meta['by_line'] ); ?></span>
					<?php endif; ?>
				</h6>

				<div class="testimonial-desc"><?php the_content(); ?></div>
			</div>

		</div>

	<?php endwhile; ?>
</div>
