<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'post-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>

		<div class="post-item-wrap">
			<div class="post-feature-wrap">
				<?php get_template_part( 'loop/blog-classic-03/format' ); ?>
			</div>

			<div class="post-info">

				<div class="post-meta">

					<div class="post-date">
						<?php echo get_the_date( 'M d, Y' ); ?>
					</div>

					<?php get_template_part( 'loop/blog/category' ); ?>

				</div>

				<?php get_template_part( 'loop/blog/title' ); ?>

				<div class="post-excerpt">
					<?php Businext_Templates::excerpt( array(
						'limit' => 70,
						'type'  => 'character',
					) ); ?>
				</div>

				<a href="<?php the_permalink(); ?>" class="post-read-more">
					<span class="ion-arrow-right-c"></span>
				</a>
			</div>
		</div>

	</div>
<?php endwhile;
