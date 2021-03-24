<?php
/**
 * Theme menu page.
 *
 * @package Galaxis
 */

/**
 * Adds a theme menu page.
 */
function galaxis_create_menu() {
	$menus    = $GLOBALS['menu'];
	$priority = array_filter(
		$menus,
		function( $item ) {
			return 'themes.php' === $item[2];
		}
	);

	$priority = ( ! empty( $priority ) && ( 1 === count( $priority ) ) ) ? ( key( $priority ) - 1 ) : null;

	$galaxis_page = add_menu_page( 'Galaxis', 'Galaxis', 'edit_theme_options', 'galaxis-options', 'galaxis_page', 'dashicons-admin-customizer', $priority );
	add_action( 'admin_print_styles-' . $galaxis_page, 'galaxis_options_styles' );

	$galaxis_welcome_page = add_submenu_page( 'galaxis-options', esc_html__( 'Welcome Guide', 'galaxis' ), esc_html__( 'Welcome Guide', 'galaxis' ), 'edit_theme_options', 'galaxis-options', 'galaxis_page' );
	add_action( 'admin_print_styles-' . $galaxis_welcome_page, 'galaxis_options_styles' );

	$galaxis_faq_page = add_submenu_page( 'galaxis-options', esc_html__( 'Documentation', 'galaxis' ), esc_html__( 'Documentation', 'galaxis' ), 'edit_theme_options', 'galaxis-faq', 'galaxis_faq_page' );
	add_action( 'admin_print_styles-' . $galaxis_faq_page, 'galaxis_options_styles' );
}
add_action( 'admin_menu', 'galaxis_create_menu' );

if ( ! function_exists( 'galaxis_page' ) ) {
	/**
	 * Builds the content of the theme page.
	 */
	function galaxis_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="galaxis-panel">
					<div class="galaxis-container">
						<div class="galaxis-title">
							<?php
							printf(
								wp_kses(
									/* translators: %s: theme version number */
									_x( 'Galaxis <span>Version %s</span>', 'menu page heading', 'galaxis' ),
									array( 'span' => array() )
								),
								esc_html( GALAXIS_VERSION )
							);
							?>
						</div>
					</div>
				</div>

				<div class="galaxis-container">
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'Customize Theme', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can customize the theme using the theme options available in the customizer.', 'galaxis' ); ?>
							</p>
						</div>
						<div class="galaxis-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button"><?php esc_html_e( 'Theme Options', 'galaxis' ); ?></a>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'Menus', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can create a menu and assign it to a menu location. Galaxis comes with three menu locations which include primary menu, footer menu, and social links menu.', 'galaxis' ); ?>
							</p>
						</div>
						<div class="galaxis-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="button"><?php esc_html_e( 'Menus', 'galaxis' ); ?></a>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'Theme Widgets', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can drag and drop widgets to the widget area. Galaxis comes with a main sidebar widget area.', 'galaxis' ); ?>
							</p>
						</div>
						<div class="galaxis-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>" class="button"><?php esc_html_e( 'Widgets', 'galaxis' ); ?></a>
						</div>
					</div>
					<div class="galaxis-panel galaxis-panel--highlight">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'Premium Version', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'Premium version of this theme comes with extra features like custom Google fonts, custom colors for buttons, links, menu etc., front page sections, custom sections, services section, call to action buttons, parallax backgrounds, header block area, footer widgets area, and much more. You can check the detail and the demo.', 'galaxis' ); ?>
							</p>
						</div>
						<div class="galaxis-panel-actions">
							<a target="_blank" href="https://scriptstown.com/account/signup/galaxis-premium-wordpress-theme" class="button button-primary"><strong><?php esc_html_e( 'Get Premium', 'galaxis' ); ?></strong></a>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'Footer Block Area', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can enable the footer block area by creating a block in the reusable block manager and assign this block in the Customizer > Footer Options.', 'galaxis' ); ?>
							</p>
						</div>
						<div class="galaxis-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'edit.php?post_type=wp_block' ) ); ?>" class="button"><?php esc_html_e( 'Reusable Blocks Manager', 'galaxis' ); ?></a>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'Frequently Asked Questions', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can check the frequently asked questions related to the theme configuration.', 'galaxis' ); ?>
							</p>
						</div>
						<div class="galaxis-panel-actions">
							<a target="_blank" href="<?php echo esc_url( admin_url( 'admin.php?page=galaxis-faq' ) ); ?>" class="button"><?php esc_html_e( 'Click Here', 'galaxis' ); ?></a>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<?php esc_html_e( 'If you like this theme, then you can leave a review. This will encourage us to improve the theme and add more features to the theme.', 'galaxis' ); ?>
							<br>
							<a target="_blank" href="https://wordpress.org/support/theme/galaxis/reviews/#new-post" class="galaxis-review-stars-link">
								<div class="vers column-rating">
									<div class="star-rating">
										<span class="screen-reader-text"><?php esc_html_e( 'If you like this theme, then you can leave a review.', 'galaxis' ); ?></span>
										<div class="star star-full" aria-hidden="true"></div>
										<div class="star star-full" aria-hidden="true"></div>
										<div class="star star-full" aria-hidden="true"></div>
										<div class="star star-full" aria-hidden="true"></div>
										<div class="star star-full" aria-hidden="true"></div>
									</div>
								</div>
							</a>
						</div>
						<div class="galaxis-panel-actions">
							<a target="_blank" href="https://wordpress.org/support/theme/galaxis/reviews/#new-post" class="button"><?php esc_html_e( 'Leave a Review', 'galaxis' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'galaxis_faq_page' ) ) {
	/**
	 * Builds the content of the FAQ page.
	 */
	function galaxis_faq_page() {
		?>
		<div class="wrap">
			<div class="metabox-holder">
				<div class="galaxis-panel">
					<div class="galaxis-container">
						<div class="galaxis-title">
							<?php esc_html_e( 'Galaxis - Frequently Asked Questions', 'galaxis' ); ?>
						</div>
					</div>
				</div>

				<div class="galaxis-container">
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'How to set the Home Page?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'By default, WordPress displays the latest blog post on your site. You can change this behavior to show a page instead. To do this, go to your WordPress admin area > "Settings" > "Reading", then under setting "Your homepage displays", set it to "A static page" and select the "Homepage".', 'galaxis' ); ?>
							</p>
							<p class="description">
								<?php esc_html_e( 'Then, you can start designing the home page just like you do with a normal WordPress page.', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'How to remove the page title?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'By default, WordPress displays the latest blog post on your site. You can change this behavior to show a page instead. To do this, go to your WordPress admin area > "Settings" > "Reading", then under setting "Your homepage displays", set it to "A static page" and select the "Homepage".', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'Where to find Theme Options?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can access all the theme options from the Customizer. In your admin panel, go to "Appearance" > "Customize".', 'galaxis' ); ?>
							</p>
							<p class="description">
								<?php esc_html_e( 'Here, you will find all the theme options that you can use.', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'How to disable Sticky Menu when Scrolling?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can disable the sticky menu when scrolling from the Customizer > "Header Options".', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'How to disable Back to Top button?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'Just like above, you can disable the back to top button from the Customizer > "Header Options".', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'How to add Social links in the Menu?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can create a new menu from "Appearance" > "Menus". Then, assign the newly created menu to the location "Social Links Menu". After, you can insert Custom Links to the menu by providing your social links.', 'galaxis' ); ?>
							</p>
							<p class="description">
								<?php esc_html_e( 'The social menu will appear on the top bar.', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'How to set the left sidebar for blog posts and archive pages?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'In the theme customizer, go to "General Options". Here, you can set the sidebar layout for the blog posts to "Left Sidebar" or "Right Sidebar" (default).', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'How to set the left sidebar for pages?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can choose a template with left sidebar for the pages. For this, you need to edit the page and go to "Document" (on the right top) then under "Page Attributes", select a "Template" with left sidebar.', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'How to change Copyright text in the Footer?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can change the copyright text from the Customizer > "Footer Options".', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'How to change the Top Bar and Footer Background Colors?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'You can change the top bar and footer background colors from the Customizer > "Colors".', 'galaxis' ); ?>
							</p>
						</div>
					</div>
					<div class="galaxis-panel">
						<div class="galaxis-panel-content">
							<span class="galaxis-panel-title"><?php esc_html_e( 'What is the ideal size for the featured image?', 'galaxis' ); ?></span>
							<p class="description">
								<?php esc_html_e( 'The ideal size for the featured image is 1200 x 600 pixels.', 'galaxis' ); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'galaxis_options_styles' ) ) {
	/**
	 * Enqueue styles for the theme page.
	 */
	function galaxis_options_styles() {
		wp_enqueue_style( 'galaxis-options', get_template_directory_uri() . '/inc/admin.css', array(), GALAXIS_VERSION );
	}
}

/**
 * Add a notice after theme activation.
 */
function galaxis_welcome_notice() {
	global $pagenow;
	if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
		?>
		<div class="updated notice notice-success is-dismissible">
			<p>
				<?php
				echo wp_kses(
					sprintf(
						/* translators: %s: Welcome page link. */
						__( 'Welcome! Thank you for choosing Galaxis. To get started, visit our <a href="%s">welcome page</a>.', 'galaxis' ),
						esc_url( admin_url( 'admin.php?page=galaxis-options' ) )
					),
					array( 'a' => array( 'href' => array() ) )
				);
				?>
			</p>
			<p>
				<a class="button" href="<?php echo esc_url( admin_url( 'admin.php?page=galaxis-options' ) ); ?>">
					<?php esc_html_e( 'Get started with Galaxis', 'galaxis' ); ?>
				</a>
			</p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'galaxis_welcome_notice' );
