<?php
    get_header();
?>

<section class="hero">
  <h1>Photographe event</h1>
  <?php
        $hero_image = new WP_Query([
            'post_type' => 'photo',
            'tax_query' => [
                [
                    'taxonomy' => 'format',
                    'field' => 'slug',
                    'terms' => 'paysage',
                ],
            ],
            'orderby' => 'rand',
            'posts_per_page' => '1', ]);
        if ($hero_image->have_posts()) {
            while ($hero_image->have_posts()) {
                $hero_image->the_post();
                echo '<img class="hero_image" src="';
                echo the_post_thumbnail_url();
                echo '" />';
            }
        }
        wp_reset_postdata();
    ?>
</section>


<section class="photos">

  <div class="filtres organisation">

    <div class="taxonomie organisation half">
      <form id="categorie" class="taxonomie taxonomie_categorie filtre half">
        <label for="select-categorie">Catégories</label>
        <select id="select-categorie" name="categories_photos">
          <option value="all" hidden></option>
          <option value="all">Toutes les catégories</option>
          <?php displayTaxonomies('categorie'); ?>
        </select>
      </form>
      <form id="format" class="taxonomie taxonomie_format filtre half">
        <label for="select-format">Formats</label>
        <select id="select-format" name="format">
          <option value="all" hidden></option>
          <option value="all">Tous les formats</option>
          <?php displayTaxonomies('format'); ?>
        </select>
      </form>
    </div>

    <div class="tri organisation half">
      <div class="half"></div>
      <form id="ordre" class="taxonomie taxonomie_formats filtre half">
        <label for="select-ordre">Trier par</label>
        <select id="select-ordre" name="ordre">
          <option class="js-ordre-item" value="DESC">Nouveautés</option>
          <option class="js-ordre-item" value="ASC">Les plus anciens</option>
        </select>
      </form>
    </div>

  </div>

  <div class="photo_type organisation">
    <?php
            $photos = new WP_Query([
                'post_type' => 'photo',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 4,
                'paged' => 1, ]
            );
            if ($photos->have_posts()) {
                while ($photos->have_posts()) {
                    include 'Templates-parts/photo_block.php';
                }
            } else {
                echo '';
            }
            wp_reset_postdata();
        ?>
  </div>
  <div class="charger_plus_btn" id="charger_plus">
    <input type="button" style="text-align: center;" value="Charger plus">
    <img id="btn-charger_plus" src="<?php echo get_template_directory_uri(); ?>/Photos NMota/camera_icon.png"
      alt="Icône d'appareil photo" />
  </div>

</section>





<?php get_footer(); ?>