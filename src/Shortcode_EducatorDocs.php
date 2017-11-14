<?php
namespace AgriLife\BLT;

/**
 * Builds and registers the Report custom post type
 */

class Shortcode_EducatorDocs {

	public function __construct() {

		add_shortcode( 'blt_educator', array( $this, 'blt_educator_sc' ) );

	}

	public function blt_educator_sc( $atts ){

		// [blt_educator limit=5 type=2]
    $a = shortcode_atts( array(
        'limit' => '5',
        'type' => '1',
    ), $atts );

    $t = array(
    	'name' => 'document_type',
    	'terms' => $a['type']
    );

    $output = '<ul>';

		$posts = new \AgriLife\BLT\CustomPostList( 'educator-documents', $a['limit'], $t );

	  $postslist = $posts->results;

	  if ( $postslist && $postslist->have_posts() ) :

	    while ( $postslist->have_posts() ) : $postslist->the_post();

	    	$output .= '<li>';

	    	$html = '<a href="%s">%s</a>';
				$source = get_field('source');
				$url = '';

				if($source == 'URL' && !empty(get_field('url'))){

					$url = get_field('url');

				} else if($source == 'File' && !empty(get_field('file')['url'])){

					$url = get_field('file')['url'];

				}

				// Ensure the URL points to a file
				if(empty($url)){
					$url = the_permalink();
				}

	    	$output .= the_title('<a href="' . $url . '">', '</a>', false);

	    	if(!empty($url)){

					preg_match('/\.([a-zA-Z]{3,4})$/', $url, $filetype);
					if(count($filetype) > 1){
						$filetype = $filetype[1];
					}

					$output .= sprintf(' <span class="%s icon">(%s)</span>', $filetype, strtoupper($filetype));

				}

	    	$output .= '</li>';

	    endwhile;

	  	$output .= '</ul>';

	    wp_reset_postdata();

	  endif;

	  return $output;

	}

}
