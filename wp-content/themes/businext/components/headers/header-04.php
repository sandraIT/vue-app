<header id="page-header" <?php Businext::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">

						<?php get_template_part( 'components/branding' ); ?>

						<?php get_template_part( 'components/navigation' ); ?>

						<div class="header-right">
							<?php Businext_Templates::header_search_button(); ?>
							<?php Businext_Woo::render_mini_cart(); ?>
							<?php Businext_Templates::header_open_mobile_menu_button(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
