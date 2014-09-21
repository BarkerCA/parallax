<?php
/**
 * Shortcode functions.
 *
 * @package    Genesis Widgetized Footer
 * @subpackage Shortcodes
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright (c) 2013, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-widgetized-footer/
 * @link       http://deckerweb.de/twitter
 *
 * @since      1.4.0
 */

/**
 * Prevent direct access to this file.
 *
 * @since 1.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_shortcode( 'gwfoot-widget-area', 'ddw_gwfoot_shortcode_widget_area' );
/**
 * Display one of our 3 widget areas (only if active) via Shortcode.
 *
 * @since  1.4.0
 *
 * @uses   shortcode_atts()
 * @uses   is_active_sidebar()
 * @uses   gwfoot_display_footer_one_section()
 * @uses   gwfoot_display_footer_two_section()
 * @uses   gwfoot_display_footer_disclaimer_section()
 *
 * @param  $atts
 * @param  $defaults
 * @param  $output
 *
 * @return string HTML String of Widget area.
 */
function ddw_gwfoot_shortcode_widget_area( $atts ) {

	/** Set default shortcode attributes */
	$defaults = array(
		'area' => '',
	);

	/** Default shortcode attributes */
	$atts = shortcode_atts( $defaults, $atts, 'gwfoot-widget-area' );

	/** If our parameter is not empty: */
	if ( ! empty( $atts[ 'area' ] ) ) {

		/** Check for one of the 3 areas: */
		if ( $atts[ 'area' ] == 'footer-one' && is_active_sidebar( 'gwfoot-footer-one-widget' ) ) {

			$output = gwfoot_display_footer_one_section();

		} elseif ( $atts[ 'area' ] == 'footer-two' && is_active_sidebar( 'gwfoot-footer-two-widget' ) ) {

			$output = gwfoot_display_footer_two_section();

		} elseif ( $atts[ 'area' ] == 'footer-disclaimer' && is_active_sidebar( 'gwfoot-footer-disclaimer-widget' ) ) {

			$output = gwfoot_display_footer_disclaimer_section();

		} else {

			$output = '';

		}  // end-if area check

	}  // end-if parameter check

	/** Return the output - filterable */
	return apply_filters( 'gwnf_filter_shortcode_widget_area', $output );

}  // end of function ddw_gwfoot_shortcode_widget_area


/**
 * Helper function: Returns the post that has the latest updated date.
 *
 * @since  1.4.0
 *
 * @uses   get_posts()
 *
 * @return Post object or false if no post found.
 */
function ddw_gwfoot_get_latest_updated_post() {

	/** Helper query */
	$posts = get_posts(
		apply_filters(
			'gwfoot_filter_latest_update_date_query_args',
			array(
				'post_type'   => array( 'post', 'page', 'product', 'download' ),
				'numberposts' => 1,
				'post_status' => 'publish',
				'orderby'     => 'modified'
			)
		)
	);

	/** Check if this query has at least one result and return that, or false if no results */
	return ( isset( $posts[ 0 ] ) ) ? $posts[ 0 ] : false;

}  // end of function ddw_gwfoot_get_latest_updated_post


add_shortcode( 'gwfoot-lastupdated', 'ddw_gwfoot_shortcode_last_updated' );
/**
 * Display site's latest update date via Shortcode.
 *
 * Currently, these post types are supported:
 *    - 'post'
 *    - 'page'
 *    - 'product' (WooCommerce/ Jigoshop)
 *    - 'download' (Easy Digital Downloads)
 *
 * @since  1.4.0
 *
 * @uses   get_option()
 * @uses   shortcode_atts()
 * @uses   ddw_gwfoot_get_latest_updated_post()
 * @uses   date_i18n()
 *
 * @param  array 	$defaults 	Default values of Shortcode parameters.
 * @param  array 	$atts 		Attributes passed from Shortcode.
 * @param  obj/bool $latest_updated_post
 * @param  string 	$site_last_updated_date
 * @param  string 	$output
 *
 * @return string HTML content of the shortcode.
 */
function ddw_gwfoot_shortcode_last_updated( $atts ) {

	/** Set default shortcode attributes */
	$defaults = array(
		'date_format' => get_option( 'date_format' ),
		'wrapper'     => 'p',
		'class'       => '',
		'text_before' => __( 'Latest update date:', 'genesis-widgetized-footer' ),
		'text_after'  => '',
	);

	/** Default shortcode attributes */
	$atts = shortcode_atts( $defaults, $atts, 'gwfoot-lastupdated' );

	/**
	 * If post_id specified, we will use that post_id, or else get via ddw_gwfoot_get_latest_updated_post()
	 */
	if ( ! $latest_updated_post = ddw_gwfoot_get_latest_updated_post() ) {
		return;
	}

	/** Get the date string */
	$site_last_updated_date = date_i18n(
		$atts[ 'date_format' ],
		strtotime( $latest_updated_post->post_modified ),
		TRUE
	);

	/** Build the frontend output */
	$output = sprintf(
		'<%1$s class="gwfoot-lastupdated%2$s">%3$s%4$s%5$s</%1$s>',
		esc_attr( $atts[ 'wrapper' ] ),
		( ! empty( $atts[ 'class' ] ) ) ? ' ' . esc_attr( $atts[ 'class' ] ) : '',
		( ! empty( $atts[ 'text_before' ] ) ) ? esc_attr( $atts[ 'text_before' ] ) . ' ' : '',
		$site_last_updated_date,
		( ! empty( $atts[ 'text_after' ] ) ) ? ' ' . esc_attr( $atts[ 'text_after' ] ) : ''
	);

	/** Return the output - filterable */
	return apply_filters( 'gwfoot_filter_shortcode_last_updated', $output );

}  // end of function ddw_gwfoot_shortcode_last_updated