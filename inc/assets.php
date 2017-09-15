<?php
/**
 * Enqueue theme stylesheets.
 *
 * @link https://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @link https://codex.wordpress.org/Function_Reference/add_editor_style
 */

/**
 * Enqueue stylesheets.
 */
function cascade_enqueue_assets() {
	wp_register_style( 'owl-carousel', get_template_directory_uri() . '/lib/owl.carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/bootstrap.min.css' );
	wp_register_style( 'genericons', get_template_directory_uri() . '/fonts/genericons/genericons.css' );
	wp_register_style( 'cascade-google-fonts', CASCADE_GOOGLE_FONTS_URL );
	wp_register_style( 'businessblueprint-fonts', get_template_directory_uri() . '/fonts/businessblueprint/businessblueprint.css' );
	wp_enqueue_style( 'cascade', get_stylesheet_uri(), array( 'genericons', 'cascade-google-fonts', 'owl-carousel', 'businessblueprint-fonts' ) );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/font-awesome.min.css' );

	wp_register_script( 'owl-carousel', get_template_directory_uri() . '/lib/owl.carousel/owl.carousel.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/lib/modernizr.cascade.js', array(), false, false );
	wp_enqueue_script( 'cascade-navbar', get_template_directory_uri() . '/js/navbar.js', array( 'jquery' ), false, true );
	wp_register_script( 'velocity', get_template_directory_uri() . '/lib/velocity.min.js', array(), false, true );
	wp_register_script( 'cascade-tabs', get_template_directory_uri() . '/js/tabs.js', array( 'velocity', 'jquery' ), false, true );
	wp_enqueue_script( 'cascade-toggle', get_template_directory_uri() . '/js/toggle.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/lib/jquery.fitvids.js', array( 'jquery' ), false, true );

	wp_enqueue_script('jquery-ui-core');
}
add_action( 'wp_enqueue_scripts', 'cascade_enqueue_assets' );

/**
 * Enqueue admin stylesheets.
 */
function cascade_admin_enqueue_fonts( $hook ) {
	if( 'post.php' == $hook || 'post-new.php' == $hook ) {
		wp_enqueue_style( 'cascade-google-fonts', CASCADE_GOOGLE_FONTS_URL );
	}
}
add_action( 'admin_enqueue_scripts', 'cascade_admin_enqueue_fonts' );

/**
 * Enqueue editor stylesheets.
 */
function cascade_editor_font_styles() {
	add_editor_style( array( 'editor-style.css', str_replace( ',', '%2C', CASCADE_GOOGLE_FONTS_URL ) ) );
}
add_action( 'init', 'cascade_editor_font_styles' );

/**
 * Output FitVids script.
 */
function cascade_fitvids_script() {
	echo '<script>jQuery( \'body\' ).fitVids({customSelector:\'iframe[src*="wistia.net"]\'});</script>';
}
// add_action( 'wp_footer', 'cascade_fitvids_script', 30 );