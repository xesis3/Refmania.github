<?php
/**
 * Theme functions and definitions
 *
 * @package designhub
 */

/**
 * After setup theme hook
 */
function designhub_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'designhub', get_stylesheet_directory() . '/languages' );	
	require get_stylesheet_directory() . '/inc/customizer/designhub-customizer-options.php';	
}
add_action( 'after_setup_theme', 'designhub_theme_setup' );

/**
 * Load assets.
 */

function designhub_theme_css() {
	wp_enqueue_style( 'designhub-parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style('designhub-child-style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('designhub-default-css', get_stylesheet_directory_uri() . "/assets/css/theme-default.css" );
    wp_enqueue_style('designhub-bootstrap-smartmenus-css', get_stylesheet_directory_uri() . "/assets/css/bootstrap-smartmenus.css" ); 	
}
add_action( 'wp_enqueue_scripts', 'designhub_theme_css', 99);

/**
 * Import Options From Parent Theme
 *
 */
function designhub_parent_theme_options() {
	$arilewp_mods = get_option( 'theme_mods_arilewp' );
	if ( ! empty( $arilewp_mods ) ) {
		foreach ( $arilewp_mods as $arilewp_mod_k => $arilewp_mod_v ) {
			set_theme_mod( $arilewp_mod_k, $arilewp_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'designhub_parent_theme_options' );

/**
 * Fresh site activate
 *
 */
$fresh_site_activate = get_option( 'fresh_designhub_site_activate' );
if ( (bool) $fresh_site_activate === false ) {
	set_theme_mod( 'arilewp_page_header_background_color', 'rgba(0,0,0,0.4)' );
	set_theme_mod( 'arilewp_testomonial_background_image', get_stylesheet_directory_uri().'/assets/img/theme-bg.jpg' );
	set_theme_mod( 'arilewp_testimonial_overlay_disable', true );
	set_theme_mod( 'arilewp_theme_color_skin', 'theme-dark' );
	set_theme_mod( 'arilewp_theme_color', 'theme-pink' );
	set_theme_mod( 'arilewp_slider_caption_layout', 'arilewp_slider_captoin_layout2' );
	set_theme_mod( 'arilewp_blog_front_container_size', 'container' );
	set_theme_mod( 'arilewp_footer_container_size', 'container' );
	set_theme_mod( 'arilewp_menu_container_size', 'container' );
	update_option( 'fresh_designhub_site_activate', true );
}

/**
 * Custom Theme Script
*/
function designhub_custom_theme_css() {
	$designhub_testomonial_background_image = get_theme_mod('arilewp_testomonial_background_image');
	?>
    <style type="text/css">
		<?php if($designhub_testomonial_background_image != null) : ?>
		.theme-testimonial { 
		        background-image: url(<?php echo esc_url( $designhub_testomonial_background_image ); ?>); 
                background-size: cover;
				background-position: center center;
		}
        <?php endif; ?>
    </style>
 
<?php }
add_action('wp_footer','designhub_custom_theme_css');

/**
 * Page header
 *
 */
function designhub_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'designhub_custom_header_args', array(
		'default-image'      => get_stylesheet_directory_uri().'/assets/img/interior-page-header.jpg',
		'default-text-color' => 'fff',
		'width'              => 1920,
		'height'             => 500,
		'flex-height'        => true,
		'flex-width'         => true,
		'wp-head-callback'   => 'designhub_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'designhub_custom_header_setup' );

/**
 * Custom background
 *
 */
function designhub_custom_background_setup() {
	add_theme_support( 'custom-background', apply_filters( 'designhub_custom_background_args', array(
		'default-color' => '202020',
		'default-image' => '',
	) ) );
}
add_action( 'after_setup_theme', 'designhub_custom_background_setup' );


if ( ! function_exists( 'designhub_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see designhub_custom_header_setup().
	 */
	function designhub_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
				?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php
			// If the user has set a custom color for the text use that.
			else :
				?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?> !important;
			}

			<?php endif; ?>
		</style>
		<?php
	}
endif;