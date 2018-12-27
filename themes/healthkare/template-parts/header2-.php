<?php

$header_class = "";
if( healthkare_options("opt_sticky_menu") != "" ) { 
	$header_class = " menusticky";
}
else {
	$header_class = " no-menusticky";
}

?>
<!-- Header2 -->
<header class="header_s header_s2<?php echo esc_attr($header_class); ?>">
	<!-- SidePanel -->
	<div id="slidepanel">
		<!-- Top Header -->
		<div class="top-header container-fluid no-left-padding no-right-padding">
			<!-- Container -->
			<div class="container">
				<div class="call-info">
					<p>
						<a href="mailto:<?php echo esc_attr( healthkare_options("opt_header_email_one") ); ?>" title="<?php echo esc_attr( healthkare_options("opt_header_email_one") ); ?>">
							<i class="fa fa-envelope-o"></i><?php echo esc_attr( healthkare_options("opt_header_email_one") ); ?>
						</a>
					</p>
					<p>
						<a href="tel:<?php echo esc_attr(  str_replace(" ", "", healthkare_options("opt_header_contact") ) ); ?>" title="<?php echo esc_attr( healthkare_options("opt_header_contact") ); ?>">
							<i class="fa fa-phone"></i><?php echo esc_attr( healthkare_options("opt_header_contact") ); ?>
						</a>
					</p>
				</div>
				<div class="support-bar">
					<?php
					if( healthkare_options("opt_support_txt") != "" ) {
						?>
						<div class="support-link">
							<a href="<?php echo esc_url( healthkare_options("opt_support_url") ); ?>" title="<?php echo esc_attr( healthkare_options("opt_support_txt") ); ?>"><i class="fa fa-life-ring"></i><?php echo esc_attr( healthkare_options("opt_support_txt") ); ?></a>
						</div>
						<?php
					}
					if( healthkare_options("opt_social_icons") != "" ) {
						?>
						<div class="support-link">
							<ul class="header-social">
								<?php get_template_part("template-parts/social_icons"); ?>
							</ul>
						</div>
						<?php
					}
					if ( function_exists('icl_object_id') ) {
						?>
						<div class="support-link">
							<div class="language-dropdown dropdown">
								<button aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" title="languages" id="language" type="button" class="btn dropdown-toggle"><i class="fa fa-commenting-o"></i> <?php esc_html_e(' Language ',"healthkare"); ?> <span class="caret"></span></button>
								<?php do_action('wpml_add_language_selector'); ?>
							</div>
						</div>
						<?php
					}
					if( healthkare_options("opt_contactform_id") != "" ) {
						$model_number = rand(0,999);
						?>
						<div class="submit-btn">
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-<?php echo esc_attr($model_number); ?>">
								<i class="fa fa-bell-o"></i>
								<?php 
									if( healthkare_options("opt_appointment_txt") != "" ) {
										echo healthkare_options("opt_appointment_txt");
									}
									else {
										esc_html_e('Appointment',"healthkare");
									}
								?>
							</button>
						</div>
						<!-- Modal -->
						<div class="modal fade submit-model-box" id="myModal-<?php echo esc_attr($model_number); ?>" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content -->
								<div class="modal-content">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<div class="modal-body">	
										<?php
										if( healthkare_options("opt_form_title") != "" ) {
											?>
											<div class="model-header">
												<?php
												if( healthkare_options("opt_form_icon") != "" ) {
													?><i class="<?php echo esc_attr( healthkare_options("opt_form_icon") ); ?>"></i>
													<?php
												}
												else {
													?>
													<i class="icon icon-Files"></i>
													<?php
												}
												?>
												<h3><?php echo esc_attr( healthkare_options("opt_form_title") ); ?></h3>
											</div>
											<?php
										}
										?>
										<div class="submit-form">
											<?php echo do_shortcode( healthkare_options("opt_contactform_id") ); ?>
										</div>
									</div>
								</div><!-- Modal content /- -->
							</div>
						</div><!-- Modal /- -->
						<?php
					}
					?>
				</div>
			</div><!-- Container /- -->
		</div><!-- Top Header /- -->
	</div><!-- SidePanel /- -->

	<!-- Ownavigation -->
	<nav class="navbar ownavigation">
		<!-- Container -->
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only"><?php esc_html_e('Toggle navigation',"healthkare"); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="logo">
					<?php get_template_part("template-parts/sitelogo"); ?>
				</div>
			</div>
			<div class="navbar-collapse collapse" id="navbar">				 
				<?php
				if( has_nav_menu('healthkare_primary') ) :
					wp_nav_menu( array(
						'theme_location' => 'healthkare_primary',
						'container' => false,
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth' => 10,
						'menu_class' => 'nav navbar-nav navbar-right',
						'walker' => new healthkare_nav_walker
					));
				else :
					?>
					<h3 class="menu-setting-info">
						<a href="<?php echo esc_url( home_url("/wp-admin/nav-menus.php") ); ?>"><?php esc_html_e( 'Set The Menu', "healthkare" );?></a>
					</h3>
					<?php
				endif;
				?>
			</div>
			<div id="loginpanel" class="desktop-hide">
				<div class="right" id="toggle">
					<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
					<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
				</div>
			</div>
		</div><!-- Container /- -->
	</nav><!-- Ownavigation /- -->
</header><!-- Header2 -->