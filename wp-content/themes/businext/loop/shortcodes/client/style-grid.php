<?php
extract( $businext_shortcode_atts );
?>
<div class="modern-grid">

	<?php foreach ( $items as $item ) { ?><?php
		$grid_inner_classes = '';
		if ( isset( $item['image_hover'] ) ) {
			$grid_inner_classes .= ' has-image-hover';
		}
		?>
		<div class="grid-item">

			<?php
			$_flag = false;
			if ( isset( $item['link'] ) ) {
				$link = vc_build_link( $item['link'] );
				if ( $link['url'] !== '' ) {
					$_target = $link['target'] !== '' ? ' target="_blank"' : '';
					$_title  = $link['title'] !== '' ? ' title="' . esc_attr( $link['title'] ) . '"' : '';
					echo '<a href="' . esc_url( $link['url'] ) . '"' . $_target . $_title . '>';
					$_flag = true;
				}
			}
			?>

			<div class="<?php echo esc_attr( 'grid-inner ' . $grid_inner_classes ); ?>">
				<div class="inner">
					<?php if ( isset( $item['image'] ) ) : ?>
						<div class="image">
							<?php
							$image_url = wp_get_attachment_url( $item['image'] );
							?>
							<img src="<?php echo esc_url( $image_url ); ?>"
							     alt="<?php esc_attr_e( 'Client Logo', 'businext' ); ?>"/>
						</div>
					<?php endif; ?>
					<?php if ( isset( $item['image_hover'] ) ) : ?>
						<div class="image-hover">
							<?php
							$image_url = wp_get_attachment_url( $item['image_hover'] );
							?>
							<img src="<?php echo esc_url( $image_url ); ?>"
							     alt="<?php esc_attr_e( 'Client Logo', 'businext' ); ?>"/>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<?php
			if ( $_flag === true ) {
				echo '</a>';
			}
			?>

		</div>
	<?php } ?>

</div>
