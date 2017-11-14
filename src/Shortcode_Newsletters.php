<?php
namespace AgriLife\BLT;

/**
 * Builds and registers the blt_newsletter shortcode
 * Example: [blt_newsletter limit=5 type=2]
 */

class Shortcode_Newsletters {

	public function __construct() {

		add_shortcode( 'blt_newsletter', array( $this, 'blt_newsletter_sc' ) );

	}

	public function blt_newsletter_sc( $atts ){

    $attributes = shortcode_atts( array(
        'limit' => '5',
        'type' => '1',
    ), $atts );

    $taxonomy = array(
    	'name' => 'language',
    	'terms' => $attributes['type']
    );

    $output = '<ul>';

		$posts = new \AgriLife\BLT\CustomPostList( 'newsletters', $attributes['limit'], $taxonomy );

	  $postslist = $posts->results;

	  if ( $postslist && $postslist->have_posts() ) :

	    while ( $postslist->have_posts() ) : $postslist->the_post();

	    	// Start list item
	    	$output .= '<li>';

				// Add link
				$url = get_permalink();

				if(get_field('file')){

					$url = get_field('file')['url'];

				}

	    	$output .= the_title('<a href="' . $url . '">', '</a>', false);

				// Add post date
				$output .= the_date( 'M. Y', ' (', ')', false );

				// Close list item
	    	$output .= '</li>';

	    endwhile;

	  	$output .= '</ul>';

	    wp_reset_postdata();

	  endif;

	  return $output;

	}

}
