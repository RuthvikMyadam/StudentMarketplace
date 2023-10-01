<?php if ( is_singular() && get_the_author_meta( 'description' ) ) : ?>
<div class="vt-post-author">
  <div class="row">
  	<div class="col-md-2">
		<div class="author-img">
			<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
		</div>
	</div>

	<div class="col-md-10">
		<div class="author-content">
			<h4 class="author-title">
				<?php the_author_posts_link(); ?>
			</h4>
			<p><?php the_author_meta('description'); ?></p>
		</div>
	</div>
	
  </div>
</div><!-- end post-author -->
<?php endif; ?>