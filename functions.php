<?php

// Create a unique name, so it won't conflict with the code of the wordpress
function awesome_script_enqueue() {

    // Enqueue bootstrap
    wp_enqueue_style( 'bootstap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.1.2', 'all' );

    // Enqueue our style file
    wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all' );

    // Enqueue JQuery. It'll be in the header because WP needs it
    wp_enqueue_script( 'jquery' );

    // Enqueue bootstrap
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.1.2', true /*true for footer*/ );

    // Enqueue our JavaScript file
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true /*true for footer*/ );
}

// Connection WP execution process with our function
add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue' );

function awesome_theme_setup() {
    // Adding menu support in our theme. It has a 10 pre-made support features
    add_theme_support( 'menus' );

    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'post-formats', array( 'aside', 'image', 'video' ) );// 9 post formats

    // Enable html5 in the search form
    add_theme_support( 'html5', array("search-form") );

    // The display locations for our menus
    register_nav_menu( 'primary', 'Primary Header Navigation');
    register_nav_menu( 'secondary', 'Footer Navigation');
}

// This hook will be triggered after the theme is initialized
add_action( 'init', 'awesome_theme_setup' );

// Sidebar function

function awesome_widget_setup() {
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar-1',
            'class' => 'custom', // WP will append sidebar- before the class. This is for the admin part
            'description' => 'Standard sidebar',
            // Next we have the front end
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h1 class="widget-title">',
            'after_title' => '</h1>',
        )
    );
}

// When the widget are initialized
add_action( 'widgets_init', 'awesome_widget_setup' );

/* INCLUDE WALKER CLASS */

require get_template_directory() . '/inc/walker.php';