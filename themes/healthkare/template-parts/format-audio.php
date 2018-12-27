<?php
if( get_post_format() == "audio" && 
		( get_post_meta( get_the_ID(), 'healthkare_cf_post_soundcloud_url', 1 ) != "" ||
		get_post_meta( get_the_ID(), 'healthkare_cf_post_audio_local', 1 ) != "" )
	) {
		?>
		<div class="entry-cover">
			<?php
			if( get_post_meta( get_the_ID(), 'healthkare_cf_post_audio_source', 1 ) == "soundcloud_link" && get_post_meta( get_the_ID(), 'healthkare_cf_post_soundcloud_url', 1 ) != "" ) {
				?>
				<iframe src="<?php echo esc_url( get_post_meta( get_the_ID(), 'healthkare_cf_post_soundcloud_url', 1 ) ); ?>"></iframe>
				<?php
			}
			elseif( get_post_meta( get_the_ID(), 'healthkare_cf_post_audio_source', 1 ) == "audio_upload_local" && get_post_meta( get_the_ID(), 'healthkare_cf_post_audio_local', 1 ) != "" ) {
				?>
				<audio controls>
					<source src="<?php echo esc_url( get_post_meta( get_the_ID(), 'healthkare_cf_post_audio_local', 1 ) ); ?>" type="audio/mpeg">
					<?php esc_html_e("Your browser does not support the audio element.","healthkare"); ?>
				</audio>
				<?php
			}
			if ( !is_single() ) {
				?><div class="entry-header"><?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );?></div><?php
			}
			?>
		</div>
		<?php
	}
?>