<?php

/**
 * Home Page.
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
			add_action( 'genesis_after_header', 'ww_homepage' );
			//* Remove .site-inner
			add_filter( 'genesis_markup_site-inner', '__return_null' );
			add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );
			add_filter( 'genesis_markup_content', '__return_null' );
			// add_action( 'genesis_loop', 'ww_homepage' );

			/** Force Full Width */
			add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
			add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
	// }
}

function ww_homepage() {
	if ( is_active_sidebar( 'home-services' )) {
		echo '<section class="home-services">';
		genesis_widget_area(
				'home-services',
				array(
						'before' => '<div class="wrap"><div class="home-widget widget-area">',
						'after' => '</div></div><!-- end # -->',
				)
		);
		echo '</section><!-- end #home-services -->';
	}
	if ( is_active_sidebar( 'home-practice-areas' )) {
		echo '<section class="home-practice-areas"><div class="first"></div><div>';
		genesis_widget_area(
				'home-practice-areas',
				array(
						'before' => '<div class="home-widget widget-area">',
						'after' => '</div><!-- end # -->',
				)
		);
		echo '</div></section><!-- end #home-practice-areas -->';
	}
	if ( is_active_sidebar( 'home-about' )) {
		echo '<section class="home-about">';
		genesis_widget_area(
				'home-about',
				array(
						'before' => '<div class="wrap"><div class="home-widget widget-area">',
						'after' => '</div></div><!-- end # -->',
				)
		);
		echo '</section><!-- end #home-about -->
		<section class="home-mailing"><div class="wrap"><h2>Joining the mailing list!</h2><form><input type="email" placeholder="Enter email"></input><input type="submit" value="Submit"></input></form></div></section>';
	}
}

genesis();
