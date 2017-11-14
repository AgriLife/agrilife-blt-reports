<?php
namespace AgriLife\BLT;

/**
 * Builds and registers the Report custom post type
 */

class PostType_Quarterly {

	public function __construct() {

		// Backend labels
		$labels = array(
			'name' => __( 'Quarterly Reports', 'blt' ),
			'singular_name' => __( 'Quarterly Reports', 'blt' ),
			'add_new' => __( 'Add New', 'blt' ),
			'add_new_item' => __( 'Add New Quarterly Report', 'blt' ),
			'edit_item' => __( 'Edit Quarterly Report', 'blt' ),
			'new_item' => __( 'New Quarterly Report', 'blt' ),
			'view_item' => __( 'View Quarterly Report', 'blt' ),
			'search_items' => __( 'Search Quarterly Reports', 'blt' ),
			'not_found' => __( 'No Quarterly Reports Found', 'blt' ),
			'not_found_in_trash' => __( 'No Quarterly Reports found in trash', 'blt' ),
			'parent_item_colon' => '',
			'menu_name' => __( 'Quarterly Reports', 'blt' ),
		);

		// Post type arguments
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'quarterly-reports' ),
			'supports' => array( 'title', 'post-formats', ),
			'has_archive' => true,
			'menu_icon' => 'dashicons-portfolio',
			'taxonomies' => false,
			'publicly_queryable' => true,
		);

		// Register the Reports post type
		register_post_type( 'quarterly-reports', $args );

	}

}
