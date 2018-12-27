<?php
/* TGM Plugin Activation Notice */
require get_template_directory() .'/admin/tgm/tgm.php';

if ( !function_exists('healthkare_admin_enqueue') ) :

	function healthkare_admin_enqueue() {

		wp_enqueue_media();

		wp_enqueue_script( 'healthkare-admin-functions', get_template_directory_uri() . '/admin/js/functions.js', array( 'jquery' ),  null, true );	
		wp_enqueue_style( 'healthkare-admin-css', get_template_directory_uri() . '/admin/css/style.css', false, '1.0.0' );
		wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/admin/css/eleganticons.css', false, '1.0.0' );
		wp_enqueue_style( 'font-awesome.min', get_template_directory_uri() . '/admin/css/font-awesome.min.css', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'healthkare_admin_enqueue' );
endif;

if ( !function_exists('healthkare_adminpage') ) :
	function healthkare_adminpage() {

		$admin_logo = $admin_bgcolor = $admin_bgimg = $admin_color = "";

		if( healthkare_options("opt_adminlogo", "url") != "" ) { $admin_logo .= ".login h1 a { background-size: 150px; width: auto; background-image: url(" . esc_attr( healthkare_options("opt_adminlogo", "url") ) . "); }"; }
		if( healthkare_options("opt_adminbg_color") != "" ) { $admin_bgcolor .= "body.login-action-login { background-color: " . esc_attr( healthkare_options("opt_adminbg_color") ) . "; } "; }
		if( healthkare_options("opt_adminbg_img", "url") != "" ) { $admin_bgimg .= "body.login-action-login { background-repeat: no-repeat; background-size: cover; background-image: url(" . esc_attr( healthkare_options("opt_adminbg_img", "url") ) . "); } "; }
		if( healthkare_options("opt_admincolor") != "" ) { $admin_color .= ".login #backtoblog a, .login #nav a { color: " . esc_attr( healthkare_options("opt_admincolor") ) . "; }"; }

		echo '<style  type="text/css">'. $admin_logo . $admin_bgcolor . $admin_bgimg . $admin_color . '</style>';
	}  
	add_action('login_head',  'healthkare_adminpage');
endif;