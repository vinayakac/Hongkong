<?php
/**
 * Theme functions and definitions
*/

/* Include Core */
require get_template_directory() . '/include/inc.php';

/* Include Admin */
require get_template_directory() . '/admin/inc.php';

/* ************************************************************************ */

if( !function_exists('healthkare_get_the_ID') ) :

	function healthkare_get_the_ID() {

		if( is_home() && get_option( 'page_for_posts' ) != "0" ) {
			$post_id = get_option( 'page_for_posts' );
		}
		elseif( class_exists( 'WooCommerce' ) && wc_get_page_id('shop') != "-1" && is_shop() ) {
			$post_id = wc_get_page_id('shop');
		}
		else {
			$post_id = get_the_ID();
		}

		return ! empty( $post_id ) ? $post_id : false;
	}
endif;

/* ************************************************************************ */

/* Redux Options */
if( !function_exists('healthkare_options') ) :

	function healthkare_options( $option, $arr = null ) {

		global $healthkare_option;

		if( $arr ) {

			if( isset( $healthkare_option[$option][$arr] ) ) {
				return $healthkare_option[$option][$arr];
			}
		}
		else {
			if( isset( $healthkare_option[$option] ) ) {
				return $healthkare_option[$option];
			}
		}
	}

endif;

/* ************************************************************************ */

if( ! function_exists('healthkare_add_allowed_tags') ) {

	function healthkare_add_allowed_tags( $tags ) {
	
		$tags['h1'] = array( 'class' => array(), 'style' => array() );
		$tags['h2'] = array( 'class' => array(), 'style' => array() );
		$tags['h3'] = array( 'class' => array(), 'style' => array() );
		$tags['h4'] = array( 'class' => array(), 'style' => array() );
		$tags['h5'] = array( 'class' => array(), 'style' => array() );
		$tags['h6'] = array( 'class' => array(), 'style' => array() );
		$tags['em'] = array( 'class' => array(), 'style' => array() );
		$tags['li'] = array( 'class' => array(), 'style' => array() );
		$tags['ul'] = array( 'class' => array(), 'style' => array() );		
		$tags['ol'] = array( 'class' => array(), 'style' => array() );
		$tags['p'] = array( 'class' => array(), 'style' => array() );
		$tags['span'] = array( 'class' => array(), 'style' => array() );
		$tags['ins'] = array( 'datetime' => array() );
		$tags['img'] = array( 'class' => array(), 'src' => array(), 'alt' => array(), 'style' => array() );
		$tags['a'] = array( 'class' => array(), 'href' => array(), 'target' => array(), 'title' => array(), 'style' => array() );
	
		return $tags;
	}
	add_filter('wp_kses_allowed_html', 'healthkare_add_allowed_tags');
}


/* ************************************************************************ */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see healthkare_content_width()
 *
 * @since Healthkare 1.0
 */
if ( ! isset( $content_width ) ) { $content_width = 474; }


/**
 * Adjust content_width value for image attachment template.
 *
 * @since Healthkare 1.0
 */
if( !function_exists('healthkare_content_width') ) :

	function healthkare_content_width() {
		if ( is_attachment() && wp_attachment_is_image() ) { $GLOBALS['content_width'] = 810; }
	}
	add_action( 'template_redirect', 'healthkare_content_width' );
endif;

/* ************************************************************************ */

/**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Healthkare 1.0
 */
if( !function_exists('healthkare_theme_setup') ) :

	function healthkare_theme_setup() {

		/* load theme languages */
		load_theme_textdomain( "healthkare", get_template_directory() . '/languages' );

		/* Image Sizes */
		set_post_thumbnail_size( 850, 352, true ); /* Default Featured Image */		

		add_image_size( 'healthkare_1170_420', 1170, 420, true  ); /* Single Treatment */
		add_image_size( 'healthkare_370_240', 370, 240, true  ); /* Single Special Treatment */
		add_image_size( 'healthkare_850_352', 850, 350, true  ); /* Single blog */

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'healthkare_primary'   => esc_html__( 'Primary Menu', "healthkare" ),
			'healthkare_footer'   => esc_html__( 'Footer Menu', "healthkare" ),
		) );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		/* WooCommerce Theme Support */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ) );
	}
	add_action( 'after_setup_theme', 'healthkare_theme_setup' );
endif;

/* ************************************************************************ */

/* Google Font */
if( !function_exists('healthkare_fonts_url') ) :

	function healthkare_fonts_url() {

		$fonts_url = '';
		
		$lato = _x( 'on', 'Lato font: on or off', "healthkare" );
		
		$montserrat = _x( 'on', 'Montserrat font: on or off', "healthkare" );
		
		$open_sans = _x( 'on', 'Open Sans font: on or off', "healthkare" );
		

		if ( 'off' !== $lato || 'off' !== $montserrat || 'off' !== $open_sans ) {

			$font_families = array(); 
			if ( 'off' !== $lato ) {
				$font_families[] = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i';
			}
			
			if ( 'off' !== $montserrat ) {
				$font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
			}
			
			if ( 'off' !== $open_sans ) {
				$font_families[] = 'Open Sans:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;

/* ************************************************************************ */

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Healthkare 1.0
 */
if( !function_exists('healthkare_enqueue_scripts') ) :

	function healthkare_enqueue_scripts() {

		$theme = wp_get_theme("healthkare");
		$version = $theme['Version'];

		// Load the html5 shiv.
		wp_enqueue_script( 'respond.min', get_template_directory_uri() . '/js/html5/respond.min.js' );
		wp_script_add_data( 'respond.min', 'conditional', 'lt IE 9' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/* Google Font */
		if( function_exists('healthkare_fonts_url') ) :
			wp_enqueue_style( 'healthkare-fonts', healthkare_fonts_url() );
		endif;

		wp_enqueue_style( 'dashicons' );

		/* Lib */
		wp_enqueue_style( 'healthkare-lib', get_template_directory_uri() . '/assets/css/lib.css');
		wp_enqueue_script( 'healthkare-lib', get_template_directory_uri() . '/assets/js/lib.js', array( 'jquery' ), $version, true );

		wp_add_inline_script( 'healthkare-lib', '
			var templateUrl = "'.esc_url( get_template_directory_uri() ).'";
			var WPAjaxUrl = "'.esc_url(admin_url( 'admin-ajax.php' ) ).'";
		');

		/* Main Style */
		wp_enqueue_style( 'healthkare-plugins', get_template_directory_uri() . '/assets/css/plugins.css');
		wp_enqueue_style( 'healthkare-elements', get_template_directory_uri() . '/assets/css/elements.css');
		wp_enqueue_style( 'healthkare-wordpress', get_template_directory_uri() . '/assets/css/wordpress.css');
		wp_enqueue_style( 'healthkare-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css');

		/* RTL Style */
		$rtl_fn = healthkare_options('opt_rtl_switch');
		if( $rtl_fn == '1' ) {	 
			wp_enqueue_style( 'healthkare-rtl', get_template_directory_uri() . '/assets/css/rtl.css');
		}

		wp_enqueue_script( 'healthkare-functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), $version, true );
		wp_enqueue_style( 'healthkare-stylesheet', get_template_directory_uri() . '/style.css' );
		
		$stl_fn = healthkare_options('opt_select_stylesheet');
		if( !empty( $stl_fn ) ) : 
			$current_style = $stl_fn;
		else :
			$current_style = 'default'; 
		endif;

		wp_enqueue_style( 'healthkare-theme-color', get_template_directory_uri() . '/assets/css/color-schemes/'.$current_style.'.css');

		/* Custom CSS */
		$custom_css = "
			@media (min-width: 992px) {
				".healthkare_options("custom_css_desktop")."
			}
			@media (max-width: 991px) {
				".healthkare_options("custom_css_tablet")."
			}
			@media (max-width: 767px) {
				".healthkare_options("custom_css_mobile")."
			}			
		";
		wp_add_inline_style( 'healthkare-stylesheet', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'healthkare_enqueue_scripts' );
endif;

/* ************************************************************************ */
/**
 * Extend the default WordPress body classes.
 *
 * @since Healthkare 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
if( !function_exists('healthkare_body_classes') ) :

	function healthkare_body_classes( $classes ) {

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = "singular";
		}

		if( is_front_page() && !is_home() ) {
			$classes[] = "front-page";
		}

		if( is_404() ) {
			$classes[] = "404-template";
		}

		return $classes;
	}
	add_filter( 'body_class', 'healthkare_body_classes' );

endif;

/* ************************************************************************ */

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since Healthkare 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
if( !function_exists('healthkare_post_classes') ) :

	function healthkare_post_classes( $classes ) {
		if ( ! is_attachment() && has_post_thumbnail() ) { $classes[] = 'has-post-thumbnail'; }
		return $classes;
	}
	add_filter( 'post_class', 'healthkare_post_classes' );

endif;

/* ************************************************************************ */

if( class_exists("woocommerce") ) {

	/* Change number or products per row to 3 */
	if ( !function_exists('healthkare_loop_columns') ) :

		add_filter('loop_shop_columns', 'healthkare_loop_columns');

		function healthkare_loop_columns() {
			if( healthkare_options("opt_wc_column") != "" ) { $wccolumn = healthkare_options("opt_wc_column"); } else { $wccolumn = 3; }
			return $wccolumn; // products per row
		}
	endif;
	
	if ( !function_exists('healthkare_related_products_args') ) :

		add_filter( 'woocommerce_output_related_products_args', 'healthkare_related_products_args' );

		function healthkare_related_products_args( $args ) {

			$args['posts_per_page'] = 3; // 4 related products
			$args['columns'] = 3; // arranged in 3 columns
			return $args;
			
		}
	endif;
}

/* ************************************************************************ */

if( !function_exists('healthkare_remove_excerpt') )  {

  function healthkare_remove_excerpt( $excerpt ) {
    $patterns = "/\[[\/]?vc_[^\]]*\]/";
    $replacements = "";
    return preg_replace($patterns, $replacements, $excerpt);
  }
  
}

/* ************************************************************************ */

if( !function_exists('healthkare_excerpt') ) {
 
/** Function that cuts post excerpt to the number of word based on previosly set global * variable $word_count, which is defined below */
 
  function healthkare_excerpt($excerpt_length = 30) {
 
		global $post;
	 
		$word_count =  "";
	 
		$word_count = isset($word_count) && $word_count != "" ? $word_count : $excerpt_length;
	 
		$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content); $clean_excerpt = strpos($post_excerpt, '[...]') ? strstr($post_excerpt, '[...]', true) : $post_excerpt;
	 
		/** add by PR */
		if( $clean_excerpt != "" ) {
			
			$clean_excerpt = strip_shortcodes( healthkare_remove_excerpt($clean_excerpt) );
		 
			/** end PR mod */
		 
			$excerpt_word_array = explode (' ',$clean_excerpt);		 
			$excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);
 			
			$excerpt = implode(' ', $excerpt_word_array );
			
			if( $excerpt != "" ) {
				echo ''.$excerpt.' [...]';
			}
		}
 
	}
}
?>