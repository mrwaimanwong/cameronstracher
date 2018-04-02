<?php
/*
Template Name: Books Page
*/
/**
 * .
 *
 * @category   Genesis Child Theme
 * @package    Templates
 * @subpackage Home
 * @author     Wai Man Wong
 * @link       http://www.waimanwong.com/
 * @since      1.0.0
 */


add_action( 'get_header', 'ww_home_helper' );

/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function ww_home_helper() {

	// if ( is_active_sidebar( 'home-settle' ) || is_active_sidebar( 'home-about' ) || is_active_sidebar( 'home-case-types' ) || is_active_sidebar( 'home-meettheteam' ) || is_active_sidebar( 'home-founders' )) {

			remove_action( 'genesis_loop', 'genesis_do_loop' );
			add_action( 'genesis_loop', 'ww_homepage' );

			/** Force Full Width */
			add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
			add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
	// }
}

function ww_homepage() {

$page_object = get_page( get_the_ID());
$text = substr($page_object->post_content, 200);

echo '<div class="entry-content" itemprop="text"><p>'.$text.'</p></div>';

}

genesis();
