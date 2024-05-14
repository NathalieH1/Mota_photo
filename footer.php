</main>
<?php get_template_part('Templates-parts/modale_contact'); ?>
<?php get_template_part('templates-parts/lightbox'); ?>
<footer class="footer">
    <nav class="footer_nav">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
            ));
        ?>
    </nav>
    
    <?php wp_footer(); ?>
</footer>
</body>
</html>