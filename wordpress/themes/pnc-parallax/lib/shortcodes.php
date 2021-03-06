<?php
/*
Plugin Name: PNC Shortcodes
Plugin URI: http://www.pointenorth.org/pnc-shortcodes
Description: Custom shortcodes for Pointe North Church
Version: 1.0
Author: Pointe North Church
Author URI: http://www.pointenorth.org
Author Email: pnccinfo@pointenorth.org
License: GPL2
*/

class PNCShortcodes {
  function __construct() 
  {
    add_shortcode('pnc_link_button', array(&$this, 'pnc_link_button') );
    add_shortcode('pnc_alert', array(&$this, 'pnc_alert') );
    add_shortcode('pnc_content_box', array(&$this, 'pnc_content_box') );
    add_shortcode('pnc_parallax_photo', array(&$this, 'pnc_parallax_photo') );
    add_shortcode('pnc_soundcloud', array(&$this, 'pnc_soundcloud') );
  }
  
  function pnc_link_button( $atts ) {
    $a = shortcode_atts( array(
        'class'  => 'button-p',
        'href'   => '/',
        'target' => '_self',
        'text'   => 'PNC Link Button',
    ), $atts );
    
    return sprintf( '<a class="%s" href="%s" target="%s">%s</a>', $a['class'], $a['href'], $a['target'], $a['text'] );
  }
  
  function pnc_alert( $atts ) {
    $a = shortcode_atts( array(
        'class'  => 'default',
        'text'   => 'Alert text placeholder',
    ), $atts );
    
    return sprintf( '<div data-alert class="alert-%s">%s<a href="" class="close">&times;</a></div>', $a['class'], $a['text'] );
  }
  
  function pnc_content_box( $atts ) {
    $a = shortcode_atts( array(
        'color'  => 'blue',
        'text'   => 'Content box text placeholder',
    ), $atts );
    
    return sprintf( '<div class="content-box-%s">%s</div>', $a['color'], $a['text'] );
  }
  
  function pnc_parallax_photo( $atts ) {
    $a = shortcode_atts( array(
        'url'     => null,
        'title'   => '&nbsp;',
    ), $atts );
    
    return sprintf( "
<!-- Put the URL to the parallax photo inside the div element below -->
<div id=\"parallax-background-image\" style=\"display: none;\">
  <ptitle>%s</ptitle>
  <url>%s</url>
</div>
<!-- END HTML Construct for parallax photo page -->
    ", $a['title'], $a['url']);
  }
  
  function pnc_soundcloud( $atts ){
    $a = shortcode_atts( array(
        'width'         => '100%',
        'height'        => '300',
        'scrolling'     => 'no',
        'frameborder'   => 'no',
        'playlist'      => 'pointe-north',
        'color'         => '77b800',
        'autoplay'      => 'false',
        'hide_related'  => 'true',
        'show_comments' => 'false',
        'show_user'     => 'true',
        'show_reposts'  => 'false',
    ), $atts );
    
    return sprintf( 
    '<iframe width="%s" height="%s" scrolling="%s" frameborder="%s" src="https://w.soundcloud.com/player/?url=https%3A//soundcloud.com/%s&color=%s&auto_play=%s&hide_related=%s&show_comments=%s&show_user=%s&show_reposts=%s"></iframe>', $a['width'], $a['height'], $a['scrolling'], $a['frameborder'], $a['playlist'], $a['color'], $a['autoplay'], $a['hide_related'], $a['show_comments'], $a['show_user'], $a['show_reposts'] );
  }
  
}

new PNCShortcodes();

?>
