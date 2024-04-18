</main>
<footer class="footer">
    <nav class="footer_nav">
        <?php
            wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container' => false,
            ));
        ?>
        <ul>
            <li>Tous droits réservés</li>
        </ul>
    </nav>
    <?php get_template_part('Templates-parts/modale_contact'); ?>
    <?php wp_footer(); ?>
</footer>
</body>
</html>