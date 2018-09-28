<header id="page-header" <?php Businext::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">

						<?php get_template_part( 'components/branding' ); ?>

						<?php get_template_part( 'components/navigation' ); ?>

						<div class="header-right">
							<?php Businext_Templates::header_social_networks( array(
								'tooltip_position' => 'bottom',
							) ); ?>

							<?php Businext_Woo::render_mini_cart(); ?>

							<?php Businext_Templates::header_open_mobile_menu_button(); ?>

							<?php Businext_Templates::header_search_button(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
