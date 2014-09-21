<?php
/**
 * Main plugin file.
 * Finally, use widgets to customize your Footer area (a.k.a 'Return to Top' plus 'Copyright/Credits') in Genesis Framework and Child Themes.
 *
 * @package   Genesis Widgetized Footer
 * @author    David Decker
 * @copyright Copyright (c) 2012-2013, David Decker - DECKERWEB
 * @link      http://deckerweb.de/twitter
 *
 * Plugin Name: Genesis Widgetized Footer
 * Plugin URI: http://genesisthemes.de/en/wp-plugins/genesis-widgetized-footer/
 * Description: Finally, use widgets to customize your Footer area (a.k.a 'Return to Top' plus 'Copyright/Credits') in Genesis Framework and Child Themes.
 * Version: 1.4.0
 * Author: David Decker - DECKERWEB
 * Author URI: http://deckerweb.de/
 * License: GPL-2.0+
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Text Domain: genesis-widgetized-footer
 * Domain Path: /languages/
 *
 * Copyright (c) 2012-2013 David Decker - DECKERWEB
 *
 *     This file is part of Genesis Widgetized Footer,
 *     a plugin for WordPress.
 *
 *     Genesis Widgetized Footer is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     Genesis Widgetized Footer is distributed in the hope that
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
 * @since 1.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, you are not allowed to access this file directly.' );
}


/**
 * Setting constants.
 *
 * @since 1.0.0
 */
//

/** Plugin directory */
define( 'GWFOOT_PLUGIN_DIR', dirname( __FILE__ ) );

/** Plugin base directory */
define( 'GWFOOT_PLUGIN_BASEDIR', dirname( plugin_basename( __FILE__ ) ) );

/** Set constant/ filter for plugin's languages directory */
define(
	'GWFOOT_LANG_DIR',
	apply_filters( 'gwfoot_filter_lang_dir', GWFOOT_PLUGIN_BASEDIR . '/languages/' )
);

/** Dev scripts & styles on Debug, minified on production */
define(
	'GWFOOT_SCRIPT_SUFFIX',
	( ( defined( 'WP_DEBUG' ) && WP_DEBUG ) || ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ) ? '' : '.min'
);


register_activation_hook( __FILE__, 'ddw_gwfoot_activation_check' );
/**
 * Checks for activated Genesis Framework before allowing plugin to activate.
 *
 * @since 1.0.0
 *
 * @uses  load_plugin_textdomain()
 * @uses  get_template_directory()
 * @uses  deactivate_plugins()
 * @uses  wp_die()
 */
function ddw_gwfoot_activation_check() {

	/** Load translations to display for the activation message. */
	load_plugin_textdomain( 'genesis-widgetized-footer', false, GWFOOT_LANG_DIR );

	/** Check for activated Genesis Framework (= template/parent theme) */
	if ( basename( get_template_directory() ) != 'genesis' ) {

		/** If no Genesis, deactivate ourself */
		deactivate_plugins( plugin_basename( __FILE__ ) );

		/** Message: no Genesis active */
		$gwfoot_deactivation_message = sprintf( __( 'Sorry, you cannot activate the %1$s plugin unless you have installed the %2$sGenesis Framework%3$s.', 'genesis-widgetized-footer' ), __( 'Genesis Widgetized Footer', 'genesis-widgetized-footer' ), '<a href="http://deckerweb.de/go/genesis/" target="_new"><strong><em>', '</em></strong></a>' );

		/** Deactivation message */
		wp_die(
			$gwfoot_deactivation_message,
			__( 'Plugin', 'genesis-widgetized-footer' ) . ': ' . __( 'Genesis Widgetized Footer', 'genesis-widgetized-footer' ),
			array( 'back_link' => true )
		);

	}  // end-if Genesis check

}  // end of function ddw_gwfoot_activation_check


add_action( 'init', 'ddw_gwfoot_setup', 1 );
/**
 * Setup #1: Load the text domain for translation of the plugin.
 * Setup #2: Load all admin & frontend stuff, set helper constants.
 * Setup #3: Register Widget Areas (Note: Has to be early on the "init" hook in order to display translations!).
 *
 * @since 1.0.0
 *
 * @uses  load_textdomain()	To load translations first from WP_LANG_DIR sub folder.
 * @uses  load_plugin_textdomain() To additionally load default translations from plugin folder (default).
 * @uses  is_admin()
 *
 * @param string 	$gwfoot_textdomain
 * @param string 	$locale
 * @param string 	$gwfoot_wp_lang_dir
 */
function ddw_gwfoot_setup() {

	/** Set unique textdomain string */
	$gwfoot_textdomain = 'genesis-widgetized-footer';

	/** The 'plugin_locale' filter is also used by default in load_plugin_textdomain() */
	$locale = apply_filters( 'plugin_locale', get_locale(), $gwfoot_textdomain );

	/** Set filter for WordPress languages directory */
	$gwfoot_wp_lang_dir = apply_filters(
		'gwfoot_filter_wp_lang_dir',
		WP_LANG_DIR . '/genesis-widgetized-footer/' . $gwfoot_textdomain . '-' . $locale . '.mo'
	);

	/** Translations: First, look in WordPress' "languages" folder = custom & update-secure! */
	load_textdomain( $gwfoot_textdomain, $gwfoot_wp_lang_dir );

	/** Translations: Secondly, look in plugin's "languages" folder = default */
	load_plugin_textdomain( $gwfoot_textdomain, FALSE, GWFOOT_LANG_DIR );


	/** Load the admin and frontend functions only when needed */
	if ( is_admin() ) {

		require_once( GWFOOT_PLUGIN_DIR . '/includes/gwfoot-admin.php' );

	} else {

		require_once( GWFOOT_PLUGIN_DIR . '/includes/gwfoot-frontend.php' );

	}  // end-if is_admin() check

	/** Add "Widgets Page" link to plugin page */
	if ( is_admin() && current_user_can( 'edit_theme_options' ) ) {

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ) , 'ddw_gwfoot_widgets_page_link' );

	}  // end-if is_admin() & cap check

	/** Define helpfer constants and set defaults for removing certain functions/hooks */
	if ( ! defined( 'GWFOOT_NO_WIDGETS_SHORTCODE' ) ) {
		define( 'GWFOOT_NO_WIDGETS_SHORTCODE', FALSE );
	}

	if ( ! defined( 'GWFOOT_NO_DISCLAIMER_WIDGET_AREA' ) ) {
		define( 'GWFOOT_NO_DISCLAIMER_WIDGET_AREA', FALSE );
	}

	if ( ! defined( 'GWFOOT_REMOVE_LANDING_FOOTER' ) ) {
		define( 'GWFOOT_REMOVE_LANDING_FOOTER', TRUE );
	}

	if ( ! defined( 'GWFOOT_LANDING_DISCLAIMER' ) ) {
		define( 'GWFOOT_LANDING_DISCLAIMER', TRUE );
	}

	if ( ! defined( 'GWFOOT_SHORTCODE_FEATURES' ) ) {
		define( 'GWFOOT_SHORTCODE_FEATURES', TRUE );
	}

	/** Check for activated Genesis Framework (= template/parent theme) */
	if ( basename( get_template_directory() ) == 'genesis' ) {

		/** Register additional widget areas */
		require_once( GWFOOT_PLUGIN_DIR . '/includes/gwfoot-widget-areas.php' );

	}  // end-if Genesis check

	/** Load our Shortcode function */
	if ( GWFOOT_SHORTCODE_FEATURES ) {

		require_once( GWFOOT_PLUGIN_DIR . '/includes/gwfoot-shortcodes.php' );

	}  // end-if constant check

}  // end of function ddw_gwfoot_setup


/**
 * Returns current plugin's header data in a flexible way.
 *
 * @since  1.3.0
 *
 * @uses   is_admin()
 * @uses   get_plugins()
 * @uses   plugin_basename()
 *
 * @param  $gwfoot_plugin_value
 * @param  $gwfoot_plugin_folder
 * @param  $gwfoot_plugin_file
 *
 * @return string Plugin data.
 */
function ddw_gwfoot_plugin_get_data( $gwfoot_plugin_value ) {

	/** Bail early if we are not in wp-admin */
	if ( ! is_admin() ) {
		return;
	}

	/** Include WordPress plugin data */
	if ( ! function_exists( 'get_plugins' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	$gwfoot_plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$gwfoot_plugin_file = basename( ( __FILE__ ) );

	return $gwfoot_plugin_folder[ $gwfoot_plugin_file ][ $gwfoot_plugin_value ];

}  // end of function ddw_gwfoot_plugin_get_data

/** Set plugin version */
define( 'GWFOOT_VERSION', ddw_gwfoot_plugin_get_data( 'Version' ) );