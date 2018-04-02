<?php

// activate/add additional scripts
add_action('wp_enqueue_scripts','add_child_scripts');

function add_child_scripts()
{
	wp_register_style('ww-styles', get_stylesheet_directory_uri() . '/css/main.min.css', false, '9880649384aea9f1ee166331c0a30daa');
	wp_enqueue_style('ww-styles');

	// wp_register_style('ww-fontawesome', 'https://use.fontawesome.com/releases/v5.0.8/css/all.css');
	// wp_enqueue_style('ww-fontawesome');

	wp_register_script( 'ww-scripts', get_stylesheet_directory_uri() . '/js/scripts.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script('ww-scripts');

	// wp_register_script( 'ww-fontawesome', 'https://use.fontawesome.com/releases/v5.0.8/js/all.js');
	// wp_enqueue_script('ww-fontawesome');
}


function hook_javascript() {
    ?>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <?php
}
add_action('wp_head', 'hook_javascript');
