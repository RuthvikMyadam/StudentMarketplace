<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Customizer Library Patricia theme
 */

if ( ! function_exists( 'customizer_library_patricia_minimal_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_patricia_minimal_build_styles() {

	// Primary Color
	$setting = 'patricia_minimal_color_scheme';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a:hover, a:focus,
				.slide-item .post-title a:hover,
				.post-meta .patricia-categories a,
				#content article .entry-summary a,
				.widget a:hover, .latest-post .post-item-text h4 a:hover,
				.widget_categories ul li a:hover,
				.entry-related h3 a:hover,
				.site-footer .copyright a:hover,
				#backtotop span:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	$setting = 'patricia_minimal_color_scheme';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.featured-area .owl-carousel .owl-nav .owl-next:hover,
				 .featured-area .owl-carousel .owl-nav .owl-prev:hover'
			),
			'declarations' => array(
				'background' => $color
			)
		) );
	}
	$setting = 'patricia_minimal_color_scheme';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.featured-area .slide-item .feat-more:hover,
				 .featured-area .slide-item-text .post-cats a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	$setting = 'patricia_minimal_color_scheme';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#backtotop span:hover::after'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	$setting = 'patricia_minimal_color_scheme';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.featured-area .slide-item .feat-more:hover'
			),
			'declarations' => array(
				'border' => '1px solid ' . $color
			)
		) );
	}
	$setting = 'patricia_minimal_color_scheme';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.vt-post-tags a:hover, a.link-more,
				 .pagination .nav-links span,
				 .pagination .nav-links a:hover'
			),
			'declarations' => array(
				'background' => $color
			)
		) );
	}
	$setting = 'patricia_minimal_color_scheme';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.tagcloud a:hover, .vt-post-tags a:hover'
			),
			'declarations' => array(
				'border' => '1px solid ' . $color
			)
		) );
	}
	
	// Topbar Background Color
	$setting = 'patricia_minimal_topbar_bg_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.topbar'
			),
			'declarations' => array(
				'background' => $color
			)
		) );
	}
	
	// Menu Link Color
	$setting = 'menu_link_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#nav-wrapper .vtmenu a, #nav-wrapper .vtmenu .dropdown-menu a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	
	// Menu Link Hover Color
	$setting = 'menu_link_hover_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#nav-wrapper .vtmenu a:hover,
				 #nav-wrapper .vtmenu .dropdown-menu a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	
	// Header Background Color
	$setting = 'patricia_minimal_header_bg_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	
	// Site Title Color
	$setting = 'patricia_minimal_site_title_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	
	// Site Tagline Color
	$setting = 'patricia_minimal_site_desc_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-description'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	
	// Footer Background Color
	$setting = 'patricia_minimal_footer_bg_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	
	// Footer Text Color
	$setting = 'footer_text_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .copyright, .social-footer a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	
	// Footer Link Color
	$setting = 'footer_link_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .copyright a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;

add_action( 'customizer_library_styles', 'customizer_library_patricia_minimal_build_styles' );

if ( ! function_exists( 'customizer_library_patricia_minimal_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_patricia_minimal_styles() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"patricia-custom-css\">\n";
		echo esc_html($css);
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'customizer_library_patricia_minimal_styles', 11 );