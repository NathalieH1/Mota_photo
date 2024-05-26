<?php
 

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

// Chargement du fichier css
function enqueue_custom_styles() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

function mota_photo_enqueue_scripts() {
    // Enqueue le script JavaScript avec URL absolue
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '', true);
    wp_localize_script('main-js', 'my_ajax_obj', ['ajax_url' => admin_url('admin-ajax.php')]);
}
add_action('wp_enqueue_scripts', 'mota_photo_enqueue_scripts');



// Mise en place du menu
function register_my_menu() {
    register_nav_menu( 'main-menu', __( 'Menu principal', 'Mota_photo' ) );
}
add_action( 'after_setup_theme', 'register_my_menu' );


// Inclure le fichier menus.php
require_once get_template_directory() . '/menus.php';

function displayTaxonomies($nomTaxonomie)
{
    if ($terms = get_terms([
        'taxonomy' => $nomTaxonomie,
        'orderby' => 'name',
    ])) {
        foreach ($terms as $term) {
            echo '<option class="js-filter-item" value="'.$term->slug.'">'.$term->name.'</option>';
        }
    }
}

function filter()
{
    $photos = new WP_Query([
        'post_type' => 'photo',
        'orderby' => 'date',
        'order' => $_POST['orderDirection'],
        'posts_per_page' => 8,
        'paged' => $_POST['page'],
        'tax_query' => [
                'relation' => 'AND',
                $_POST['categorieSelection'] != 'all' ?
                    [
                        'taxonomy' => $_POST['categorieTaxonomie'],
                        'field' => 'slug',
                        'terms' => $_POST['categorieSelection'],
                    ]
                : '',
                $_POST['formatSelection'] != 'all' ?
                    [
                        'taxonomy' => $_POST['formatTaxonomie'],
                        'field' => 'slug',
                        'terms' => $_POST['formatSelection'],
                    ]
                : '',
            ],
        ]
    );
    if ($photos->have_posts()) {
        while ($photos->have_posts()) {
            include 'templates-parts/photo_block.php';
        }
    } else {
        echo '';
    }
    wp_reset_postdata();
    exit();
}
add_action('wp_ajax_nopriv_filter', 'filter');
add_action('wp_ajax_filter', 'filter');



