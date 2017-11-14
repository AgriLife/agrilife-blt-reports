<?php
namespace AgriLife\BLT;

/**
 * Builds and registers the Report custom post type
 */

class PostType_EducatorDocs {

	public function __construct() {

		// Backend labels
		$labels = array(
			'name' => __( 'Educator Documents', 'blt' ),
			'singular_name' => __( 'Educator Documents', 'blt' ),
			'add_new' => __( 'Add New', 'blt' ),
			'add_new_item' => __( 'Add New Educator Document', 'blt' ),
			'edit_item' => __( 'Edit Educator Document', 'blt' ),
			'new_item' => __( 'New Educator Document', 'blt' ),
			'view_item' => __( 'View Educator Document', 'blt' ),
			'search_items' => __( 'Search Educator Documents', 'blt' ),
			'not_found' => __( 'No Educator Documents Found', 'blt' ),
			'not_found_in_trash' => __( 'No Educator Documents found in trash', 'blt' ),
			'parent_item_colon' => '',
			'menu_name' => __( 'Educator Documents', 'blt' ),
		);

		// Post type arguments
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'educator-documents' ),
			'supports' => array( 'title', 'post-formats', ),
			'has_archive' => true,
			'menu_icon' => 'dashicons-portfolio',
			'taxonomies' => array('document_type'),
			'publicly_queryable' => true,
		);

		// Register the Reports post type
		register_post_type( 'educator-documents', $args );

	}

}
