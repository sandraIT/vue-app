<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'case-study-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<a href="<?php the_permalink(); ?>">
			<div class="post-item-wrap">

				<h6 class="post-title">
					<?php the_title(); ?>
				</h6>

			</div>
		</a>
	</div>
<?php endwhile;
