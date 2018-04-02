<?php

/**
 * Enqueue Google Fonts.
 */

function ww_genesis_scripts_styles() {
    wp_enqueue_style( 'stracherauthor-fonts', ww_genesis_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'ww_genesis_scripts_styles' );

function ww_genesis_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $montserrat = _x( 'on', 'montserrat font: on or off', 'cameronstracher' );

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $roboto_slab = _x( 'on', 'roboto slab font: on or off', 'cameronstracher' );

    if ( 'off' !== $montserrat || 'off' !== $roboto_slab ) {
    // if ( 'off' !== $roboto_slab ) {
        $font_families = array();

        if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:300,400,400i,700';
        }

        if ( 'off' !== $roboto_slab ) {
            $font_families[] = 'Roboto Slab:300, 300i, 400,400i,700,700i';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
