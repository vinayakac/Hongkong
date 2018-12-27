<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Healthkare
* @since Healthkare 1.0
*/
get_header(); ?>

<?php
$error_image = "";
if( healthkare_options("opt_error_img", "url") != "" ) {
	$error_image = healthkare_options("opt_error_img", "url");
}
else {
	$error_image = HEALTHKARE_IMGURI . '/404.png';
}
?>
<main id="main" class="site-main">
	<div class="error-page container-fluid no-left-padding no-right-padding">
		<!-- Container -->
		<div class="container">
			<div class="error-content">
				<img src="<?php echo esc_url($error_image); ?>" alt="">
				<?php 
				if( healthkare_options("opt_error_title") != "" ) {
					?>
					<h5><?php echo healthkare_str_replace(esc_attr( healthkare_options("opt_error_title") ) ); ?></h5>
					<?php
				}
				else {
					?><h5><span><?php esc_html_e('Oops,',"healthkare"); ?></span>
						<?php esc_html_e('The page is not exist!',"healthkare"); ?>
					</h5><?php
				}
				if( healthkare_options("opt_error_content") != "" ) {
					echo do_shortcode( wpautop( wp_kses( healthkare_options("opt_error_content"), wp_kses_allowed_html() ) ) );
				}
				else {
					?><p><?php esc_html_e('Just two good old boys never meaning no harm beats all you have ever saw been in trouble with the law since the day they was born so the most of day this is the tale of our castaways they re here for a long long time',"healthkare"); ?></p>
					<?php
				}
				?>
			</div>
			<div class="col-md-6 col-sm-8 col-xs-10">
				<?php get_search_form(); ?>
			</div>
		</div><!-- Container /- -->
	</div><!-- Error Page /- -->
</main><!-- .site-main -->
<?php get_footer(); ?>