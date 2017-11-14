<?php
/**
 * Template Name: Reports
 */

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
// Display content
add_action( 'genesis_entry_content', 'featured_programs' );
add_action( 'genesis_entry_content', 'monthly_reports' );
add_action( 'genesis_before_sidebar_widget_area', 'quarterly_reports' );

function featured_programs()
{

	$posts = new \AgriLife\BLT\PostList( array('Featured Program', 'Featured Programs') );

  $postslist = $posts->results;

  if ( $postslist && $postslist->have_posts() ) :

  	// Render latest post content
		?><h2>Featured Program - <?php echo $postslist->post->post_title; ?></h2>
<?php

		echo $postslist->post->post_content;

		?><p>&nbsp;</p><?php

    wp_reset_postdata();

  endif;

}

function monthly_reports()
{

	$maxposts = 3;

	$posts = new \AgriLife\BLT\CustomPostList( 'monthly-reports', $maxposts );

  $postslist = $posts->results;

  if ( $postslist && $postslist->have_posts() ) :

  	// Render latest post content
		?><h2><?php echo $postslist->post->post_title; ?></h2>
<?php
		$meta = get_post_meta($postslist->post->ID);
		echo wp_get_attachment_link( $meta['file'][0]);

		// Render other posts
  	?>
		<p>&nbsp;</p>
		<h2>Monthly Updates</h2>
		<ul><?php

    while ( $postslist->have_posts() ) : $postslist->the_post();

    	?>
			<li><a href="<?php echo get_field('file')['url']; ?>"><?php echo the_title(); ?> <span class="pdf icon">(PDF)</span></a></li>
    	<?php

    endwhile;

  	if( $postslist->found_posts > $maxposts ){
	  	?><li><a href="<?php echo $posts->link; ?>">View all reports</a></li><?php
  	}

  	?></ul>
  	<?php

    wp_reset_postdata();

  endif;

}

function quarterly_reports()
{

	$maxposts = 3;

	$posts = new \AgriLife\BLT\CustomPostList( 'quarterly-reports', $maxposts );

  $postslist = $posts->results;

  if ( $postslist && $postslist->have_posts() ) :

		?><section class="widget widget_text"><div class="widget-wrap"><h4 class="widgettitle">Quarterly Reports</h4><div><ul><?php

    while ( $postslist->have_posts() ) : $postslist->the_post();

    	?>
			<li><a href="<?php echo get_field('file')['url']; ?>"><?php echo the_title(); ?> <span class="pdf icon">(PDF)</span></a></li>
    	<?php

    endwhile;

  	if( $postslist->found_posts > $maxposts ){
	  	?><li><a href="<?php echo $posts->catlink; ?>">View all reports</a></li><?php
  	}

  	?></ul>
  	<?php

    wp_reset_postdata();

  	?></div></div></section><?php

  endif;

}

genesis();
