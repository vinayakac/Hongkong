<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Healthkare
 * @since Healthkare 1.0
 */
	$pfooter_type = get_post_meta( healthkare_get_the_ID(), 'healthkare_cf_footer_layout', true );
	$footer_type = healthkare_options("opt_footertype");
	
	if( $pfooter_type != "" ) {
		$ftr_type = $pfooter_type;
	}
	elseif( $footer_type != "" ) {
		$ftr_type = $footer_type;
	}
	else {
		$ftr_type = "2";
	}
	get_template_part("template-parts/footer" . $ftr_type );
	?>
	<button class="button-top" style="display: block;"></button>
	<?php wp_footer(); ?>
</body>
</html>