<?php get_header(); ?>
    <div class="row">

    <div class="col-xs-12 col-sm-8">
        <?php
        if( have_posts() ): // Check if we have posts before showing them

            while( have_posts() ):

                the_post();
        ?>
                <article id="post-<?php the_ID() ?>" <?php post_class() ?>>
                    <?php the_title('<h1 class="entry-title">', '</h1>') ?>
                    <?php if( has_post_thumbnail() ): ?>
                        <div class="pull-right"><?php the_post_thumbnail( 'thumbnail' ) ?></div>
                    <?php endif;?>
                    <small><?php the_category( ' ' ); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>
                    <?php the_content(); ?>

                    <hr>

                    <?php
                    if(comments_open()):
                        comments_template();
                    else:
                    ?>
                        <h5 class="text-center">Sorry Comments Are closed</h5>
                    <?php
                    endif; ?>

                </article>
        <?php
            endwhile;

        endif;
        ?>

    </div>

    <div class="col-xs-12 col-sm-4">
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>