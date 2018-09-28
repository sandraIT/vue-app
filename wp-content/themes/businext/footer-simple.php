<?php
/**
 * The footer for maintenance pages.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Businext
 * @since   1.0
 */

?>
</div><!-- /.content-wrapper -->

<div class="page-footer simple-footer" id="page-footer">
	<div class="container">
		<div class="row row-xs-center">
			<div class="col-md-6">
				<div class="footer-text">
					<?php $copyright_text = Businext::setting( 'footer_simple_text' ); ?>
					<?php echo wp_kses( $copyright_text, 'businext-default' ); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="social-networks">
					<div class="inner">
						<?php Businext_Templates::social_icons(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div><!-- /.site -->
<?php wp_footer(); ?>
</body>
</html>
