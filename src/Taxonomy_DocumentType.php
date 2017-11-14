<?php
namespace AgriLife\BLT;

/**
 * Creates taxonomies for custom post types
 */

class Taxonomy_DocumentType {

	/**
	 * Builds and registers the custom taxonomy
	 */
	public function __construct() {

		$labels = array(
			'name'                       => _x( 'Document Types', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Document Type', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Document Type', 'text_domain' ),
			'all_items'                  => __( 'All Document Types', 'text_domain' ),
			'parent_item'                => __( 'Parent Document Type', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Document Type:', 'text_domain' ),
			'new_item_name'              => __( 'New Document Type', 'text_domain' ),
			'add_new_item'               => __( 'Add New Document Type', 'text_domain' ),
			'edit_item'                  => __( 'Edit Document Type', 'text_domain' ),
			'update_item'                => __( 'Update Document Type', 'text_domain' ),
			'view_item'                  => __( 'View Document Type', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove document types', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Document Types', 'text_domain' ),
			'search_items'               => __( 'Search Document Types', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No document types', 'text_domain' ),
			'items_list'                 => __( 'Document Types list', 'text_domain' ),
			'items_list_navigation'      => __( 'Document Types list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
		);
		register_taxonomy( 'document_type', array( 'educator-documents' ), $args );

	}

}
