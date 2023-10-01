<?php
/**
 * The template for displaying search results pages.
 *
 * @package patricia-minimal
 */
 
get_header(); ?>

<div id="primary" class="col-md-9 col-sm-9 content-area">
		
	<header class="page-header">
		<span><?php printf( 
			/* translators: %s: for the search keyword */
			esc_html__( 'Search results for: %s', 'patricia-minimal' ), '</span><h3 class="archive-title">' . esc_attr( get_search_query() ) . '</h3>' ); ?>
	</header><!-- .page-header -->

	<?php if ( get_theme_mod( 'archive-page-layout' ) == 'layout-grid' ) :

			get_template_part( 'layouts/layout', 'grid' ); 

		elseif ( get_theme_mod( 'archive-page-layout' ) == 'layout-standard' ): 

			get_template_part( 'layouts/layout', 'standard' );
						
		else :

			get_template_part( 'layouts/layout', 'grid' );

		endif;
				 
	?>
		
</div><!-- #primary -->

<?php get_sidebar(); ?>      
<?php get_footer(); ?>