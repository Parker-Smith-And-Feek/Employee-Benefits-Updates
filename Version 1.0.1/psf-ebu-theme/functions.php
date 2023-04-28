<?php
   
    function custom_enqueue_files(){
        if(!is_admin()){
            // Custom Styles
            wp_enqueue_style('theme_universal_css', get_template_directory_uri() . '/css/universal.css');
            wp_enqueue_style('theme_main_css', get_template_directory_uri() . '/css/main.css');
            wp_enqueue_style('font_awesome', "https://use.fontawesome.com/releases/v6.2.0/css/all.css", array(), null);

            //Google Web Fonts
            wp_enqueue_style('theme_open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,latin-ext,cyrillic-ext');
            wp_enqueue_style('theme_oswald', 'https://fonts.googleapis.com/css?family=Oswald:400,300,700&amp;subset=latin,latin-ext');
            wp_enqueue_style('theme_package_one', 'https://use.typekit.net/wqc1exl.css');
            wp_enqueue_style('theme_package_two', 'https://use.typekit.net/nmx7vrk.css');

            
            //Add jQuery to the page
            wp_enqueue_script('theme_jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js');
            //Custom Scripts
            wp_enqueue_script('theme_js', get_template_directory_uri() . '/includes/js/script.js');


        }
    }
    add_action( 'wp_enqueue_scripts', 'custom_enqueue_files' );

    

    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    //Remove content adding paragraph tags automatically 
    // remove_filter ('the_content', 'wpautop');
    // remove_filter ('the_content', 'shortcode_unautop' );

    include('custom-shortcode.php');



?>