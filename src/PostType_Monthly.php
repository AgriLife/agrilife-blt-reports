<?php
namespace AgriLife\BLT;

/**
 * Builds and registers the Report custom post type
 */

class PostType_Monthly {

	public function __construct() {

		// Backend labels
		$labels = array(
			'name' => __( 'Monthly Updates', 'blt' ),
			'singular_name' => __( 'Monthly Updates', 'blt' ),
			'add_new' => __( 'Add New', 'blt' ),
			'add_new_item' => __( 'Add New Monthly Update', 'blt' ),
			'edit_item' => __( 'Edit Monthly Update', 'blt' ),
			'new_item' => __( 'New Monthly Update', 'blt' ),
			'view_item' => __( 'View Monthly Update', 'blt' ),
			'search_items' => __( 'Search Monthly Updates', 'blt' ),
			'not_found' => __( 'No Monthly Updates Found', 'blt' ),
			'not_found_in_trash' => __( 'No Monthly Updates found in trash', 'blt' ),
			'parent_item_colon' => '',
			'menu_name' => __( 'Monthly Updates', 'blt' ),
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
