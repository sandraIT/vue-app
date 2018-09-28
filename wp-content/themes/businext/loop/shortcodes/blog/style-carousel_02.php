<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'post-item swiper-slide' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="swiper-item">
			<div class="post-item-wrap">
				<div class="post-feature-wrap">

					<?php if ( has_post_thumbnail() ) { ?>
						<div class="post-feature post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php
								$full_image_size = get_the_post_thumbnail_url( null, 'full' );
								Businext_Helper::get_lazy_load_image( array(
									'url'    => $full_image_size,
									'width'  => 420,
									'height' => 280,
									'crop'   => true,
									'echo'   => true,
									'alt'    => get_the_title(),
								) );
								?>
							</a>
						</div>
					<?php } ?>


				</div>

				<div class="post-info">

					<?php get_template_part( 'loop/blog/title' ); ?>

					<div class="post-meta">

						<div class="post-date">
							<span class="meta-icon ion-android-calendar primary-color"></span>
							<?php echo get_the_date( 'M d, Y' ); ?>
						</div>

					</div>

					<div class="post-excerpt">
						<?php Businext_Templates::excerpt( array(
							'limit' => 70,
							'type'  => 'character',
						) ); ?>
					</div>

					<?php get_template_part( 'loop/blog/readmore' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile;
