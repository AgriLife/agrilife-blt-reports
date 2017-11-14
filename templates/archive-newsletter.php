<?php
/**
 * The Template for displaying all people single posts
 */


get_header(); ?>

<div class="content-sidebar-wrap">
	<main class="content">
		<h1 class="entry-title"><a href="<?php echo get_post_type_archive_link( 'newsletters' ); ?>">Monthly Updates Archive</a></h1>
		<?php

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(
			'posts_per_page' => 12,
		  'paged' => $paged,
			'post_type' => 'newsletters',
			'post_status' => 'publish',
			'order' => 'DESC',
			'orderby' => 'date'
		);

	  $results = new WP_Query( $args );

		if ( $results->have_posts() ) :

			while ( $results->have_posts() ) : $results->the_post();

        ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1>
            <?php the_title(); ?>
        </h1>
    </header>

    <!-- Display movie review contents -->
    <div class="entry-content"><?php

				if(get_field('file')){

	        $link = '<a href="%s"%s>%s</a>';
	        $file = get_field('file');

          if(!empty($file['title'])){
						$file['title'] = ' title="' . $file['title'] . '"';
	        }

	        echo sprintf( $link,
	            $file['url'],
	            $file['title'],
	            $file['filename']
	        );

				} else {

          echo 'No file available.';

				}

    ?></div>
</article><?php

			endwhile;

			wp_reset_postdata();

			endif;

		?>
        <div class="clearfix"></div>
				<div class="pagination">
				<?php
					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $results->max_num_pages
					) );
				?>
				</div>

	</main><!-- #content -->

</div><!-- #wrap -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

