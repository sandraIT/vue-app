<?php
// Meta.
$portfolio_url     = Businext_Helper::get_post_meta( 'portfolio_url', '' );
$portfolio_gallery = Businext_Helper::get_post_meta( 'portfolio_gallery', '' );
?>

	<div class="row row-xs-bottom portfolio-main-info">
		<div class="col-md-6">
			<div class="portfolio-categories">
				<?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?>
			</div>
			<h3 class="portfolio-title"><?php the_title(); ?></h3>
		</div>
		<div class="col-md-6">
			<div class="portfolio-details-social">
				<?php Businext_Templates::portfolio_sharing(); ?>
			</div>
		</div>
	</div>

<?php if ( $portfolio_gallery !== '' ) : ?>
	<div class="portfolio-feature">
		<div class="tm-swiper nav-style-2"
		     data-lg-items="1"
		     data-lg-gutter="30"
		     data-nav="1"
		     data-loop="1"
		     data-autoheight="1"
		     data-autoplay="5000"
		>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php
					foreach ( $portfolio_gallery as $key => $value ) {
						?>
						<div class="swiper-slide">
							<?php
							$full_image_size = wp_get_attachment_url( $value['id'] );
							Businext_Helper::get_lazy_load_image( array(
								'url'    => $full_image_size,
								'width'  => 1170,
								'height' => 540,
								'crop'   => true,
								'echo'   => true,
								'alt'    => get_the_title(),
							) );
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
	<div class="row">
		<div class="col-md-12">
			<h6 class="about-project"><?php esc_html_e( 'About the project', 'businext' ); ?></h6>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5">
			<div class="portfolio-details-content">
				<?php the_content(); ?>

				<?php Businext_Templates::portfolio_view_project_button( $portfolio_url ); ?>
			</div>
		</div>
		<div class="col-md-6 col-md-offset-1">
			<?php Businext_Templates::portfolio_details(); ?>
		</div>
	</div>
<?php

Businext_Templates::portfolio_link_pages();
