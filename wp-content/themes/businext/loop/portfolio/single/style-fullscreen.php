<?php
// Meta.
$portfolio_url     = Businext_Helper::get_post_meta( 'portfolio_url', '' );
$portfolio_gallery = Businext_Helper::get_post_meta( 'portfolio_gallery', '' );
?>

<div class="portfolio-main-info">
	<div id="portfolio-main-info-wrap">
		<div class="inner">
			<div class="portfolio-categories">
				<?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?>
			</div>
			<h3 class="portfolio-title"><?php the_title(); ?></h3>
			<div class="portfolio-details-social">
				<?php Businext_Templates::portfolio_sharing_2(); ?>
			</div>

			<div class="portfolio-details-content">
				<?php the_content(); ?>
			</div>

			<?php Businext_Templates::portfolio_details(); ?>

			<?php Businext_Templates::portfolio_view_project_button( $portfolio_url ); ?>

			<?php Businext_Templates::portfolio_link_pages(); ?>
		</div>
	</div>
</div>
<div class="portfolio-gallery">
	<?php if ( $portfolio_gallery !== '' || has_post_thumbnail() ) : ?>
		<div class="tm-swiper nav-style-2"
		     data-lg-items="1"
		     data-nav="1"
		     data-loop="1"
		>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php
						$full_image_size = get_the_post_thumbnail_url( null, 'full' );
						$image_url       = Businext_Helper::aq_resize( array(
							'url'    => $full_image_size,
							'width'  => 960,
							'height' => 1080,
							'crop'   => true,
						) );
						?>

						<div class="swiper-slide"
						     style="background-image: url( <?php echo esc_url( $image_url ); ?> );"></div>
					<?php endif; ?>
					<?php
					if ( $portfolio_gallery !== '' ) {
						foreach ( $portfolio_gallery as $key => $value ) {
							$full_image_size = wp_get_attachment_image_url( $value['id'], 'full' );
							if ( $full_image_size !== false ) {
								$image_url = Businext_Helper::aq_resize( array(
									'url'    => $full_image_size,
									'width'  => 960,
									'height' => 1080,
									'crop'   => true,
								) );

								?>
								<div class="swiper-slide"
								     style="background-image: url( <?php echo esc_url( $image_url ); ?> );"></div>
								<?php
							}
						}
					}
					?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>

