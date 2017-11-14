<?php
namespace AgriLife\BLT;

/**
 * Builds and registers the Report custom post type
 */

class Quarterly_PostType {

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
			'taxonomies' => false
		);

		// Register the Reports post type
		register_post_type( 'quarterly-reports', $args );

		// Set the title as Last, First
    // add_action( 'save_post', array( $this, 'save_reports_title' ) );

	}

	/**
	 * Saves the title as Last, First
	 * @param  int $post_id The current post ID
	 * @return void
	 */
  public function save_reports_title( $post_id ) {

    $slug = 'monthly-reports';

    if ( ! isset( $_POST['post_type'] ) || $slug != $_POST['post_type'] )
      return;

    remove_action( 'save_post', array( $this, 'save_reports_title' ) );

    $reports_title = sprintf( '%s, %s',
    	get_field( 'ag-reports-last-name', $post_id ),
    	get_field( 'ag-reports-first-name', $post_id )
    );

    $reports_slug = sanitize_title( $reports_title );

    $args = array(
      'ID' => $post_id,
      'post_title' => $reports_title,
      'post_name' => $reports_slug,
    );

    wp_update_post( $args );

    add_action( 'save_post', array( $this, 'save_reports_title' ) );

  }

}
