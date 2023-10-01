<?php
/**
 * The template for displaying the footer.
 *
 * @package patricia-minimal
 */
?>

	  </div><!-- #end row-->
	</div><!-- #end container-->
	
	<footer id="colophon" class="site-footer">

		<div class="container">
			<?php
				/* Footer Logo */
				get_template_part('template-parts/footer-logo');
				/* Social Icon */
				get_template_part('template-parts/social-footer'); 
				/* Copyright */
				do_action( 'patricia_minimal_footer' );
			?>
		</div><!-- .container -->
		
	</footer><!-- #colophon -->
	
</div><!-- #end wrapper-->

<?php wp_footer(); ?>
</body>
</html>