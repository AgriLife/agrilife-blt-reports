<?php
 /*Template Name: Single Newsletter
 */

get_header(); ?>
<div id="primary">
    <div id="content" role="main">
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
</article>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
