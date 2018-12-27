<?php

/* Post Format : Video */
if( get_post_format() == "video" && (
	get_post_meta( get_the_ID(), 'healthkare_cf_post_video_link', 1 ) != "" ||
	get_post_meta( get_the_ID(), 'healthkare_cf_post_video_embed', 1 ) != "" ||
	get_post_meta( get_the_ID(), 'healthkare_cf_post_video_local', 1 ) != "" )
) {
	?>
	
	<div class="entry-cover">
		<?php
		if( get_post_meta( get_the_ID(), 'healthkare_cf_post_video_source', 1 ) == "video_link" && get_post_meta( get_the_ID(), 'healthkare_cf_post_video_link', 1 ) != "" ) {
			echo wp_oembed_get( esc_url( get_post_meta( get_the_ID(), 'healthkare_cf_post_video_link', true ) ) );
		}
		elseif( get_post_meta( get_the_ID(), 'healthkare_cf_post_video_source', 1 ) == "video_embed_code" && get_post_meta( get_the_ID(), 'healthkare_cf_post_video_embed', 1 ) != "" ) {
			echo get_post_meta( get_the_ID(), 'healthkare_cf_post_video_embed', 1 );
		}
		elseif( get_post_meta( get_the_ID(), 'healthkare_cf_post_video_source', 1 ) == "video_upload_local" && get_post_meta( get_the_ID(), 'healthkare_cf_post_video_local', 1 ) != "" ) {
			?>
			<video controls>
				<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'healthkare_cf_post_video_local', 1 ) ); ?>" type="video/mp4">
				<?php esc_html_e("Your browser does not support the video tag.","healthkare"); ?>
			</video> 
			<?php
		}
		?>
	</div>
	<?php
}
?>