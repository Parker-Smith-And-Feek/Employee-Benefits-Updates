<?php
    
    //If I need to register the styles, this is the script for it. 
    // wp_register_style(
    //     'theme_main_css', // CSS handle
    //     get_template_directory() . '/css/main.css' // CSS Source
    // );

    // wp_register_style(
    //     'theme_universal_css', // CSS handle
    //     get_template_directory() . '/css/universal.css' // CSS Source
    // );


    function custom_enqueue_styles(){
        if(!is_admin()){
            // wp_enqueue_style('theme_main_css');
            // wp_enqueue_style('theme_universal_css');
            wp_enqueue_style('theme_main_css', get_template_directory_uri() . '/css/main.css');
            wp_enqueue_style('theme_universal_css', get_template_directory_uri() . '/css/universal.css');
        }
    }
    add_action( 'wp_enqueue_scripts', 'custom_enqueue_styles' );

    

    add_theme_support( 'menus' );


?>