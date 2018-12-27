<?php
get_header();

$bodylayout = "";
$bodylayout_css = "";

$sidebarlayout = "";
$sidebarlayout_css = "";
$cnt_css = "";

$page_css = $template_css = $dbodylayout_css = $dbodylayout = $dsidebarlayout = $dsidebarlayout_css = $pid = "";

$pid = healthkare_get_the_ID();

if( healthkare_options("layout_body") != "" ) {

	$dbodylayout = healthkare_options("layout_body");

	if( $dbodylayout == "fixed" ) {
		$dbodylayout_css = "container";
	}
	elseif( $dbodylayout == "fluid" ) {
		$dbodylayout_css = "container-fluid";
	}
	else { /* Do Nothing.. */ }
}
else {
	$dbodylayout_css = "container";	
}

if( healthkare_options("layout_sidebar") != "" ) {

	$dsidebarlayout = healthkare_options("layout_sidebar");

	if( $dsidebarlayout == "right_sidebar" ) {
		$dsidebarlayout_css = " content-left col-md-9 col-sm-8";
	}
	elseif( $dsidebarlayout == "left_sidebar" ) {
		$dsidebarlayout_css = " content-right col-md-9 col-sm-8";
	}
	elseif( $dsidebarlayout == "no_sidebar" ) {
		$dsidebarlayout_css = " no-sidebar col-md-12 no-padding";
	}
	else { /* Do Nothing.. */ }
}
else {
	$dsidebarlayout_css = " content-left col-md-9 col-sm-8";
}

if( $pid != "" && !is_search() ) {

	/* Page Layout */
	if( get_post_meta( $pid, 'healthkare_cf_page_owlayout', true ) != "" || get_post_meta( $pid, 'healthkare_cf_page_owlayout', true ) != "none" ) {

		$bodylayout = get_post_meta( $pid, 'healthkare_cf_page_owlayout', true );
		
		if( $bodylayout == "fixed" ) {
			$bodylayout_css = "container";
		}
		elseif( $bodylayout == "fluid" ) {
			$bodylayout_css = "container-fluid";
		}
		else {
			$bodylayout_css = $dbodylayout_css;
		}
	}	

	/* Sidebar Layout */
	if( get_post_meta( $pid, 'healthkare_cf_sidebar_owlayout', true ) != "" || get_post_meta( $pid, 'healthkare_cf_sidebar_owlayout', true ) != 'none' ) {

		$sidebarlayout = get_post_meta( $pid, 'healthkare_cf_sidebar_owlayout', true );
		
		if( $sidebarlayout == "right_sidebar" ) {
			$sidebarlayout_css = " content-left col-md-9 col-sm-8";
		}
		elseif( $sidebarlayout == "left_sidebar" ) {
			$sidebarlayout_css = " content-right col-md-9 col-sm-8";
		}
		elseif( $sidebarlayout == "no_sidebar" ) {
			$sidebarlayout_css = " no-sidebar col-md-12 no-padding";
		}
		else {
			$sidebarlayout_css = $dsidebarlayout_css;
		}
	}

	if( get_post_meta( $pid, 'healthkare_cf_clr_padding', true ) == "off" ) {
		$cnt_css = " no-spadding";
	}
	
	if( get_post_meta( $pid, 'healthkare_cf_content_padding', true ) != "off" ) {
		$page_css = " page_spacing";
	}

	if( is_page_template("blog-template.php") || is_singular("post") ) {
		$template_css = " blog-listing";
	}
}
else {

	$bodylayout_css = $dbodylayout_css;
	$sidebarlayout_css = $dsidebarlayout_css;
	$page_css = " page_spacing";
}
?>
<main id="main" class="site-main<?php echo esc_attr( $page_css ); ?>">

	<div class="<?php echo esc_attr( $bodylayout_css . $cnt_css ); ?>">

		<div class="content-area<?php echo esc_attr( $sidebarlayout_css . $template_css ); ?>">