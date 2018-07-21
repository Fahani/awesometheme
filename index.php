<?php get_header(); ?>
<?php
    if( have_posts() ): // Check if we have posts before showing them

        while( have_posts() ):

            the_post();
?>
            <h3><?php the_title(); ?></h3>
            <small>Posted on: <?php the_time( 'F j, Y' ); ?> at <?php the_time( 'g:i a' ); ?>, in <?php the_category(); ?></small>
            <p><?php the_content(); ?></p>
            <hr>
<?php
        endwhile;

    endif;
?>
<?php get_footer(); ?>