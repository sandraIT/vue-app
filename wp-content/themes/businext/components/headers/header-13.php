<header id="page-header" <?php Businext::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">

						<div class="header-left">
							<?php Businext_Templates::header_social_networks( array(
								'tooltip_enable' => false,
								'tooltip_position' => 'bottom',
							) ); ?>

							<?php Businext_Templates::header_language_switcher(); ?>

							<?php /*Businext_Templates::header_info_slider(); */ ?>
						</div>

						<?php get_template_part( 'components/branding' ); ?>

						<div class="header-right">
							<?php get_template_part( 'components/navigation' ); ?>

							<div class="header-right-group-buttons">
								<?php Businext_Templates::header_search_button(); ?>

								<?php Businext_Woo::render_mini_cart(); ?>

								<?php Businext_Templates::header_open_mobile_menu_button(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
