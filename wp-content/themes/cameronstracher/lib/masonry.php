<?php

if (! function_exists('slug_scripts_masonry') ) :
if ( ! is_admin() ) :
function slug_scripts_masonry() {
    wp_enqueue_script('masonry');
}
add_action( 'wp_enqueue_scripts', 'slug_scripts_masonry' );
endif; //! is_admin()
endif; //! slug_scripts_masonry exists

if ( ! function_exists( 'slug_masonry_init' )) :
function slug_masonry_init() { ?>
<script>
    //set the container that Masonry will be inside of in a var
    var container = document.querySelector('#masonry-loop');
    //create empty var msnry
    var msnry;
    // initialize Masonry after all images have loaded
    imagesLoaded( container, function() {
        msnry = new Masonry( container, {
            itemSelector: '.masonry-entry',
            columnWidth: '.grid-sizer',
            gutter: '.gutter-sizer',
            percentPosition: true
        });
    });
</script>
<?php }
//add to wp_footer
add_action( 'wp_footer', 'slug_masonry_init' , 9999999 );
endif; // ! slug_masonry_init exists

/** Code for custom loop */
function ww_custom_loop() {
    // code for a completely custom loop
     if ( have_posts() ) : ?>
     <div id="masonry-loop">
       <div class="grid-sizer"></div>
       <div class="gutter-sizer"></div>
    <?php /* The loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'masonry'); ?>
    <?php endwhile; ?>
    </div><!--/#masonry-loop-->
  <?php endif;
  genesis_posts_nav();
  ?>
<?php

/** Replace the standard loop with our custom loop */
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'ww_custom_loop' );
}

add_action( 'genesis_setup', 'ww_custom_loop' );



if (! function_exists('slug_custom_excerpt_length') ) :
function slug_custom_excerpt_length( $length ) {
    //set the shorter length once
    $short = 10;
    //set long length once
    $long = 35;
    //if we can only set short excerpt for phones, else short for all mobile devices
    if (function_exists( 'is_phone')) {
        if ( is_phone() ) {
            return $short;
        }
        else {
            return $long;
        }
    }
    else {
        if ( wp_is_mobile() ) {
            return $short;
        }
        else {
            return $long;
        }
    }
}
add_filter( 'excerpt_length', 'slug_custom_excerpt_length', 999 );
endif; // ! slug_custom_excerpt_length exists

if ( ! function_exists ( 'slug_masonry_styles' ) ) :
function slug_masonry_styles() {
    //set the wide width
    $wide = '23%';
    //set narrow width
    $narrow = '50%';
    /**Determine value for $width**/
    //if we can only set narrow for phones, else narrow for all mobile devices
    if (function_exists( 'is_phone')) {
        if ( is_phone() ) {
            $width = $narrow;
        }
        else {
            $width = $wide;
        }
    }
    else {
        if ( wp_is_mobile() ) {
            $width = $narrow;
        }
        else {
            $width = $wide;
        }
    }
    /**Output CSS for .masonry-entry with proper width**/
    $custom_css = "
    .grid-sizer,
    .masonry-entry {
      width: {$width};
      background-color: #fff;
      margin-bottom: 2%;
      padding: 1em;
      height: 200px;
      overflow: hidden;
    }
    .gutter-sizer {
      width: 2%;
    }
    ";
    //You must use the handle of an already enqueued stylesheet here.
    wp_add_inline_style( 'ww_main_css', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'slug_masonry_styles' , 999999);
endif; // ! slug_masonry_styles exists
