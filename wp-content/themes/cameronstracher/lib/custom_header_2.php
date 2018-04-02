 <?php

/** Genesis - Remove header markup */
add_action('genesis_setup', 'ww_remove_header');
function ww_remove_header() {
	remove_action( 'genesis_header', 'genesis_header_markup_open', 5);
	remove_action( 'genesis_header', 'genesis_do_header' );
	remove_action( 'genesis_header', 'genesis_header_markup_close', 15);
}

//* Remove unecesary navs (i.e. Secondary)
add_action('genesis_setup', 'ww_setup_nav');

function ww_setup_nav() {

	// Remove Custom Menu support - blindly removes all menu support (not needed if using add_theme_support)
	// remove_theme_support ( 'genesis-menus' );

	// Add Menu support - removes menu support for anything other than Primary and Footer (i.e. Secondary)
	add_theme_support(
		'genesis-menus',
		array(
			'primary' => __( 'Primary Navigation Menu', CHILD_DOMAIN ),
			// 'footer' => __( 'Footer Navigation Menu', CHILD_DOMAIN ),
		)
	);

	remove_action('genesis_after_header', 'genesis_do_nav');
}



/** Add custom header */
add_action('genesis_header', 'ww_custom_header');

function ww_custom_header()
{

	$name = get_bloginfo ('name');
	$url = get_bloginfo ('url');
	$description = get_bloginfo ('description');
	$primarynav = wp_nav_menu( array('theme_location' => 'primary', 'container' => 'nav', 'container_class' => 'nav-primary', 'menu_class' => 'menu genesis-nav-menu menu-primary', 'menu_id' => 'nav', 'echo' => false));
	$compactnav = wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_id' => 'nav-compact', 'echo' => false));
  $coverimage = get_post_meta(get_the_ID(), 'cover', true);
  $parentID = wp_get_post_parent_id( get_the_ID());
  $page_object = get_page( get_the_ID());

  $pos = strpos($page_object->post_content, ' ');
  if($pos > 2){
    $text  = substr($page_object->post_content, 0, strpos($page_object->post_content, ' ', 150));
  }
  else
  {
  $text  = '';
  }

  $headline = get_post_meta(get_the_ID(), 'headline', true);
  $bookdescription = get_post_meta(get_the_ID(), 'description', true);

  // $text = apply_filters('the_excerpt', get_post_field('post_excerpt', $page_object->ID));

	/*======================================================  ===================================================
	Sroll nav. Use the code below to have the nav display when scrolled. Edit JS as well. Still needs to be styled for responsive.

	//======================================================  ===================================================*/

	// echo
	// '<header class="site-header-compact" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
	// 	<div class="wrap">
	// 		<div class="title-area">
	// 			<h1 class="site-title-compact" itemprop="headline"><a href="'.$url .'" title="'.$name.'">'.$name.'</a></h1>
	// 		</div>
	// 		<nav class="nav-compact" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
	//  			<div class="wrap">
	//  				'.$compactnav.'
	//  			</div>
 // 			</nav>
	// 	</div>
	// </header>';
	/*======================================================  ===================================================
	End scroll nav

	//======================================================  ===================================================*/

	echo '<header class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
    <div class="wrap">
  		'.$primarynav;

      if(is_home() || is_front_page() || $parentID != '106') {
        echo '<div class="title-area">
          <h1 class="site-title" itemprop="headline"><a href="'.$url.'">'.$name.'</a></h1>
          <h2>'.$description.'</h2>
        </div>';
      }
      if(is_home() || is_front_page()) {
        echo '<div class="books"><a href="/books/the-curve/"><img src="/wp-content/themes/cameronstracher/images/book_curve.png" alt=""></a><a href="/books/kings-of-the-road/"><img src="/wp-content/themes/cameronstracher/images/book_kings.png" alt=""></a><a href="/books/the-water-wars/"><img src="/wp-content/themes/cameronstracher/images/book_water.png" alt=""></a><a href="/books/dinner-with-dad/"><img src="/wp-content/themes/cameronstracher/images/book_dinner.png" alt=""></a><a href="/books/double-billing/"><img src="/wp-content/themes/cameronstracher/images/book_double.png" alt=""></a><a href="/books/the-laws-of-return/"><img src="/wp-content/themes/cameronstracher/images/book_return.png" alt=""></a></div>
      <div class="header-vendors">
      	<a href="#"><img src="/wp-content/themes/cameronstracher/images/amazon_logo_blue.svg" alt="Cameron Stracher" style="width: 13%;"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/bn_logo_blue.svg" alt="Cameron Stracher" style="width: 13%; padding-bottom: .5em;"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/indie_logo_blue.png" alt="Cameron Stracher"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/bam_logo_blue.png" alt="Cameron Stracher"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/powells_logo_blue.png" alt="Cameron Stracher"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/kobo_logo_blue.svg" alt="Cameron Stracher"></a>
      </div>';
    }
    else if ($parentID == '106'){
      echo '<div class="book-header-content"><img src="'.$coverimage.'" /><h1>'.get_the_title().'</h1><p>'.$text.' ...</p></div><div class="header-vendors">
      	<a href="#"><img src="/wp-content/themes/cameronstracher/images/amazon_logo_blue.svg" alt="Cameron Stracher" style="width: 13%;"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/bn_logo_blue.svg" alt="Cameron Stracher" style="width: 13%; padding-bottom: .5em;"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/indie_logo_blue.png" alt="Cameron Stracher"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/bam_logo_blue.png" alt="Cameron Stracher"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/powells_logo_blue.png" alt="Cameron Stracher"></a><a href="#"><img src="/wp-content/themes/cameronstracher/images/kobo_logo_blue.svg" alt="Cameron Stracher"></a>
      </div>';
      getPrevNext();
    }

echo '</div>
    </header>';
  }

  function getPrevNext(){
	$pagelist = get_pages('sort_column=menu_order&child_of=106');
	$pages = array();
	foreach ($pagelist as $page) {
	   $pages[] += $page->ID;
	}

	$current = array_search(get_the_ID(), $pages);
	$prevID = $pages[$current-1];
	$nextID = $pages[$current+1];

	echo '<div class="navigation">';

	if (!empty($prevID)) {
		echo '<div class="alignleft">';
		echo '<a href="';
		echo get_permalink($prevID);
		echo '"';
		echo 'title="';
		echo get_the_title($prevID);
		echo'"><i class="fa fa-angle-left"></i><span class="text"> ';
    echo get_the_title($prevID);
    echo '</span></a>';
		echo "</div>";
	}
	if (!empty($nextID)) {
		echo '<div class="alignright">';
		echo '<a href="';
		echo get_permalink($nextID);
		echo '"';
		echo 'title="';
		echo get_the_title($nextID);
		echo'"><span class="text">';
    echo get_the_title($nextID);
    echo '</span> <i class="fa fa-angle-right"></i></a>';
		echo "</div>";
	}
}
