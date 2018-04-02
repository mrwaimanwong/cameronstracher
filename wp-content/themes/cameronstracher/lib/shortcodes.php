<?php

	// Pull content from a specific page
add_shortcode( 'ww-pull-content','ww_pull_content' );

function ww_pull_content( $atts ) {

	extract(shortcode_atts(
		array(
	        // 'pageid' => '12',
	        'pagename' => 'Home About Section'
    ), $atts));

	// $page_data = get_page( $page_id );
	$page_data = get_page_by_title( $pagename );

	$page_excerpt = substr($page_data->post_content, 0, 147);
	$page_link = '...<br /><a href="'.get_page_link($page_data -> ID).'">Read more</a>';

	$card_content = $page_excerpt.$page_link;
	return $card_content;
}

add_shortcode('ww-childpages', 'ww_list_child_pages');

function ww_list_child_pages($atts) {

	extract(shortcode_atts(
		array(
	        'pagename' => 'Services'
    ), $atts));

	$page_data = get_page_by_title( $pagename);
	$list_title = $page_data -> post_title;

	$childpages = wp_list_pages( array(
	        'child_of'    => $page_data -> ID,
	        'sort_column' => 'menu_order',
					// 'title_li' => $page_data -> post_title,
					'title_li' => null,
					'echo' => 0
	    ) );

	if ( $childpages ) {
	    $string = $childpages;
	}

	return $string;
}
