<?php
/**
 * The Template for displaying single posts.
 *
 * @package patricia-minimal
 */

get_header(); ?>

<div id="primary" class="col-md-9 col-sm-9 content-area">
	
	<?php
		while ( have_posts() ) : the_post();
		$sticky_class = ( is_sticky() ) ? 'vt-post-sticky' : null;
		?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="post-inner">
								
				<div class="entry-content">

					<?php get_template_part( 'template-parts/post', 'meta' ); ?>
						
					<h1 class="post-title"><?php the_title_attribute(); ?></h1>
						
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="patricia-thumbnail">
							<?php the_post_thumbnail('patricia_minimal_blog_post'); ?>
						</div>
					<?php endif; ?>

					<div class="entry-summary">
						<?php the_content(); ?>
						<?php edit_post_link( __( 'Edit', 'patricia-minimal' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
						
					<?php
						if (get_theme_mod('single-tags-on', 1) == 1) :
						if ( get_the_tags() ) : ?>
						
							<div class="vt-post-tags">
								<h6><?php esc_html_e( 'Related Topics', 'patricia-minimal' ); ?></h6>
								<?php the_tags('',' '); ?>
							</div>
					  <?php
						endif;
						endif; ?>

					<?php
						if (get_theme_mod('single-post-nav', 1) == 1) :
						the_post_navigation( array(
							'prev_text' => '&lt; %title',
							'next_text' => '%title &gt;',
						) );
					endif; ?>
						
					<?php
						get_template_part( 'template-parts/single', 'post-author' );

						if (get_theme_mod('social-share-on ', 1) == 1) :
							get_template_part( 'template-parts/related', 'post' );
						endif;
						
						comments_template( '', true );
					?>
						
				</div><!-- entry-content -->
					
			</div><!-- post-inner -->
					
		</article><!-- #post-## -->
			
	<?php endwhile; // end of the loop. ?>
		
</div><!-- #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>