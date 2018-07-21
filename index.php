<?php get_header(); ?>
<div class="row">

    <div class="col-xs-12 col-sm-8">
        <?php
        if( have_posts() ): // Check if we have posts before showing them

            while( have_posts() ):

                the_post();

                get_template_part( 'content', get_post_format() );

            endwhile;

        endif;
        ?>
    </div>

    <div class="col-xs-12 col-sm-4">
        <?php get_sidebar(); ?>
    </div>

</div>

<?php get_footer(); ?>