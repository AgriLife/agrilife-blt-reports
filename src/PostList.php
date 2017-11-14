<?php

namespace AgriLife\BLT;

class PostList {

	protected $catid;

	public $results;

	public $catlink;

	public function __construct( $catnames = null, $max = 1 ) {

		// Store category ID
		$args = array(
			'name' => $catnames
		);
		$cats = get_categories($args);

		if(empty($cats))
			return;

		$this->catid = $cats[0]->cat_ID;

		$this->catlink = get_category_link( $this->catid );

		// Store posts
		$pgid = get_queried_object_id();
		$metanm = get_post_meta( $pgid, 'WP_Catid', 'true' );
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(
			'posts_per_page' => $max,
			'category_name' => implode( $catnames, ',' ),
			'paged' => $paged,
			'post_type' => 'post',
			'post_status' => 'publish'
		);

	  $this->results = new \WP_Query( $args );

	}

}
