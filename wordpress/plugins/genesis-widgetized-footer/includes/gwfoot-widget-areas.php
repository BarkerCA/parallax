<?php
/**
 * Register additional widget areas.
 *
 * @package    Genesis Widgetized Footer
 * @subpackage Widgets
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright (c) 2012-2013, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-widgetized-footer/
 * @link       http://deckerweb.de/twitter
 *
 * @since      1.0.0
 */

/**
 * Prevent direct access to this file.
 *
 * @since 1.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


add_action( 'init', 'ddw_gwfoot_register_widget_areas' );
/**
 * Register additional widget areas.
 *
 * Note: Has to be early on the "init" hook in order to display translations!
 *
 * @since 1.0.0
 *
 * @uses  genesis_register_sidebar()
 */
function ddw_gwfoot_register_widget_areas() {

	/** Add shortcode support to widgets */
	if ( ! GWFOOT_NO_WIDGETS_SHORTCODE && ! is_admin() ) {

		add_filter( 'widget_text', 'do_shortcode' );

	}  // end-if constant & !is_admin() check

	/** Set filter for "Footer Area #1" widget title */
	$gwfoot_footer_one_widget_title = apply_filters(
		'gwfoot_filter_footer_one_widget_title',
		__( 'Footer Area #1', 'genesis-widgetized-footer' )
	);

	/** Set filter for "Footer Area #1" widget description */
	$gwfoot_footer_one_widget_description = apply_filters(
		'gwfoot_filter_footer_one_widget_description',
		sprintf( __( 'This is the first widget area (%s) within the Genesis Footer.', 'genesis-widgetized-footer' ), $gwfoot_footer_one_widget_title )
	);

	/** Register the "Footer Area #1" widget area */
	genesis_register_sidebar(
		array(
			'id'            => 'gwfoot-footer-one-widget',
			'name'          => esc_attr__( $gwfoot_footer_one_widget_title ),
			'description'   => esc_attr__( $gwfoot_footer_one_widget_description ),
			'before_widget' => '<div id="%1$s" class="gwfoot-footer-one widget-area %2$s">',
			'after_widget'  => '</div>',
		)
	);

	/** Set filter for "Footer Area #2" widget title */
	$gwfoot_footer_two_widget_title = apply_filters(
		'gwfoot_filter_footer_two_widget_title',
		__( 'Footer Area #2', 'genesis-widgetized-footer' )
	);

	/** Set filter for "Footer Area #2" widget description */
	$gwfoot_footer_two_widget_description = apply_filters(
		'gwfoot_filter_footer_two_widget_description',
		sprintf( __( 'This is the second widget area (%s) within the Genesis Footer.', 'genesis-widgetized-footer' ), $gwfoot_footer_two_widget_title )
	);

	/** Register the "Footer Area #2" widget area */
	genesis_register_sidebar(
		array(
			'id'            => 'gwfoot-footer-two-widget',
			'name'          => esc_attr__( $gwfoot_footer_two_widget_title ),
			'description'   => esc_attr__( $gwfoot_footer_two_widget_description ),
			'before_widget' => '<div id="%1$s" class="gwfoot-footer-two widget-area %2$s">',
			'after_widget'  => '</div>',
		)
	);

	/** Set filter for "Footer Disclaimer" widget title */
	$gwfoot_footer_disclaimer_widget_title = apply_filters(
		'gwfoot_filter_footer_disclaimer_widget_title',
		__( 'Footer Disclaimer', 'genesis-widgetized-footer' )
	);

	/** Set filter for "Footer Disclaimer" widget description */
	$gwfoot_footer_disclaimer_widget_description = apply_filters(
		'gwfoot_filter_footer_disclaimer_widget_description',
		__( 'This is Footer Disclaimer widget area within the Genesis Footer.', 'genesis-widgetized-footer' )
	);

	/**
	 * Register the "Footer Disclaimer" widget area
	 *    Do not register for AgentPress 2.x and RealPro 1.x child themes
	 *      as these already have their own Disclaimer widget area
	 */
	if ( ! GWFOOT_NO_DISCLAIMER_WIDGET_AREA
		&& ( ! function_exists( 'agentpress_disclaimer' ) || ! function_exists( 'realpro_disclaimer' ) )
	) {

		genesis_register_sidebar(
			array(
				'id'            => 'gwfoot-footer-disclaimer-widget',
				'name'          => esc_attr__( $gwfoot_footer_disclaimer_widget_title ),
				'description'   => esc_attr__( $gwfoot_footer_disclaimer_widget_description ),
				'before_widget' => '<div id="%1$s" class="gwfoot-footer-disclaimer widget-area %2$s">',
				'after_widget'  => '</div>',
			)
		);

	} // end-if constant plus AgentPress 2.x / RealPro 1.x check

}  // end of function ddw_gwfoot_register_widget_areas