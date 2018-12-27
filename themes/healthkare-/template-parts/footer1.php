<?php

	/* Footer Image */
	$footer_image = "";
	if( healthkare_options("opt_footer_bg", "url") != "" ) {
		$footer_image = healthkare_options("opt_footer_bg", "url");
	}
	else {
		$footer_image = HEALTHKARE_IMGURI . '/ftr-bg.jpg';
	}
?>

<!-- Footer Main -->
<footer id="footer-main" class="footer-main container-fluid no-left-padding no-right-padding" style="background-image: url(<?php echo esc_url( $footer_image ); ?>">
	<!-- Container -->
	<div class="container">
		<?php
			$widgetarea1 =  get_post_meta( healthkare_get_the_ID(), 'healthkare_cf_footer_widget_area1', true );
			$widgetarea2 =  get_post_meta( healthkare_get_the_ID(), 'healthkare_cf_footer_widget_area2', true );
			$widgetarea3 =  get_post_meta( healthkare_get_the_ID(), 'healthkare_cf_footer_widget_area3', true );
			$widgetarea4 =  get_post_meta( healthkare_get_the_ID(), 'healthkare_cf_footer_widget_area4', true );
		
			if( is_active_sidebar('sidebar-3') || 
			   is_active_sidebar('sidebar-4') || 
			   is_active_sidebar('sidebar-5') || 
			   is_active_sidebar('sidebar-6') || 
			   is_active_sidebar('sidebar-7') || 
			   is_active_sidebar('sidebar-8') || 
			   is_active_sidebar('sidebar-9')  ||
			   is_active_sidebar('sidebar-10')  
			 ) {
				 
				?>
				<div class="footer_widgets">
					<div class="row">
						<?php
						if( $widgetarea1 != "" && is_active_sidebar( $widgetarea1 ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 widget-block">
								<?php dynamic_sidebar($widgetarea1); ?>
							</div>
							<?php
						}
						elseif( is_active_sidebar('sidebar-3') ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 widget-block">
								<?php dynamic_sidebar('sidebar-3'); ?>
							</div>
							<?php
						}
						
						if( $widgetarea2 != "" && is_active_sidebar( $widgetarea2 ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 widget-block">
								<?php dynamic_sidebar($widgetarea2); ?>
							</div>
							<?php
						}
						elseif( is_active_sidebar('sidebar-4') ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 widget-block">
								<?php dynamic_sidebar('sidebar-4'); ?>
							</div>
							<?php
						}
						
						if( $widgetarea3 != "" && is_active_sidebar( $widgetarea3 ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 widget-block">
								<?php dynamic_sidebar($widgetarea3); ?>
							</div>
							<?php
						}
						elseif( is_active_sidebar('sidebar-5') ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 widget-block">
								<?php dynamic_sidebar('sidebar-5'); ?>
							</div>
							<?php
						}
						
						if( $widgetarea4 != "" && is_active_sidebar( $widgetarea4 ) ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 widget-block">
								<?php dynamic_sidebar($widgetarea4); ?>
							</div>
							<?php
						}
						elseif( is_active_sidebar('sidebar-6') ) {
							?>
							<div class="col-md-3 col-sm-6 col-xs-6 widget-block">
								<?php dynamic_sidebar('sidebar-6'); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<?php
			}
			
			$copyright_class = "";
			
			if( has_nav_menu('healthkare_footer') ) {
				$copyright_class = "col-md-6 col-sm-12 col-xs-12";
			}
			else {
				$copyright_class = "col-md-12 col-sm-12 col-xs-12 no-padding";
			}
		?>
		<div class="btm-ftr-menu container-fluid no-left-padding no-right-padding">
			<div class="row">
				<?php
				if( has_nav_menu('healthkare_footer') ) {
					?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<!-- Ownavigation -->
						<nav class="navbar ownavigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-ftr" aria-expanded="false" aria-controls="navbar">
									<span class="sr-only"><?php esc_html('Toggle navigation',"healthkare"); ?></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>									
							</div>
							<div id="navbar-ftr" class="navbar-collapse collapse">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'healthkare_footer',
										'container' => false,
										'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth' => 10,
										'menu_class' => 'nav navbar-nav',
										'walker' => new healthkare_nav_walker
									));
								?>
							</div>
						</nav><!-- Ownavigation /- -->
					</div>
					<?php
				}
				?>
				<div class="<?php echo esc_attr($copyright_class); ?> copyright-section">
					<?php
						if( healthkare_options("opt_footer_copyright") != "" ) {
							echo do_shortcode( wpautop( wp_kses( healthkare_options("opt_footer_copyright"), wp_kses_allowed_html() ) ) );
						}
						else {
							?>
							<p><?php 
								esc_html_e('&copy; Copyrights ',"healthkare");
								echo date('Y');
								esc_html_e('. Health Kare All Rights Reserved',"healthkare");
								?>
							</p>
							<?php
						}
					?>
				</div>
			</div>
		</div>
	</div><!-- Container /- -->
</footer><!-- Footer Main /- -->