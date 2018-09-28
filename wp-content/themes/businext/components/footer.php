<?php
$footer_page = Businext_Global::instance()->get_footer_type();

if ( $footer_page === '' ) {
	return;
}

$_businext_args = array(
	'post_type'   => 'ic_footer',
	'name'        => $footer_page,
	'post_status' => 'publish',
);

$_businext_query = new WP_Query( $_businext_args );
?>
<?php if ( $_businext_query->have_posts() ) { ?>
	<?php while ( $_businext_query->have_posts() ) : $_businext_query->the_post(); ?>
		<?php
		$footer_options      = unserialize( get_post_meta( get_the_ID(), 'insight_footer_options', true ) );
		$_effect             = Businext_Helper::get_the_post_meta( $footer_options, 'effect', '' );
		$_style              = Businext_Helper::get_the_post_meta( $footer_options, 'style', '01' );
		$footer_wrap_classes = "page-footer-wrapper $footer_page footer-style-$_style";

		if ( $_effect !== '' ) {
			$footer_wrap_classes .= " {$_effect}";
		}
		?>
		<div id="page-footer-wrapper" class="<?php echo esc_attr( $footer_wrap_classes ); ?>">
			<div id="page-footer" <?php Businext::footer_class(); ?>>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="page-footer-inner">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	endwhile;
}
wp_reset_postdata();
