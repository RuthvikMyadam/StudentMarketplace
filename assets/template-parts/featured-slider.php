<?php
	if ( is_front_page() || is_home() ) {
	if (get_theme_mod('patricia_minimal_featured_slider', 1) == 1) :
	$featured_cat = esc_html(get_theme_mod( 'patricia_minimal_featured_cat' ));
	$get_featured_posts = get_theme_mod('patricia_minimal_featured_id');
	$number = esc_html(get_theme_mod( 'patricia_minimal_featured_slider_slides' ));
		
	if($get_featured_posts) {
		$featured_posts = explode(',', $get_featured_posts);
		$args = array( 'showposts' => $number, 'post_type' => array('post', 'page'), 'post__in' => $featured_posts, 'orderby' => 'post__in' );
	} else {
		$args = array( 'cat' => $featured_cat, 'showposts' => $number );
	}						

	$feat_query = new WP_Query( $args );
	if ($feat_query->have_posts()) :
?>
				
	<div class="featured-area owl-theme">
		<div class="owl-carousel slider">

		<?php while ($feat_query->have_posts()) :
			$feat_query->the_post();
			$image_featured = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		?>
			<div class="slide-item">
                <div class="slide-item-image" data-src="<?php echo esc_url($image_featured); ?>" style="background-image: url(<?php echo esc_url($image_featured); ?>)"></div>
				<div class="slide-item-text">
				  <div class="slide-item-block">
				    <div class="slide-item-desc">
        			  <div class="post-text-inner">
					
						<?php if (get_theme_mod('patricia_minimal_category_slider', 1) == 1) : ?>
                          <p class="post-cats"><?php patricia_minimal_first_category(); ?></p>
						<?php endif; ?>
						
            			<h3 class="post-title">
							<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title_attribute(); ?></a>
						</h3> 
						
						<div class="post-meta"><?php patricia_minimal_posted_on() ?></div>
						
                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div>
						
						<?php if (get_theme_mod('patricia_minimal_read_more_slider', 1) == 1) : ?>
						<a class="btn link-more" href="<?php the_permalink() ?>"><?php echo wp_kses_post( get_theme_mod( 'slider-cont-reading', __( 'Continue Reading', 'patricia-minimal' ) ) ); ?><span class="dslc-icon fa fa-arrow-right"></span></a>
						<?php endif; ?>
						
                      </div>
                    </div>
        		  </div>
        		</div>
			</div>
		<?php endwhile; ?>
        </div>
    </div><!-- .featured-slider-->
<?php
	endif;
	/* Restore original Post Data */
	wp_reset_postdata();
	
	endif;
	}
?>