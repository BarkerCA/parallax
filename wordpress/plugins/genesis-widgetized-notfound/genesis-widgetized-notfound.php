<?php
/**
 * Main plugin file.
 * Finally, use widgets to maintain and customize your 404 Error and Search Not
 *    Found pages in Genesis Framework and Child Themes.
 *
 * @package   Genesis Widgetized Not Found & 404
 * @author    David Decker
 * @copyright Copyright (c) 2012-2013, David Decker - DECKERWEB
 * @link      http://deckerweb.de/twitter
 *
 * Plugin Name: Genesis Widgetized Not Found & 404
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/genesis-widgetized-notfound/
 * Description: Finally, use widgets to maintain and customize your 404 Error and Search Not Found pages in Genesis Framework and Child Themes.
 * Version: 1.5.0
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPL-2.0+
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Text Domain: genesis-widgetized-notfound
 * Domain Path: /languages/
 *
 * Copyright (c) 2012-2013 David Decker - DECKERWEB
 *
 *     This file is part of Genesis Widgetized Not Found & 404,
 *     a plugin for WordPress.
 *
 *     Genesis Widgetized Not Found & 404 is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     Genesis Widgetized Not Found & 404 is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Prevent direct access to this file.
 *
 * @since 1.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Setting constants.
 *
 * @since 1.0.0
 */
/** Set plugin version */
define( 'GWNF_VERSION', ddw_gwnf_plugin_get_data( 'Version' ) );

/** Plugin directory */
define( 'GWNF_PLUGIN_DIR', dirname( __FILE__ ) );

/** Plugin base directory */
define( 'GWNF_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );

/** Set constant/ filter for plugin's languages directory */
define(
	'GWNF_LANG_DIR',
	apply_filters( 'gwnf_filter_lang_dir', GWNF_PLUGIN_BASEDIR . '/languages/' )
);

/** Dev scripts & styles on Debug, minified on production */
define(
	'GWNF_SCRIPT_SUFFIX',
	( ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ) ? '' : '.min'
);


register_activation_hook( __FILE__, 'ddw_gwnf_activation_check' );
/**
 * Checks for activated Genesis Framework before allowing plugin to activate.
 *
 * @since 1.0.0
 *
 * @uses  load_plugin_textdomain()
 * @uses  get_template_directory()
 * @uses  deactivate_plugins()
 * @uses  wp_die()
 *
 * @param string 	$gwnf_deactivation_message
 */
function ddw_gwnf_activation_check() {

	/** Load translations to display for the activation message. */
	load_plugin_textdomain( 'genesis-widgetized-notfound', false, GWNF_LANG_DIR );

	/** Check for activated Genesis Framework (= template/parent theme) */
	if ( basename( get_template_directory() ) != 'genesis' ) {

		/** If no Genesis, deactivate ourself */
		deactivate_plugins( plugin_basename( __FILE__ ) );

		/** Message: no Genesis active */
		$gwnf_deactivation_message = sprintf( __( 'Sorry, you cannot activate the %1$s plugin unless you have installed the latest version of the %2$sGenesis Framework%3$s.', 'genesis-widgetized-notfound' ), __( 'Genesis Widgetized Not Found & 404', 'genesis-widgetized-notfound' ), '<a href="http://deckerweb.de/go/genesis/" target="_new"><strong><em>', '</em></strong></a>' );

		/** Deactivation message */
		wp_die(
			$gwnf_deactivation_message,
			__( 'Plugin', 'genesis-widgetized-notfound' ) . ': ' . __( 'Genesis Widgetized Not Found & 404', 'genesis-widgetized-notfound' ),
			array( 'back_link' => true )
		);

	}  // end-if Genesis check

}  // end of function ddw_gwnf_activation_check


add_action( 'init', 'ddw_gwnf_init', 1 );
/**
 * Load the text domain for translation of the plugin.
 * 
 * @since 1.0.0
 *
 * @uses  load_textdomain()	To load translations first from WP_LANG_DIR sub folder.
 * @uses  load_plugin_textdomain() To additionally load default translations from plugin folder (default).
 *
 * @param string 	$gwnf_textdomain
 * @param string 	$locale
 * @param string 	$gwnf_wp_lang_dir
 */
function ddw_gwnf_init() {

	/** Set unique textdomain string */
	$gwnf_textdomain = 'genesis-widgetized-notfound';

	/** The 'plugin_locale' filter is also used by default in load_plugin_textdomain() */
	$locale = apply_filters( 'plugin_locale', get_locale(), $gwnf_textdomain );

	/** Set filter for WordPress languages directory */
	$gwnf_wp_lang_dir = apply_filters(
		'gwnf_filter_wp_lang_dir',
		WP_LANG_DIR . '/genesis-widgetized-notfound/' . $gwnf_textdomain . '-' . $locale . '.mo'
	);

	/** Translations: First, look in WordPress' "languages" folder = custom & update-secure! */
	load_textdomain( $gwnf_textdomain, $gwnf_wp_lang_dir );

	/** Translations: Secondly, look in plugin's "languages" folder = default */
	load_plugin_textdomain( $gwnf_textdomain, FALSE, GWNF_LANG_DIR );

}  // end of function ddw_gwnf_init


add_action( 'init', 'ddw_gwnf_setup', 1 );
/**
 * Setup: Register Widget Areas (Note: Has to be early on the "init" hook in order to display translations!).
 *
 * @since 1.0.0
 *
 * @uses  is_admin()
 *
 * @param bool 	$gwnf_bbpress_noresults_widgetized
 */
function ddw_gwnf_setup() {

	/** Define constants and set defaults for removing all or certain sections */
	if ( ! defined( 'GWNF_NO_WIDGETS_SHORTCODE' ) ) {
		define( 'GWNF_NO_WIDGETS_SHORTCODE', FALSE );
	}

	if ( ! defined( 'GWNF_SHORTCODE_FEATURES' ) ) {
		define( 'GWNF_SHORTCODE_FEATURES', TRUE );
	}

	/** Include admin helper functions */
	if ( is_admin() ) {

		require_once( GWNF_PLUGIN_DIR . '/includes/gwnf-admin.php' );

	} else {

		require_once( GWNF_PLUGIN_DIR . '/includes/gwnf-frontend.php' );

	}  // end-if is_admin() check

	/** Add "Widgets Page" link to plugin page */
	if ( is_admin() && current_user_can( 'edit_theme_options' ) ) {

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ) , 'ddw_gwnf_widgets_page_link' );

	}

	/** Check for activated Genesis Framework (= template/parent theme) */
	if ( basename( get_template_directory() ) == 'genesis' ) {

		/** Register additional widget areas */
		require_once( GWNF_PLUGIN_DIR . '/includes/gwnf-widget-areas.php' );

	}  // end-if Genesis check

	/** Load our Shortcode function */
	if ( GWNF_SHORTCODE_FEATURES ) {

		require_once( GWNF_PLUGIN_DIR . '/includes/gwnf-shortcodes.php' );

	}  // end-if constant check


	/**
	 * Filter for custom disabling of the widgetized no search results area.
	 *
	 * Usage: add_filter( 'gwnf_filter_bbpress_noresults_widgetized', '__return_false' );
	 */
	$gwnf_bbpress_noresults_widgetized = (bool) apply_filters(
		'gwnf_filter_bbpress_noresults_widgetized',
		'__return_true'
	);

	/** For bbPress 2.3+: Load optional widgetized not found area */
	if ( $gwnf_bbpress_noresults_widgetized && function_exists( 'bbp_is_search' ) ) {

		require_once( GWNF_PLUGIN_DIR . '/includes/gwnf-bbpress-widgetized-noresults.php' );

		add_action( 'init', 'ddw_gwnf_bbpress_search_actions', 5 );

	}  // end-if filter & bbPress 2.3+ check

}  // end of function ddw_gwnf_setup


add_action( 'widgets_init', 'ddw_gwnf_register_widgets' );
/**
 * Register the widget, include plugin file.
 *
 * @since 1.5.0
 *
 * @uses  register_widget()
 */
function ddw_gwnf_register_widgets() {

	/** Load widget code part */
	require_once( GWNF_PLUGIN_DIR . '/includes/gwnf-widget-search.php' );

	/** Register the widget */
	register_widget( 'DDW_GWNF_Search_Widget' );

}  // end of function ddw_gwnf_register_widgets


/**
 * Returns current plugin's header data in a flexible way.
 *
 * @since  1.4.0
 *
 * @uses   is_admin()
 * @uses   get_plugins()
 * @uses   plugin_basename()
 *
 * @param  $gwnf_plugin_value
 * @param  $gwnf_plugin_folder
 * @param  $gwnf_plugin_file
 *
 * @return string Plugin data.
 */
function ddw_gwnf_plugin_get_data( $gwnf_plugin_value ) {

	/** Bail early if we are not in wp-admin */
	if ( ! is_admin() ) {
		return;
	}

	/** Include WordPress plugin data */
	if ( ! function_exists( 'get_plugins' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	$gwnf_plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$gwnf_plugin_file = basename( ( __FILE__ ) );

	return $gwnf_plugin_folder[ $gwnf_plugin_file ][ $gwnf_plugin_value ];

}  // end of function ddw_gwnf_plugin_get_data