<?php
namespace AgriLife\BLT;

/**
 * Creates the Type taxonomy to categorize People
 */

class Taxonomy {

	/**
	 * Builds and registers the custom taxonomy
	 */
	public function __construct() {

		// Taxonomy labels
		$labels = array(
			'name' => __( 'Types', 'blt' ),
			'singular_name' => __( 'Type', 'blt' ),
			'search_items' => __( 'Search Types', 'blt' ),
			'all_items' => __( 'All Types', 'blt' ),
			'parent_item' => __( 'Parent Type', 'blt' ),
			'parent_item_colon' => __( 'Parent Type:', 'blt' ),
			'edit_item' => __( 'Edit Type', 'blt' ),
			'update_item' => __( 'Update Type', 'blt' ),
			'add_new_item' => __( 'Add New Type', 'blt' ),
			'new_item_name' => __( 'New Type Name', 'blt' ),
			'menu_name' => __( 'Types', 'blt' ),
		);

		// Taxonomy arguments
		$args = array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'rewrite' => array( 'slug' ),
		);

		// Register the Type taxonomy
		register_taxonomy( 'types', 'monthly-reports', $args );

	}

}
