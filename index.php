<?php get_header(); ?>
<?php
    if( have_posts() ): // Check if we have posts before showing them

        while( have_posts() ):

            the_post();

            get_template_part( 'content', get_post_format() );

        endwhile;

    endif;
?>
<?php get_footer(); ?>