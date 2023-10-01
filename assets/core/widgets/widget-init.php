<?php

if ( ! function_exists( 'patricia_minimal_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function patricia_minimal_load_widgets() {

        // About Widget.
        register_widget( 'patricia_about_widget' );
		
		// Latest Post Widget.
        register_widget( 'patricia_latest_posts_widget' );
		
    }

endif;
add_action( 'widgets_init', 'patricia_minimal_load_widgets' );