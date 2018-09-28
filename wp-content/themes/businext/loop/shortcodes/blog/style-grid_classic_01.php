<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'post-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>

		<div class="post-item-wrap">
			<div class="post-feature-wrap">
				<?php get_template_part( 'loop/blog-classic/format' ); ?>
				<div class="post-date">
					<?php echo get_the_date( 'M d, Y' ); ?>
				</div>
			</div>

			<div class="post-info">
				<?php get_template_part( 'loop/blog/title' ); ?>

				<?php get_template_part( 'loop/blog/excerpt' ); ?>

				<?php get_template_part( 'loop/blog/readmore' ); ?>
			</div>
		</div>

	</div>
<?php endwhile;
