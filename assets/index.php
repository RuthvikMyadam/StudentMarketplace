<?php
/**
 * The main template file.
 *
 * @package patricia-minimal
 */

get_header(); ?>

<div id="primary" class="col-md-9 col-sm-9 content-area">

	<?php if ( get_theme_mod( 'blog-page-layout' ) == 'layout-list' ) :

			get_template_part( 'layouts/layout', 'list' ); 

		elseif ( get_theme_mod( 'blog-page-layout' ) == 'layout-standard' ): 

			get_template_part( 'layouts/layout', 'standard' );
						
		else :

			get_template_part( 'layouts/layout', 'list' );
			
		endif;
				 
	?>
	
	<?php the_posts_pagination(); ?>
	
</div><!-- #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>