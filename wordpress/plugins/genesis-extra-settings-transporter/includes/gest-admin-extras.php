<?php
/**
 * Helper functions for the admin - plugin links and help tabs.
 *
 * @package    Genesis Extra Settings Transporter
 * @subpackage Admin
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright (c) 2013, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-extra-settings-transporter/
 * @link       http://deckerweb.de/twitter
 *
 * @since      1.0.0
 */

/**
 * Setting internal plugin helper links constants.
 *
 * @since 1.0.0
 *
 * @uses  get_locale()
 */
define( 'GEST_URL_TRANSLATE',		'http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-extra-settings-transporter' );
define( 'GEST_URL_WPORG_FAQ',		'http://wordpress.org/extend/plugins/genesis-extra-settings-transporter/faq/' );
define( 'GEST_URL_WPORG_FORUM',		'http://wordpress.org/support/plugin/genesis-extra-settings-transporter' );
define( 'GEST_URL_WPORG_PROFILE',	'http://profiles.wordpress.org/daveshine/' );
define( 'GEST_PLUGIN_LICENSE', 		'GPL-2.0+' );
define( 'GEST_URL_SUPPORTED_PLUGINS',		'https://gist.github.com/4683986#file-gest_a_supported-plugins-md' );
define( 'GEST_URL_SUPPORTED_CHILD_THEMES',	'https://gist.github.com/4683986#file-gest_b_supported-child-themes-md' );
if ( get_locale() == 'de_DE' || get_locale() == 'de_AT' || get_locale() == 'de_CH' || get_locale() == 'de_LU' ) {
	define( 'GEST_URL_DONATE', 	'http://genesisthemes.de/spenden/' );
	define( 'GEST_URL_PLUGIN',	'http://genesisthemes.de/plugins/genesis-extra-settings-transporter/' );
} else {
	define( 'GEST_URL_DONATE', 	'http://genesisthemes.de/en/donate/' );
	define( 'GEST_URL_PLUGIN',	'http://genesisthemes.de/en/wp-plugins/genesis-extra-settings-transporter/' );
}


/**
 * Add "Widgets Page" link to plugin page.
 *
 * @since  1.0.0
 *
 * @param  $gest_links
 * @param  $gest_settings_link
 *
 * @return strings Widgets & Pages admin links.
 */
function ddw_gest_settings_page_link( $gest_links ) {

	/** Settings (Export/ Import) Admin link */
	$gest_settings_link = sprintf( '<a href="%s" title="%s">%s</a>' , admin_url( 'admin.php?page=genesis-import-export' ) , __( 'Go to the Genesis Exporter page', 'genesis-extra-settings-transporter' ) , __( 'Export/ Import', 'genesis-extra-settings-transporter' ) );

	/** Set the order of the links */
	array_unshift( $gest_links, $gest_settings_link );

	/** Display plugin settings links */
	return apply_filters( 'gest_filter_settings_page_link', $gest_links );

}  // end of function ddw_gest_widgets_page_link


add_filter( 'plugin_row_meta', 'ddw_gest_plugin_links', 10, 2 );
/**
 * Add various support links to plugin page.
 *
 * @since  1.0.0
 *
 * @param  $gest_links
 * @param  $gest_file
 *
 * @return strings plugin links
 */
function ddw_gest_plugin_links( $gest_links, $gest_file ) {

	/** Capability check */
	if ( ! current_user_can( 'install_plugins' ) ) {

		return $gest_links;

	}  // end-if cap check

	/** List additional links only for this plugin */
	if ( $gest_file == GEST_PLUGIN_BASEDIR . '/genesis-extra-settings-transporter.php' ) {

		$gest_links[] = '<a href="' . esc_url( GEST_URL_WPORG_FAQ ) . '" target="_new" title="' . __( 'FAQ', 'genesis-extra-settings-transporter' ) . '">' . __( 'FAQ', 'genesis-extra-settings-transporter' ) . '</a>';
		$gest_links[] = '<a href="' . esc_url( GEST_URL_WPORG_FORUM ) . '" target="_new" title="' . __( 'Support', 'genesis-extra-settings-transporter' ) . '">' . __( 'Support', 'genesis-extra-settings-transporter' ) . '</a>';
		$gest_links[] = '<a href="' . esc_url( GEST_URL_TRANSLATE ) . '" target="_new" title="' . __( 'Translations', 'genesis-extra-settings-transporter' ) . '">' . __( 'Translations', 'genesis-extra-settings-transporter' ) . '</a>';
		$gest_links[] = '<a href="' . esc_url( GEST_URL_DONATE ) . '" target="_new" title="' . __( 'Donate', 'genesis-extra-settings-transporter' ) . '"><strong>' . __( 'Donate', 'genesis-extra-settings-transporter' ) . '</strong></a>';

	}  // end-if plugin links

	/** Output the links */
	return apply_filters( 'gest_filter_plugin_links', $gest_links );

}  // end of function ddw_gest_plugin_links


add_action( 'load-genesis_page_genesis-import-export', 'ddw_gest_help_tab' );	// Genesis Import/Export
/**
 * Create and display plugin help tab.
 *
 * @since  1.0.0
 *
 * @uses   get_current_screen()
 * @uses   WP_Screen::add_help_tab()
 * @uses   WP_Screen::set_help_sidebar()
 * @uses   ddw_gest_help_sidebar_content()
 *
 * @global mixed $gest_exporter_screen
 */
function ddw_gest_help_tab() {

	global $gest_exporter_screen;

	$gest_exporter_screen = get_current_screen();

	/** Display help tabs only for WordPress 3.3 or higher */
	if ( ! class_exists( 'WP_Screen' )
		|| ! $gest_exporter_screen
		|| basename( get_template_directory() ) != 'genesis'
	) {
		return;
	}

	/** Add the new help tab */
	$gest_exporter_screen->add_help_tab( array(
		'id'       => 'gest-exporter-help',
		'title'    => __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ),
		'callback' => 'ddw_gest_help_content',
	) );

	/** Add help sidebar */
	$gest_exporter_screen->set_help_sidebar( ddw_gest_help_sidebar_content() );

}  // end of function ddw_gest_help_tab


/**
 * Create and display plugin help tab content.
 *
 * @since 1.0.0
 *
 * @uses  ddw_gest_plugin_get_data() To display various data of this plugin.
 */
function ddw_gest_help_content() {

	echo '<h3>' . __( 'Plugin', 'genesis-extra-settings-transporter' ) . ': ' . __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ) . ' <small>v' . esc_attr( ddw_gest_plugin_get_data( 'Version' ) ) . '</small></h3>';

	echo '<h4><em>' . __( 'A Typical Workflow Example', 'genesis-extra-settings-transporter' ) . '</em></h4>' .
		'<p><em>' . __( 'Transfer settings from a development install to the live/ production install.', 'genesis-extra-settings-transporter' ) . '</em></p>' .
		'<blockquote><p><strong>' . __( 'Prerequisites/ Requirements', 'genesis-extra-settings-transporter' ) . ':</strong></p>' .
		'<ul>' .
			'<li>' . sprintf( __( 'On BOTH sites/ installations you have installed & activated for example the (great) %s child theme, plus the following plugins:', 'genesis-extra-settings-transporter' ), '&raquo;' . __( 'Curtail', 'genesis-extra-settings-transporter' ) . '&laquo;' ) . ' Genesis Layout Extras, Genesis Responsive Slider, Genesis Simple Hooks, Genesis Simple Sidebars.</li>' .
			'<li>' . sprintf( __( 'On BOTH sites/ installations you have installed & activated this plugin, %s.', 'genesis-extra-settings-transporter' ), '&raquo;' . __( 'Genesis Extra Settings Transporter', 'genesis-extra-settings-transporter' ) . '&laquo;' ) . '</li>' .
			'<li>' . __( 'It\'s recommended to have THE VERY SAME VERSIONS installed on the original site and also the receiving site. Reason: sometimes settings differ between plugin or child theme versions. So with making sure you have the same versions installed you just ensure the correct settings are included within the export file.', 'genesis-extra-settings-transporter' ) . '</li>' .
			'</ul>' .
		'<p><strong>' . __( 'Transfer', 'genesis-extra-settings-transporter' ) . ':</strong></p>' .
		'<ul>' .
			'<li>' . sprintf( __( 'On the development install: Just make an Export file via %s admin page:', 'genesis-extra-settings-transporter' ), '&raquo;' . __( 'Genesis &#x2192; Import/Export', 'genesis-extra-settings-transporter' ) . '&laquo;' ) . '</li>' .
			'<li>' . sprintf( __( 'In the %s section there enable all checkboxes you need.', 'genesis-extra-settings-transporter' ), '&raquo;' . __( 'Export', 'genesis-extra-settings-transporter' ) . '&laquo;' ) . '</li>' .
			'<li>' . sprintf( __( 'Save the %s file to your computer.', 'genesis-extra-settings-transporter' ), '<code>.JSON</code>' ) . '</li>' .
			'<li>' . sprintf( __( 'On the live/ production site, just import this %s file and you\'re done!', 'genesis-extra-settings-transporter' ), '<code>.JSON</code>' ) . '</li>' .
		'</ul></blockquote>';

	echo '<hr class="div" />';

	echo '<p><strong>' . __( 'What is supported?', 'genesis-extra-settings-transporter' ) . '</strong></p>' .
		'<ul>' .
			'<li><a href="' . esc_url( GEST_URL_SUPPORTED_PLUGINS ). '" target="_new">' . __( 'List of all supported plugins', 'genesis-extra-settings-transporter' ) . '</a></li>' .
			'<li><a href="' . esc_url( GEST_URL_SUPPORTED_CHILD_THEMES ). '" target="_new">' . __( 'List of all supported child themes', 'genesis-extra-settings-transporter' ) . '</a></li>' .
		'</ul>';

	echo '<hr class="div" />';

	echo ddw_gest_plugin_help_content_faq();

	echo '<p><strong>' . __( 'Important plugin links:', 'genesis-extra-settings-transporter' ) . '</strong>' . 
		'<br /><a href="' . esc_url( GEST_URL_PLUGIN ) . '" target="_new" title="' . __( 'Plugin website', 'genesis-extra-settings-transporter' ) . '">' . __( 'Plugin website', 'genesis-extra-settings-transporter' ) . '</a> | <a href="' . esc_url( GEST_URL_WPORG_FAQ ) . '" target="_new" title="' . __( 'FAQ', 'genesis-extra-settings-transporter' ) . '">' . __( 'FAQ', 'genesis-extra-settings-transporter' ) . '</a> | <a href="' . esc_url( GEST_URL_WPORG_FORUM ) . '" target="_new" title="' . __( 'Support', 'genesis-extra-settings-transporter' ) . '">' . __( 'Support', 'genesis-extra-settings-transporter' ) . '</a> | <a href="' . esc_url( GEST_URL_TRANSLATE ) . '" target="_new" title="' . __( 'Translations', 'genesis-extra-settings-transporter' ) . '">' . __( 'Translations', 'genesis-extra-settings-transporter' ) . '</a> | <a href="' . esc_url( GEST_URL_DONATE ) . '" target="_new" title="' . __( 'Donate', 'genesis-extra-settings-transporter' ) . '"><strong>' . __( 'Donate', 'genesis-extra-settings-transporter' ) . '</strong></a></p>';

	echo '<p><a href="http://www.opensource.org/licenses/gpl-license.php" target="_new" title="' . esc_attr( GEST_PLUGIN_LICENSE ). '">' . esc_attr( GEST_PLUGIN_LICENSE ). '</a> &copy; ' . date( 'Y' ) . ' <a href="' . esc_url( ddw_gest_plugin_get_data( 'AuthorURI' ) ) . '" target="_new" title="' . esc_attr__( ddw_gest_plugin_get_data( 'Author' ) ) . '">' . esc_attr__( ddw_gest_plugin_get_data( 'Author' ) ) . '</a></p>';

}  // end of function ddw_gest_help_tab


/**
 * Create and display plugin help tab content for "FAQ" part.
 *
 * @since  1.1.0
 *
 * @param  $gest_faq_content_ss
 * @param  $gest_faq_content_wsie
 * @param  $gest_wsie_link
 * @param  $gest_wsie_status
 * @param  $gest_wsie_action
 *
 * @return string HTML help content FAQ.
 */
function ddw_gest_plugin_help_content_faq() {

	if ( defined( 'SS_SETTINGS_FIELD' ) ) {

		$gest_faq_content_ss = '<p><strong>' . sprintf( __( 'For the %s plugin: Why are inpost/ inpage settings not included?', 'genesis-extra-settings-transporter' ), '&raquo;' . __( 'Genesis Simple Sidebars', 'genesis-extra-settings-transporter' ) . '&laquo;' ) . '</strong><blockquote>' . sprintf( __( 'This is not possible as these settings belong to the actual post meta. You can always import & export all posts/ pages/ custom post types via %s, including those settings.', 'genesis-extra-settings-transporter' ), '<a href="' . admin_url( 'export.php' ). '">' . __( 'native WordPress export and import functionality', 'genesis-extra-settings-transporter' ) . '</a>' ) . '</blockquote></p>';

	} else {

		$gest_faq_content_ss = '';

	}

	/** WSIE Helper links/ strings */
	if ( class_exists( 'Widget_Data' ) ) {

		$gest_wsie_link = '<a href="' . admin_url( 'tools.php?page=widget-settings-export' ) . '">';
		$gest_wsie_status = __( 'currently active', 'genesis-extra-settings-transporter' );
		$gest_wsie_action = ' &rarr; <em><a href="' . admin_url( 'tools.php?page=widget-settings-export' ) . '">' . __( 'Export', 'genesis-extra-settings-transporter' ) . '</a> / <a href="' . admin_url( 'tools.php?page=widget-settings-import' ) . '">' . __( 'Import', 'genesis-extra-settings-transporter' ) . '</a></em>';

	} else {

		$gest_wsie_link = '<a href="http://wordpress.org/extend/plugins/widget-settings-importexport/" target="_new">';
		$gest_wsie_status = __( 'not active/ installed', 'genesis-extra-settings-transporter' );
		$gest_wsie_action = '';

	}  // end-if WSIE plugin check

	$gest_faq_content_wsie = '<p><strong>' . __( 'For Widget settings:', 'genesis-extra-settings-transporter' ) . '</strong><blockquote>' . sprintf( __( 'Not possible, there is no such functionality in WordPress core as is in Genesis yet! However, there\'s a nice third-party plugin for that, to use at your own risk: %s', 'genesis-extra-settings-transporter' ), $gest_wsie_link . __( 'Widget Settings Importer/Exporter', 'genesis-extra-settings-transporter' ) . '</a>' ) . $gest_wsie_action . ' <small>(' . __( 'Plugin', 'genesis-extra-settings-transporter' ) . ': ' . $gest_wsie_status . ')</small></blockquote></p>';

	return apply_filters( 'gest_filter_help_faq_content', $gest_faq_content_ss . $gest_faq_content_wsie );

}  // end of function ddw_gest_plugin_help_content_faq


/**
 * Helper function for returning the Help Sidebar content.
 *
 * @since  1.0.0
 *
 * @uses   ddw_gest_plugin_get_data()
 *
 * @param  $gest_help_sidebar_content
 *
 * @return string HTML content for help sidebar.
 */
function ddw_gest_help_sidebar_content() {

	$gest_help_sidebar_content = '<p><strong>' . __( 'More about the plugin author', 'genesis-extra-settings-transporter' ) . '</strong></p>' .
			'<p>' . __( 'Social:', 'genesis-extra-settings-transporter' ) . '<br /><a href="http://twitter.com/deckerweb" target="_blank" title="@ Twitter">Twitter</a> | <a href="http://www.facebook.com/deckerweb.service" target="_blank" title="@ Facebook">Facebook</a> | <a href="http://deckerweb.de/gplus" target="_blank" title="@ Google+">Google+</a> | <a href="' . esc_url( ddw_gest_plugin_get_data( 'AuthorURI' ) ) . '" target="_blank" title="@ deckerweb.de">deckerweb</a></p>' .
			'<p><a href="' . esc_url( GEST_URL_WPORG_PROFILE ) . '" target="_blank" title="@ WordPress.org">@ WordPress.org</a></p>';

	return apply_filters( 'gest_filter_help_sidebar_content', $gest_help_sidebar_content );

}  // end of function ddw_gest_help_sidebar_content