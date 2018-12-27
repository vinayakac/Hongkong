<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Healthkare
 * @since Healthkare 1.0
 */

$css = "";
if( ! has_post_thumbnail() ) {
	$css = "no-post-thumbnail";
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $css ); ?>>

	<?php	
	if( is_sticky() && is_home() ) {
		?><span class="sticky-post"><?php esc_html_e( 'Featured', "healthkare" ); ?></span><?php
	}

	get_template_part("template-parts/post_thumbnail");
	get_template_part("template-parts/format","audio");
	get_template_part("template-parts/format","video");
	get_template_part("template-parts/format","gallery");
	?>

	<div class="entry-content">
		<?php 
		if( is_single() ) {

			the_content( sprintf(
				esc_html__( 'Continue reading %s', "healthkare" ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', "healthkare" ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', "healthkare" ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			$post_tags = healthkare_options('opt_post_tags');
			if( has_tag() && $post_tags != "0" ) {
				?>
				<div class="post-tags">
					<span><?php esc_html_e('Tags :',"healthkare"); ?></span>
					<?php echo get_the_tag_list(' '); ?>
				</div>
				<?php
			}

			$post_cat = healthkare_options('opt_post_category');
			if( $post_cat != "0" ) {
				?>
				<div class="post-categories">
					<span><?php esc_html_e('Categories :',"healthkare"); ?></span>
					<?php the_category( '  ' ); ?>
				</div>
				<?php
			}
		}
		else {
			$current_post = get_post();
			$postexcerpt = $current_post->post_excerpt;
			if( $postexcerpt != "" || get_the_content() != "" ) {
				?><p><?php healthkare_excerpt(); ?></p><?php
			}	
		}
		?>
		<div class="entry-meta">
			<div class="post-date">
				<?php
				if( !is_single() ) {
					?>
					<a href="<?php the_permalink(); ?>"><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></a>
					<?php
				}
				else {
					?><i class="fa fa-calendar"></i><?php echo get_the_date();
				}
				?>
			</div>
			<div class="byline"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><i class="fa fa-user"></i><?php the_author(); ?></a></div>
			<div class="post-comment">
				<a href="<?php comments_link(); ?>">
					<i class="fa fa-comments-o"></i>
					<?php comments_number( 
						esc_html__('0 Comment',"healthkare"),
						esc_html__('1 Comment',"healthkare"),
						esc_html__('% Comments',"healthkare")
					);
					?>
				</a>
			</div>
			<?php
			$post_like = healthkare_options("opt_post_like");
			if( function_exists('healthkare_get_simple_likes_button') && $post_like == '1' ) {
				?>
				<div class="post-like">
					<?php echo healthkare_get_simple_likes_button( get_the_ID() ); ?>
				</div>
				<?php
			}
			$post_share = healthkare_options("opt_post_share");
			if( isset( $post_share ) && $post_share == '1' ) {
				?>
				<div class="post-share">
					<span><i class="fa fa-share-alt"></i><?php esc_attr('share',"healthkare"); ?></span>
					<ul class="social-share">
						<li><a href="javascript: void(0)" data-action="facebook" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-facebook"></i></a></li>
						<li><a href="javascript: void(0)" data-action="twitter" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-twitter"></i></a></li>
						<li><a href="javascript: void(0)" data-action="linkedin" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="javascript: void(0)" data-action="google-plus" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="javascript: void(0)" data-action="linkedin" data-title="<?php the_title(); ?>" data-url="<?php echo esc_url(the_permalink()); ?>"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
				<?php
			}
			?>
		</div>
		<?php
		if( is_single() && healthkare_options('opt_post_author') != "0" ) {
			if( get_the_author_meta('description') != '' && get_avatar( get_the_author_meta( 'ID' ) != '' ) ) {
				?>
				<!-- About Author -->
				<div class="about-author">
					<h3 class="section-title"><i class="icon icon-User"></i>
						<?php esc_html_e('About ',"healthkare"); ?>
						<span><?php esc_html_e('Author',"healthkare"); ?></span>
					</h3>
					<div class="author-content">
						<i><?php echo get_avatar( get_the_author_meta( 'ID' ) , 170 ); ?></i>
						<h5><?php the_author(); ?><span><?php echo esc_attr( get_user_meta( get_the_author_meta('ID'), 'healthkare_user_designation', true ) ); ?></span></h5>
						<ul>
							<?php if( get_user_meta( get_the_author_meta('ID'), 'healthkare_user_fb_url', true ) != "" ) { ?><li><a href="<?php echo esc_url( get_user_meta( get_the_author_meta('ID'), 'healthkare_user_fb_url', true ) ); ?>" title="Facebook"><i class="fa fa-facebook"></i></a></li><?php } ?>
							<?php if( get_user_meta( get_the_author_meta('ID'), 'healthkare_user_tw_url', true ) != "" ) { ?><li><a href="<?php echo esc_url( get_user_meta( get_the_author_meta('ID'), 'healthkare_user_tw_url', true ) ); ?>" title="Twitter"><i class="fa fa-twitter"></i></a></li><?php } ?>
							<?php if( get_user_meta( get_the_author_meta('ID'), 'healthkare_user_gp_url', true ) != "" ) { ?><li><a href="<?php echo esc_url( get_user_meta( get_the_author_meta('ID'), 'healthkare_user_gp_url', true ) ); ?>" title="Google"><i class="fa fa-google-plus"></i></a></li><?php } ?>
							<?php if( get_user_meta( get_the_author_meta('ID'), 'healthkare_user_lin_url', true ) != "" ) { ?><li><a href="<?php echo esc_url( get_user_meta( get_the_author_meta('ID'), 'healthkare_user_lin_url', true ) ); ?>" title="Linkedin"><i class="fa fa-linkedin"></i></a></li><?php } ?>
						</ul>
						<?php echo wpautop( wp_kses( get_the_author_meta('description'), wp_kses_allowed_html() ) ); ?>
					</div>
				</div><!-- About Author /- -->
				<?php
			}
		}
		?>
	</div>
</article>