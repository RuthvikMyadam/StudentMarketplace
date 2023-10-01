<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package patricia-minimal
 */

if( ! function_exists( 'patricia_minimal_admin_notice' ) ) :
/**
 * Addmin notice for getting started page
*/
function patricia_minimal_admin_notice(){
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'patricia_minimal_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    
    if( 'themes.php' == $pagenow && !$meta ){
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ){
            return;
        }

        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'patricia-minimal' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'patricia-minimal' ), esc_html( $name ) ); ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=patricia-welcome' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to the getting started.', 'patricia-minimal' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?patricia_minimal_admin_notice=1"><?php esc_html_e( 'Dismiss', 'patricia-minimal' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'patricia_minimal_admin_notice' );

if( ! function_exists( 'patricia_minimal_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function patricia_minimal_update_admin_notice(){
    if ( isset( $_GET['patricia_minimal_admin_notice'] ) && $_GET['patricia_minimal_admin_notice'] = '1' ) {
        update_option( 'patricia_minimal_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'patricia_minimal_update_admin_notice' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function patricia_minimal_pingback_header() {
	
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'patricia_minimal_pingback_header' );
 
/**
 * Add Action for Header Topbar
 */
function patricia_minimal_topbar(){ ?>

	<div class="topbar">
		<div class="container">
		  
			<?php if (get_theme_mod('patricia_minimal_header_social', 1) == 1) : ?>
			  <div class="d-none d-sm-block">
			    <?php get_template_part('template-parts/social', 'topbar'); ?>
			  </div>
			<?php endif; ?>
			  
			<div class="d-none d-sm-block col-md-1 col-sm-1 float-right">
				<?php get_template_part('template-parts/topbar-search'); ?>
			</div>
			  
			<div class="col-md-9">
				<nav id="nav-wrapper" class="main-navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'patricia-minimal' ); ?>">
					
					<?php if ( has_nav_menu( 'primary' ) ) {?>
					  <button class="nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
						<div class="bars">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div>
						<span class="dashicons" aria-hidden="true"></span>
					  </button><!-- /nav-toggle -->
					<?php } ?>

					
					<div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
						<button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>

						<div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'patricia-minimal' ); ?>">
							<?php
							  if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'container' 	 => '',
									'menu_class'	 => 'primary-menu vtmenu nav-menu',
									'menu_id' 		 => '',
									'fallback_cb' 	 => 'patricia_minimal_navigation_fallback',
								) );
							} else {
							?>
								
							<div class="menu-modal-inner modal-inner">
								<ul class="vtmenu li">
								  <?php if ( current_user_can( 'edit_theme_options' ) ) { ?>
									<li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php echo esc_html__( 'Add menu for theme location: Primary Menu', 'patricia-minimal' );?></a></li>
								<?php } ?>
								</ul>
							</div>
							
							<?php } ?>
						</div>
					</div>
					
				</nav><!-- #navigation -->
			</div>
			
			<?php if (get_theme_mod('patricia_minimal_header_social', 1) == 1) : ?>
			  <div class="d-block d-sm-none">
			    <?php get_template_part('template-parts/social', 'topbar'); ?>
			  </div>
			<?php endif; ?>
			  
			<div class="d-block d-sm-none col-md-1 float-right">
				<?php get_template_part('template-parts/topbar-search'); ?>
			</div>
			  
		</div><!-- container -->
	</div><!-- topbar -->

<?php

}
add_action('patricia_minimal_topbar_action', 'patricia_minimal_topbar', 20 );

/**
 * Fallback callback for primary navigation menu.
 */
if ( ! function_exists( 'patricia_minimal_navigation_fallback' ) ) {

    function patricia_minimal_navigation_fallback() {
        ?>
        <ul class="topbar-menu pull-left">
            <?php 
            wp_list_pages( array( 
                'title_li' => '', 
                'depth' => 4,
            ) ); 
            ?>
        </ul><!-- .primary-menu -->
        <?php    
    }
}

/**
 * Header hook
 */
function patricia_minimal_header(){ ?>

	<header id="masthead" class="site-header" <?php if( has_header_image() ) : ?> style="background-image: url(<?php echo esc_url( get_header_image() ); ?>)" <?php endif; ?>>
		<div class="container">
			<div class="site-branding">
	
			  <?php
				the_custom_logo();
				if (is_front_page() && is_home()) :
					?>
					<h1 class="site-title">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
					</h1>
				<?php
				else :
					?>
					<p class="site-title">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
					</p>
				<?php
				endif;
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<h2 class="site-description"><?php echo esc_html($description); ?></h2>
				<?php endif; ?>
						
			</div><!-- .site-branding -->
				
		</div><!-- container -->
			
		<?php if (get_theme_mod('patricia_minimal_header_overlay', 1) == 1) : ?>
			<?php if ( get_header_image() ) { ?><div class="mask"></div><?php } ?>
		<?php endif; ?>
			
	</header><!-- #masthead -->

	<?php

}
add_action('patricia_minimal_header_action','patricia_minimal_header', 20 );

/**
 * Slider settings
 */
function patricia_minimal_slider_config() {
	
	if ( get_theme_mod('patricia_minimal_featured_slider', 0) == 1) {
	
		get_template_part('template-parts/featured', 'slider'); 

	}
}
add_action('patricia_minimal_slider','patricia_minimal_slider_config',20);

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'patricia_minimal_first_category' ) ) :
	function patricia_minimal_first_category() {
		
		$category 		= get_the_category();
		if ($category) {
		  echo '<a href="' . esc_url(get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a>';
		}
		
	}
endif;

/**
 * Scroll to top
 */
function patricia_minimal_scroll_to_top() {
	
	if (get_theme_mod('button_up', 1) == 1){
		
?>
	<div id="backtotop">
		<a href="#top"><span><i class="fa fa-angle-up"></i></span></a>
	</div>
	
<?php
}}
add_action('wp_footer', 'patricia_minimal_scroll_to_top');