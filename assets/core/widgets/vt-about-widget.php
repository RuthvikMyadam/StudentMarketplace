<?php

/***** About Widget *****/
if (!class_exists('patricia_about_widget')) :

    /**
     * Author widget class.
     *
     * @since Patricia Minimal1.0.0
     */
    class patricia_about_widget extends WP_Widget
    {

        /**
         * Constructor.
         *
         * @since Patricia Minimal 1.0.8
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'patricia_minimal_about_widget',
                'description' => esc_html__('Display Author Profile.', 'patricia-minimal'),
                'customize_selective_refresh' => true,
            );
            parent::__construct('patricia-minimal-author', esc_html__('[VT] About Widget', 'patricia-minimal'), $opts);
        }

        /**
         * Echo the widget content.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments including before_title, after_title,
         *                        before_widget, and after_widget.
         * @param array $instance The settings for the particular instance of the widget.
         */
        function widget($args, $instance)
        {

            $author_image = !empty($instance['author_image']) ? $instance['author_image'] : '';
			$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            $author_description = !empty($instance['author_description']) ? $instance['author_description'] : '';
            $author_facebook = !empty($instance['author_facebook']) ? $instance['author_facebook'] : '';
            $author_twitter = !empty($instance['author_twitter']) ? $instance['author_twitter'] : '';
            $author_linkedin = !empty($instance['author_linkedin']) ? $instance['author_linkedin'] : '';
            $author_pinterest = !empty($instance['author_pinterest']) ? $instance['author_pinterest'] : '';
			$author_instagram = !empty($instance['author_instagram']) ? $instance['author_instagram'] : '';
            $author_youtube = !empty($instance['author_youtube']) ? $instance['author_youtube'] : '';

            echo $args['before_widget']; ?>

            <div class="patricia-author-profile">

			  <?php
                  if (isset($author_image) && !empty($author_image)) { ?>
					<figure class="author">
						<img alt="author-image" src="<?php echo esc_url($instance['author_image']); ?>">
					</figure>
			  <?php } ?>

			  <div class="meta-wrap">
				<?php
					if ($title) {
						echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
				} ?>
			  </div>
			  <span class="border"></span>
					
              <p><?php if (isset($author_description) && !empty($author_description)) {
					echo wp_kses_post($instance['author_description']);
                 } ?>
			  </p>

			  <?php if ($author_facebook || $author_twitter || $author_linkedin || $author_pinterest || $author_instagram || $author_youtube) { ?>
                  <ul class="menu about-social patricia-minimal-menu-social">
					<?php if ($author_facebook) { ?>
						<li>
							<a class="fab fa-facebook-f" href="<?php echo esc_url($author_facebook); ?>" target="_blank">
								<span class="screen-reader-text"><?php esc_html_e('facebook', 'patricia-minimal'); ?></span>
							</a>
						</li>
					<?php } ?>
						
					<?php if ($author_twitter) { ?>
						<li>
							<a class="fab fa-twitter" href="<?php echo esc_url($author_twitter); ?>" target="_blank">
								<span class="screen-reader-text"><?php esc_html_e('twitter', 'patricia-minimal'); ?></span>
							</a>
						</li>
					<?php } ?>

					<?php if ($author_linkedin) { ?>
						<li>
							<a class="fab fa-linkedin" href="<?php echo esc_url($author_linkedin); ?>" target="_blank">
								<span class="screen-reader-text"><?php esc_html_e('linkedin', 'patricia-minimal'); ?></span>
							</a>
						</li>
					<?php } ?>

					<?php if ($author_pinterest) { ?>
						<li>
							<a class="fab fa-pinterest" href="<?php echo esc_url($author_pinterest); ?>" target="_blank">
								<span class="screen-reader-text"><?php esc_html_e('pinterest', 'patricia-minimal'); ?></span>
							</a>
						</li>
					<?php } ?>

					<?php if ($author_instagram) { ?>
						<li>
							<a class="fab fa-instagram" href="<?php echo esc_url($author_instagram); ?>" target="_blank">
								<span class="screen-reader-text"><?php esc_html_e('instagram', 'patricia-minimal'); ?></span>
							</a>
						</li>
					<?php } ?>

					<?php if ($author_youtube) { ?>
						<li>
							<a class="fab fa-youtube" href="<?php echo esc_url($author_youtube); ?>" target="_blank">
								<span class="screen-reader-text"><?php esc_html_e('youtube', 'patricia-minimal'); ?></span>
							</a>
						</li>
					<?php } ?>

                  </ul>

			  <?php } ?>
					
            </div><!-- .author-profile -->

            <?php

            echo $args['after_widget'];

        }

        /**
         * Update widget instance.
         *
         * @since 1.0.0
         *
         * @param array $new_instance New settings for this instance as input by the user via
         *                            {@see WP_Widget::form()}.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update($new_instance, $old_instance)
        {

            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['author_description'] = wp_kses_post($new_instance['author_description']);
            $instance['author_image'] = esc_url_raw($new_instance['author_image']);

            $instance['author_facebook'] = esc_url_raw($new_instance['author_facebook']);
            $instance['author_twitter'] = esc_url_raw($new_instance['author_twitter']);
            $instance['author_linkedin'] = esc_url_raw($new_instance['author_linkedin']);
            $instance['author_pinterest'] = esc_url_raw($new_instance['author_pinterest']);
			$instance['author_instagram'] = esc_url_raw($new_instance['author_instagram']);
            $instance['author_youtube'] = esc_url_raw($new_instance['author_youtube']);

            return $instance;
        }

        /**
         * Output the settings update form.
         *
         * @since 1.0.0
         *
         * @param array $instance Current settings.
         * @return void
         */
        function form($instance)
        {

            // Defaults.
            $defaults = array(
                'title' => esc_html__('About Me', 'patricia-minimal' ),
                'author_description' => '',
                'author_facebook' => '',
                'author_twitter' => '',
                'author_linkedin' => '',
				'author_pinterest' => '',
                'author_instagram' => '',
                'author_youtube' => '',
            );

            $instance = wp_parse_args((array)$instance, $defaults);
            ?>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'patricia-minimal'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('author_description')); ?>"><strong><?php esc_html_e('Description:', 'patricia-minimal'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_description')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('author_description')); ?>" type="text"
                       value="<?php echo esc_attr($instance['author_description']); ?>"/>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('author_image'); ?>">
                    <?php esc_html_e('Select Image', 'patricia-minimal'); ?>
                </label>
                <br/>
                <?php
                if (isset($instance['author_image']) && $instance['author_image'] != '') :
                    echo '<img class="widefat custom_media_image" src="' . esc_url($instance['author_image']) . '" />';
                endif;
                ?>

                <input type="text" class="widefat custom_media_url"
                       name="<?php echo $this->get_field_name('author_image'); ?>"
                       id="<?php echo $this->get_field_id('author_image'); ?>" value="<?php
                if (isset($instance['author_image']) && $instance['author_image'] != '') :
                    echo esc_url($instance['author_image']);
                endif;
                ?>">
                <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                       name="<?php echo $this->get_field_name('author_image'); ?>"
                       value="<?php esc_attr_e('Upload Image', 'patricia-minimal') ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('author_facebook')); ?>">
                    <?php esc_html_e('Facebook:', 'patricia-minimal'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_facebook')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('author_facebook')); ?>" type="text"
                       value="<?php echo esc_url($instance['author_facebook']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('author_twitter')); ?>">
                    <?php esc_html_e('Twitter:', 'patricia-minimal'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_twitter')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('author_twitter')); ?>" type="text"
                       value="<?php echo esc_url($instance['author_twitter']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('author_linkedin')); ?>">
                    <?php esc_html_e('LinkedIn:', 'patricia-minimal'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_linkedin')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('author_linkedin')); ?>" type="text"
                       value="<?php echo esc_url($instance['author_linkedin']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('author_pinterest')); ?>">
                    <?php esc_html_e('Pinterest:', 'patricia-minimal'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_pinterest')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('author_pinterest')); ?>" type="text"
                       value="<?php echo esc_url($instance['author_pinterest']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('author_instagram')); ?>">
                    <?php esc_html_e('Instagram:', 'patricia-minimal'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_instagram')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('author_instagram')); ?>" type="text"
                       value="<?php echo esc_url($instance['author_instagram']); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_name('author_youtube')); ?>">
                    <?php esc_html_e('Youtube:', 'patricia-minimal'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author_youtube')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('author_youtube')); ?>" type="text"
                       value="<?php echo esc_url($instance['author_youtube']); ?>"/>
            </p>

        <?php

        }
    }

endif;
add_action('admin_enqueue_scripts', 'patricia_minimal_widgets_backend_enqueue');
function patricia_minimal_widgets_backend_enqueue()
{
    wp_register_script('patricia-minimal-custom-widgets', get_template_directory_uri() . '/assets/js/widget.js', array('jquery'), true);
    wp_enqueue_media();
    wp_enqueue_script('patricia-minimal-custom-widgets');
}