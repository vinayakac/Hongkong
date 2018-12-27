<?php
/**
 * The Header for our theme
 *
 *
 * @package WordPress
 * @subpackage Healthkare
 * @since Healthkare 1.0
 */

$rtl_onoff = "";
if( healthkare_options('opt_rtl_switch') != "" ) { 
	$rtl_onoff = healthkare_options('opt_rtl_switch');
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js"<?php if( $rtl_onoff != "" && $rtl_onoff == 1 ) { ?> dir="rtl"<?php } ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-81278847-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-81278847-13');
</script>

</head>
<body <?php body_class(); ?>>

	<?php
	get_template_part("template-parts/modalpop");

	if( healthkare_options("opt_siteloader") == 1 ) {
		get_template_part("template-parts/siteloader");
	}

	if( healthkare_options("opt_colorswitcher") == 1 ) {
		get_template_part("template-parts/colorswitcher");
	}

	$page_title = "";
	$page_title = get_post_meta( healthkare_get_the_ID(), 'healthkare_cf_page_title', true );

	$pheader_type = get_post_meta( healthkare_get_the_ID(), 'healthkare_cf_header_layout', true );
	$header_type = healthkare_options("opt_headertype");

	if( $pheader_type != "" ) {
		$hdr_type = $pheader_type;
	}
	elseif( $header_type != "" ) {
		$hdr_type = $header_type;
	}
	else {
		$hdr_type = "1";
	}
	get_template_part("template-parts/header" . $hdr_type );

	if( $page_title != "disable" || is_search() ) {
		get_template_part("template-parts/pageheader" );
	}
	?>