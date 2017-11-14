<?php
 /*Template Name: New Template
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

        $source = get_field('source');
        $link = '<a href="%s"%s>%s</a>';
        $file = array();

        if($source == 'URL' && !empty(get_field('url'))){

            $file['url'] = get_field('url');
            $file['title'] = '';

            // Get file name from URL
            preg_match('/[^\/]+$/', $file['url'], $matches);
            if(count($matches) > 0){
                $file['filename'] = $matches[0];
            }

        } else if($source == 'File' && !empty(get_field('file')['url'])){

            $file = get_field('file');

            if(!empty($file['title'])){
                $file['title'] = ' title="' . $file['title'] . '"';
            }

        }

        echo sprintf( $link,
            $file['url'],
            $file['title'],
            $file['filename']
        );

    ?></div>
</article>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
