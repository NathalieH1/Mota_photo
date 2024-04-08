<header>
<nav id="nav_header" role="navigation" aria-label="<?php _e('Menu principal', 'Mota_photo'); ?>">
    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/Photos NMota/Logo.png" alt="Logo NMota" id="logo"></a>
    <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'container'      => false // On retire le conteneur généré par WP
        ]);
    ?>
</nav>
    
</header>
