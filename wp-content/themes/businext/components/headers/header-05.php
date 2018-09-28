<header id="page-header" <?php Businext::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">

						<div class="header-left">
							<?php Businext_Templates::header_open_mobile_menu_button(); ?>

							<?php Businext_Templates::header_search_button(); ?>

							<?php Businext_Woo::render_mini_cart(); ?>
						</div>

						<?php get_template_part( 'components/navigation' ); ?>

						<div class="header-right">
							<?php get_template_part( 'components/branding' ); ?>

							<?php Businext_Templates::header_button( array( 'extra_class' => 'glint-effect' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
