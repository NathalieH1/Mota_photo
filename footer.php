<footer>

<nav>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'footer-menu',
        'container' => false,
    ));
    ?>
</nav>
<?php get_template_part('templates-parts/modale_contact'); ?>

    </footer>
    <?php wp_footer(); ?> 
</body>
</html>