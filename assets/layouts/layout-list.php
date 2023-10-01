<div class="first_fullpost_collist">
    <?php
	/* Standard then List */
	if ( have_posts() ) :	
							
	/* Start the Loop */
	while ( have_posts() ) : the_post();
	
	$sticky_class = ( is_sticky() ) ? 'is_sticky' : null;

	$class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'clear last' : 'clear'; ?>
	
	<div class="vt-blog-list">

		<article <?php post_class('post'); ?>>
			<div class="post-content">
			   
				<div class="patricia-thumbnail">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('patricia_minimal_list_post'); ?>
					</a>
				</div>
			   
				<div class="entry-overview">
					
					<div class="post-header">
						<?php get_template_part('template-parts/post', 'meta'); ?>
						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</div>
						
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
							
					<span class="readmore">
						<a href="<?php the_permalink(); ?>" class="btn link-more"><?php esc_html_e( 'Read more', 'patricia-minimal' ); ?><span class="dslc-icon fa fa-arrow-right"></span></a>
					</span>
					
				</div><!-- entry-overview -->
					
			</div>
		</article>
		
	</div>
	
	<?php
		endwhile;
		else:
			get_template_part('template-parts/content', 'none');
		endif;
		?>
</div>
