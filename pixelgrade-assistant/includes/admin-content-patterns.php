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

// What each Design Library source contributes (parts and/or content records).
require_once __DIR__ . '/starter-sources.php';

if ( ! function_exists( 'pixassist_register_content_patterns_tab' ) ) {
	/**
	 * Preserve the legacy registration callback without exposing Page Patterns in navigation.
	 *
	 * Page Patterns now surface as a section of the merged Design Library tab
	 * (`?tab=design-library&section=content`; legacy `?tab=content` links are aliased — see
	 * pixassist_get_admin_hub_data()). The payload and REST descriptors below remain available (the
	 * privileged import endpoints keep their own manage_options checks); this callback no longer
	 * appends a visible hub tab.
	 *
	 * @param array $tabs Tab descriptors collected so far.
	 *
	 * @return array Unchanged tab descriptors.
	 */
	function pixassist_register_content_patterns_tab( $tabs ) {
		if ( ! is_array( $tabs ) ) {
			$tabs = array();
		}

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
			'title'          => esc_html__( 'Page Patterns', 'pixelgrade-assistant' ),
			'description'    => esc_html__( 'Add ready-made content — one complete page or post — instead of importing a whole starter site. For reusable parts like headers, footers, and templates, use the Site Parts section.', 'pixelgrade-assistant' ),
			'sourceLabel'    => esc_html__( 'Source', 'pixelgrade-assistant' ),
			'typeLabel'      => esc_html__( 'Type', 'pixelgrade-assistant' ),
			'allSources'     => esc_html__( 'All sources', 'pixelgrade-assistant' ),
			'allTypes'       => esc_html__( 'All types', 'pixelgrade-assistant' ),
			'searchLabel'    => esc_html__( 'Search page patterns', 'pixelgrade-assistant' ),
			'loadLabel'      => esc_html__( 'Load page patterns', 'pixelgrade-assistant' ),
			'refreshLabel'   => esc_html__( 'Refresh', 'pixelgrade-assistant' ),
			'loading'        => esc_html__( 'Loading page patterns...', 'pixelgrade-assistant' ),
			'empty'          => esc_html__( 'No page patterns are available from these sources.', 'pixelgrade-assistant' ),
			'emptyFiltered'  => esc_html__( 'No page patterns match these filters.', 'pixelgrade-assistant' ),
			'failure'        => esc_html__( 'Page patterns could not be loaded. Please try again.', 'pixelgrade-assistant' ),
			'partialFailure' => esc_html__( 'Some page-pattern sources could not be loaded.', 'pixelgrade-assistant' ),
			'partialFailureNamed' => esc_html__( 'Some sources are temporarily unavailable: %s. The other page patterns loaded fine.', 'pixelgrade-assistant' ),
			'importLabel'    => esc_html__( 'Apply', 'pixelgrade-assistant' ),
			'replaceLabel'   => esc_html__( 'Replace', 'pixelgrade-assistant' ),
			'importing'      => esc_html__( 'Applying page pattern...', 'pixelgrade-assistant' ),
			'importSuccess'  => esc_html__( 'Page pattern applied.', 'pixelgrade-assistant' ),
			'importSuccessNamed' => esc_html__( 'Added “%s” to your site.', 'pixelgrade-assistant' ),
			'viewLabel'      => esc_html__( 'View', 'pixelgrade-assistant' ),
			'editLabel'      => esc_html__( 'Edit', 'pixelgrade-assistant' ),
			'importFailure'  => esc_html__( 'Page pattern could not be applied. Please try again.', 'pixelgrade-assistant' ),
			'undoLabel'      => esc_html__( 'Remove', 'pixelgrade-assistant' ),
			'undoing'        => esc_html__( 'Removing page pattern...', 'pixelgrade-assistant' ),
			'undoSuccess'    => esc_html__( 'Page pattern removed.', 'pixelgrade-assistant' ),
			'undoFailure'    => esc_html__( 'Page pattern could not be removed. Please try again.', 'pixelgrade-assistant' ),
			'appliedTitle'   => esc_html__( 'Applied page patterns', 'pixelgrade-assistant' ),
			'appliedEmpty'   => esc_html__( 'No page patterns are applied yet.', 'pixelgrade-assistant' ),
			'appliedLabel'   => esc_html__( 'Applied', 'pixelgrade-assistant' ),
			'activeBadge'    => esc_html__( 'Active', 'pixelgrade-assistant' ),
			'sectionNoneApplied' => esc_html__( 'None applied yet', 'pixelgrade-assistant' ),
			'sourceHeading'  => esc_html__( 'Source', 'pixelgrade-assistant' ),
			'premiumLabel'   => esc_html__( 'Plus', 'pixelgrade-assistant' ),
			'lockedLabel'    => esc_html__( 'Unavailable', 'pixelgrade-assistant' ),
			'mediaLabel'     => esc_html__( 'media', 'pixelgrade-assistant' ),
			'previewLabel'   => esc_html__( 'Expand', 'pixelgrade-assistant' ),
			'previewFull'    => esc_html__( 'Open the full page pattern preview', 'pixelgrade-assistant' ),
			'noPreview'      => esc_html__( 'No preview', 'pixelgrade-assistant' ),
			'refreshTitle'   => esc_html__( 'Reload page patterns from their sources', 'pixelgrade-assistant' ),
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

			// A source is listed here only if it declares that it serves content records. Parts-only
			// catalogs (and anything that predates `serves`, which resolves to parts-only) stay out.
			if ( ! pixassist_starter_serves( $starter, 'content' ) ) {
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
