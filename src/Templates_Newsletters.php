<?php
namespace AgriLife\BLT;

/**
 * Redirects to correct template files based on query variables.
 * Also provides static methods to pull certain views
 */

class Templates_Newsletters {

	public function __construct() {

		add_filter( 'archive_template', array( $this, 'get_archive_template' ) );
		add_filter( 'single_template', array( $this, 'get_single_template' ) );

	}

	/**
	 * Shows the archive template when needed
	 * @param  string $archive_template The default archive template
	 * @return string                   The correct archive template
	 */
	public function get_archive_template( $archive_template ) {

		global $post;

		if ( is_post_type_archive( 'newsletters' ) ) {
			$archive_template = AG_BLT_TEMPLATE_PATH . '/archive-newsletter.php';
		}

		return $archive_template;

	}

	/**
	 * Shows the single template when needed
	 * @param  string $single_template The default single template
	 * @return string                  The correct single template
	 */
	public function get_single_template( $single_template ) {

		global $post;

		if ( get_query_var( 'post_type' ) == 'newsletters' ) {
			$single_template = AG_BLT_TEMPLATE_PATH . '/single-newsletter.php';
		}

		return $single_template;

	}

}
