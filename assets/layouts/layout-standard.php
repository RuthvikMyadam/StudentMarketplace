<?php
/**
 * The default template for displaying content
 *
 * @package patricia-minimal
 */

if ( have_posts() ) :
	
/* Start the Loop */
while ( have_posts() ) : the_post();
$sticky_class = ( is_sticky() ) ? 'is_sticky' : null; ?>
	
	<article <?php post_class("post {$sticky_class}"); ?>>
				
		<div class="entry-content">
			
			<?php get_template_part( 'template-parts/post', 'meta' ); ?>
				
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h2>

			<div class="patricia-thumbnail">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
			
			<?php if( strpos( $post->post_content, '<!--more-->' ) ) : ?>
						
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

				<span class="readmore">
					<a href="<?php the_permalink(); ?>" class="btn link-more"><?php esc_html_e( 'Read more', 'patricia-minimal' ); ?><span class="dslc-icon fa fa-arrow-right"></span></a>
				</span>

			<?php else : ?>
				
				<div class="entry-summary">
					<?php
						the_content();
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'patricia-minimal' ),
							'after'  => '</div>',
						) );
					?>
				</div>
				  
				<?php endif; ?>

		</div><!-- .entry-content -->
	</article><!-- #post-## -->
		
<?php
	endwhile;
    else:
        get_template_part('template-parts/content', 'none');
    endif;
	?>