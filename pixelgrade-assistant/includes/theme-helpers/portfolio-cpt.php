<?php
/**
 * The clean `portfolio` custom post type for Pixelgrade block themes (Anima LT).
 *
 * This re-homes, inside Pixelgrade Assistant, the post type that Pixelgrade Care used to
 * provide. Anima LT's FSE templates (`single-portfolio`, `archive-portfolio`,
 * `taxonomy-portfolio_type`, `taxonomy-portfolio_tag`) and Nova Blocks' rendering
 * (`is_singular( 'portfolio' )`, `get_the_terms( $id, 'portfolio_type' )`) both reference the
 * `portfolio` post type and its `portfolio_type` / `portfolio_tag` taxonomies — but nothing in
 * the free stack registers them once Care is gone. We register them here.
 *
 * Registration is gated on the active theme declaring `add_theme_support( 'portfolio' )`, with a
 * `pixassist_register_portfolio_cpt` filter escape hatch.
 *
 * Deliberately leaner than the Care version it descends from: no pro-features license gate, no
 * theme-config coupling, no custom metafields, and no posts-per-page override (the FSE query
 * loop block owns archive pagination now).
 *
 * @link       https://pixelgrade.com
 *
 * @package    PixelgradeAssistant
 * @subpackage PixelgradeAssistant/ThemeHelpers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'pixassist_portfolio_cpt_is_enabled' ) ) {
	/**
	 * Whether the `portfolio` custom post type should be registered for the current theme.
	 *
	 * Driven by the active theme declaring `add_theme_support( 'portfolio' )`. Companion plugins
	 * or site owners can override the decision through the filter below.
	 *
	 * @return bool
	 */
	function pixassist_portfolio_cpt_is_enabled() {
		$enabled = current_theme_supports( 'portfolio' );

		/**
		 * Filters whether Assistant registers the `portfolio` custom post type.
		 *
		 * Defaults to whether the active theme declared `add_theme_support( 'portfolio' )`.
		 *
		 * @param bool $enabled Whether to register the portfolio CPT.
		 */
		return (bool) apply_filters( 'pixassist_register_portfolio_cpt', $enabled );
	}
}

if ( ! function_exists( 'pixassist_register_portfolio_post_type' ) ) {
	/**
	 * Register the `portfolio` post type plus its `portfolio_type` and `portfolio_tag` taxonomies.
	 *
	 * Guarded by post_type_exists() so it is safe to call more than once (e.g. on `init` and again
	 * on `import_start`), and so it yields to Jetpack/another plugin should one already own the slug.
	 *
	 * @return void
	 */
	function pixassist_register_portfolio_post_type() {
		if ( post_type_exists( 'portfolio' ) ) {
			return;
		}

		register_post_type(
			'portfolio',
			array(
				'labels'          => array(
					'name'                  => esc_html__( 'Projects', 'pixelgrade-assistant' ),
					'singular_name'         => esc_html__( 'Project', 'pixelgrade-assistant' ),
					'menu_name'             => esc_html__( 'Portfolio', 'pixelgrade-assistant' ),
					'all_items'             => esc_html__( 'All Projects', 'pixelgrade-assistant' ),
					'add_new'               => esc_html__( 'Add New', 'pixelgrade-assistant' ),
					'add_new_item'          => esc_html__( 'Add New Project', 'pixelgrade-assistant' ),
					'edit_item'             => esc_html__( 'Edit Project', 'pixelgrade-assistant' ),
					'new_item'              => esc_html__( 'New Project', 'pixelgrade-assistant' ),
					'view_item'             => esc_html__( 'View Project', 'pixelgrade-assistant' ),
					'search_items'          => esc_html__( 'Search Projects', 'pixelgrade-assistant' ),
					'not_found'             => esc_html__( 'No Projects found', 'pixelgrade-assistant' ),
					'not_found_in_trash'    => esc_html__( 'No Projects found in Trash', 'pixelgrade-assistant' ),
					'filter_items_list'     => esc_html__( 'Filter projects list', 'pixelgrade-assistant' ),
					'items_list_navigation' => esc_html__( 'Project list navigation', 'pixelgrade-assistant' ),
					'items_list'            => esc_html__( 'Projects list', 'pixelgrade-assistant' ),
				),
				'supports'        => array(
					'title',
					'editor',
					'thumbnail',
					'excerpt',
					'author',
					'custom-fields',
					'revisions',
				),
				'rewrite'         => array(
					'slug'       => 'portfolio',
					'with_front' => false,
					'feeds'      => true,
					'pages'      => true,
				),
				'public'          => true,
				'show_ui'         => true,
				'menu_position'   => 20,                    // Below Pages.
				'menu_icon'       => 'dashicons-portfolio', // 3.8+ dashicon option.
				'capability_type' => 'post',
				'map_meta_cap'    => true,
				'taxonomies'      => array( 'portfolio_type', 'portfolio_tag' ),
				'has_archive'     => true,
				'query_var'       => 'portfolio',
				'show_in_rest'    => true,
			)
		);

		register_taxonomy(
			'portfolio_type',
			'portfolio',
			array(
				'hierarchical'      => true,
				'labels'            => array(
					'name'                  => esc_html__( 'Project Types', 'pixelgrade-assistant' ),
					'singular_name'         => esc_html__( 'Project Type', 'pixelgrade-assistant' ),
					'menu_name'             => esc_html__( 'Project Types', 'pixelgrade-assistant' ),
					'all_items'             => esc_html__( 'All Project Types', 'pixelgrade-assistant' ),
					'edit_item'             => esc_html__( 'Edit Project Type', 'pixelgrade-assistant' ),
					'view_item'             => esc_html__( 'View Project Type', 'pixelgrade-assistant' ),
					'update_item'           => esc_html__( 'Update Project Type', 'pixelgrade-assistant' ),
					'add_new_item'          => esc_html__( 'Add New Project Type', 'pixelgrade-assistant' ),
					'new_item_name'         => esc_html__( 'New Project Type Name', 'pixelgrade-assistant' ),
					'parent_item'           => esc_html__( 'Parent Project Type', 'pixelgrade-assistant' ),
					'parent_item_colon'     => esc_html__( 'Parent Project Type:', 'pixelgrade-assistant' ),
					'search_items'          => esc_html__( 'Search Project Types', 'pixelgrade-assistant' ),
					'not_found'             => esc_html__( 'No project types found.', 'pixelgrade-assistant' ),
					'items_list_navigation' => esc_html__( 'Project type list navigation', 'pixelgrade-assistant' ),
					'items_list'            => esc_html__( 'Project type list', 'pixelgrade-assistant' ),
				),
				'public'            => true,
				'show_ui'           => true,
				'show_in_nav_menus' => true,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'project-type' ),
			)
		);

		register_taxonomy(
			'portfolio_tag',
			'portfolio',
			array(
				'hierarchical'      => false,
				'labels'            => array(
					'name'                       => esc_html__( 'Project Tags', 'pixelgrade-assistant' ),
					'singular_name'              => esc_html__( 'Project Tag', 'pixelgrade-assistant' ),
					'menu_name'                  => esc_html__( 'Project Tags', 'pixelgrade-assistant' ),
					'all_items'                  => esc_html__( 'All Project Tags', 'pixelgrade-assistant' ),
					'edit_item'                  => esc_html__( 'Edit Project Tag', 'pixelgrade-assistant' ),
					'view_item'                  => esc_html__( 'View Project Tag', 'pixelgrade-assistant' ),
					'update_item'                => esc_html__( 'Update Project Tag', 'pixelgrade-assistant' ),
					'add_new_item'               => esc_html__( 'Add New Project Tag', 'pixelgrade-assistant' ),
					'new_item_name'              => esc_html__( 'New Project Tag Name', 'pixelgrade-assistant' ),
					'search_items'               => esc_html__( 'Search Project Tags', 'pixelgrade-assistant' ),
					'popular_items'              => esc_html__( 'Popular Project Tags', 'pixelgrade-assistant' ),
					'separate_items_with_commas' => esc_html__( 'Separate tags with commas', 'pixelgrade-assistant' ),
					'add_or_remove_items'        => esc_html__( 'Add or remove tags', 'pixelgrade-assistant' ),
					'choose_from_most_used'      => esc_html__( 'Choose from the most used tags', 'pixelgrade-assistant' ),
					'not_found'                  => esc_html__( 'No project tags found.', 'pixelgrade-assistant' ),
					'items_list_navigation'      => esc_html__( 'Project tag list navigation', 'pixelgrade-assistant' ),
					'items_list'                 => esc_html__( 'Project tag list', 'pixelgrade-assistant' ),
				),
				'public'            => true,
				'show_ui'           => true,
				'show_in_nav_menus' => true,
				'show_in_rest'      => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'project-tag' ),
			)
		);
	}
}

if ( ! function_exists( 'pixassist_portfolio_cpt_enabled_by_feature_unit' ) ) {
	/**
	 * Enables the portfolio CPT when the composable feature-unit journal says Portfolio is active.
	 *
	 * @param bool $enabled Whether the CPT is enabled by theme support or another integration.
	 *
	 * @return bool
	 */
	function pixassist_portfolio_cpt_enabled_by_feature_unit( $enabled ) {
		if ( $enabled || ! class_exists( 'PixelgradeAssistant_Admin' ) ) {
			return (bool) $enabled;
		}

		$features = PixelgradeAssistant_Admin::get_option( 'enabled_features', array() );
		if ( ! is_array( $features ) ) {
			return false;
		}

		return in_array( 'portfolio', array_map( 'sanitize_key', $features ), true );
	}
}

if ( ! function_exists( 'pixassist_maybe_register_portfolio_cpt' ) ) {
	/**
	 * Register the portfolio CPT when enabled, flushing rewrite rules once so that single and
	 * archive permalinks resolve the first time the post type appears.
	 *
	 * @return void
	 */
	function pixassist_maybe_register_portfolio_cpt() {
		if ( ! pixassist_portfolio_cpt_is_enabled() ) {
			return;
		}

		pixassist_register_portfolio_post_type();

		// One-time permalink flush. Cleared on theme switch so it can re-run if support changes.
		if ( '1' !== (string) get_option( 'pixassist_portfolio_rewrite_flushed', '0' ) ) {
			flush_rewrite_rules( false );
			update_option( 'pixassist_portfolio_rewrite_flushed', '1' );
		}
	}
}

if ( ! function_exists( 'pixassist_portfolio_reset_rewrite_flag' ) ) {
	/**
	 * Reset the one-time rewrite-flush flag (on theme switch) so permalinks re-flush if needed.
	 *
	 * @return void
	 */
	function pixassist_portfolio_reset_rewrite_flag() {
		update_option( 'pixassist_portfolio_rewrite_flushed', '0' );
	}
}

if ( ! function_exists( 'pixassist_portfolio_allow_in_rest_api' ) ) {
	/**
	 * Add the portfolio post type to the REST API allowed list (legacy WP.com/Jetpack filter).
	 *
	 * @param array $post_types Allowed post types.
	 *
	 * @return array
	 */
	function pixassist_portfolio_allow_in_rest_api( $post_types ) {
		$post_types = (array) $post_types;
		if ( ! in_array( 'portfolio', $post_types, true ) ) {
			$post_types[] = 'portfolio';
		}

		return $post_types;
	}
}

if ( function_exists( 'add_action' ) ) {
	// Register on init for the front end / admin / block editor.
	add_action( 'init', 'pixassist_maybe_register_portfolio_cpt' );

	// Ensure the post type exists during starter-content / WXR imports, regardless of timing.
	add_action( 'import_start', 'pixassist_register_portfolio_post_type' );

	// A theme switch may add or drop `portfolio` support; allow a fresh permalink flush.
	add_action( 'after_switch_theme', 'pixassist_portfolio_reset_rewrite_flag' );

	add_filter( 'rest_api_allowed_post_types', 'pixassist_portfolio_allow_in_rest_api' );
	add_filter( 'pixassist_register_portfolio_cpt', 'pixassist_portfolio_cpt_enabled_by_feature_unit' );
}
