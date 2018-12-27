<?php

$header_class = "";
if( healthkare_options("opt_sticky_menu") != "" ) { 
	$header_class = " menusticky";
}
else {
	$header_class = " no-menusticky";
}

?>

<!-- Header3 -->
<header class="header_s header_s3<?php echo esc_attr($header_class); ?>">
	<!-- Ownavigation -->
	<nav class="navbar ownavigation nav_absolute">
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
			<div class="search">	
				<a href="javascript:void(0);" id="search"><i class="fa fa-search"></i></a>
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
			<div class="search-box">
				<span><i class="icon_close"></i></span>
				<?php get_search_form(); ?>
			</div><!-- Search Box /- -->
		</div><!-- Container /- -->
	</nav><!-- Ownavigation /- --><!-- Search Box -->
</header><!-- Header3 -->