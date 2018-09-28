<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'post-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>

		<div class="post-item-wrap">


			<div class="post-feature-wrap">
				<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>">
						<div class="post-feature post-thumbnail">
							<?php
							$full_image_size = get_the_post_thumbnail_url( null, 'full' );
							Businext_Helper::get_lazy_load_image( array(
								'url'    => $full_image_size,
								'width'  => 370,
								'height' => 250,
								'crop'   => true,
								'echo'   => true,
								'alt'    => get_the_title(),
							) );
							?>
						</div>
					</a>
				<?php } ?>

				<?php if ( has_category() ) : ?>
					<div class="post-categories">
						<?php the_category( ' ' ); ?>
					</div>
				<?php endif; ?>

			</div>


			<div class="post-info">
				<div class="post-date">
					<span class="ion-clock"></span>
					<?php echo get_the_date( 'M d, Y' ); ?>
				</div>

				<?php get_template_part( 'loop/blog/title' ); ?>

				<div class="post-excerpt">
					<?php Businext_Templates::excerpt( array(
						'limit' => 10,
						'type'  => 'word',
					) ); ?>
				</div>
			</div>
		</div>

	</div>
<?php endwhile;
