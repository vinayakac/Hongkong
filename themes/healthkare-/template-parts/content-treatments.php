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
 
$treatment_grp = get_post_meta( get_the_ID(), 'healthkare_cf_treatments_grp', true );

$special_grp = get_post_meta( get_the_ID(), 'healthkare_cf_special_treatment_grp', true );
								
?>
 
<!-- Treatments Details -->
<div class="treatments-details container-fluid no-left-padding no-right-padding">
	<!-- Container -->
	<div class="container">
		<div class="row">
			<?php
			if( has_post_thumbnail() ) {
				?>
				<div class="col-md-12 col-sm-12 col-xs-12 treatments-img">
					<?php the_post_thumbnail('healthkare_1170_420'); ?>
				</div>
				<?php
			}
			?>
			<div class="treatments-details-content">
				<?php
					if( count( $treatment_grp ) > 0 && is_array( $treatment_grp ) ) {
						?>
						<div class="col-md-5 col-sm-12 col-xs-12">
							<h5><?php esc_html_e('Treatment Details',"healthkare"); ?></h5>
							<table class="table table-bordered">
								<tbody>
									<?php
										foreach ( (array) $treatment_grp as $key => $value ) {
											if ( isset( $value['group_title'] ) && isset( $value['group_value'] ) ){
												?>
												<tr>
													<?php
													if ( isset( $value['group_title'] ) ){
														?>
														<th><?php echo esc_attr( $value['group_title'] ); ?></th>
														<?php
													}
													if ( isset( $value['group_value'] ) ){
														?><td><?php echo esc_attr( $value['group_value'] ); ?></td><?php
													}
													?>
												</tr>
												<?php
											}
										}
									?>
								</tbody>
							</table>
						</div>
						<?php
					}
				?>
				<div class="col-md-7 col-sm-12 col-xs-12">
					<div class="description-details">
						<div class="section-header">
							<h3><?php esc_html_e('Case ',"healthkare"); ?>
								<span><?php esc_html_e('Description ',"healthkare"); ?></span>
							</h3>
						</div>
						<?php
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
						?>
					</div>
				</div>
			</div>
			<!-- Gallery Section -->
			<div class="gallery-section gallery-section3 container-fluid no-left-padding no-right-padding">
				<!-- Section Header -->
				<div class="section-header">
					<h3><?php esc_html_e('Specialized ',"healthkare"); ?>
						<span><?php esc_html_e('Treatments',"healthkare"); ?></span>
					</h3>
					<?php echo wpautop( wp_kses( get_post_meta(get_the_ID(),'healthkare_cf_special_desc', true ), wp_kses_allowed_html() ) ); ?>
				</div><!-- Section Header /- -->
				<?php
					if( count( $special_grp ) > 0 && is_array( $special_grp ) ) {
						?>
						<ul class="treatment_blocks">
							<?php
							foreach ( (array) $special_grp as $key => $value ) {
								?>
								<li class="col-md-4 col-sm-4 col-xs-4 design">
									<div class="content-image-block">
										<?php
										if ( isset( $value['group_image'] ) ){
											echo wp_get_attachment_image($value['group_image_id'],'healthkare_370_240');
										}
										?>
										<div class="content-block-hover">
											<?php
											if( function_exists('healthkare_get_simple_likes_button') )	 {
												?>
												<div class="post-like">
													<?php echo healthkare_get_simple_likes_button( get_the_ID() ); ?>
												</div>
												<?php
											}
											?>
											<a class="zoom-in" href="<?php echo esc_url( wp_get_attachment_url($value['group_image_id'] ) ); ?>" title="Expand"><i class="fa fa-arrows-alt"></i></a>
											<?php if ( isset( $value['special_title'] ) ){ ?><h5><?php echo esc_attr( $value['special_title'] ); ?></h5><?php } ?>
										</div>
									</div>
								</li>
								<?php
							}
							?>
						</ul>
						<?php
					}
				?>
			</div><!-- Gallery Section /- -->
		</div>
	</div><!-- Container /- -->
</div><!-- Treatments Details /- -->