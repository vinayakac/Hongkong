<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Healthkare
* @since Healthkare 1.0
*/
?>

<?php get_template_part("template-parts/blog","before"); ?>

<?php
if ( have_posts() ) :

	/* Start the Loop */
	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content' );

	/* End the loop. */
	endwhile;

	/* Previous/next page navigation. */
	the_posts_pagination( array(
		'prev_text'          => wp_kses( __( '<i class="fa fa-angle-double-left"></i> Prev', "healthkare" ), array( 'i' => array( 'class' => array() ) ) ),
		'next_text'          => wp_kses( __( 'Next <i class="fa fa-angle-double-right"></i>', "healthkare" ), array( 'i' => array( 'class' => array() ) ) ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', "healthkare" ) . ' </span>',
	) );

/* If no content, include the "No posts found" template. */
else :
	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<?php get_template_part("template-parts/blog","after"); ?>