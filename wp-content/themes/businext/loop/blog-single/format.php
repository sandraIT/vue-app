<?php if ( has_post_thumbnail() ) { ?>
	<?php
	$businext_thumbnail_w = 1170;
	$businext_thumbnail_h = 684;

	$full_image_size = get_the_post_thumbnail_url( null, 'full' );
	?>
	<div class="post-feature post-thumbnail">
		<?php
		Businext_Helper::get_lazy_load_image( array(
			'url'    => $full_image_size,
			'width'  => $businext_thumbnail_w,
			'height' => $businext_thumbnail_h,
			'crop'   => true,
			'echo'   => true,
			'alt'    => get_the_title(),
		) );
		?>

	</div>
<?php } ?>
