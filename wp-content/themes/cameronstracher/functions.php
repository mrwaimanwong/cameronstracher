<?php
/*
Child Theme Name: Cameron Stracher
Author: Wai Man Wong
Version: 1.0
URL: https://www.waimanwong.com/
*/

/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit( 'Cheatin&#8217; uh?' );

require_once( get_stylesheet_directory() . '/lib/init.php');
require_once( get_stylesheet_directory() . '/lib/scripts.php');
require_once( get_stylesheet_directory() . '/lib/cleanup.php');
require_once( get_stylesheet_directory() . '/lib/siteicons.php');
require_once( get_stylesheet_directory() . '/lib/fonts.php');
if(!is_admin()){
require_once( get_stylesheet_directory() . '/lib/custom_header.php');
}
require_once( get_stylesheet_directory() . '/lib/shortcodes.php');
require_once( get_stylesheet_directory() . '/lib/layout.php');
require_once( get_stylesheet_directory() . '/lib/custom_footer.php');

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Cameron Stracher' );
define( 'CHILD_THEME_URL', 'https://www.waimanwong.com/' );
define( 'CHILD_DOMAIN', 'cameronstracher' );
