<?php
/**
 * Admin functions, especially for hooking into the Genesis Exporter: for "Premise".
 *
 * @package    Genesis Extra Settings Transporter
 * @subpackage Admin
 * @author     David Decker - DECKERWEB
 * @copyright  Copyright (c) 2013, David Decker - DECKERWEB
 * @license    http://www.opensource.org/licenses/gpl-license.php GPL-2.0+
 * @link       http://genesisthemes.de/en/wp-plugins/genesis-extra-settings-transporter/
 * @link       http://deckerweb.de/twitter
 *
 * @since      1.1.0
 */

add_filter( 'genesis_export_options', 'ddw_gest_premise_export_additions', 17, 1 );
/**
* Hook the "Premise" premium plugin (inclucing its "Member Access" module) into
*    the "Genesis Exporter", allowing those settings to be exported.
*
* @since  1.1.0
*
* @param  array $options Genesis Exporter options.
*
* @return array
*/
function ddw_gest_premise_export_additions( array $options ) {

	/** Premise (prms) - premium, by Copyblogger Media LLC */
	$options[ 'prms' ] = array(
		'label'          => '*' . __( 'Premium plugin:', 'genesis-extra-settings-transporter' ) . ' ' . __( 'Premise Settings', 'genesis-extra-settings-transporter' ),
		'settings-field' => PREMISE_SETTINGS_FIELD
	);

	/** Premise: Member Access Module (prmsmemb) - premium, by Copyblogger Media LLC */
	if ( defined( 'MEMBER_ACCESS_SETTINGS_FIELD' ) ) {

		$options[ 'prmsmemb' ] = array(
			'label'          => '*' . __( 'Premise Module:', 'genesis-extra-settings-transporter' ) . ' ' . __( 'Member Access Settings', 'genesis-extra-settings-transporter' ),
			'settings-field' => MEMBER_ACCESS_SETTINGS_FIELD
		);

	}

	/** Return the additional "Premise" settings fields to hook into the Genesis Exporter */
	return $options;

}  // end of function ddw_gest_premise_export_additions