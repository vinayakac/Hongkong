<?php

$header_class = "";
if( healthkare_options("opt_sticky_menu") != "" ) { 
	$header_class = " menusticky";
}
else {
	$header_class = " no-menusticky";
}

?>
<!-- Header -->
<header class="header_s header_s1<?php echo esc_attr($header_class); ?>">
	<!-- SidePanel -->
	<div id="slidepanel">
		<link href="/wp-content/themes/healthkare/lity/lity-2.3.0/dist/lity.css" rel="stylesheet">
		<script src="/wp-content/themes/healthkare/lity/lity-2.3.0/vendor/jquery.js"></script>
		<script src="/wp-content/themes/healthkare/lity/lity-2.3.0/dist/lity.js"></script>

		<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59c8e269c28d0800122e1bd6&product=inline-share-buttons"></script>
		<div class="top-header container-fluid no-left-padding no-right-padding">
			<!-- Container -->
			<div class="container">
			</div><!-- Container /- -->
		</div><!-- Top Header /- -->
		<!-- Logo Block -->
		<div class="logo-block" style="margin-top: -25px">
			<!-- Container -->
			<div class="container">
				<!-- <img src="http://kopykat.in/amgen/wp-content/uploads/2017/09/IOF-logo.png" class="pull-right" id="amgen-iof" width="250" height="60" style="margin-top:50px;max-width: 150px;"> -->
				<div class="logo mobile m-logohide">
					<?php get_template_part("template-parts/sitelogo"); ?>
				</div>
				<?php
					if( healthkare_options("opt_add_infotxt") != "" || healthkare_options("opt_address") != "" || healthkare_options("opt_contact_infotxt") != "" || healthkare_options("opt_contact_number") != "" ) { 
						?>
						<div class="contact-block">
							<?php
							if( healthkare_options("opt_add_infotxt") != "" || healthkare_options("opt_address") != "" ) {
								?>
								<p>
									<?php 
									if( healthkare_options("opt_add_icon") != "" ) { 
										?>
										<i class="<?php echo esc_attr( healthkare_options("opt_add_icon") ); ?>"></i>
										<?php
									}
									else {
										?><i class="fa fa-clock-o"></i><?php
									}
									echo esc_attr( healthkare_options("opt_add_infotxt") );
									
									if( healthkare_options("opt_address") != "" ) {
										?> 
										<span><?php echo esc_attr( healthkare_options("opt_address") ); ?></span>
										<?php
									}
									?>
								</p>
								<?php
							}
							if( healthkare_options("opt_contact_infotxt") != "" || healthkare_options("opt_contact_number") != "" ) {
								?>
								<p>
									<?php
									if( healthkare_options("opt_contact_icon") != "" ) {
										?>
										<i class="<?php echo esc_attr( healthkare_options("opt_contact_icon") ); ?>"></i>
										<?php
									}
									else {
										?><i class="fa fa-phone"></i><?php
									}
									echo esc_attr( healthkare_options("opt_contact_infotxt") );
									
									if( healthkare_options("opt_contact_number") != "" ) {
										?> 
										<span>
											<a href="tel:<?php echo esc_attr( str_replace(" ", "", healthkare_options("opt_contact_number") ) ); ?>" title="<?php echo esc_attr( healthkare_options("opt_contact_number") ); ?> ">
												<?php echo esc_attr( healthkare_options("opt_contact_number") ); ?> 
											</a>
										</span>
										<?php
									}
									?>
								</p>
								<?php
							}
							?>
						</div>
						<?php
					}
				?>
			</div><!-- Container /- -->
		</div><!-- Logo Block -->
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
				<div class="logo d-logohide">
					<?php get_template_part("template-parts/sitelogo"); ?>
				</div>
			</div>
			<?php
				$model_number = rand(0,999);
				if( healthkare_options("opt_contactform_id") != "" ) {
					?>
					<!-- <div class="submit-btn" style="word-wrap: break-word;">
						<style type="text/css">
							#sign-up-button:hover
							{
								color:#003B5C;
							}

						</style>
						<button type="button" class="btn btn-info btn-lg" id="sign-up-button" data-toggle="modal" data-target="#myModal-<?php echo esc_attr($model_number); ?>" style="background-color:#5cb8b2;border:none;max-width: 250px">
							<i class="fa fa-pencil-square-o text-center" style="color:white;"></i>
							<?php 
								if( healthkare_options("opt_appointment_txt") != "" ) {
									echo healthkare_options("opt_appointment_txt");
								}
								else {
									esc_html_e('Appointment',"healthkare");
								}
							?>
						</button>
					</div> -->
					<?php
				}
			?>
			<div class="navbar-collapse collapse" id="navbar">
				<?php
				if( has_nav_menu('healthkare_primary') ) :
					wp_nav_menu( array(
						'theme_location' => 'healthkare_primary',
						'container' => false,
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth' => 10,
						'menu_class' => 'nav navbar-nav',
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
			<!-- <div id="loginpanel" class="desktop-hide">
				<div class="right" id="toggle">
					<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
					<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
				</div>
			</div> -->
		</div><!-- Container /- -->
	</nav><!-- Ownavigation /- -->
	<?php
		if( healthkare_options("opt_contactform_id") != "" ) {
			?>
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
										<i class="fa fa-pencil-square-o text-center"></i>
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
</header><!-- Header /- -->