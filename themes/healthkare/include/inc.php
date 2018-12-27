<?php
/* Define Constants */
define( 'HEALTHKARE_IMGURI', get_template_directory_uri() . '/assets/images' );

/**
 * Register three widget areas.
 *
 * @since Healthkare 1.0
 */
if ( ! function_exists( 'healthkare_widgets_init' ) ) {
	function healthkare_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Right Sidebar (Default for Blog)', "healthkare" ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title"><i class="icon icon-Picture"></i>',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Left Sidebar', "healthkare" ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title"><i class="icon icon-Picture"></i>',
			'after_title'   => '</h3>',
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 1', "healthkare" ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 2', "healthkare" ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 3', "healthkare" ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 4', "healthkare" ),
			'id'            => 'sidebar-6',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 5', "healthkare" ),
			'id'            => 'sidebar-7',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 6', "healthkare" ),
			'id'            => 'sidebar-8',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 7', "healthkare" ),
			'id'            => 'sidebar-9',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar 8', "healthkare" ),
			'id'            => 'sidebar-10',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Right Sidebar (Default for Shop)', "healthkare" ),
			'id'            => 'sidebar-11',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title"><i class="icon icon-Picture"></i>',
			'after_title'   => '</h3>',
		));
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Left Sidebar', "healthkare" ),
			'id'            => 'sidebar-12',
			'description'   => esc_html__( 'Appears in the Content section of the site.', "healthkare" ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title"><i class="icon icon-Picture"></i>',
			'after_title'   => '</h3>',
		));		
	}
	
	add_action( 'widgets_init', 'healthkare_widgets_init' );
}

/**************************************************************************/
 
if( ! function_exists("healthkare_str_replace") ) :

	function healthkare_str_replace( $str ) {
		
		$newstring = "";

		// Cut the title to 2 parts
		if( $str != "") {
			
			$string_parts = explode(' ', $str, 2 );

			// Throw first word inside a span
			$newstring = '<span>'.$string_parts[0].'</span>';

			// Add the remaining words if any
			if( isset( $string_parts[1] ) ) {
				$newstring .= ' '.$string_parts[1];
			}
		}

		return $newstring;
	}
endif;

require_once( trailingslashit( get_template_directory() ) . 'include/nav_walker.php' );
require_once( trailingslashit( get_template_directory() ) . 'include/postlike/postlike.php' );