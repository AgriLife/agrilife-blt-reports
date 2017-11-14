<?php
namespace AgriLife\BLT;

/**
 * Builds and registers the Report custom post type
 */

class PostType_Newsletter {

	public function __construct() {

		// Backend labels
		$labels = array(
			'name' => __( 'Newsletter', 'blt' ),
			'singular_name' => __( 'Newsletter', 'blt' ),
			'add_new' => __( 'Add New', 'blt' ),
			'add_new_item' => __( 'Add New Newsletter', 'blt' ),
			'edit_item' => __( 'Edit Newsletter', 'blt' ),
			'new_item' => __( 'New Newsletter', 'blt' ),
			'view_item' => __( 'View Newsletter', 'blt' ),
			'search_items' => __( 'Search Newsletters', 'blt' ),
			'not_found' => __( 'No Newsletters Found', 'blt' ),
			'not_found_in_trash' => __( 'No Newsletters found in trash', 'blt' ),
			'parent_item_colon' => '',
			'menu_name' => __( 'Newsletters', 'blt' ),
		);

		// Post type arguments
		$args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'newsletters' ),
			'supports' => array( 'title', 'post-formats', ),
			'has_archive' => true,
			'menu_icon' => 'dashicons-portfolio',
			'taxonomies' => array('newsletter_language'),
			'publicly_queryable' => true,
		);

		// Register the Reports post type
		register_post_type( 'newsletters', $args );

	}

}
