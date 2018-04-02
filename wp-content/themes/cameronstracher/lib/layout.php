<?php

add_action('genesis_setup', 'ww_custom_layout', 11);

function ww_custom_layout() {
	/** Unregister site layouts */
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	genesis_unregister_layout( 'content-sidebar-sidebar' );

	// Remove the header right widget area
	unregister_sidebar( 'header-right' );

	/** Remove secondary sidebar */
	unregister_sidebar( 'sidebar-alt' );

	// Add Home Sidebar
	// genesis_register_sidebar( array( 'name' => 'Home Hero', 'id' => 'home-hero' ) );
	// genesis_register_sidebar( array( 'name' => 'Home Top Left', 'id' => 'home-top-left' ) );
	// genesis_register_sidebar( array( 'name' => 'Home Top Right', 'id' => 'home-top-right' ) );
	// genesis_register_sidebar( array( 'name' => 'Home Bottom Left', 'id' => 'home-bottom-left' ) );
	// genesis_register_sidebar( array( 'name' => 'Home Bottom Right', 'id' => 'home-bottom-right' ) );
	genesis_register_sidebar( array( 'name' => 'Home Services', 'description' => 'The content for the Services section on the homepage goes here.', 'id' => 'home-services' ) );
	genesis_register_sidebar( array( 'name' => 'Home Practice Areas', 'description' => 'The content for the Practice Areas section on the homepage goes here.', 'id' => 'home-practice-areas' ) );
	genesis_register_sidebar( array( 'name' => 'Home About', 'description' => 'The content for the About section on the homepage goes here.', 'id' => 'home-about' ) );
}

//* Remove 'You are here' from the front of breadcrumb trail
function b3m_prefix_breadcrumb( $args ) {
  $args['labels']['prefix'] = '';

  return $args;
}
add_filter( 'genesis_breadcrumb_args', 'b3m_prefix_breadcrumb' );

//* Remove breadcrumb from a single page
//* https://codex.wordpress.org/Function_Reference/is_page
function b3m_remove_genesis_breadcrumb() {
  if ( is_page( 'contact' ) || is_page( 'praise') || is_page( 'bio' )  || is_page( 'Books') || is_page( 'contact-us' ) ) {
    remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
  }
}
add_action( 'genesis_before', 'b3m_remove_genesis_breadcrumb' );
