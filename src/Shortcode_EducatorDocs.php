<?php
namespace AgriLife\BLT;

/**
 * Builds and registers the blt_educator shortcode
 * Example: [blt_educator limit=5 type=2]
 */

class Shortcode_EducatorDocs {

	public function __construct() {

		add_shortcode( 'blt_educator', array( $this, 'blt_educator_sc' ) );

	}

	public function blt_educator_sc( $atts ){

    $attributes = shortcode_atts( array(
        'limit' => '5',
        'type' => '1',
    ), $atts );

    $taxonomy = array(
    	'name' => 'document_type',
    	'terms' => $attributes['type']
    );

    $output = '<ul>';

		$posts = new \AgriLife\BLT\CustomPostList( 'educator-documents', $attributes['limit'], $taxonomy );

	  $postslist = $posts->results;

	  if ( $postslist && $postslist->have_posts() ) :

	    while ( $postslist->have_posts() ) : $postslist->the_post();

	    	// Start list item
	    	$output .= '<li>';

	    	// Add link
				$source = get_field('source');
				$url = get_permalink();

				if($source == 'URL' && !empty(get_field('url'))){

					$url = get_field('url');

				} else if($source == 'File' && !empty(get_field('file')['url'])){

					$url = get_field('file')['url'];

				}

	    	$output .= the_title('<a href="' . $url . '">', '</a>', false);

	    	// Add file type
	    	if(!empty($url)){

					preg_match('/\.([a-zA-Z]{3,4})$/', $url, $filetype);

					if(count($filetype) > 1){

						$filetype = $filetype[1];

						$output .= sprintf(' <span class="%s icon">(%s)</span>', $filetype, strtoupper($filetype));

					}

				}

				// Close list item
	    	$output .= '</li>';

	    endwhile;

	  	$output .= '</ul>';

	    wp_reset_postdata();

	  endif;

	  return $output;

	}

}
