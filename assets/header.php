<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "content" div.
 *
 * @package WordPress
 * @subpackage patricia-minimal
 * @since patricia-minimal 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}else { 
		do_action( 'wp_body_open' ); 
	}
	?>
    <div id="page-wrapper">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'patricia-minimal' ); ?></a>

		<?php
		  do_action('patricia_minimal_topbar_action');
		  do_action('patricia_minimal_header_action');
		?>
		
		<div id="content" class="container">
		
		  <?php
			do_action('patricia_minimal_slider');
		   ?>
		 
		  <div class="row">
		  
