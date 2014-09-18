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
  
}

new PNCShortcodes();

?>
