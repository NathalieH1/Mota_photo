<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body >

<header>
    <section class="header">
        <div>
          <a href="<?php echo home_url( '/' ); ?>"><img class="header_logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.png" alt="Logo NMota" id="logo"></a>
        </div>
        <span id="toggle" class="menu-toggle"></span>
             
        <nav id="nav_header" role="navigation" aria-label="<?php _e('Menu principal', 'Mota_photo'); ?>" class="hidden">
            
            <?php
                wp_nav_menu(['theme_location' => 'main-menu']);
            ?>
        </nav>

    </section>

    
</header>
<main>