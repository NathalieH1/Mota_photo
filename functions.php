<?php
 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Chargement du fichier css
function enqueue_custom_styles() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . './style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

function mota_photo_enqueue_scripts() {
    // Enqueue le script JavaScript avec URL absolue
    wp_enqueue_script('main-js', get_template_directory_uri() . '/scripts/script.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'mota_photo_enqueue_scripts');



// Mise en place du menu
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'Mota_photo' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );

// Mise en place du footer
function register_footer_menu() {
    register_nav_menu('footer-menu', __('Menu du pied de page', 'Mota_photo'));
}
add_action('after_setup_theme', 'register_footer_menu');


// Inclure le fichier menus.php
require_once get_template_directory() . '/menus.php';


