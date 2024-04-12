<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>
<header>

<nav id="nav_header" role="navigation" aria-label="<?php _e('Menu principal', 'Mota_photo'); ?>">
    <a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/Photos NMota/Logo.png" alt="Logo NMota" id="logo"></a>
    <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'container'      => false, // On retire le conteneur généré par WP
            'walker'         => new A11y_Walker_Nav_Menu()
        ]);
    ?>
</nav>
    
</header>
