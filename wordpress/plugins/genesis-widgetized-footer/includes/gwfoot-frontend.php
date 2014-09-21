<?php
/**
 * Helper function in case of landing page templates - logic for the frontend display.
 *
 * @package    Genesis Widgetized Footer
 * @subpackage Frontend
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


add_action( 'genesis_before', 'gwfoot_do_footer_widgets' );
/**
 * Add the new widgetized footer content sections.
 *
 * @since  1.0.0
 *
 * @uses   is_active_sidebar()
 *
 * @global mixed $gwfoot_footer_one_width, $gwfoot_footer_two_width
 */
function gwfoot_do_footer_widgets() {

	global $gwfoot_footer_one_width, $gwfoot_footer_two_width;

	$gwfoot_footer_one_width = 'default';
	$gwfoot_footer_two_width = 'default';

	/**
	 * Footer Areas widget logic
	 * 3 Cases: 'Footer Area #1' active, or 'Footer Area #2' active, or both.
	 *
	 * Dynamically set proper width.
	 * And respect different footer positions of Prose, Modern Blogger and Pretty Young Thing child themes.
	 */
	/** Case 1: only 'Footer Area #1' active */
	if ( is_active_sidebar( 'gwfoot-footer-one-widget' ) && ! is_active_sidebar( 'gwfoot-footer-two-widget' ) ) {

		$gwfoot_footer_one_width = 'full-width';

			/** Check for Prose 1.0/ 1.5.x Child Theme (official) */
		if ( defined( 'PROSE_SETTINGS_FIELD' ) ) {

			remove_action( 'genesis_after', 'genesis_do_footer' );
			add_action( 'genesis_after', 'gwfoot_display_footer_one_section' );

			/** Check for Metro 1.0 Child Theme (official) */
		} elseif ( function_exists( 'metro_load_google_font' ) ) {

			remove_action( 'genesis_after', 'genesis_do_footer', 12 );
			add_action( 'genesis_after', 'gwfoot_display_footer_one_section', 12 );

			/** Check for Modern Blogger 1.0 Child Theme (market/community) */
		} elseif ( function_exists( 'modernblogger_comment_form_args' ) ) {

			remove_action( 'genesis_footer', 'child_do_footer' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_one_section' );

			/** Check for Pretty Young Thing 1.1 Child Theme (official) */
		} elseif ( function_exists( 'pretty_footer_top' ) ) {

			remove_action( 'genesis_footer', 'genesis_do_footer' );
			remove_action( 'genesis_after_footer', 'pretty_footer_top' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_one_section' );

			/** Check for Pretty Young Thing 1.0 Child Theme (official) */
		} elseif ( function_exists( 'pretty_do_footer' ) || function_exists( 'pretty_do_footer_top' ) ) {

			remove_action( 'genesis_footer', 'pretty_do_footer' );
			remove_action( 'genesis_after_footer', 'pretty_do_footer_top' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_one_section' );

			/** Default Genesis Footer Hook position */
		} else {

			remove_action( 'genesis_footer', 'genesis_do_footer' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_one_section' );

		}  // end-if child theme check case 1

	/** Case 2: only 'Footer Area #2' active */
	} elseif ( is_active_sidebar( 'gwfoot-footer-two-widget' ) && ! is_active_sidebar( 'gwfoot-footer-one-widget' ) ) {

		$gwfoot_footer_two_width = 'full-width';

			/** Check for Prose 1.0/ 1.5.x Child Theme (official) */
		if ( defined( 'PROSE_SETTINGS_FIELD' ) ) {

			remove_action( 'genesis_after', 'genesis_do_footer' );
			add_action( 'genesis_after', 'gwfoot_display_footer_two_section' );

			/** Check for Metro 1.0 Child Theme (official) */
		} elseif ( function_exists( 'metro_load_google_font' ) ) {

			remove_action( 'genesis_after', 'genesis_do_footer', 12 );
			add_action( 'genesis_after', 'gwfoot_display_footer_two_section', 12 );

			/** Check for Modern Blogger 1.0 Child Theme (market/community) */
		} elseif ( function_exists( 'modernblogger_comment_form_args' ) ) {

			remove_action( 'genesis_footer', 'child_do_footer' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_two_section' );

			/** Check for Pretty Young Thing 1.1 Child Theme (official) */
		} elseif ( function_exists( 'pretty_footer_top' ) ) {

			remove_action( 'genesis_footer', 'genesis_do_footer' );
			remove_action( 'genesis_after_footer', 'pretty_footer_top' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_two_section' );

			/** Check for Pretty Young Thing 1.0 Child Theme (official) */
		} elseif ( function_exists( 'pretty_do_footer' ) || function_exists( 'pretty_do_footer_top' ) ) {

			remove_action( 'genesis_footer', 'pretty_do_footer' );
			remove_action( 'genesis_after_footer', 'pretty_do_footer_top' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_two_section' );

			/** Default Genesis Footer Hook position */
		} else {

			remove_action( 'genesis_footer', 'genesis_do_footer' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_two_section' );

		}  // end-if child theme check case 2

	/** Case 3: Both, 'Footer Area #1' AND 'Footer Area #2' active */
	} elseif ( is_active_sidebar( 'gwfoot-footer-one-widget' ) && is_active_sidebar( 'gwfoot-footer-two-widget' ) ) {

		$gwfoot_footer_one_width = 'one-third';
		$gwfoot_footer_two_width = 'two-thirds';

			/** Check for Prose 1.0/ 1.5.x Child Theme (official) */
		if ( defined( 'PROSE_SETTINGS_FIELD' ) ) {

			remove_action( 'genesis_after', 'genesis_do_footer' );
			add_action( 'genesis_after', 'gwfoot_display_footer_one_section' );
			add_action( 'genesis_after', 'gwfoot_display_footer_two_section' );

			/** Check for Metro 1.0 Child Theme (official) */
		} elseif ( function_exists( 'metro_load_google_font' ) ) {

			remove_action( 'genesis_after', 'genesis_do_footer', 12 );
			add_action( 'genesis_after', 'gwfoot_display_footer_one_section', 12 );
			add_action( 'genesis_after', 'gwfoot_display_footer_two_section', 12 );

			/** Check for Modern Blogger 1.0 Child Theme (market/community) */
		} elseif ( function_exists( 'modernblogger_comment_form_args' ) ) {

			remove_action( 'genesis_footer', 'child_do_footer' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_one_section' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_two_section' );

			/** Check for Pretty Young Thing 1.1 Child Theme (official) */
		} elseif ( function_exists( 'pretty_footer_top' ) ) {

			remove_action( 'genesis_footer', 'genesis_do_footer' );
			remove_action( 'genesis_after_footer', 'pretty_footer_top' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_one_section' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_two_section' );

			/** Check for Pretty Young Thing 1.0 Child Theme (official) */
		} elseif ( function_exists( 'pretty_do_footer' ) || function_exists( 'pretty_do_footer_top' ) ) {

			remove_action( 'genesis_footer', 'pretty_do_footer' );
			remove_action( 'genesis_after_footer', 'pretty_do_footer_top' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_one_section' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_two_section' );

			/** Default Genesis Footer Hook position */
		} else {

			remove_action( 'genesis_footer', 'genesis_do_footer' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_one_section' );
			add_action( 'genesis_footer', 'gwfoot_display_footer_two_section' );

		}  // end-if child theme check case 3

	}  // end-if widget case check

	/**
	 * Footer Disclaimer widget logic.
	 *
	 * For Prose 1.0/ 1.5.x Child Theme using 'genesis_after' hook.
	 * Otherwise place in 'genesis_footer' hook, with lower priority.
	 */
	if ( is_active_sidebar( 'gwfoot-footer-disclaimer-widget' ) && GWFOOT_LANDING_DISCLAIMER ) {

			/**
			 * Check for Prose 1.0/ 1.5.x Child Theme (official),
			 *  plus, check for Metro 1.0 Child Theme (offifical).
			 */
		if ( defined( 'PROSE_SETTINGS_FIELD' ) || function_exists( 'metro_load_google_font' ) ) {

			add_action( 'genesis_after', 'gwfoot_display_footer_disclaimer_section', 15 );

			/** Default Genesis Footer Hook position */
		} else {

			add_action( 'genesis_footer', 'gwfoot_display_footer_disclaimer_section', 15 );

		}  // end-if child theme check

	}  // end-if widget check

}  // end of function gwfoot_do_footer_widgets


/**
 * Display the "Footer Area #1" section.
 *
 * @since  1.0.0
 *
 * @uses   dynamic_sidebar()
 *
 * @global mixed $gwfoot_footer_one_width
 */
function gwfoot_display_footer_one_section() {

	global $gwfoot_footer_one_width;

	echo '<div id="gwfoot-footer-one-area" class="gwfoot-footer-one-' . $gwfoot_footer_one_width . '">';
		dynamic_sidebar( 'gwfoot-footer-one-widget' );
	echo '</div><!-- end #gwfoot-footer-one-area -->';

}  // end of function gwfoot_display_footer_one_section


/**
 * Display the "Footer Area #2" section.
 *
 * @since 1.0.0
 *
 * @uses   dynamic_sidebar()
 *
 * @global mixed $gwfoot_footer_two_width
 */
function gwfoot_display_footer_two_section() {

	global $gwfoot_footer_two_width;

	echo '<div id="gwfoot-footer-two-area" class="gwfoot-footer-two-' . $gwfoot_footer_two_width . '">';
		dynamic_sidebar( 'gwfoot-footer-two-widget' );
	echo '</div><!-- end #gwfoot-footer-two-area -->';

}  // end of function gwfoot_display_footer_two_section


/**
 * Display the "Footer Disclaimer" section.
 *
 * @since 1.0.0
 *
 * @uses  dynamic_sidebar()
 */
function gwfoot_display_footer_disclaimer_section() {

	echo '<div id="gwfoot-footer-disclaimer-area">';
		echo '<div class="gwfoot-footer-disclaimer-content">';
			dynamic_sidebar( 'gwfoot-footer-disclaimer-widget' );
		echo '</div><!-- end .gwfoot-footer-disclaimer-content -->';
	echo '</div><!-- end #gwfoot-footer-disclaimer-area -->';

}  // end of function gwfoot_display_footer_disclaimer_section


add_action( 'genesis_before', 'gwfoot_landing_templates_undo_footer_widgets', 15 );
/**
 * Helper function for removing Footer Widget areas on landing page templates.
 * Fires also on 'genesis_before' hook but with lower priority.
 *
 * @since 1.2.0
 *
 * @uses  is_page_template()
 */
function gwfoot_landing_templates_undo_footer_widgets() {

	/**
	 * Check for landing page templates.
	 *
	 * Helper constant allows for custom disabling.
	 * Usage: define( 'GWFOOT_REMOVE_LANDING_FOOTER', FALSE );
	 */
	if ( GWFOOT_REMOVE_LANDING_FOOTER
		&& ( is_page_template( 'page_landing.php' )
			|| is_page_template( 'page-landing.php' )
			|| is_page_template( 'landing.php' )
			|| is_page_template( 'template-landing.php' )
			|| is_page_template( 'template_page-landing.php' )
		)
	) {

		/** Check against Prose 1.0/ 1.5.x Child Theme (official) */
		if ( defined( 'PROSE_SETTINGS_FIELD' ) ) {

			remove_action( 'genesis_after', 'gwfoot_display_footer_one_section' );
			remove_action( 'genesis_after', 'gwfoot_display_footer_two_section' );

		}
		/** Otherwise default behavior */
		else {

			remove_action( 'genesis_footer', 'gwfoot_display_footer_one_section' );
			remove_action( 'genesis_footer', 'gwfoot_display_footer_two_section' );

		}  // end-if child theme check

	}  // end-if constant & landing page template check

}  // end of function gwfoot_landing_templates_undo_footer_widgets


add_action( 'wp_enqueue_scripts', 'ddw_gwfoot_styles' );
/**
 * Enqueue a few additional CSS rules to hold the widgetized footer - only if
 *    widgets are active, plus for enhanced compatibility with Genesis Child
 *    Themes.
 * 
 * @since 1.0.0
 *
 * @uses  is_active_sidebar()
 * @uses  wp_register_style()
 * @uses  wp_enqueue_style()
 */
function ddw_gwfoot_styles() {

	/** Additional function check to avoid very seldom crashes */
	if ( ! function_exists( 'is_active_sidebar' ) ) {
		return;
	}

	/** Check for the active widget areas */
	if ( is_active_sidebar( 'gwfoot-footer-one-widget' )
		|| is_active_sidebar( 'gwfoot-footer-two-widget' )
		|| is_active_sidebar( 'gwfoot-footer-disclaimer-widget' )
	) {

		/** Register our styles */
		wp_register_style(
			'genesis-widgetized-footer',
			plugins_url( 'css/gwfoot-styles' . GWFOOT_SCRIPT_SUFFIX . '.css', dirname( __FILE__ ) ),
			false,
			( ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ) ? time() : filemtime( plugin_dir_path( __FILE__ ) ),
			'all'
		);

		/** Enqueue our styles */
		wp_enqueue_style( 'genesis-widgetized-footer' );

		/** Action hook: 'gwfoot_load_styles' - allows for enqueueing additional custom styles */
		do_action( 'gwfoot_load_styles' );

	}  // end-if active widgets check

}  // end of function ddw_gwfoot_styles


/**
 * Helper function for placing the Disclaimer widget at the very bottom.
 *
 * This helper function fires through hook 'genesis_before' which provides the best priority for us.
 * Widget & markup then placed in hook: 'genesis_after'
 *
 * Usage: add_action( 'genesis_before', '__gwfoot_footer_disclaimer_bottom' );
 *
 * @since 1.0.0
 */
function __gwfoot_footer_disclaimer_bottom() {

	/**
	 * Check against Prose 1.0/ 1.5.x Child Theme (official),
	 *  plus, check against Metro 1.0 Child Theme (official).
	 */
	if ( ! defined( 'PROSE_SETTINGS_FIELD' ) || function_exists( 'metro_load_google_font' ) ) {

		remove_action( 'genesis_footer', 'gwfoot_display_footer_disclaimer_section', 15 );
		add_action( 'genesis_after', 'gwfoot_display_footer_disclaimer_section' );

	} // end-if child theme check

}  // end of function __gwfoot_footer_disclaimer_bottom