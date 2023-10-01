<?php
/**
 * Patricia Admin Class.
 *
 * @author  VolThemes
 * @package patricia-minimal
 * @since   patricia 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'patricia_minimal_admin' ) ) :

	/**
	 * patricia_minimal_admin Class.
	 */
	class patricia_minimal_admin {

		/**
		 * Constructor.
		 */
		public function __construct() {
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		}

		/**
		 * Add admin menu.
		 */
		public function admin_menu() {
			$theme = wp_get_theme( get_template() );

			$page = add_theme_page( esc_html__( 'About', 'patricia-minimal' ) . ' ' . $theme->display( 'Name' ), esc_html__( 'About', 'patricia-minimal' ) . ' ' . $theme->display( 'Name' ), 'activate_plugins', 'patricia-welcome', array(
				$this,
				'welcome_screen',
			) );
			add_action( 'admin_print_styles-' . $page, array( $this, 'enqueue_styles' ) );
		}

		/**
		 * Enqueue styles.
		 */
		public function enqueue_styles() {
			global $patricia_minimal_version;

			wp_enqueue_style( 'patricia-welcome', get_template_directory_uri() . '/assets/css/welcome.css', array(), $patricia_minimal_version );
		}

		/**
		 * Intro text/links shown to all about pages.
		 *
		 * @access private
		 */
		private function intro() {
			global $patricia_minimal_version;
			$theme = wp_get_theme( get_template() );
			?>
			<div class="patricia-theme-info">
				<h1>
					<?php esc_html_e( 'About', 'patricia-minimal' ); ?>
					<?php echo esc_attr($theme->display( 'Name' )); ?>
					<?php printf ( '%s', esc_attr($patricia_minimal_version )); ?>
				</h1>

				<div class="welcome-description-wrap">
					<div class="about-text"><?php echo esc_html($theme->display( 'Description' )); ?></div>

					<div class="patricia-screenshot">
						<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" />
					</div>
				</div>
			</div>

			<p class="patricia-actions">
				<a href="<?php echo esc_url( 'https://volthemes.com/themes/patricia-minimal/?utm_source=patricia-about&utm_medium=theme-info-link&utm_campaign=theme-info' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'patricia-minimal' ); ?></a>

				<a href="<?php echo esc_url( 'https://volthemes.com/demo/?theme=patricia-minimal' ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Demo', 'patricia-minimal' ); ?></a>

				<a href="<?php echo esc_url( 'https://volthemes.com/theme/patricia/?utm_source=patricia-minimal-about&utm_medium=view-pro-link&utm_campaign=view-pro#free-vs-pro' ); ?>" class="button button-primary docs" target="_blank"><?php esc_html_e( 'View PRO version', 'patricia-minimal' ); ?></a>

				<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/patricia-minimal/reviews/?filter=5' ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'Rate this theme', 'patricia-minimal' ); ?></a>
			</p>

			<div class="about-theme-tabs">
			  <h2 class="nav-tab-wrapper">
				<a class="nav-tab <?php if ( empty( $_GET['tab'] ) && isset( $_GET['page'] ) == 'patricia-welcome' ) {
					echo 'active';
				} ?>" data-tab="getting_started" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'patricia-welcome' ), 'themes.php' ) ) ); ?>">
					<?php echo esc_attr($theme->display( 'Name' )); ?>
				</a>
				<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'supported_plugins' ) {
					echo '';
				} ?>" data-tab="support" href="<?php echo esc_url( admin_url( add_query_arg( array(
					'page' => 'patricia-welcome',
					'tab'  => 'supported_plugins',
				), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Supported Plugins', 'patricia-minimal' ); ?>
				</a>
				<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'free_vs_pro' ) {
					echo '';
				} ?>" data-tab="free_vs_pro" href="<?php echo esc_url( admin_url( add_query_arg( array(
					'page' => 'patricia-welcome',
					'tab'  => 'free_vs_pro',
				), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Free Vs Pro', 'patricia-minimal' ); ?>
				</a>
				<a class="nav-tab <?php if ( isset( $_GET['tab'] ) && $_GET['tab'] == 'changelog' ) {
					echo '';
				} ?>" data-tab="changelog" href="<?php echo esc_url( admin_url( add_query_arg( array(
					'page' => 'patricia-welcome',
					'tab'  => 'changelog',
				), 'themes.php' ) ) ); ?>">
					<?php esc_html_e( 'Changelog', 'patricia-minimal' ); ?>
				</a>
			  </h2>
			</div>
			<?php
		}

		/**
		 * Welcome screen page.
		 */
		public function welcome_screen() {
			$current_tab = empty( $_GET['tab'] ) ? 'about' : sanitize_title( wp_unslash($_GET['tab'] ));
			
			// Look for a {$current_tab}_screen method.
			if ( is_callable( array( $this, $current_tab . '_screen' ) ) ) {
				return $this->{$current_tab . '_screen'}();
			}

			// Fallback to about screen.
			return $this->about_screen();
		}

		/**
		 * Output the about screen.
		 */
		public function about_screen() {
			$theme = wp_get_theme( get_template() );
			?>
			<div class="wrap about-wrap">

				<?php $this->intro(); ?>

				<div class="changelog point-releases">
					<div class="two-col">
						<div class="col">
							<h3><?php esc_html_e( 'Theme Customizer', 'patricia-minimal' ); ?></h3>
							<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'patricia-minimal' ) ?></p>
							<p>
								<a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" class="button button-secondary"><?php esc_html_e( 'Customize', 'patricia-minimal' ); ?></a>
							</p>
						</div>

						<div class="col">
							<h3><?php esc_html_e( 'Documentation', 'patricia-minimal' ); ?></h3>
							<p><?php esc_html_e( 'Please view our documentation page to setup the theme.', 'patricia-minimal' ) ?></p>
							<p>
								<a href="<?php echo esc_url( 'https://volthemes.com/docs/patricia-minimal-documentation/?utm_source=patricia-about&utm_medium=documentation' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Documentation', 'patricia-minimal' ); ?></a>
							</p>
						</div>

						<div class="col">
							<h3><?php esc_html_e( 'Got theme support question?', 'patricia-minimal' ); ?></h3>
							<p><?php esc_html_e( 'Please put it in our dedicated support forum.', 'patricia-minimal' ) ?></p>
							<p>
								<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/patricia-minimal' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Support Forum', 'patricia-minimal' ); ?></a>
							</p>
						</div>

						<div class="col">
							<h3><?php esc_html_e( 'Need more features?', 'patricia-minimal' ); ?></h3>
							<p><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'patricia-minimal' ) ?></p>
							<p>
								<a href="<?php echo esc_url( 'https://volthemes.com/theme/patricia/?utm_source=patricia-about&utm_medium=view-pro-link&utm_campaign=view-pro#free-vs-pro' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Pro', 'patricia-minimal' ); ?></a>
							</p>
						</div>

						<div class="col">
							<h3><?php esc_html_e( 'Got sales related question?', 'patricia-minimal' ); ?></h3>
							<p><?php esc_html_e( 'Please send it via our sales contact page.', 'patricia-minimal' ) ?></p>
							<p>
								<a href="<?php echo esc_url( 'https://volthemes.com/contact/?utm_source=patricia-about&utm_medium=contact-page-link&utm_campaign=contact-page' ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Contact Page', 'patricia-minimal' ); ?></a>
							</p>
						</div>

						<div class="col">
							<h3>
								<?php
								esc_html_e( 'Translate', 'patricia-minimal' );
								echo ' ' . esc_attr($theme->display( 'Name' ));
								?>
							</h3>
							<p><?php esc_html_e( 'Click below to translate this theme into your own language.', 'patricia-minimal' ) ?></p>
							<p>
								<a href="<?php echo esc_url( 'https://translate.wordpress.org/projects/wp-themes/patricia-minimal' ); ?>" class="button button-secondary" target="_blank">
									<?php
									esc_html_e( 'Translate', 'patricia-minimal' );
									echo ' ' . esc_attr($theme->display( 'Name' ));
									?>
								</a>
							</p>
						</div>
					</div>
				</div>

				<div class="return-to-dashboard patricia">
					<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
						<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
							<?php is_multisite() ? esc_html_e( 'Return to Updates', 'patricia-minimal' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'patricia-minimal' ); ?>
						</a> |
					<?php endif; ?>
					<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'patricia-minimal' ) : esc_html_e( 'Go to Dashboard', 'patricia-minimal' ); ?></a>
				</div>
			</div>
			<?php
		}

		/**
		 * Output the changelog screen.
		 */
		public function changelog_screen() {
			global $wp_filesystem;

			?>
			<div class="wrap about-wrap">

				<?php $this->intro(); ?>

				<p class="about-description"><?php esc_html_e( 'View changelog below:', 'patricia-minimal' ); ?></p>

				<?php
				$changelog_file = apply_filters( 'patricia_minimal_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog      = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = $this->parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
				?>
			</div>
			<?php
		}

		/**
		 * Parse changelog from readme file.
		 *
		 * @param  string $content
		 *
		 * @return string
		 */
		private function parse_changelog( $content ) {
			$matches   = null;
			$regexp    = '~==\s*Changelog\s*==(.*)($)~Uis';
			$changelog = '';

			if ( preg_match( $regexp, $content, $matches ) ) {
				$changes = explode( '\r\n', trim( $matches[1] ) );

				$changelog .= '<pre class="changelog">';

				foreach ( $changes as $index => $line ) {
					$changelog .= wp_kses_post( preg_replace( '~(=\s*Version\s*(\d+(?:\.\d+)+)\s*=|$)~Uis', '<span class="title">${1}</span>', $line ) );
				}

				$changelog .= '</pre>';
			}

			return wp_kses_post( $changelog );
		}

		/**
		 * Output the supported plugins screen.
		 */
		public function supported_plugins_screen() {
			?>
			<div class="wrap about-wrap">

				<?php $this->intro(); ?>

				<p class="about-description"><?php esc_html_e( 'This theme recommends following plugins:', 'patricia-minimal' ); ?></p>
				<ol>
					<li>
						<a href="<?php echo esc_url( 'https://wordpress.org/plugins/contact-form-7/' ); ?>" target="_blank"><?php esc_html_e( 'Contact Form 7', 'patricia-minimal' ); ?></a>
					</li>
					<li>
						<a href="<?php echo esc_url( 'https://wordpress.org/plugins/wordpress-seo/' ); ?>" target="_blank"><?php esc_html_e( 'Yoast SEO', 'patricia-minimal' ); ?></a>
					</li>
					<li>
						<a href="<?php echo esc_url( 'https://wordpress.org/plugins/woocommerce/' ); ?>" target="_blank"><?php esc_html_e( 'WooCommerce', 'patricia-minimal' ); ?></a>
					</li>
				</ol>

			</div>
			<?php
		}

		/**
		 * Output the free vs pro screen.
		 */
		public function free_vs_pro_screen() {
			?>
			<div class="wrap about-wrap">

				<?php $this->intro(); ?>

				<p class="about-description"><?php esc_html_e( 'Upgrade to PRO version for more exciting features.', 'patricia-minimal' ); ?></p>

				<table>
					<thead>
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e( 'Features', 'patricia-minimal' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'Patricia Minimal', 'patricia-minimal' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'Patricia Pro', 'patricia-minimal' ); ?></h3></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td><h3><?php esc_html_e( 'Responsive Design', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Custom Logo', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Translation Ready', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Sticky Sidebar', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Theme Options', 'patricia-minimal' ); ?></h3></td>
						<td><?php esc_html_e( 'Basic', 'patricia-minimal' ); ?></td>
						<td><?php esc_html_e( 'Advanced (50+ Setting options)', 'patricia-minimal' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Social Icons', 'patricia-minimal' ); ?></h3></td>
						<td><?php esc_html_e( '6', 'patricia-minimal' ); ?></td>
						<td><?php esc_html_e( '15+', 'patricia-minimal' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Featured Slider', 'patricia-minimal' ); ?></h3></td>
						<td><?php esc_html_e( '1 Variation', 'patricia-minimal' ); ?></td>
						<td><?php esc_html_e( '4 Variation', 'patricia-minimal' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Blog Layout', 'patricia-minimal' ); ?></h3></td>
						<td><?php esc_html_e( '2 Variation', 'patricia-minimal' ); ?></td>
						<td><?php esc_html_e( '8 Variation', 'patricia-minimal' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Custom Widget', 'patricia-minimal' ); ?></h3></td>
						<td><?php esc_html_e( '2', 'patricia-minimal' ); ?></td>
						<td><?php esc_html_e( '8', 'patricia-minimal' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Content Boxes', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><?php esc_html_e( '3 Variation', 'patricia-minimal' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Typography Settings', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Override Theme Text', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Sticky Header', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'WooCommerce Compatible', 'patricia-minimal' ); ?></h3></td>
						<td><?php esc_html_e( 'Basic', 'patricia-minimal' ); ?></td>
						<td><?php esc_html_e( 'Advanced', 'patricia-minimal' ); ?></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Instagram Feed', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Footer Copyright Editor', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Demo Content', 'patricia-minimal' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Support', 'patricia-minimal' ); ?></h3></td>
						<td><?php esc_html_e( 'WordPress Forum', 'patricia-minimal' ); ?></td>
						<td><?php esc_html_e( 'Support Forum + Emails/Support Ticket', 'patricia-minimal' ); ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td class="btn-wrapper">
							<a href="<?php echo esc_url( apply_filters( 'patricia_minimal_pro_theme_url', 'https://volthemes.com/theme/patricia/?utm_source=patricia-about&utm_medium=view-pro-link&utm_campaign=view-pro#free-vs-pro' ) ); ?>" class="button button-secondary docs" target="_blank"><?php esc_html_e( 'View Pro', 'patricia-minimal' ); ?></a>
						</td>
					</tr>
					</tbody>
				</table>

			</div>
			<?php
		}
	}

endif;

return new patricia_minimal_admin();