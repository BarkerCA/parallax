<?php
/**
 * Main plugin file.
 * Adds support for exporting settings of various Genesis Framework specific plugins & Child Themes via the Genesis Exporter feature.
 *
 * @package   Genesis Extra Settings Transporter
 * @author    David Decker
 * @link      http://deckerweb.de/twitter
 * @copyright Copyright (c) 2013, David Decker - DECKERWEB
 *
 * Plugin Name: Genesis Extra Settings Transporter
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/genesis-extra-settings-transporter/
 * Description: Adds support for exporting settings of various Genesis Framework specific plugins & Child Themes via the Genesis Exporter feature.
 * Version: 1.2.0
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPL-2.0+
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Text Domain: genesis-extra-settings-transporter
 * Domain Path: /languages/
 *
 * Copyright (c) 2013 David Decker - DECKERWEB
 *
 *     This file is part of Genesis Extra Settings Transporter,
 *     a plugin for WordPress.
 *
 *     Genesis Extra Settings Transporter is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     Genesis Extra Settings Transporter is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Setting constants
 *
 * @since 1.0.0
 */
/** Plugin directory */
define( 'GEST_PLUGIN_DIR', dirname( __FILE__ ) );

/** Plugin base directory */
define( 'GEST_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );

/** Set constant/ filter for WordPress languages directory */
$gest_wp_lang_dir = GEST_PLUGIN_BASEDIR . '/../../languages/genesis-plugin-settings-exporter/';
define( 'GEST_WP_LANG_DIR', apply_filters( 'gest_filter_wp_lang_dir', $gest_wp_lang_dir ) );

/** Set constant/ filter for plugin's languages directory */
$gest_lang_dir = GEST_PLUGIN_BASEDIR . '/languages/';
define( 'GEST_LANG_DIR', apply_filters( 'gest_filter_lang_dir', $gest_lang_dir ) );

/** Required Version of Genesis Framework */
define( 'GEST_REQUIRED_GENESIS', '1.8.2' );


register_activation_hook( __FILE__, 'ddw_gest_activation' );
/**
 * Check the environment when plugin is activated.
 *   - Requirement: Genesis Framework needs to be installed and activated.
 *   - Note: register_activation_hook() isn't run after auto or manual upgrade, only on activation!
 *
 * @since  1.0.0
 *
 * @uses   load_plugin_textdomain()
 * @uses   deactivate_plugins()
 * @uses   wp_die()
 *
 * @param  $gest_genesis_deactivation_message
 *
 * @return string Optional plugin activation messages for the user.
 */
function ddw_gest_activation() {

	/**
	 * Look for translations to display for the activation message
	 * Look first in WordPress "languages" folder, then in plugin's "languages" folder
	 */
	load_plugin_textdomain( 'genesis-extra-settings-transporter', false, GEST_WP_LANG_DIR );
	load_plugin_textdomain( 'genesis-extra-settings-transporter', false, GEST_LANG_DIR );

	/** Check for activated "Genesis Framework" (= template/parent theme) */
	if ( ( basename( get_template_directory() ) != 'genesis' )
		&& ! class_exists( 'Genesis_Admin_Boxes' )
	) {

		/** If no Genesis, deactivate ourself */
		deactivate_plugins( plugin_basename( __FILE__ ) );

		/** Message: no Genesis active */
		$gest_genesis_deactivation_message = sprintf(
			__( 'Sorry, you cannot activate the %1$s plugin unless you have installed the latest version of the %2$sGenesis Framework%3$s (at least %4$s).', 'genesis-extra-settings-transporter' ),
			__( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ),
			'<a href="http://deckerweb.de/go/genesis/" target="_new"><strong><em>',
			'</em></strong></a>',
			'<code>' . GEST_REQUIRED_GENESIS . '</code>'
		);

		/** Deactivation message */
		wp_die(
			$gest_genesis_deactivation_message,
			__( 'Plugin', 'genesis-extra-settings-transporter' ) . ': ' . __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ),
			array( 'back_link' => true )
		);

	}  // end-if Genesis check

}  // end of function ddw_gest_activation


add_action( 'init', 'ddw_gest_init' );
/**
 * Load the textdomain for translation of the plugin.
 * Load admin helper functions - only within 'wp-admin'.
 *
 * @uses  load_plugin_textdomain()
 * @uses  is_admin()
 *
 * @since 1.0.0
 */
function ddw_gest_init() {

	/** Define constants and set defaults for enabling specific stuff */
	if ( ! defined( 'GEST_NO_PREMISE_EXPORT' ) ) {
		define( 'GEST_NO_PREMISE_EXPORT', FALSE );
	}

	/** Include admin & frontend functions when needed */
	if ( is_admin() ) {

		/** First look in WordPress' "languages" folder = custom & update-secure! */
		load_plugin_textdomain( 'genesis-extra-settings-transporter', false, GEST_WP_LANG_DIR );

		/** Then look in plugin's "languages" folder = default */
		load_plugin_textdomain( 'genesis-extra-settings-transporter', false, GEST_LANG_DIR );

		/** Include main admin functions */
		require_once( GEST_PLUGIN_DIR . '/includes/gest-admin-functions.php' );

		/** Include optional "Premise" plugin support */
		if ( ! GEST_NO_PREMISE_EXPORT && ! defined( 'PRST_PLUGIN_BASEDIR' ) && defined( 'PREMISE_SETTINGS_FIELD' ) ) {
			require_once( GEST_PLUGIN_DIR . '/includes/gest-premise-functions.php' );
		}

		/** Include admin helper stuff */
		require_once( GEST_PLUGIN_DIR . '/includes/gest-admin-extras.php' );
		
	}  // end-if is_admin() check

	/** Add "Settings" links to plugin page */
	if ( is_admin() && current_user_can( 'manage_options' ) ) {

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ) , 'ddw_gest_settings_page_link' );

	} // end-if is_admin() plus cap check

	/** Enhance the user experience, avoid doubled items :) */
	if ( function_exists( 'gsse_export_options' ) ) {

		remove_filter( 'genesis_export_options', 'gsse_export_options' );
		
	}  // end-if plugin check
		
}  // end of function ddw_gest_init


/**
 * Returns current plugin's header data in a flexible way.
 *
 * @since  1.0.0
 *
 * @uses   get_plugins()
 * @uses   plugin_basename()
 *
 * @param  $gest_plugin_value
 * @param  $gest_plugin_folder
 * @param  $gest_plugin_file
 *
 * @return string Plugin data.
 */
function ddw_gest_plugin_get_data( $gest_plugin_value ) {

	/** Bail early if we are not in wp-admin */
	if ( ! is_admin() ) {
		return;
	}

	/** Include WordPress plugin data */
	if ( ! function_exists( 'get_plugins' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	$gest_plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$gest_plugin_file = basename( ( __FILE__ ) );

	return $gest_plugin_folder[ $gest_plugin_file ][ $gest_plugin_value ];

}  // end of function ddw_gest_plugin_get_data