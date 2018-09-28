<?php
/**
 * The template for displaying all single portfolio posts.
 *
 * @package Businext
 * @since   1.0
 */
get_header( 'blank' );
?>
<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part( 'loop/portfolio/single/style', 'fullscreen' ); ?>
	</article>

	<?php
	$_return_link = Businext::setting( 'single_portfolio_return_link' );
	?>
	<?php if ( $_return_link !== '' ) : ?>
		<a href="<?php echo esc_url( $_return_link ); ?>">
			<div id="return-prev-page" class="return-prev-page"></div>
		</a>
	<?php endif; ?>
<?php endwhile; ?>
<?php
get_footer( 'blank' );
