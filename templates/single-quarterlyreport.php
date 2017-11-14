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

        $pdflink = '<a href="%s" title="%s">%s</a>';
        $file = get_field('file');
        echo sprintf( $pdflink,
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
