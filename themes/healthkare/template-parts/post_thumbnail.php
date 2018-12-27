<?php
if( has_post_thumbnail() && ( get_post_format() != "audio" && get_post_format() != "video" && get_post_format() != "gallery" ) ) {
	?>
	<div class="entry-cover">
		<?php 
			the_post_thumbnail('healthkare_850_352');
			if ( !is_single() ) {
				?><div class="entry-header"><?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );?></div><?php
			}
		?>
	</div>
	<?php
}
elseif( !is_single() && ! has_post_thumbnail() && ( get_post_format() != "audio" && get_post_format() != "video" && get_post_format() != "gallery" ) ) {
	?>
	<div class="entry-cover">
		<?php
			if ( !is_single() ) {
				?><div class="entry-header"><?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );?></div><?php
			}
		?>
	</div>
	<?php
}
?>