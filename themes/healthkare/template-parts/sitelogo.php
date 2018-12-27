<?php
$plogo = $limg = $lsitetitle = $lcustomtxt = "";

$plogo = get_post_meta( healthkare_get_the_ID(), "healthkare_cf_custom_logo", true );
$limg = healthkare_options('opt_logoimg','url');
$lsitetitle = get_bloginfo('name');
$lcustomtxt = healthkare_options('opt_customtxt');

$logo_w = healthkare_options('opt_logo_size',"width");
$logo_h = healthkare_options('opt_logo_size','height');

if( $plogo != "" ) { 
	?>
	<a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img src="<?php echo esc_url( $plogo ); ?>" alt=""  />
	</a>
	<?php
}
elseif( healthkare_options('opt_logotype') == "2" && $limg != "" ) { // Logo - Image
	?>
	<a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if( $logo_w != "px" && $logo_h != "px" ) { ?>style="<?php if( $logo_w != "px" ) { ?>max-width: <?php echo esc_attr( $logo_w ); ?>; <?php } ?> <?php if( $logo_h != "px" ) { ?>max-height: <?php echo esc_attr( $logo_h ); ?>;<?php } ?>"<?php } ?>>
		<img src="<?php echo esc_url( $limg ); ?>" alt=""/>
	</a>
	<?php
}
elseif( healthkare_options('opt_logotype') == "1" && $lsitetitle != "" ) { // Logo - Site Title
	?>
	<a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( $lsitetitle ); ?></a>
	<?php
}
elseif( healthkare_options('opt_logotype') == "3" && $lcustomtxt != "" ) { // Logo - Custom Text
	?>
	<a class="navbar-brand custom-txt" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php echo esc_attr( $lcustomtxt ); ?>
	</a>
	<?php
} 
else {
	?>
	<a class="navbar-brand image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<img src="<?php echo esc_url( HEALTHKARE_IMGURI ); ?>/logo.png" alt=""/>
	</a>
	<?php
}
?>