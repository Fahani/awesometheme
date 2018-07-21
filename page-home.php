<?php get_header(); ?>
    <div class="row">

        <div class="col-xs-12">

            <?php
                $lastBlog = new WP_query( 'type=post&posts_per_page=1' );

                if( $lastBlog->have_posts() ): // Check if we have posts before showing them

                    while( $lastBlog->have_posts() ):

                        $lastBlog->the_post();

                        get_template_part( 'content', get_post_format() );

                    endwhile;

                endif;

                wp_reset_postdata();

            ?>

        </div>

        <div class="col-xs-12 col-sm-8">
            <?php
            if( have_posts() ): // Check if we have posts before showing them

                while( have_posts() ):

                    the_post();

                    get_template_part( 'content', get_post_format() );

                endwhile;

            endif;

            // PRINT OTHER 2 POSTS NOT THE FIRST ONE
            $args = array(
                "type"=>"post",
                "posts_per_page"=>2,
                "offset"=>1,
                );
            $lastBlog = new WP_query($args);

            if( $lastBlog->have_posts() ): // Check if we have posts before showing them

                while( $lastBlog->have_posts() ):

                    $lastBlog->the_post();

                    get_template_part( 'content', get_post_format() );

                endwhile;

            endif;

            wp_reset_postdata();

            ?>

            <hr>

            <?php
            // PRINT ONLY TUTORIALS
            $lastBlog = new WP_query( 'type=post&posts_per_page=-1&category_name=tutorials' );

            if( $lastBlog->have_posts() ): // Check if we have posts before showing them

                while( $lastBlog->have_posts() ):

                    $lastBlog->the_post();

                    get_template_part( 'content', get_post_format() );

                endwhile;

            endif;

            wp_reset_postdata();
            ?>
        </div>

        <div class="col-xs-12 col-sm-4">
            <?php get_sidebar(); ?>
        </div>

    </div>

<?php get_footer(); ?>