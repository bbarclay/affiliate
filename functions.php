<?php
/**
 * Cascade functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 */

define( 'CASCADE_GOOGLE_FONTS_URL', 'https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i|Shadows+Into+Light:400' );
define( 'CASCADE_CONTENT_WIDTH', 1050 );
define( 'CASCADE_EXCERPT_LENGTH', 25 );

include( 'inc/algolia.php' ); // Algolia plugin support
include( 'inc/assets.php' ); // Enqueue scripts and styles.
include( 'inc/content.php' ); // Functions for filtering content and excerpts..
include( 'inc/customizer.php' ); // Add customizer settings and controls.
include( 'inc/images.php' ); // Add image sizes.
include( 'inc/markup.php' ); // Functions to filter WordPress generated markup.
include( 'inc/menus.php' ); // Register nav menus.
include( 'inc/setup.php' ); // Theme setup and activation.
include( 'inc/template-tags.php' ); // Functions for use in templates.
include( 'inc/widget-areas.php' ); // Register widget areas.



add_action( 'init', 'blockusers_init' );

function blockusers_init() {
if ( is_admin() && ! current_user_can( 'administrator' ) &&
	! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
	wp_redirect( home_url() );
	exit;
	}
}
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
// function redirect_login_page() {
//   $login_page  = home_url( '/va-login/' );
//   $page_viewed = basename($_SERVER['REQUEST_URI']);
 
//   if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
//     wp_redirect($login_page);
//     exit;
//   }
// }
// add_action('init','redirect_login_page');

// function login_failed() {
//   $login_page  = home_url( '/va-login/' );
//   wp_redirect( $login_page . '?login=failed' );
//   exit;
// }
// add_action( 'wp_login_failed', 'login_failed' );
 
// function verify_username_password( $user, $username, $password ) {
//   $login_page  = home_url( '/va-login/' );
//     if( $username == "" || $password == "" ) {
//         wp_redirect( $login_page . "?login=empty" );
//         exit;
//     }
// }
// add_filter( 'authenticate', 'verify_username_password', 1, 3);