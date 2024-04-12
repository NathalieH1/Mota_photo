<?php
    get_header();
?>


<?php
            $galerie = new WP_Query([
                'post_type' => 'photo',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 4,
                'paged' => 1, ]
            );
            if ($galerie->have_posts()) {
                while ($galerie->have_posts()) {
                 $galerie->the_post(); ?>   
                <img  src="<?php echo the_post_thumbnail_url(); ?>" />
				<p><?php the_title(); ?></p>
                <p><?php echo strip_tags(get_the_term_list($galerie->ID, 'categorie')); ?></p>
                <?php }
            } else {
                echo '';
            }        ?>




<?php get_footer(); ?>