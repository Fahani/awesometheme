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