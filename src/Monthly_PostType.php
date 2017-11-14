<?php
namespace AgriLife\BLT;

/**
 * Builds and registers the Report custom post type
 */

class Monthly_PostType {

	public function __construct() {

		// Backend labels
		$labels = array(
			'name' => __( 'Monthly Reports', 'blt' ),
			'singular_name' => __( 'Monthly Reports', 'blt' ),
			'add_new' => __( 'Add New', 'blt' ),
			'add_new_item' => __( 'Add New Monthly Report', 'blt' ),
			'edit_item' => __( 'Edit Monthly Report', 'blt' ),
			'new_item' => __( 'New Monthly Report', 'blt' ),
			'view_item' => __( 'View Monthly Report', 'blt' ),
			'search_items' => __( 'Search Monthly Reports', 'blt' ),
			'not_found' => __( 'No Monthly Reports Found', 'blt' ),
			'not_found_in_trash' => __( 'No Monthly Reports found in trash', 'blt' ),
			'parent_item_colon' => '',
			'menu_name' => __( 'Monthly Reports', 'blt' ),
		);

		// Post type arguments
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'monthly-reports' ),
			'supports' => array( 'title', 'post-formats', ),
			'has_archive' => true,
			'menu_icon' => 'dashicons-portfolio',
			'taxonomies' => false,
			'publicly_queryable' => true,
		);

		// Register the Reports post type
		register_post_type( 'monthly-reports', $args );

	}

}
