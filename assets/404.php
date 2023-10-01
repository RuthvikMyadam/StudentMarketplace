<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package patricia-minimal
 */
 
get_header(); ?>

<div class="error-page">

	<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'patricia-minimal' ); ?></h2>
	
	<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'patricia-minimal' ); ?></p>
			
	<?php get_search_form(); ?>
			
	<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

	<div class="widget widget_categories">
		<h2 class="widgettitle"><?php esc_html_e( 'Most Used Categories', 'patricia-minimal' ); ?></h2>
		<ul>
		<?php
			wp_list_categories( array(
				'orderby'    => 'count',
				'order'      => 'DESC',
				'show_count' => 1,
				'title_li'   => '',
				'number'     => 10,
			) );
		?>
		</ul>
	</div><!-- .widget -->

	<?php
		/* translators: %1$s: smiley */
		$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'patricia-minimal' ), convert_smilies( ':)' ) ) . '</p>';
		the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
	?>

	<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					
</div>
	
<?php get_footer(); ?>