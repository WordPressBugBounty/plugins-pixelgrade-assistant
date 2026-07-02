<?php
/**
 * The Page Patterns tab: import reusable page-like content from starter sources.
 *
 * @package    PixelgradeAssistant
 * @subpackage PixelgradeAssistant/includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'pixassist_register_content_patterns_tab' ) ) {
	/**
	 * Register the Page Patterns tab on the Appearance -> Pixelgrade hub registry.
	 *
	 * @param array $tabs Tab descriptors collected so far.
	 *
	 * @return array Tab descriptors with the Page Patterns tab appended.
	 */
	function pixassist_register_content_patterns_tab( $tabs ) {
		if ( ! is_array( $tabs ) ) {
			$tabs = array();
		}

		$tabs[] = array(
			'id'         => 'content',
			'label'      => esc_html__( 'Page Patterns', 'pixelgrade_assistant' ),
			'capability' => 'manage_options',
			'component'  => 'contentPatterns',
			'gate'       => '',
			'order'      => 40,
		);

		return $tabs;
	}
}

if ( ! function_exists( 'pixassist_get_content_patterns_data' ) ) {
	/**
	 * Build the bootstrap payload the Page Patterns tab renders.
	 *
	 * @return array
	 */
	function pixassist_get_content_patterns_data() {
		return array(
			'copy'      => pixassist_get_content_patterns_copy(),
			'sources'   => pixassist_get_content_patterns_sources(),
			'endpoints' => pixassist_get_content_patterns_endpoints(),
			'applied'   => pixassist_get_content_patterns_applied(),
			'preview'   => pixassist_get_content_patterns_preview(),
		);
	}
}

if ( ! function_exists( 'pixassist_get_content_patterns_preview' ) ) {
	/**
	 * Config consumed by the same-origin Page Patterns preview iframe route.
	 *
	 * @return array
	 */
	function pixassist_get_content_patterns_preview() {
		return array(
			'base'  => function_exists( 'home_url' ) ? esc_url_raw( home_url( '/' ) ) : '/',
			'param' => 'pixassist_content_preview',
			'nonce' => function_exists( 'wp_create_nonce' ) ? wp_create_nonce( 'pixassist_content_preview' ) : '',
			'vw'    => 1200,
		);
	}
}

if ( ! function_exists( 'pixassist_get_content_patterns_copy' ) ) {
	/**
	 * Build Page Patterns tab copy.
	 *
	 * @return array
	 */
	function pixassist_get_content_patterns_copy() {
		return array(
			'title'          => esc_html__( 'Page Patterns', 'pixelgrade_assistant' ),
			'description'    => esc_html__( 'Add ready-made content — a single page or post from a starter — instead of importing a whole starter site. For reusable parts like headers, footers, and templates, use the Layouts tab.', 'pixelgrade_assistant' ),
			'sourceLabel'    => esc_html__( 'Source', 'pixelgrade_assistant' ),
			'typeLabel'      => esc_html__( 'Type', 'pixelgrade_assistant' ),
			'allSources'     => esc_html__( 'All sources', 'pixelgrade_assistant' ),
			'allTypes'       => esc_html__( 'All types', 'pixelgrade_assistant' ),
			'searchLabel'    => esc_html__( 'Search page patterns', 'pixelgrade_assistant' ),
			'loadLabel'      => esc_html__( 'Load page patterns', 'pixelgrade_assistant' ),
			'refreshLabel'   => esc_html__( 'Refresh', 'pixelgrade_assistant' ),
			'loading'        => esc_html__( 'Loading page patterns...', 'pixelgrade_assistant' ),
			'empty'          => esc_html__( 'No page patterns are available from these sources.', 'pixelgrade_assistant' ),
			'emptyFiltered'  => esc_html__( 'No page patterns match these filters.', 'pixelgrade_assistant' ),
			'failure'        => esc_html__( 'Page patterns could not be loaded. Please try again.', 'pixelgrade_assistant' ),
			'partialFailure' => esc_html__( 'Some page-pattern sources could not be loaded.', 'pixelgrade_assistant' ),
			'partialFailureNamed' => esc_html__( 'Some sources are temporarily unavailable: %s. The other page patterns loaded fine.', 'pixelgrade_assistant' ),
			'importLabel'    => esc_html__( 'Apply', 'pixelgrade_assistant' ),
			'replaceLabel'   => esc_html__( 'Replace', 'pixelgrade_assistant' ),
			'importing'      => esc_html__( 'Applying page pattern...', 'pixelgrade_assistant' ),
			'importSuccess'  => esc_html__( 'Page pattern applied.', 'pixelgrade_assistant' ),
			'importSuccessNamed' => esc_html__( 'Added “%s” to your site.', 'pixelgrade_assistant' ),
			'viewLabel'      => esc_html__( 'View', 'pixelgrade_assistant' ),
			'editLabel'      => esc_html__( 'Edit', 'pixelgrade_assistant' ),
			'importFailure'  => esc_html__( 'Page pattern could not be applied. Please try again.', 'pixelgrade_assistant' ),
			'undoLabel'      => esc_html__( 'Remove', 'pixelgrade_assistant' ),
			'undoing'        => esc_html__( 'Removing page pattern...', 'pixelgrade_assistant' ),
			'undoSuccess'    => esc_html__( 'Page pattern removed.', 'pixelgrade_assistant' ),
			'undoFailure'    => esc_html__( 'Page pattern could not be removed. Please try again.', 'pixelgrade_assistant' ),
			'appliedTitle'   => esc_html__( 'Applied page patterns', 'pixelgrade_assistant' ),
			'appliedEmpty'   => esc_html__( 'No page patterns are applied yet.', 'pixelgrade_assistant' ),
			'appliedLabel'   => esc_html__( 'Applied', 'pixelgrade_assistant' ),
			'activeBadge'    => esc_html__( 'Active', 'pixelgrade_assistant' ),
			'sectionNoneApplied' => esc_html__( 'None applied yet', 'pixelgrade_assistant' ),
			'sourceHeading'  => esc_html__( 'Source', 'pixelgrade_assistant' ),
			'premiumLabel'   => esc_html__( 'Premium', 'pixelgrade_assistant' ),
			'freeLabel'      => esc_html__( 'Free', 'pixelgrade_assistant' ),
			'lockedLabel'    => esc_html__( 'Unavailable', 'pixelgrade_assistant' ),
			'mediaLabel'     => esc_html__( 'media', 'pixelgrade_assistant' ),
			'previewLabel'   => esc_html__( 'Expand', 'pixelgrade_assistant' ),
			'previewFull'    => esc_html__( 'Open the full page pattern preview', 'pixelgrade_assistant' ),
			'noPreview'      => esc_html__( 'No preview', 'pixelgrade_assistant' ),
			'refreshTitle'   => esc_html__( 'Reload page patterns from your starters', 'pixelgrade_assistant' ),
		);
	}
}

if ( ! function_exists( 'pixassist_get_content_patterns_sources' ) ) {
	/**
	 * Collect starter sources that can provide content units.
	 *
	 * @return array[]
	 */
	function pixassist_get_content_patterns_sources() {
		$starters = function_exists( 'pixassist_get_admin_hub_starters' ) ? pixassist_get_admin_hub_starters() : array();
		if ( ! is_array( $starters ) ) {
			return array();
		}

		$sources = array();
		foreach ( $starters as $starter ) {
			if ( empty( $starter['id'] ) || empty( $starter['baseRestUrl'] ) ) {
				continue;
			}

			$role = ! empty( $starter['role'] ) ? sanitize_key( $starter['role'] ) : 'starter';
			if ( 'library' === $role ) {
				continue;
			}

			$sources[] = array(
				'id'          => sanitize_key( $starter['id'] ),
				'title'       => ! empty( $starter['title'] ) ? wp_strip_all_tags( $starter['title'] ) : sanitize_key( $starter['id'] ),
				'description' => ! empty( $starter['description'] ) ? wp_strip_all_tags( $starter['description'] ) : '',
				'baseRestUrl' => esc_url_raw( $starter['baseRestUrl'] ),
				'gate'        => isset( $starter['gate'] ) ? sanitize_key( $starter['gate'] ) : '',
			);
		}

		return $sources;
	}
}

if ( ! function_exists( 'pixassist_get_content_patterns_endpoints' ) ) {
	/**
	 * Expose the content-unit REST endpoints.
	 *
	 * @return array
	 */
	function pixassist_get_content_patterns_endpoints() {
		$endpoints = array(
			'contentUnits' => array(
				'method' => 'POST',
				'url'    => function_exists( 'rest_url' ) ? esc_url_raw( rest_url( 'pixassist/v1/content_units' ) ) : '',
			),
			'importContentUnit' => array(
				'method' => 'POST',
				'url'    => function_exists( 'rest_url' ) ? esc_url_raw( rest_url( 'pixassist/v1/import_content_unit' ) ) : '',
			),
			'undoContentUnit' => array(
				'method' => 'POST',
				'url'    => function_exists( 'rest_url' ) ? esc_url_raw( rest_url( 'pixassist/v1/undo_content_unit' ) ) : '',
			),
		);

		if ( class_exists( 'PixelgradeAssistant_Admin' )
			&& isset( PixelgradeAssistant_Admin::$internalApiEndpoints )
			&& is_array( PixelgradeAssistant_Admin::$internalApiEndpoints ) ) {
			foreach ( array( 'contentUnits', 'importContentUnit', 'undoContentUnit' ) as $key ) {
				if ( ! empty( PixelgradeAssistant_Admin::$internalApiEndpoints[ $key ] ) && is_array( PixelgradeAssistant_Admin::$internalApiEndpoints[ $key ] ) ) {
					$endpoints[ $key ] = PixelgradeAssistant_Admin::$internalApiEndpoints[ $key ];
				}
			}
		}

		return $endpoints;
	}
}

if ( ! function_exists( 'pixassist_get_content_patterns_applied' ) ) {
	/**
	 * Return the currently applied page patterns.
	 *
	 * @return array
	 */
	function pixassist_get_content_patterns_applied() {
		if ( function_exists( 'PixelgradeAssistant' ) ) {
			$plugin = PixelgradeAssistant();
			if ( ! empty( $plugin->starter_content ) && method_exists( $plugin->starter_content, 'get_applied_content_units' ) ) {
				return $plugin->starter_content->get_applied_content_units();
			}
		}

		return array();
	}
}

if ( function_exists( 'add_filter' ) ) {
	add_filter( 'pixelgrade/admin_hub/tabs', 'pixassist_register_content_patterns_tab' );
}
