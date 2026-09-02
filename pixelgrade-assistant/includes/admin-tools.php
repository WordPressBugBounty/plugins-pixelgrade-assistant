<?php
/**
 * The secondary Tools tab: maintenance utilities inside the Appearance -> Pixelgrade hub.
 *
 * This tab is the modern hub counterpart of the legacy reset helper. It keeps Assistant cleanup
 * separate from the starter-content reset action.
 *
 * @package    PixelgradeAssistant
 * @subpackage PixelgradeAssistant/includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'pixassist_register_tools_tab' ) ) {
	/**
	 * Register the secondary Tools tab on the Appearance -> Pixelgrade hub registry.
	 *
	 * @param array $tabs Tab descriptors collected so far.
	 *
	 * @return array Tab descriptors with the Tools tab appended.
	 */
	function pixassist_register_tools_tab( $tabs ) {
		if ( ! is_array( $tabs ) ) {
			$tabs = array();
		}

		$tabs[] = array(
			'id'         => 'tools',
			'label'      => esc_html__( 'Tools', 'pixelgrade-assistant' ),
			'capability' => 'manage_options',
			'component'  => 'tools',
			'gate'       => '',
			'group'      => 'secondary',
			'order'      => 20,
		);

		return $tabs;
	}
}

if ( ! function_exists( 'pixassist_get_tools_data' ) ) {
	/**
	 * Build the bootstrap payload the Tools tab renders.
	 *
	 * @return array {
	 *     @type array $copy      Labels and helper copy derived from existing config.
	 *     @type array $endpoints Existing cleanup REST endpoint.
	 * }
	 */
	function pixassist_get_tools_data() {
		return array(
			'copy'      => pixassist_get_tools_copy( pixassist_get_tools_config() ),
			'endpoints' => pixassist_get_tools_endpoints(),
		);
	}
}

if ( ! function_exists( 'pixassist_get_tools_config' ) ) {
	/**
	 * Read Assistant's existing merged config when the admin class is available.
	 *
	 * @return array
	 */
	function pixassist_get_tools_config() {
		if ( class_exists( 'PixelgradeAssistant_Admin' ) && method_exists( 'PixelgradeAssistant_Admin', 'get_config' ) ) {
			$config = PixelgradeAssistant_Admin::get_config();

			return is_array( $config ) ? $config : array();
		}

		return array();
	}
}

if ( ! function_exists( 'pixassist_get_tools_copy' ) ) {
	/**
	 * Extract Tools copy from the legacy systemStatus config, with safe defaults.
	 *
	 * @param array $config Existing Assistant config.
	 *
	 * @return array
	 */
	function pixassist_get_tools_copy( $config ) {
		$l10n = isset( $config['systemStatus']['l10n'] ) && is_array( $config['systemStatus']['l10n'] )
			? $config['systemStatus']['l10n']
			: array();

		return array(
			'title'               => esc_html__( 'Tools', 'pixelgrade-assistant' ),
			'description'         => esc_html__( 'Utilities for maintaining the Pixelgrade Assistant setup on this site.', 'pixelgrade-assistant' ),
			'resetLabel'          => isset( $l10n['resetPluginButtonLabel'] ) ? (string) $l10n['resetPluginButtonLabel'] : esc_html__( 'Reset Pixelgrade Assistant', 'pixelgrade-assistant' ),
			'resetDescription'    => isset( $l10n['resetPluginDescription'] ) ? (string) $l10n['resetPluginDescription'] : esc_html__( 'Reset Assistant options, cached state, and onboarding progress.', 'pixelgrade-assistant' ),
			'confirmationMessage' => isset( $l10n['resetPluginConfirmationMessage'] ) ? (string) $l10n['resetPluginConfirmationMessage'] : esc_html__( 'Solve the confirmation challenge to reset Pixelgrade Assistant.', 'pixelgrade-assistant' ),
			'challengeLabel'      => esc_html__( 'Confirmation answer', 'pixelgrade-assistant' ),
			'challengePrefix'     => esc_html__( 'Type the result:', 'pixelgrade-assistant' ),
			'confirmLabel'        => esc_html__( 'Confirm reset', 'pixelgrade-assistant' ),
			'cancelLabel'         => esc_html__( 'Cancel', 'pixelgrade-assistant' ),
			'wrongAnswer'         => esc_html__( 'The confirmation answer is incorrect.', 'pixelgrade-assistant' ),
			'working'             => esc_html__( 'Resetting...', 'pixelgrade-assistant' ),
			'success'             => esc_html__( 'Pixelgrade Assistant was reset. Refresh the page to load the clean state.', 'pixelgrade-assistant' ),
			'failure'             => esc_html__( 'Reset failed. Please try again.', 'pixelgrade-assistant' ),
			'starterResetLabel'   => esc_html__( 'Reset starter content', 'pixelgrade-assistant' ),
			'starterResetHeading' => esc_html__( 'Start from scratch', 'pixelgrade-assistant' ),
			'starterResetDescription' => esc_html__( 'Remove content imported by Starter Sites and restore the site settings captured before import. Account and license data are not changed.', 'pixelgrade-assistant' ),
			'starterResetConfirmationMessage' => esc_html__( 'Confirm that you want to reset imported starter content.', 'pixelgrade-assistant' ),
			'starterResetConfirmLabel' => esc_html__( 'Reset starter content', 'pixelgrade-assistant' ),
			'starterResetWorking' => esc_html__( 'Resetting starter content...', 'pixelgrade-assistant' ),
			'starterResetSuccess' => esc_html__( 'Starter content was reset.', 'pixelgrade-assistant' ),
			'starterResetNoContent' => esc_html__( 'No imported starter content was found. Nothing changed.', 'pixelgrade-assistant' ),
			'starterResetFailure' => esc_html__( 'Starter content reset failed. Please try again.', 'pixelgrade-assistant' ),
			'starterResetSummary' => esc_html__( 'Deleted %1$d posts, %2$d terms, and %3$d media items. Restored %4$d options and %5$d theme settings.', 'pixelgrade-assistant' ),
			'localStorageLabel'   => esc_html__( 'Clear browser cache for this admin app', 'pixelgrade-assistant' ),
			'localStorageSuccess' => esc_html__( 'Browser cache cleared for this admin app.', 'pixelgrade-assistant' ),
		);
	}
}

if ( ! function_exists( 'pixassist_get_tools_endpoints' ) ) {
	/**
	 * Reuse the existing cleanup REST endpoint.
	 *
	 * @return array
	 */
	function pixassist_get_tools_endpoints() {
		$endpoints = class_exists( 'PixelgradeAssistant_Admin' ) && isset( PixelgradeAssistant_Admin::$internalApiEndpoints )
			? PixelgradeAssistant_Admin::$internalApiEndpoints
			: array();

		return array(
			'cleanup' => isset( $endpoints['cleanup'] ) && is_array( $endpoints['cleanup'] )
				? $endpoints['cleanup']
				: array(),
			'resetStarterContent' => isset( $endpoints['resetStarterContent'] ) && is_array( $endpoints['resetStarterContent'] )
				? $endpoints['resetStarterContent']
				: array(),
		);
	}
}

if ( function_exists( 'add_filter' ) ) {
	add_filter( 'pixelgrade/admin_hub/tabs', 'pixassist_register_tools_tab' );
}
