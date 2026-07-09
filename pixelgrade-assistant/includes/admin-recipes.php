<?php
/**
 * The Recipes tab: source-as-recipe presets over granular layout units.
 *
 * Recipes are the onboarding-friendly layer over composable layout units. The tab loads recipes
 * lazily from REST because each source's available units are discovered from its SCE endpoint.
 *
 * @package    PixelgradeAssistant
 * @subpackage PixelgradeAssistant/includes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'pixassist_register_recipes_tab' ) ) {
	/**
	 * Preserve the legacy registration callback without exposing Recipes in navigation.
	 *
	 * Recipes now surface through Starter Sites' layout-only/starter composer flow. The payload and
	 * REST descriptors below remain available internally, but this callback no longer appends a
	 * visible hub tab.
	 *
	 * @param array $tabs Tab descriptors collected so far.
	 *
	 * @return array Unchanged tab descriptors.
	 */
	function pixassist_register_recipes_tab( $tabs ) {
		if ( ! is_array( $tabs ) ) {
			$tabs = array();
		}

		return $tabs;
	}
}

if ( ! function_exists( 'pixassist_get_recipes_data' ) ) {
	/**
	 * Build the bootstrap payload the Recipes tab renders.
	 *
	 * @return array {
	 *     @type array   $copy      Labels and helper copy.
	 *     @type array[] $sources   Starter sources available for recipe import.
	 *     @type array   $endpoints Recipe REST endpoints.
	 *     @type array   $applied   Applied recipe bundles.
	 * }
	 */
	function pixassist_get_recipes_data() {
		return array(
			'copy'      => pixassist_get_recipes_copy(),
			'sources'   => pixassist_get_recipes_sources(),
			'endpoints' => pixassist_get_recipes_endpoints(),
			'applied'   => pixassist_get_recipes_applied(),
		);
	}
}

if ( ! function_exists( 'pixassist_get_recipes_copy' ) ) {
	/**
	 * Build Recipes tab copy.
	 *
	 * @return array
	 */
	function pixassist_get_recipes_copy() {
		return array(
			'title'          => esc_html__( 'Recipes', 'pixelgrade_assistant' ),
			'description'    => esc_html__( 'Apply a complete starter recipe as one bundle, then fine-tune individual layouts afterward.', 'pixelgrade_assistant' ),
			'loadLabel'      => esc_html__( 'Load recipes', 'pixelgrade_assistant' ),
			'loading'        => esc_html__( 'Loading recipes...', 'pixelgrade_assistant' ),
			'empty'          => esc_html__( 'No recipes are available yet.', 'pixelgrade_assistant' ),
			'failure'        => esc_html__( 'Recipes could not be loaded. Please try again.', 'pixelgrade_assistant' ),
			'partialFailure' => esc_html__( 'Some recipe sources could not be loaded.', 'pixelgrade_assistant' ),
			'applyLabel'     => esc_html__( 'Apply', 'pixelgrade_assistant' ),
			'applying'       => esc_html__( 'Applying recipe...', 'pixelgrade_assistant' ),
			'applySuccess'   => esc_html__( 'Recipe applied.', 'pixelgrade_assistant' ),
			'applyFailure'   => esc_html__( 'Recipe could not be applied. Please try again.', 'pixelgrade_assistant' ),
			'appliedLabel'   => esc_html__( 'Applied', 'pixelgrade_assistant' ),
			'removeLabel'    => esc_html__( 'Remove', 'pixelgrade_assistant' ),
			'removing'       => esc_html__( 'Removing recipe...', 'pixelgrade_assistant' ),
			'removeSuccess'  => esc_html__( 'Recipe removed.', 'pixelgrade_assistant' ),
			'removeFailure'  => esc_html__( 'Recipe could not be removed. Please try again.', 'pixelgrade_assistant' ),
			'lookLabel'      => esc_html__( 'Include look', 'pixelgrade_assistant' ),
			'sampleLabel'    => esc_html__( 'Include sample content', 'pixelgrade_assistant' ),
			'layoutOnly'     => esc_html__( 'Layout only by default', 'pixelgrade_assistant' ),
			'partsLabel'     => esc_html__( 'Parts', 'pixelgrade_assistant' ),
			'templatesLabel' => esc_html__( 'Templates', 'pixelgrade_assistant' ),
			'featuresLabel'  => esc_html__( 'Features', 'pixelgrade_assistant' ),
			'sourceHeading'  => esc_html__( 'Source', 'pixelgrade_assistant' ),
			'premiumLabel'   => esc_html__( 'Plus', 'pixelgrade_assistant' ),
			'deviatedLabel'  => esc_html__( 'Customized after apply', 'pixelgrade_assistant' ),
		);
	}
}

if ( ! function_exists( 'pixassist_get_recipes_sources' ) ) {
	/**
	 * Collect starter sources that can provide recipes.
	 *
	 * @return array[]
	 */
	function pixassist_get_recipes_sources() {
		if ( function_exists( 'pixassist_get_layout_units_sources' ) ) {
			return pixassist_get_layout_units_sources();
		}

		$starters = function_exists( 'pixassist_get_admin_hub_starters' ) ? pixassist_get_admin_hub_starters() : array();
		if ( ! is_array( $starters ) ) {
			return array();
		}

		$sources = array();
		foreach ( $starters as $starter ) {
			if ( empty( $starter['id'] ) || empty( $starter['baseRestUrl'] ) ) {
				continue;
			}

			$sources[] = array(
				'id'          => sanitize_key( $starter['id'] ),
				'title'       => ! empty( $starter['title'] ) ? wp_strip_all_tags( $starter['title'] ) : sanitize_key( $starter['id'] ),
				'description' => ! empty( $starter['description'] ) ? wp_strip_all_tags( $starter['description'] ) : '',
				'baseRestUrl' => esc_url_raw( $starter['baseRestUrl'] ),
				'image'       => ! empty( $starter['image'] ) ? esc_url_raw( $starter['image'] ) : '',
				'previewUrl'  => ! empty( $starter['previewUrl'] ) ? esc_url_raw( $starter['previewUrl'] ) : '',
				'gate'        => isset( $starter['gate'] ) ? sanitize_key( $starter['gate'] ) : '',
			);
		}

		return $sources;
	}
}

if ( ! function_exists( 'pixassist_get_recipes_endpoints' ) ) {
	/**
	 * Expose the recipe REST endpoints.
	 *
	 * @return array
	 */
	function pixassist_get_recipes_endpoints() {
		$endpoints = array(
			'recipes'     => array(
				'method' => 'POST',
				'url'    => function_exists( 'rest_url' ) ? esc_url_raw( rest_url( 'pixassist/v1/recipes' ) ) : '',
			),
			'applyRecipe' => array(
				'method' => 'POST',
				'url'    => function_exists( 'rest_url' ) ? esc_url_raw( rest_url( 'pixassist/v1/apply_recipe' ) ) : '',
			),
			'undoRecipe'  => array(
				'method' => 'POST',
				'url'    => function_exists( 'rest_url' ) ? esc_url_raw( rest_url( 'pixassist/v1/undo_recipe' ) ) : '',
			),
		);

		if ( class_exists( 'PixelgradeAssistant_Admin' )
			&& isset( PixelgradeAssistant_Admin::$internalApiEndpoints )
			&& is_array( PixelgradeAssistant_Admin::$internalApiEndpoints ) ) {
			foreach ( array( 'recipes', 'applyRecipe', 'undoRecipe' ) as $key ) {
				if ( ! empty( PixelgradeAssistant_Admin::$internalApiEndpoints[ $key ] ) && is_array( PixelgradeAssistant_Admin::$internalApiEndpoints[ $key ] ) ) {
					$endpoints[ $key ] = PixelgradeAssistant_Admin::$internalApiEndpoints[ $key ];
				}
			}
		}

		return $endpoints;
	}
}

if ( ! function_exists( 'pixassist_get_recipes_applied' ) ) {
	/**
	 * Return the currently applied recipes.
	 *
	 * @return array
	 */
	function pixassist_get_recipes_applied() {
		if ( function_exists( 'PixelgradeAssistant' ) ) {
			$plugin = PixelgradeAssistant();
			if ( ! empty( $plugin->starter_content ) && method_exists( $plugin->starter_content, 'get_applied_recipes' ) ) {
				return $plugin->starter_content->get_applied_recipes();
			}
		}

		return array();
	}
}

if ( function_exists( 'add_filter' ) ) {
	add_filter( 'pixelgrade/admin_hub/tabs', 'pixassist_register_recipes_tab' );
}
