<?php get_header(); ?>
    <div class="row">

        <div class="col-xs-12">

            <div id="awesome-carousel" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner" role="listbox">

                    <?php

                    $args_cat = array( 'include' => '1, 23, 24' );

                    $categories = get_categories($args_cat);

                    $count = 0;
                    $bullet = "";
                    foreach ($categories as $category):

                        $args = array(
                            "type" => "post",
                            "posts_per_page" => 1,
                            'category__in' => $category->term_id,
                        );
                        $lastBlog = new WP_query( $args );

                        if( $lastBlog->have_posts() ): // Check if we have posts before showing them


                            while( $lastBlog->have_posts() ):

                                $lastBlog->the_post();
                                ?>

                                <div class="item <?php if( $count === 0 ): echo "active"; endif; ?>">
                                    <?php the_post_thumbnail( 'full' ); ?>
                                    <div class="carousel-caption">
                                        <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() )), '</a></h1>' ); ?>

                                        <small><?php the_category(' '); ?></small>
                                    </div>
                                </div>

                                <?php $bullets .= '<li data-target="#awesome-carousel" data-slide-to="'.$count.'" class="'. ($count === 0 ? "active" : '').'"></li>'; ?>

                            <?php endwhile; ?>
                        <?php
                        endif;
                        wp_reset_postdata();
                        ?>


                    <?php
                        $count++;
                    endforeach; ?>


                </div>

                <ol class="carousel-indicators">
                    <?php echo $bullets; ?>
                </ol>
                <!-- Controls -->
                <a class="left carousel-control" href="#awesome-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#awesome-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>
    <div class="row ">

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