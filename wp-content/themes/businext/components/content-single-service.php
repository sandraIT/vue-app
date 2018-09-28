<?php
/**
 * The template part of single service posts.
 *
 * @package Businext
 * @since   1.0
 */

$style = Businext_Helper::get_post_meta( 'service_style', '' );
if ( $style === '' ) {
	$style = Businext::setting( 'single_service_style' );
}
?>

<?php if ( $style === '01' ) { ?>

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="post-main-feature post-main-thumbnail">
			<?php
			$full_image_size = get_the_post_thumbnail_url( null, 'full' );
			Businext_Helper::get_lazy_load_image( array(
				'url'    => $full_image_size,
				'width'  => 1170,
				'height' => 600,
				'crop'   => true,
				'echo'   => true,
				'alt'    => get_the_title(),
			) );
			?>
		</div>
	<?php } ?>

	<h2 class="post-main-title">
		<?php the_title(); ?>
	</h2>

<?php } ?>

<?php the_content(); ?>
