</main>
<?php get_template_part('templates-parts/modale_contact'); ?>
<?php get_template_part('templates-parts/lightbox'); ?>
<footer class="footer">
    <nav class="footer_nav">
    <div class="footer-links">
            <a class="lien-footer" href="<?php echo esc_url( home_url( '/mentions-legales/' ) ); ?>">Mentions légales</a>
            <a id="lien-footer2" class="lien-footer" href="<?php echo esc_url( home_url( '/politique-de-confidentialite/' ) ); ?>">Vie privée</a>
            <a id="mention-texte">TOUS DROITS RÉSERVÉS</a>
        
</div>
       
    </nav>
    
    <?php wp_footer(); ?>


</footer>
</body>
</html>