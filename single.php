<?php
/*
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

  get_header();?>

<!-- Section de la page dédiée à l'affichage des détails d'une photo unique -->
 <div class="single-page">

   <section class="single-photo organisation">
	 <div class="single-description half">
	   <h1><?php the_title() ?></h1>
	   <p>Référence : <span id="reference-photo"><?php echo get_field('reference'); ?></span></p>
	   <p>Catégorie : <?php echo strip_tags(get_the_term_list($post->ID, 'categorie')); ?></p>
	   <p>Format : <?php echo strip_tags(get_the_term_list($post->ID, 'format')); ?></p>
	   <p>Type : <?php echo get_field('type'); ?></p>
	   <p>Année : <?php echo get_the_date('Y'); ?></p>
	 </div>
	 <img class="single-image half" src="<?php the_post_thumbnail_url(); ?>">
   </section>

 <!-- Ouverture de la popup de contact -->
   <section class="interaction-photo organisation">
	 <div>
	   <p class="texte">Cette photo vous intéresse ?</p>
	   <input class="interaction-photo__btn bouton btn-modale" type="button" value="Contact">
	 </div>

	<!-- Navigation entre les photos et affichage des photos en miniature --> 
	 <div class="interaction-photo__navigation">
	   <?php
					 $prevPost = get_previous_post();
					 $nextPost = get_next_post();
				 ?>
	   <div class="arrows">
		 <?php if (!empty($prevPost)) {
						 $prevThumbnail = get_the_post_thumbnail_url( $prevPost->ID );
						 $prevLink = get_permalink($prevPost); ?>
		 <a href="<?php echo $prevLink; ?>">
		   <img class="arrow arrow-gauche" src="<?php echo get_template_directory_uri(); ?>/Photos NMota/arrow_left.png"
			 alt="Flèche pointant vers la gauche" />
		 </a>
		 <?php } else { ?>
		 <img style="opacity:0; cursor: auto;" class="arrow "
		   src="<?php echo get_template_directory_uri(); ?>/Photos NMota/arrow_left.png" />
		 <?php } if (!empty($nextPost)) {
						 $nextThumbnail = get_the_post_thumbnail_url( $nextPost->ID );
						 $nextLink = get_permalink($nextPost); ?>
		 <a href="<?php echo $nextLink; ?>">
		   <img class="arrow arrow-droite"
			 src="<?php echo get_template_directory_uri(); ?>/Photos NMota/arrow_right.png"
			 alt="Flèche pointant vers la droite" />
		 </a>
		 <?php } ?>
	   </div>
	   <div class="preview">
		 <img class="previous-image" src="<?php echo $prevThumbnail; ?>" alt="Prévisualisation image précédente">
	   </div>
	   <div class="preview">
		 <img class="next-image" src="<?php echo $nextThumbnail; ?>" alt="Prévisualisation image suivante">
	   </div>
	 </div>
   </section>
 
   <!-- Section liste des photos apparentées -->
   <section class="recommandations">
	 <h2>Vous aimerez aussi</h2>
	 <div class="recommandations__images organisation">
	   <?php
				 $categorie = strip_tags(get_the_term_list($post->ID, 'categorie'));
				 $photos = new WP_Query(array (
					 'post_type' => 'photo',
					 'post__not_in' => array($post->ID),
					 'tax_query' => array(
						 array(
							 'taxonomy' => 'categorie',
							 'field' => 'slug',
							 'terms' => $categorie,
						 ),
					 ),
					 'orderby' => 'rand',
					 'posts_per_page' => '2'));
 
				 $numberOfSimilarPictures = $photos->post_count;
				 if ($numberOfSimilarPictures > 0) {
					 if ($photos->have_posts()) {
						 while ($photos->have_posts()) {
							 include 'Templates-parts/photo_block.php';
						 }
					 } else {
						 echo '';
					 }
					 wp_reset_postdata();
					 
				 }
				 else {
					 echo '<p class="texte">Il n\'y a pas encore d\'autres photos à afficher dans cette catégorie.</p>';
				 }
				 
			 ?>
 
	 </div>
	 <button class="recommandations__btn bouton" onclick="window.location.href='<?php echo site_url() ?>'">
	   Toutes les photos
	 </button>
 
   </section>
 
 </div>
 
 <?php get_footer(); ?>
