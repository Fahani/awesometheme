<?php get_header(); ?>
    <div class="row">

    <div class="col-xs-12 col-sm-8">
        <?php if( have_posts() ): ?> // Check if we have posts before showing them

            <?php while( have_posts() ): ?>

                <?php the_post(); ?>

                <article id="post-<?php the_ID() ?>" <?php post_class() ?>>
                    <?php the_title('<h1 class="entry-title">', '</h1>') ?>
                    <?php if( has_post_thumbnail() ): ?>
                        <div class="pull-right"><?php the_post_thumbnail( 'thumbnail' ) ?></div>
                    <?php endif;?>
                    <small><?php echo awesome_get_terms($post->ID, 'field'); ?> || <?php echo awesome_get_terms($post->ID, 'software'); ?>
                        <?php
                            if( current_user_can( 'manage_options' ) )
                            {
                                echo ' || ';
                                edit_post_link();
                            }
                        ?>
                    </small>
                    <?php the_content(); ?>

                    <hr>
                    <div class="row">
                        <div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
                        <div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
                    </div>

                </article>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>

    <div class="col-xs-12 col-sm-4">
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>