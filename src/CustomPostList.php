<?php

namespace AgriLife\BLT;

class CustomPostList {

	protected $catid;

	public $results;

	public $link;

	public function __construct( $posttype = null, $max = -1, $taxonomy = false ) {

		// Modify $max value if zero
		if(intval($max) === 0){
			$max = -1;
		}

		$this->link = get_post_type_archive_link( $posttype );

		// Store posts
		$pgid = get_queried_object_id();
		$metanm = get_post_meta( $pgid, 'WP_Catid', 'true' );
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(
			'posts_per_page' => $max,
			'paged' => $paged,
			'post_type' => $posttype,
			'post_status' => 'publish',
			'order' => 'DESC',
			'orderby' => 'date'
		);

		if($taxonomy !== false){

			$taxargs = array(
				'taxonomy' => $taxonomy['name'],
				'terms' => $taxonomy['terms']
			);
			if(is_numeric($taxonomy['terms'])){
				$taxargs['field'] = 'term_id';
			} else {
				$taxargs['field'] = 'slug';
			}

			$args['tax_query'] = array();
			$args['tax_query'][] = $taxargs;

		}

	  $this->results = new \WP_Query( $args );

	}

}
