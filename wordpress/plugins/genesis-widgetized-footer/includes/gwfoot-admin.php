<?php
/**
 * Helper functions for the admin - plugin links and help tabs.
 *
 * @package    Genesis Widgetized Footer
 * @subpackage Admin
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


/**
 * Setting internal plugin helper links constants.
 *
 * @since 1.2.0
 *
 * @uses  get_locale()
 */
define( 'GWFOOT_URL_TRANSLATE',		'http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-widgetized-footer' );
define( 'GWFOOT_URL_WPORG_FAQ',		'http://wordpress.org/extend/plugins/genesis-widgetized-footer/faq/' );
define( 'GWFOOT_URL_WPORG_FORUM',	'http://wordpress.org/support/plugin/genesis-widgetized-footer' );
define( 'GWFOOT_URL_WPORG_PROFILE',	'http://profiles.wordpress.org/daveshine/' );
define( 'GWFOOT_URL_SNIPPETS',		'https://gist.github.com/2497456' );
define( 'GWFOOT_PLUGIN_LICENSE', 	'GPL-2.0+' );
if ( get_locale() == 'de_DE' || get_locale() == 'de_AT' || get_locale() == 'de_CH' || get_locale() == 'de_LU' ) {
	define( 'GWFOOT_URL_DONATE', 	'http://genesisthemes.de/spenden/' );
	define( 'GWFOOT_URL_PLUGIN',	'http://genesisthemes.de/plugins/genesis-widgetized-footer/' );
} else {
	define( 'GWFOOT_URL_DONATE', 	'http://genesisthemes.de/en/donate/' );
	define( 'GWFOOT_URL_PLUGIN',	'http://genesisthemes.de/en/wp-plugins/genesis-widgetized-footer/' );
}


/**
 * Add "Widgets Page" link to plugin page.
 *
 * @since  1.0.0
 *
 * @param  $gwfoot_links
 * @param  $gwfoot_widgets_link
 *
 * @return strings Widgets link
 */
function ddw_gwfoot_widgets_page_link( $gwfoot_links ) {

	/** Widgets Admin link */
	$gwfoot_widgets_link = sprintf(
		'<a href="%s" title="%s">%s</a>',
		admin_url( 'widgets.php' ),
		__( 'Go to the Widgets settings page', 'genesis-widgetized-footer' ),
		__( 'Widgets', 'genesis-widgetized-footer' )
	);

	/** Set the order of the links */
	array_unshift( $gwfoot_links, $gwfoot_widgets_link );

	/** Display plugin settings links */
	return apply_filters( 'gwfoot_filter_settings_page_link', $gwfoot_links );

}  // end of function ddw_gwfoot_widgets_page_link


add_filter( 'plugin_row_meta', 'ddw_gwfoot_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page.
 *
 * @since  1.0.0
 *
 * @param  $gwfoot_links
 * @param  $gwfoot_file
 *
 * @return strings plugin links
 */
function ddw_gwfoot_plugin_links( $gwfoot_links, $gwfoot_file ) {

	/** Capability check */
	if ( ! current_user_can( 'install_plugins' ) ) {

		return $gwfoot_links;

	}  // end-if cap check

	/** List additional links only for this plugin */
	if ( $gwfoot_file == GWFOOT_PLUGIN_BASEDIR . '/genesis-widgetized-footer.php' ) {

		$gwfoot_links[] = '<a href="' . esc_url( GWFOOT_URL_WPORG_FAQ ) . '" target="_new" title="' . __( 'FAQ', 'genesis-widgetized-footer' ) . '">' . __( 'FAQ', 'genesis-widgetized-footer' ) . '</a>';

		$gwfoot_links[] = '<a href="' . esc_url( GWFOOT_URL_WPORG_FORUM ) . '" target="_new" title="' . __( 'Support', 'genesis-widgetized-footer' ) . '">' . __( 'Support', 'genesis-widgetized-footer' ) . '</a>';

		$gwfoot_links[] = '<a href="' . esc_url( GWFOOT_URL_SNIPPETS ) . '" target="_new" title="' . __( 'Code Snippets for Customization', 'genesis-widgetized-footer' ) . '">' . __( 'Code Snippets', 'genesis-widgetized-footer' ) . '</a>';

		$gwfoot_links[] = '<a href="' . esc_url( GWFOOT_URL_TRANSLATE ) . '" target="_new" title="' . __( 'Translations', 'genesis-widgetized-footer' ) . '">' . __( 'Translations', 'genesis-widgetized-footer' ) . '</a>';

		$gwfoot_links[] = '<a href="' . esc_url( GWFOOT_URL_DONATE ) . '" target="_new" title="' . __( 'Donate', 'genesis-widgetized-footer' ) . '"><strong>' . __( 'Donate', 'genesis-widgetized-footer' ) . '</strong></a>';

	}  // end-if plugin links

	/** Output the links */
	return apply_filters( 'gwfoot_filter_plugin_links', $gwfoot_links );

}  // end of function ddw_gwfoot_plugin_links


add_action( 'sidebar_admin_setup', 'ddw_gwfoot_widgets_help' );
/**
 * Load plugin help tab after core help tabs on Widget admin page.
 *
 * @since  1.1.0
 *
 * @global mixed $pagenow
 */
function ddw_gwfoot_widgets_help() {

	global $pagenow;

	add_action( 'admin_head-' . $pagenow, 'ddw_gwfoot_widgets_help_tab' );

}  // end of function ddw_gwfoot_widgets_help


add_action( 'load-toplevel_page_genesis', 'ddw_gwfoot_widgets_help_tab', 16 );				// Genesis Core
add_action( 'load-genesis_page_seo-settings', 'ddw_gwfoot_widgets_help_tab', 16 );			// Genesis SEO
add_action( 'load-genesis_page_genesis-import-export', 'ddw_gwfoot_widgets_help_tab', 16 );	// Genesis Import/Export
add_action( 'load-genesis_page_design-settings', 'ddw_gwfoot_widgets_help_tab', 16 );		// Prose Child Theme
add_action( 'load-genesis_page_prose-custom', 'ddw_gwfoot_widgets_help_tab', 16 );			// Prose Custom Section
add_action( 'load-genesis_page_dynamik-settings', 'ddw_gwfoot_widgets_help_tab', 16 );		// Dynamik Child Theme
add_action( 'load-genesis_page_dynamik-design', 'ddw_gwfoot_widgets_help_tab', 16 );		// Dynamik Child Design
add_action( 'load-genesis_page_dynamik-custom', 'ddw_gwfoot_widgets_help_tab', 16 );		// Dynamik Custom Section
/**
 * Create and display plugin help tab.
 *
 * @since  1.1.0
 *
 * @uses   get_current_screen()
 * @uses   WP_Screen::add_help_tab
 * @uses   WP_Screen::set_help_sidebar
 * @uses   ddw_gwfoot_help_sidebar_content()
 *
 * @global mixed $gwfoot_widgets_screen, $pagenow
 */
function ddw_gwfoot_widgets_help_tab() {

	global $gwfoot_widgets_screen, $pagenow;

	$gwfoot_widgets_screen = get_current_screen();

	/** Display help tabs only for WordPress 3.3 or higher */
	if ( ! class_exists( 'WP_Screen' )
		|| ! $gwfoot_widgets_screen
		|| basename( get_template_directory() ) != 'genesis'
	) {
		return;
	}

	/** Add the new help tab */
	$gwfoot_widgets_screen->add_help_tab( array(
		'id'       => 'gwfoot-widgets-help',
		'title'    => __( 'Genesis Widgetized Footer', 'genesis-widgetized-footer' ),
		'callback' => apply_filters( 'gwfoot_filter_help_tab_content', 'ddw_gwfoot_widgets_help_content' ),
	) );

	/** Add help sidebar */
	if ( $pagenow != 'widgets.php' ) {

		$gwfoot_widgets_screen->set_help_sidebar( ddw_gwfoot_help_sidebar_content() );

	}  // end-if $pagehook check

}  // end of function ddw_gwfoot_widgets_help_tab


/**
 * Create and display plugin help tab content.
 *
 * @since 1.0.0
 *
 * @uses  ddw_gwfoot_plugin_get_data() To display various data of this plugin.
 *
 * @param $gwfoot_constant_help
 * @param $gwfoot_settings_help
 * @param $gwfoot_space_helper
 */
function ddw_gwfoot_widgets_help_content() {

	/** Helper strings */
	$gwfoot_constant_help = ' &ndash; ' . sprintf( __( 'optional, could be deactivated %svia constant%s', 'genesis-widgetized-footer' ), '<a href="' . esc_url( GWFOOT_URL_SNIPPETS ) . '" target="_blank" title="' . __( 'Code Snippets for Customization', 'genesis-widgetized-footer' ) . '">', '</a>' );

	$gwfoot_settings_help = sprintf(
		__( 'as set in %s', 'genesis-widgetized-footer' ),
		'<a href="' . admin_url( 'options-general.php' ) . '"><em>' . __( 'General Settings', 'genesis-widgetized-footer' ) . '</em></a>'
	);

	$gwfoot_space_helper = '<div style="height: 5px;"></div>';

	/** Headline */
	echo '<h3>' . __( 'Plugin', 'genesis-widgetized-footer' ) . ': ' . __( 'Genesis Widgetized Footer', 'genesis-widgetized-footer' ) . ' <small>v' . esc_attr( ddw_gwfoot_plugin_get_data( 'Version' ) ) . '</small></h3>';
	
	/** Widget areas info */
	echo '<p><strong>' . __( 'Added Widget areas by the plugin - only displayed if having active widgets placed in:', 'genesis-widgetized-footer' ) . '</strong></p>' .
		'<ul>' . 
			'<li>' . __( 'Footer Area #1', 'genesis-widgetized-footer' ) . ' &mdash; ' . sprintf( __( 'ID: %s', 'genesis-widgetized-footer' ), '<code>gwfoot-footer-one-widget</code>' ) . '</li>' .
			'<li>' . __( 'Footer Area #2', 'genesis-widgetized-footer' ) . ' &mdash; ' . sprintf( __( 'ID: %s', 'genesis-widgetized-footer' ), '<code>gwfoot-footer-two-widget</code>' ) . '</li>' .
			'<li>' . __( 'Footer Disclaimer', 'genesis-widgetized-footer' ) . ' &mdash; ' . sprintf( __( 'ID: %s', 'genesis-widgetized-footer' ), '<code>gwfoot-footer-disclaimer-widget</code>' ) . $gwfoot_constant_help . '</li>' .
		'</ul>';

	/** Widgets shortcode support */
	if ( ! GWFOOT_NO_WIDGETS_SHORTCODE ) {

		echo '<p>' . __( 'The Genesis Footer Shortcodes plus regular WordPress Shortcodes are supported in all three widget areas.', 'genesis-widgetized-footer' ) . '<br />&raquo; <a href="http://my.studiopress.com/docs/shortcode-reference/#footer-shortcodes" target="_new" title="' . __( 'Genesis Shortcode Reference here...', 'genesis-widgetized-footer' ) . '">' . __( 'Genesis Shortcode Reference here...', 'genesis-widgetized-footer' ) . '</a></p>';

	}  // end-if constant check

	/** Shortcode info, plus parameters */
	echo $gwfoot_space_helper . '<p><strong>' . __( 'Provided Shortcodes by the plugin:', 'genesis-widgetized-footer' ) . '</strong></p>' .
		'<p><code>[gwfoot-widget-area]</code></p>' .
		'<blockquote><ul>' .
			'<li><em>' . __( 'Supporting the following parameters', 'genesis-widgetized-footer' ) . ':</em></li>' .
			'<li><code>area</code> &mdash; ' . __( 'ID of the Widget area (Sidebar; see above)', 'genesis-widgetized-footer' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-footer' ), '<em>' . __( 'none, empty', 'genesis-widgetized-footer' ) . '</em>' ) . '</li>' .
		'</ul></blockquote>' .
		'<p><code>[gwfoot-lastupdated]</code></p>' .
		'<blockquote><ul>' .
			'<li><em>' . __( 'Supporting the following parameters', 'genesis-widgetized-footer' ) . ':</em></li>' .
			'<li><code>date_format</code> &mdash; ' . sprintf( __( 'Date format, %s', 'genesis-widgetized-footer' ), '<a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_new">' . __( 'PHP Date', 'genesis-widgetized-footer' ) . '</a>' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-footer' ), $gwfoot_settings_help ) . '</li>' .
			'<li><code>wrapper</code> &mdash; ' . __( 'HTML wrapper tag', 'genesis-widgetized-footer' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-footer' ), '<code>p</code>' ) . '</li>' .
			'<li><code>class</code> &mdash; ' . __( 'Can be a custom class, added to the wrapper tag', 'genesis-widgetized-footer' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-footer' ), '<em>' . __( 'none, empty', 'genesis-widgetized-footer' ) . '</em>' ) . '</li>' .
			'<li><code>text_before</code> &mdash; ' . __( 'Text string before the date value', 'genesis-widgetized-footer' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-footer' ), '<code>' . __( 'Latest update date:', 'genesis-widgetized-footer' ) . '</code>' ) . '</li>' .
			'<li><code>text_after</code> &mdash; ' . __( 'Optional text string after the date value', 'genesis-widgetized-footer' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-footer' ), '<em>' . __( 'none, empty', 'genesis-widgetized-footer' ) . '</em>' ) . '</li>' .
		'</ul></blockquote>';

	/** Help footer: plugin info */
	echo $gwfoot_space_helper . '<p><strong>' . __( 'Important plugin links:', 'genesis-widgetized-footer' ) . '</strong>' . 
		'<br /><a href="' . esc_url( GWFOOT_URL_PLUGIN ) . '" target="_new" title="' . __( 'Plugin website', 'genesis-widgetized-footer' ) . '">' . __( 'Plugin website', 'genesis-widgetized-footer' ) . '</a> | <a href="' . esc_url( GWFOOT_URL_WPORG_FAQ ) . '" target="_new" title="' . __( 'FAQ', 'genesis-widgetized-footer' ) . '">' . __( 'FAQ', 'genesis-widgetized-footer' ) . '</a> | <a href="' . esc_url( GWFOOT_URL_WPORG_FORUM ) . '" target="_new" title="' . __( 'Support', 'genesis-widgetized-footer' ) . '">' . __( 'Support', 'genesis-widgetized-footer' ) . '</a> | <a href="' . esc_url( GWFOOT_URL_SNIPPETS ) . '" target="_new" title="' . __( 'Code Snippets for Customization', 'genesis-widgetized-footer' ) . '">' . __( 'Code Snippets', 'genesis-widgetized-footer' ) . '</a> | <a href="' . esc_url( GWFOOT_URL_TRANSLATE ) . '" target="_new" title="' . __( 'Translations', 'genesis-widgetized-footer' ) . '">' . __( 'Translations', 'genesis-widgetized-footer' ) . '</a> | <a href="' . esc_url( GWFOOT_URL_DONATE ) . '" target="_new" title="' . __( 'Donate', 'genesis-widgetized-footer' ) . '"><strong>' . __( 'Donate', 'genesis-widgetized-footer' ) . '</strong></a></p>';

	echo '<p><a href="http://www.opensource.org/licenses/gpl-license.php" target="_new" title="' . esc_attr( GWFOOT_PLUGIN_LICENSE ). '">' . esc_attr( GWFOOT_PLUGIN_LICENSE ). '</a> &copy; 2012-' . date( 'Y' ) . ' <a href="' . esc_url( ddw_gwfoot_plugin_get_data( 'AuthorURI' ) ) . '" target="_new" title="' . esc_attr__( ddw_gwfoot_plugin_get_data( 'Author' ) ) . '">' . esc_attr__( ddw_gwfoot_plugin_get_data( 'Author' ) ) . '</a></p>';

}  // end of function ddw_gwfoot_widgets_help_content


/**
 * Helper function for returning the Help Sidebar content.
 *
 * @since  1.4.0
 *
 * @uses   ddw_gwfoot_plugin_get_data()
 *
 * @param  $gwfoot_help_sidebar_content
 *
 * @return string HTML content for help sidebar.
 */
function ddw_gwfoot_help_sidebar_content() {

	$gwfoot_help_sidebar_content = '<p><strong>' . __( 'More about the plugin author', 'genesis-widgetized-footer' ) . '</strong></p>' .
			'<p>' . __( 'Social:', 'genesis-widgetized-footer' ) . '<br /><a href="http://twitter.com/deckerweb" target="_blank" title="@ Twitter">Twitter</a> | <a href="http://www.facebook.com/deckerweb.service" target="_blank" title="@ Facebook">Facebook</a> | <a href="http://deckerweb.de/gplus" target="_blank" title="@ Google+">Google+</a> | <a href="' . esc_url( ddw_gwfoot_plugin_get_data( 'AuthorURI' ) ) . '" target="_blank" title="@ deckerweb.de">deckerweb</a></p>' .
			'<p><a href="' . esc_url( GWFOOT_URL_WPORG_PROFILE ) . '" target="_blank" title="@ WordPress.org">@ WordPress.org</a></p>';

	return apply_filters( 'gwfoot_filter_help_sidebar_content', $gwfoot_help_sidebar_content );

}  // end of function ddw_gwfoot_help_sidebar_content