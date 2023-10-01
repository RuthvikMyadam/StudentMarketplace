<?php if ( get_theme_mod( 'patricia_footer_logo' ) ) : ?>
	<div class="footer-logo">
		<a class="image-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo esc_url(get_theme_mod( 'patricia_footer_logo' )); ?>" alt="<?php esc_attr_e('Logo', 'patricia-minimal');?>">
		</a>
	</div>
<?php endif; ?>