<?php

//add_action('wp_enqueue_scripts', 'Mota_photo_enqueue_styles');
//function Mota_photo_enqueue_styles() {
    // Enregistrez votre feuille de style en tant que dépendance d'une feuille de style hypothétique
    //wp_enqueue_style('Nathalie_Mota', get_template_directory_uri() . '/style.css', array(), false, 'all');
//}
function enqueue_custom_styles() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . './style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');



add_action('wp_enqueue_scripts', 'enqueue_normalize_css');
function enqueue_normalize_css() {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');
function enqueue_styles() {
    // Enregistrement de Normalize.css avec une dépendance
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');
    
    // Enregistrement de votre fichier style.css avec Normalize.css comme dépendance
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('normalize'));
}


function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'Mota_photo' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

// Inclure le fichier menus.php
require_once get_template_directory() . '/menus.php';
