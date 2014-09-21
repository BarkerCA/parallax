<?php
/**
 * This file adds the Landing template to the Parallax Pro Theme.
 *
 * @author Pointe North Church
 * @package PNC-Parallax
 * @subpackage Customizations
 */

/*
Template Name: Parallax Top Photo
*/


//* Enqueue parallax script
add_action( 'wp_enqueue_scripts', 'parallax_enqueue_parallax_script' );
function parallax_enqueue_parallax_script() {
 
  if ( ! wp_is_mobile() ) {
   
    wp_enqueue_script( 'parallax-script', get_bloginfo( 'stylesheet_directory' ) . '/js/parallax-photo.js', array( 'jquery' ), '1.0.0' );
   
  }
 
}

//* Add parallax-home body class
add_filter( 'body_class', 'parallax_body_class' );
function parallax_body_class( $classes ) {
$classes[] = 'parallax-home';
return $classes;
}

//* Force full width content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Remove the default Genesis loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

//* Add Parallax Photo Markup
add_action('genesis_loop', 'parallax_photo_open');
add_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_loop', 'parallax_photo_close');

function parallax_photo_open(){
  echo '
  <div id="parallax-photo" class="home-odd parallax-photo widget-area">
    <div class="wrap">
      <section id="text-2" class="widget widget_text">
        <div class="widget-wrap">
          <h4 id="parallax-title" class="widget-title widgettitle">&nbsp;</h4>
        </div>
      </section>
    </div>
  </div>
  <div class="row">
    <div class="medium-12 columns">';
}

function parallax_photo_close(){
  echo '
    </div>
  </div>';
}

//* Remove navigation
remove_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_nav' );
remove_action( 'genesis_footer', 'genesis_do_subnav', 7 );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Run the Genesis loop
genesis();
