<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'post-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>

		<div class="post-item-wrap">

			<a href="<?php the_permalink(); ?>">
				<div class="post-feature-wrap">

					<?php if ( has_post_thumbnail() ) { ?>
						<div class="post-feature post-thumbnail">
							<?php
							$full_image_size = get_the_post_thumbnail_url( null, 'full' );
							Businext_Helper::get_lazy_load_image( array(
								'url'    => $full_image_size,
								'width'  => 480,
								'height' => 480,
								'crop'   => true,
								'echo'   => true,
								'alt'    => get_the_title(),
							) );
							?>
						</div>
					<?php } ?>

				</div>
			</a>

			<div class="post-info">
				<?php get_template_part( 'loop/blog/category' ); ?>

				<?php get_template_part( 'loop/blog/title' ); ?>

				<div class="post-date">
					<span class="ion-android-calendar"></span>
					<?php echo get_the_date( 'M d, Y' ); ?>
				</div>
			</div>
		</div>

	</div>
<?php endwhile;
