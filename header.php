<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Awesome Theme</title>
        <?php wp_head(); ?>
    </head>

    <?php
        if( is_front_page() ):
            $awesome_classes = array( 'awesome_class', 'my-class' );
        else:
            $awesome_classes = array( 'no-awesome-class' );
        endif;
    ?>

    <body <?php body_class( $awesome_classes ); ?>>
        <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>"
             width="<?php get_custom_header()->width; ?>" alt="" />
