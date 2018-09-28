<?php
// Meta.
$portfolio_url     = Businext_Helper::get_post_meta( 'portfolio_url', '' );
$portfolio_gallery = Businext_Helper::get_post_meta( 'portfolio_gallery', '' );

if ( $portfolio_gallery !== '' || has_post_thumbnail() ) {
	$class = 'col-md-4';
} else {
	$class = 'col-md-12';
}
?>
	<div class="row row-xs-bottom portfolio-main-info">
		<div class="<?php echo esc_attr( $class ); ?>">
			<div class="portfolio-categories">
				<?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?>
			</div>
			<h3 class="portfolio-title"><?php the_title(); ?></h3>
		</div>
		<div class="col-md-8">
			<div class="portfolio-details-social">
				<?php Businext_Templates::portfolio_sharing(); ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="<?php echo esc_attr( $class ); ?>">
			<div id="sticky-element" class="tm-sticky-kit">
				<div class="portfolio-details-content">
					<?php the_content(); ?>

					<?php Businext_Templates::portfolio_view_project_button( $portfolio_url ); ?>
				</div>

				<?php Businext_Templates::portfolio_details(); ?>
			</div>
		</div>

		<?php if ( $portfolio_gallery !== '' || has_post_thumbnail() ) : ?>
			<div class="col-md-8">
				<div class="feature-wrap">
					<div class="portfolio-details-gallery">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="portfolio-feature">
								<?php
								$full_image_size = get_the_post_thumbnail_url( null, 'full' );
								Businext_Helper::get_lazy_load_image( array(
									'url'    => $full_image_size,
									'width'  => 770,
									'height' => 9999,
									'crop'   => false,
									'echo'   => true,
									'alt'    => get_the_title(),
								) );
								?>
							</div>
						<?php endif; ?>

						<?php if ( $portfolio_gallery !== '' ) : ?>
							<?php
							$grid_classes = 'tm-grid tm-light-gallery';
							$grid_classes .= Businext_Helper::get_grid_animation_classes( 'scale-up' );
							?>
							<div class="tm-grid-wrapper tm-gallery"
							     data-type="masonry"
							     data-lg-columns="2"
							     data-gutter="30"
							>
								<div class="<?php echo esc_attr( $grid_classes ); ?>">
									<div class="grid-sizer"></div>
									<?php foreach ( $portfolio_gallery as $key => $value ) { ?>
										<div class="grid-item gallery-item">
											<a href="<?php echo wp_get_attachment_url( $value['id'] ); ?>"
											   class="zoom">
												<?php
												$full_image_size = wp_get_attachment_url( $value['id'] );
												Businext_Helper::get_lazy_load_image( array(
													'url'    => $full_image_size,
													'width'  => 370,
													'height' => 9999,
													'crop'   => false,
													'echo'   => true,
													'alt'    => get_the_title(),
												) );
												?>
												<div class="overlay">
													<div><span class="ion-ios-plus-empty"></span></div>
												</div>
											</a>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
<?php
Businext_Templates::portfolio_link_pages();
