<?php

function university_files() 
{
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), ['jquery'], '3.7', True);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));

     
}

add_action("wp_enqueue_scripts","university_files");



function university_feature(){
    add_theme_support('title-tag');
register_nav_menu( "headerMenu", "Header Menu" );
register_nav_menu( "footerMenu01", "Footer Explore Menu" );
register_nav_menu( "footerMenu02", "Footer Learn Menu" );
}


add_action( 'after_setup_theme', "university_feature");