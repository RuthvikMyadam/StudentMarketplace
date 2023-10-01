<?php
/**
 * Defines customizer options
 *
 * @package patricia-minimal 
 */

function customizer_library_patricia_minimal_options() {

	// Theme defaults
	$primary_color = '#ceac92';
	$header_color = '#535353';
	$header_search_bg_color = '#3c4852';
	$widget_title_boder_color = '#eb5424';
	$pagination_bg_color = '#eb5424 ';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	/**-----------------
	 * Theme Settings
	 -----------------*/
	$panel = 'vt-panel-layout';
	
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Theme Settings', 'patricia-minimal' ),
        'priority' => '30'
    );
	

	/**-----------------
	 * Header Settings
	 -----------------*/
	$section = 'header_image';
    
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Header', 'patricia-minimal' ),
		'priority' => '20',
		'panel' => $panel
	);
	
	$options['patricia_minimal_header_social'] = array(
		'id' => 'patricia_minimal_header_social',
		'label'   => __( 'Display Header Social Icons', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1
	);
	$options['patricia_minimal_header_search'] = array(
		'id' => 'patricia_minimal_header_search',
		'label'   => __( 'Display Header Search', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1
	);
	$options['patricia_minimal_header_overlay'] = array(
		'id' => 'patricia_minimal_header_overlay',
		'label'   => __( 'Enable Image Overlay', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'priority' => '30',
		'default' => 1
	);
	
	// Social Media Settings
    $section = 'vt-site-layout-section-socmed';
	
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Media Profile', 'patricia-minimal' ),
		'description'  => __('Enter social media profile links', 'patricia-minimal'),
        'priority' => '30',
		'panel' => $panel
    );
	
    $options['patricia_minimal_facebook'] = array(
        'id' => 'patricia_minimal_facebook',
        'label'   => __( 'Facebook', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_minimal_twitter'] = array(
        'id' => 'patricia_minimal_twitter',
        'label'   => __( 'Twitter', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_minimal_linkedin'] = array(
        'id' => 'patricia_minimal_linkedin',
        'label'   => __( 'Linkedin', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_minimal_pinterest'] = array(
        'id' => 'patricia_minimal_pinterest',
        'label'   => __( 'Pinterest', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_minimal_instagram'] = array(
        'id' => 'patricia_minimal_instagram',
        'label'   => __( 'Instagram', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_minimal_youtube'] = array(
        'id' => 'patricia_minimal_youtube',
        'label'   => __( 'Youtube', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	
	// Featured slider
    $section = 'vt-section-slider';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Featured Slider', 'patricia-minimal' ),
		'priority' => '40',
		'panel' => $panel
	);
	
	$options['patricia_minimal_featured_slider'] = array(
		'id' => 'patricia_minimal_featured_slider',
		'label'   => __( 'Enable Featured Slider', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 0,
		'priority' => '5'
	);	
	
	$options['patricia_minimal_featured_slider_slides'] = array(
        'id' => 'patricia_minimal_featured_slider_slides',
        'label'   => __( 'Amount of Slides', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 5,
		'priority' => '7'
    );
	
	/**-----------------
	 * Blog Settings
	 -----------------*/
	$section = 'theme-settings';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Settings', 'patricia-minimal' ),
		'priority' => '50',
		'panel' => $panel
	);

    $choices = array(
		'layout-list' => __('List Layout', 'patricia-minimal'),
		'layout-standard' => __('Standard Layout', 'patricia-minimal'),
			
    );
    $options['blog-page-layout'] = array(
        'id' => 'blog-page-layout',
        'label'   => __( 'Homepage Layout', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'layout-list'
    );
	
	$choices = array(
		'layout-list' => __('List Layout', 'patricia-minimal'),
		'layout-standard' => __('Standard Layout', 'patricia-minimal'),
			
    );
    $options['archive-page-layout'] = array(
        'id' => 'archive-page-layout',
        'label'   => __( 'Archive Layout', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'layout-list'
    );
	
	$options['patricia_minimal_entry_excerpt'] = array(
		'id' => 'patricia_minimal_entry_excerpt',
		'label'   => __( 'Number of words to show on excerpt', 'patricia-minimal' ),
		'section' => $section,
        'type'    => 'number',
        'default' => 38,
        'description' => __( 'Default: 38', 'patricia-minimal' )		
	);
	
	$options['patricia_minimal_sticky_sidebar'] = array(
		'id' => 'patricia_minimal_sticky_sidebar',
		'label'   => __( 'Enable Sticky Sidebar', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	$options['button_up'] = array(
		'id' => 'button_up',
		'label'   => __( 'Enable "BackToTop" button', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	
	/**-----------------
	 * Single Posts 
	 -----------------*/
	$section = 'patricia_minimal_single_post_section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Single Post', 'patricia-minimal' ),
		'priority' => '60',
		'panel' => $panel
	);
	
	$options['single-tags-on'] = array(
		'id' => 'single-tags-on',
		'label'   => __( 'Display Post Tags', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	$options['single-post-nav'] = array(
		'id' => 'single-post-nav',
		'label'   => __( 'Display Post Nav', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( 'Display Related posts', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	
	// Footer Settings
    $section = 'vt-site-layout-section-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'patricia-minimal' ),
        'priority' => '110',
		'panel' => $panel
    );
	$options['patricia_footer_logo'] = array(
		'id' => 'patricia_footer_logo',
		'label'   => __( 'Footer Logo', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => ''
	);
	$options['patricia_minimal_footer_social'] = array(
		'id' => 'patricia_minimal_footer_social',
		'label'   => __( 'Display Social Profile', 'patricia-minimal' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	
	/**-----------------
	 * Color Settings
	 -----------------*/
    $panel = 'vt-colors-settings';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Color Settings', 'patricia-minimal' ),
        'priority' => '80'
    );
    
    $section = 'colors';
	
	$options['patricia_minimal_color_scheme'] = array(
        'id' => 'patricia_minimal_color_scheme',
        'label'   => __( 'Color Scheme', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
	
	$options['patricia_minimal_topbar_bg_color'] = array(
        'id' => 'patricia_minimal_topbar_bg_color',
        'label'   => __( 'Topbar Background', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#f7f2ee'
    );
	
	$options['menu_link_color'] = array(
        'id' => 'menu_link_color',
        'label'   => __( 'Menu Link Color', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#535353'
    );
	
	$options['menu_link_hover_color'] = array(
        'id' => 'menu_link_hover_color',
        'label'   => __( 'Menu Link Hover Color', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
	
    $options['patricia_minimal_header_bg_color'] = array(
        'id' => 'patricia_minimal_header_bg_color',
        'label'   => __( 'Header Background', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#ffffff'
    );
	$options['patricia_minimal_site_title_color'] = array(
        'id' => 'patricia_minimal_site_title_color',
        'label'   => __( 'Site Title Color', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
		'default' => $header_color,
    );
	$options['patricia_minimal_site_desc_color'] = array(
        'id' => 'patricia_minimal_site_desc_color',
        'label'   => __( 'Site Tagline Color', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#757575'
    );
    $options['patricia_minimal_footer_bg_color'] = array(
        'id' => 'patricia_minimal_footer_bg_color',
        'label'   => __( 'Footer Background', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#f7f2ee'
    );
	$options['footer_text_color'] = array(
        'id' => 'footer_text_color',
        'label'   => __( 'Footer Text Color', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#595959'
    );
	$options['footer_link_color'] = array(
        'id' => 'footer_link_color',
        'label'   => __( 'Footer Link Color', 'patricia-minimal' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#222222'
    );
	
	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_patricia_minimal_options' );

function patricia_minimal_register_theme_customizer( $wp_customize ){
	
    // Featured Cat
	$wp_customize->add_setting( 'patricia_minimal_featured_cat', array(
		'capability'        => 'edit_theme_options',
		'transport' 		=> 'refresh',
		'default'			=> '',
		'sanitize_callback' => 'absint'
	) );
	
	$wp_customize->add_control(
		new WP_Customize_Category_Control(
			$wp_customize,
			'patricia_minimal_featured_cat',
			array(
				'label'			=> __('Select Featured Category', 'patricia-minimal'),
				'description'	=> __('Choose category to show the slider.', 'patricia-minimal'),
				'settings' 	 	=> 'patricia_minimal_featured_cat',
				'section'		=> 'vt-section-slider',
				'type'      	=> 'category_dropdown',
				'priority' 		=> '6'
			)
		)
	);
	
}
add_action( 'customize_register', 'patricia_minimal_register_theme_customizer' );