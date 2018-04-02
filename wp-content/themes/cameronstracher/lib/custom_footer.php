<?php

add_action('genesis_setup', 'ww_remove_footer');

function ww_remove_footer() {
	/** Genesis - Remove header and footer markup */
	remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
	remove_action( 'genesis_footer', 'genesis_do_footer' );
	remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
}


add_action('genesis_setup', 'ww_add_footer_widgets');

function ww_add_footer_widgets() {
	add_theme_support( 'genesis-footer-widgets', 3 ); //Need to add .footer-widgets-4 to the CSS if you want a fourth
}

/* Customize the entire footer */

add_action( 'genesis_footer', 'ww_custom_footer' );

function ww_custom_footer() {
		$footernav = wp_nav_menu( array('theme_location' => 'primary', 'container' => 'nav', 'container_class' => 'nav-footer', 'echo' => false, 'depth' => 1, 'after' => ' | '));
	echo
	'<div class="site-footer">
	<div class="wrap">
	'.$footernav.'
	<div class="footer-copyright">©'.date('Y').' Cameron Stracher. All Rights Reserved &nbsp;&nbsp;&nbsp;<a id="scroll-top-btn" title="Go to top"><i class="fa fa-arrow-circle-up"></i></a></div>

	</div>
	</div>';
}
