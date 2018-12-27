<?php
$prefix = "healthkare_cf_";

/* Page Metabox */
$page_subtitle = "";
$page_subtitle = get_post_meta( healthkare_get_the_ID(), $prefix . 'page_subtitle', true );

$page_banner = "";
$page_banner  = get_post_meta( healthkare_get_the_ID(), $prefix . 'page_header_img', true );

/* Page Banner */
$header_image = "";
if( $page_banner != "" ) {
	$header_image = $page_banner;
}
elseif( healthkare_options("opt_pageheader_img", "url") != "" ) {
	$header_image = healthkare_options("opt_pageheader_img", "url");
}
else {
	$header_image = HEALTHKARE_IMGURI . '/page-banner.jpg';
}

if( is_search() ) {
	if( healthkare_options("opt_search_bg", "url") != "" ) {
		$header_image = healthkare_options("opt_search_bg", "url");
	}
	else {
		$header_image = HEALTHKARE_IMGURI . '/page-banner.jpg';
	}
}

if( is_404() ) {
	if( healthkare_options("opt_404_bg", "url") != "" ) {
		$header_image = healthkare_options("opt_404_bg", "url");
	}
	else {
		$header_image = HEALTHKARE_IMGURI . '/page-banner.jpg';
	}
}

$banner_class = "";
if( function_exists( 'bcn_display' ) ) {
	$banner_class = " banner-breadcrumb";
}
else {
	$banner_class = "no_banner_breadcrumb";
}
?>
<!-- Page Banner -->
<div class="page-banner container-fluid no-padding custombg_overlay<?php echo esc_attr($banner_class); ?>" style="background-image: url(<?php echo esc_url( $header_image ); ?>); <?php if( healthkare_options("opt_pageheader_height") != "" ) { ?> min-height: <?php echo healthkare_options("opt_pageheader_height"); ?>px;<?php } ?>">	
	<div class="page-banner-content">
		<div class="container">
			<h3>
				<?php
				if( is_home() ) {
					esc_html_e( 'Blog', "healthkare" );
				}
				elseif( is_404() ) {
					esc_html_e( 'Page Not Found', "healthkare" );
				}
				elseif( is_search() ) {
					printf( esc_html__( 'Search Results for: %s', "healthkare" ), get_search_query() );
				}
				elseif( is_archive() ) {
					the_archive_title();
				}
				else {
					the_title();
				}			
				?>
			</h3>
			<?php echo wpautop( wp_kses( get_post_meta( get_the_ID(),'healthkare_cf_banner_desc', true ), wp_kses_allowed_html() ) ); ?>
		</div>
	</div>
	<div class="banner-content container-fluid no-padding">
		<div class="container">
			<?php
			if( function_exists( 'bcn_display' ) ) {
				?>
				<div class="breadcrumb">
					<?php bcn_display(); ?>
				</div>
				<?php
			} ?>
		</div>
	</div>
</div><!-- Page Banner /- -->