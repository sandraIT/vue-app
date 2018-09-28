<?php
if ( isset( $metro_layout ) ) {
	$metro_layout = (array) vc_param_group_parse_atts( $metro_layout );
	$_sizes       = array();
	foreach ( $metro_layout as $key => $value ) {
		$_sizes[] = $value['size'];
	}
	$metro_layout = $_sizes;
} else {
	$metro_layout = array(
		'2:2',
		'1:1',
		'1:1',
		'2:2',
		'1:1',
		'1:1',
	);
}

if ( count( $metro_layout ) < 1 ) {
	return;
}

$metro_layout_count = count( $metro_layout );
$metro_item_count   = 0;

while ( $businext_query->have_posts() ) :
	$businext_query->the_post();

	$classes = array( 'post-item grid-item' );

	if ( in_array( $metro_layout[ $metro_item_count ], array(
		'2:1',
		'2:2',
	), true ) ) {
		$classes[] = 'grid-width-2';
	}

	if ( in_array( $metro_layout[ $metro_item_count ], array(
		'1:2',
		'2:2',
	), true ) ) {
		$classes[] = 'grid-height-2';
	}

	$_image_width  = 480;
	$_image_height = 480;
	if ( $metro_layout[ $metro_item_count ] === '2:1' ) {
		$_image_width  = 960;
		$_image_height = 480;
	} elseif ( $metro_layout[ $metro_item_count ] === '1:2' ) {
		$_image_width  = 480;
		$_image_height = 960;
	} elseif ( $metro_layout[ $metro_item_count ] === '2:2' ) {
		$_image_width  = 960;
		$_image_height = 960;
	}
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<a href="<?php the_permalink(); ?>">
				<div class="post-feature-wrap">
					<?php if ( has_post_thumbnail() ) { ?>
						<?php
						$full_image_size = get_the_post_thumbnail_url( null, 'full' );
						$image_url       = Businext_Helper::aq_resize( array(
							'url'    => $full_image_size,
							'width'  => $_image_width,
							'height' => $_image_height,
							'crop'   => true,
						) );
						?>
						<div class="post-thumbnail"
						     style="background-image: url(<?php echo esc_url( $image_url ); ?>);"></div>
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
	<?php
	$metro_item_count ++;
	if ( $metro_item_count == $count || $metro_layout_count == $metro_item_count ) {
		$metro_item_count = 0;
	}
	?>
<?php endwhile;
