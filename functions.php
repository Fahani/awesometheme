<?php

// Create a unique name, so it won't conflict with the code of the wordpress
function awesome_script_enqueue() {

    // Enqueue our style file
    wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/awesome.css', array(), '1.0.0', 'all' );

    // Enqueue our JavaScript file
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/awesome.js', array(), '1.0.0', true /*true for footer*/ );

}

// Connection WP execution process with our function
add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue' );

function awesome_theme_setup() {
    // Adding menu support in our theme
    add_theme_support( 'menus' );

    // The display locations for our menus
    register_nav_menu( 'primary', 'Primary Header Navigation');
    register_nav_menu( 'secondary', 'Footer Navigation');
}

// This hook will be triggered after the theme is initialized
add_action( 'init', 'awesome_theme_setup' );