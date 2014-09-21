<?php
/**
 * Helper functions for the admin - plugin links and help tabs.
 *
 * @package    Genesis Widgetized Not Found & 404
 * @subpackage Admin
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright (c) 2012-2013, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-widgetized-notfound/
 * @link       http://deckerweb.de/twitter
 *
 * @since      1.0.0
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
 * Setting internal plugin helper links constants.
 *
 * @since 1.3.0
 *
 * @uses  get_locale()
 */
define( 'GWNF_URL_TRANSLATE',		'http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-widgetized-notfound' );
define( 'GWNF_URL_WPORG_FAQ',		'http://wordpress.org/extend/plugins/genesis-widgetized-notfound/faq/' );
define( 'GWNF_URL_WPORG_FORUM',		'http://wordpress.org/support/plugin/genesis-widgetized-notfound' );
define( 'GWNF_URL_WPORG_PROFILE',	'http://profiles.wordpress.org/daveshine/' );
define( 'GWNF_URL_SNIPPETS',		'https://gist.github.com/2473125' );
define( 'GWNF_PLUGIN_LICENSE', 		'GPL-2.0+' );
if ( get_locale() == 'de_DE' || get_locale() == 'de_AT' || get_locale() == 'de_CH' || get_locale() == 'de_LU' ) {
	define( 'GWNF_URL_DONATE', 	'http://genesisthemes.de/spenden/' );
	define( 'GWNF_URL_PLUGIN',	'http://genesisthemes.de/plugins/genesis-widgetized-notfound/' );
} else {
	define( 'GWNF_URL_DONATE', 	'http://genesisthemes.de/en/donate/' );
	define( 'GWNF_URL_PLUGIN',	'http://genesisthemes.de/en/wp-plugins/genesis-widgetized-notfound/' );
}


/**
 * Add "Widgets Page" link to plugin page.
 *
 * @since  1.0.0
 *
 * @param  $gwnf_links
 * @param  $gwnf_widgets_link
 *
 * @return strings widgets link
 */
function ddw_gwnf_widgets_page_link( $gwnf_links ) {

	/** Widgets Admin link */
	$gwnf_widgets_link = sprintf(
		'<a href="%s" title="%s">%s</a>',
		admin_url( 'widgets.php' ),
		__( 'Go to the Widgets settings page', 'genesis-widgetized-notfound' ),
		__( 'Widgets', 'genesis-widgetized-notfound' )
	);

	/** Set the order of the links */
	array_unshift( $gwnf_links, $gwnf_widgets_link );

	/** Display plugin settings links */
	return apply_filters( 'gwnf_filter_settings_page_link', $gwnf_links );

}  // end of function ddw_gwnf_widgets_page_link


add_filter( 'plugin_row_meta', 'ddw_gwnf_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page.
 *
 * @since  1.0.0
 *
 * @param  $gwnf_links
 * @param  $gwnf_file
 *
 * @return strings plugin links
 */
function ddw_gwnf_plugin_links( $gwnf_links, $gwnf_file ) {

	/** Capability check */
	if ( ! current_user_can( 'install_plugins' ) ) {

		return $gwnf_links;

	}  // end-if cap check

	/** List additional links only for this plugin */
	if ( $gwnf_file == GWNF_PLUGIN_BASEDIR . '/genesis-widgetized-notfound.php' ) {

		$gwnf_links[] = '<a href="' . esc_url_raw( GWNF_URL_WPORG_FAQ ) . '" target="_new" title="' . __( 'FAQ', 'genesis-widgetized-notfound' ) . '">' . __( 'FAQ', 'genesis-widgetized-notfound' ) . '</a>';

		$gwnf_links[] = '<a href="' . esc_url_raw( GWNF_URL_WPORG_FORUM ) . '" target="_new" title="' . __( 'Support', 'genesis-widgetized-notfound' ) . '">' . __( 'Support', 'genesis-widgetized-notfound' ) . '</a>';

		$gwnf_links[] = '<a href="' . esc_url_raw( GWNF_URL_SNIPPETS ) . '" target="_new" title="' . __( 'Code Snippets for Customization', 'genesis-widgetized-notfound' ) . '">' . __( 'Code Snippets', 'genesis-widgetized-notfound' ) . '</a>';

		$gwnf_links[] = '<a href="' . esc_url_raw( GWNF_URL_TRANSLATE ) . '" target="_new" title="' . __( 'Translations', 'genesis-widgetized-notfound' ) . '">' . __( 'Translations', 'genesis-widgetized-notfound' ) . '</a>';

		$gwnf_links[] = '<a href="' . esc_url_raw( GWNF_URL_DONATE ) . '" target="_new" title="' . __( 'Donate', 'genesis-widgetized-notfound' ) . '"><strong>' . __( 'Donate', 'genesis-widgetized-notfound' ) . '</strong></a>';

	}  // end-if plugin links

	/** Output the links */
	return apply_filters( 'gwnf_filter_plugin_links', $gwnf_links );

}  // end of function ddw_gwnf_plugin_links


add_action( 'sidebar_admin_setup', 'ddw_gwnf_widgets_help' );
/**
 * Load plugin help tab after core help tabs on Widget admin page.
 *
 * @since  1.2.0
 *
 * @global mixed $pagenow
 */
function ddw_gwnf_widgets_help() {

	global $pagenow;

	add_action( 'admin_head-' . $pagenow, 'ddw_gwnf_widgets_help_tab' );

}  // end of function ddw_gwnf_widgets_help


add_action( 'load-toplevel_page_genesis', 'ddw_gwnf_widgets_help_tab', 16 );		// Genesis Core
add_action( 'load-genesis_page_seo-settings', 'ddw_gwnf_widgets_help_tab', 16 );		// Genesis SEO
add_action( 'load-genesis_page_genesis-import-export', 'ddw_gwnf_widgets_help_tab', 16 );	// Genesis Import/Export
add_action( 'load-genesis_page_design-settings', 'ddw_gwnf_widgets_help_tab', 16 );		// Prose Child Theme
add_action( 'load-genesis_page_prose-custom', 'ddw_gwnf_widgets_help_tab', 16 );		// Prose Custom Section
add_action( 'load-genesis_page_dynamik-settings', 'ddw_gwnf_widgets_help_tab', 16 );	// Dynamik Child Theme
add_action( 'load-genesis_page_dynamik-design', 'ddw_gwnf_widgets_help_tab', 16 );		// Dynamik Child Design
add_action( 'load-genesis_page_dynamik-custom', 'ddw_gwnf_widgets_help_tab', 16 );		// Dynamik Custom Section
/**
 * Create and display plugin help tab.
 *
 * @since  1.2.0
 *
 * @uses   get_current_screen()
 * @uses   get_template_directory()
 * @uses   WP_Screen::add_help_tab
 * @uses   WP_Screen::set_help_sidebar
 * @uses   ddw_gwnf_help_sidebar_content()
 *
 * @global mixed $gwnf_widgets_screen, $pagenow
 */
function ddw_gwnf_widgets_help_tab() {

	global $gwnf_widgets_screen, $pagenow;

	$gwnf_widgets_screen = get_current_screen();

	/** Display help tabs only for WordPress 3.3 or higher */
	if ( ! class_exists( 'WP_Screen' )
		|| ! $gwnf_widgets_screen
		|| basename( get_template_directory() ) != 'genesis'
	) {
		return;
	}

	/** Add the new help tab */
	$gwnf_widgets_screen->add_help_tab( array(
		'id'       => 'gwnf-widgets-help',
		'title'    => __( 'Genesis Widgetized Not Found & 404', 'genesis-widgetized-notfound' ),
		//'content' => apply_filters( 'gwnf_help_tab', $gwnf_widget_area_help, 'gwnf-widgets-help' ),
		'callback' => apply_filters( 'gwnf_filter_help_tab_content', 'ddw_gwnf_widgets_help_content' ),
	) );

	/** Add help sidebar */
	if ( $pagenow != 'widgets.php' ) {

		$gwnf_widgets_screen->set_help_sidebar( ddw_gwnf_help_sidebar_content() );

	}  // end-if $pagehook check

}  // end of function ddw_gwnf_widgets_help_tab


/**
 * Create and display plugin help tab content.
 *
 * @since 1.0.0
 *
 * @uses  ddw_gwnf_plugin_get_data() To display various data of this plugin.
 *
 * @param string 	$gwnf_filter_help
 * @param string 	$gwnf_settings_help
 * @param string 	$gwnf_space_helper
 */
function ddw_gwnf_widgets_help_content() {

	/** Helper strings */
	$gwnf_filter_help = ' &ndash; ' . sprintf( __( 'optional, could be deactivated %svia filter%s', 'genesis-widgetized-notfound' ), '<a href="' . esc_url( GWNF_URL_SNIPPETS ) . '" target="_blank" title="' . __( 'Code Snippets for Customization', 'genesis-widgetized-notfound' ) . '">', '</a>' );

	$gwnf_bbpress_noresults_widgetized = (bool) apply_filters(
		'gwnf_filter_bbpress_noresults_widgetized',
		'__return_true'
	);

	$gwnf_space_helper = '<div style="height: 5px;"></div>';

	/** Headline */
	echo '<h3>' . __( 'Plugin', 'genesis-widgetized-notfound' ) . ': ' . __( 'Genesis Widgetized Not Found & 404', 'genesis-widgetized-notfound' ) . ' <small>v' . esc_attr( ddw_gwnf_plugin_get_data( 'Version' ) ) . '</small></h3>';

	/** Widget areas info */
	echo '<p><strong>' . __( 'Added Widget areas by the plugin - only displayed if having active widgets placed in:', 'genesis-widgetized-notfound' ) . '</strong>' .
	'<ul>' . 
		'<li>' . apply_filters( 'gwnf_filter_404_widget_title', __( '404 Error Page', 'genesis-widgetized-notfound' ) ) . ' &mdash; ' . sprintf( __( 'ID: %s', 'genesis-widgetized-notfound' ), '<code>gwnf-404-widget</code>' ) . '</li>' .
		'<li>' . apply_filters( 'gwnf_filter_notfound_widget_title', __( 'Search Not Found', 'genesis-widgetized-notfound' ) ) . ' &mdash; ' . sprintf( __( 'ID: %s', 'genesis-widgetized-notfound' ), '<code>gwnf-notfound-widget</code>' ) . '</li>';
		if ( $gwnf_bbpress_noresults_widgetized ) {
			echo '<li>' . apply_filters( 'gwnf_filter_bbpress_noresults_widget_title', __( 'bbPress: Forum Search No Results', 'genesis-widgetized-notfound' ) ) . ' &mdash; ' . sprintf( __( 'ID: %s', 'genesis-widgetized-notfound' ), '<code>gwnf-bbpress-notfound-area</code>' ) . $gwnf_filter_help . '</li>';
		}
	echo '</ul>';

	/** Widgets shortcode support */
	if ( ! GWNF_NO_WIDGETS_SHORTCODE ) {
	
		echo '<p>' . __( 'Shortcodes are supported in all these widget areas.', 'genesis-widgetized-notfound' ) . '</p>';

	}  // end-if constant check

	/** Search widget info */
	echo $gwnf_space_helper . '<p><strong>' . sprintf( __( 'Added Widget by the plugin: %s', 'genesis-widgetized-notfound' ), '<em>' . __( 'Genesis - Search Form', 'genesis-widgetized-notfound' ) . '</em>' ) . '</strong></p>' .
		'<ul>' .
			'<li>' . __( 'A search form for your site. With a more options than the default one.', 'genesis-widgetized-notfound' ) . '</li>' .
			'<li>' . __( 'For example, set placeholder and submit button texts via options, plus more stuff, like a few display options.', 'genesis-widgetized-notfound' ) . '</li>' .
		'</ul>';

	/** Shortcode info, plus parameters */
	echo $gwnf_space_helper . '<p><strong>' . __( 'Provided Shortcodes by the plugin:', 'genesis-widgetized-notfound' ) . '</strong></p>' .
		'<p><code>[gwnf-widget-area]</code></p>' .
		'<blockquote><ul>' .
			'<li><em>' . __( 'Supporting the following parameters', 'genesis-widgetized-notfound' ) . ':</em></li>' .
			'<li><code>area</code> &mdash; ' . __( 'ID of the Widget area (Sidebar; see above)', 'genesis-widgetized-notfound' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-notfound' ), '<em>' . __( 'none, empty', 'genesis-widgetized-notfound' ) . '</em>' ) . '</li>' .
		'</ul></blockquote>' .
		'<p><code>[gwnf-search]</code></p>' .
		'<blockquote><ul>' .
			'<li><em>' . __( 'Supporting the following parameters', 'genesis-widgetized-notfound' ) . ':</em></li>' .
			'<li><code>search_text</code> &mdash; ' . __( 'Search placeholder text', 'genesis-widgetized-notfound' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-notfound' ), __( 'Search this website', 'genesis-widgetized-notfound' ) ) . '</li>' .
			'<li><code>button_text</code> &mdash; ' . __( 'HTML wrapper tag', 'genesis-widgetized-notfound' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-notfound' ), __( 'Search', 'genesis-widgetized-notfound' ) ) . '</li>' .
			'<li><code>form_label</code> &mdash; ' . __( 'Additional label before the search form', 'genesis-widgetized-notfound' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-notfound' ), '<em>' . __( 'none, empty', 'genesis-widgetized-notfound' ) . '</em>' ) . '</li>' .
			'<li><code>wrapper</code> &mdash; ' . __( 'HTML wrapper tag', 'genesis-widgetized-notfound' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-notfound' ), '<code>div</code>' ) . '</li>' .
			'<li><code>class</code> &mdash; ' . __( 'Can be a custom class, added to the wrapper tag', 'genesis-widgetized-notfound' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-notfound' ), '<em>' . __( 'none, empty', 'genesis-widgetized-notfound' ) . '</em>' ) . '</li>' .
			'<li><code>post_type</code> &mdash; ' . __( 'Optional setup post type(s) for search', 'genesis-widgetized-notfound' ) . ' &mdash; ' . sprintf( __( 'Default: %s', 'genesis-widgetized-notfound' ), '<em>' . __( 'none, empty', 'genesis-widgetized-notfound' ) . '</em>' . ' &ndash; ' . __( 'i.e., WordPress default search behavior', 'genesis-widgetized-notfound' ) ) . '</li>' .
		'</ul></blockquote>';

	/** Help footer: plugin info */
	echo $gwnf_space_helper . '<p><strong>' . __( 'Important plugin links:', 'genesis-widgetized-notfound' ) . '</strong>' . 
	'<br /><a href="' . esc_url_raw( GWNF_URL_PLUGIN ) . '" target="_new" title="' . __( 'Plugin website', 'genesis-widgetized-notfound' ) . '">' . __( 'Plugin website', 'genesis-widgetized-notfound' ) . '</a> | <a href="' . esc_url_raw( GWNF_URL_WPORG_FAQ ) . '" target="_new" title="' . __( 'FAQ', 'genesis-widgetized-notfound' ) . '">' . __( 'FAQ', 'genesis-widgetized-notfound' ) . '</a> | <a href="' . esc_url_raw( GWNF_URL_WPORG_FORUM ) . '" target="_new" title="' . __( 'Support', 'genesis-widgetized-notfound' ) . '">' . __( 'Support', 'genesis-widgetized-notfound' ) . '</a> | <a href="' . esc_url_raw( GWNF_URL_SNIPPETS ) . '" target="_new" title="' . __( 'Code Snippets for Customization', 'genesis-widgetized-notfound' ) . '">' . __( 'Code Snippets', 'genesis-widgetized-notfound' ) . '</a> | <a href="' . esc_url_raw( GWNF_URL_TRANSLATE ) . '" target="_new" title="' . __( 'Translations', 'genesis-widgetized-notfound' ) . '">' . __( 'Translations', 'genesis-widgetized-notfound' ) . '</a> | <a href="' . esc_url_raw( GWNF_URL_DONATE ) . '" target="_new" title="' . __( 'Donate', 'genesis-widgetized-notfound' ) . '"><strong>' . __( 'Donate', 'genesis-widgetized-notfound' ) . '</strong></a></p>';

	echo '<p><a href="http://www.opensource.org/licenses/gpl-license.php" target="_new" title="' . esc_attr( GWNF_PLUGIN_LICENSE ). '">' . esc_attr( GWNF_PLUGIN_LICENSE ). '</a> &copy; 2012-' . date( 'Y' ) . ' <a href="' . esc_url_raw( ddw_gwnf_plugin_get_data( 'AuthorURI' ) ) . '" target="_new" title="' . esc_attr__( ddw_gwnf_plugin_get_data( 'Author' ) ) . '">' . esc_attr__( ddw_gwnf_plugin_get_data( 'Author' ) ) . '</a></p>';

}  // end of function ddw_gwnf_widgets_help_content


/**
 * Helper function for returning the Help Sidebar content.
 *
 * @since  1.5.0
 *
 * @uses   ddw_gwnf_plugin_get_data()
 *
 * @param  string 	$gwnf_help_sidebar_content
 *
 * @return string HTML content for help sidebar.
 */
function ddw_gwnf_help_sidebar_content() {

	$gwnf_help_sidebar_content = '<p><strong>' . __( 'More about the plugin author', 'genesis-widgetized-notfound' ) . '</strong></p>' .
			'<p>' . __( 'Social:', 'genesis-widgetized-notfound' ) . '<br /><a href="http://twitter.com/deckerweb" target="_blank" title="@ Twitter">Twitter</a> | <a href="http://www.facebook.com/deckerweb.service" target="_blank" title="@ Facebook">Facebook</a> | <a href="http://deckerweb.de/gplus" target="_blank" title="@ Google+">Google+</a> | <a href="' . esc_url_raw( ddw_gwnf_plugin_get_data( 'AuthorURI' ) ) . '" target="_blank" title="@ deckerweb.de">deckerweb</a></p>' .
			'<p><a href="' . esc_url_raw( GWNF_URL_WPORG_PROFILE ) . '" target="_blank" title="@ WordPress.org">@ WordPress.org</a></p>';

	return apply_filters( 'gwnf_filter_help_sidebar_content', $gwnf_help_sidebar_content );

}  // end of function ddw_gwnf_help_sidebar_content