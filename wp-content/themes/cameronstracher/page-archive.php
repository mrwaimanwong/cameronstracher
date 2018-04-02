<?php
// Template Name: Page Archive
/**
 * Replace the primary sidebar with the archive content with Genesis
 *
 * @author Reasons to Use Genesis
 * @link http://reasonstousegenesis.com/genesis-page-archive-content/
 */

add_action( 'genesis_after_loop', 'ww_page_grid' );
/** Force Full Width */
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// if(get_the_content() == "") {
//   remove_action('genesis_loop', 'genesis_do_loop');
// }

function ww_page_grid() {

  // Set up the objects needed
  $my_wp_query = new WP_Query();
  $all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));

  // Get the page as an Object
  $books =  get_page_by_title('Books');

  // Filter through all pages and find Books's children
  $books_children = array_reverse(get_page_children( $books->ID, $all_wp_pages ));
  echo '<div class="book-card">';

  // echo '<pre>' . print_r( $books_children, true ) . '</pre>';
  foreach ($books_children as $book) {

    $value  = substr($book->post_content, 0, strpos($book->post_content, ' ', 260));

    echo "<div><a href='$book->guid'>";
    echo get_the_post_thumbnail( $book->ID, 'full', array( 'class' => '' ) );
    echo "<h2>$book->post_title</h2>";
  	// echo "<p>$value [...]</p>";
    echo "</a></div>";
  }
  echo '</div>';
}
genesis();
