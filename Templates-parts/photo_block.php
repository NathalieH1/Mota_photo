<?php $photos->the_post(); ?>
  <div class="half">
      <div class="post_photo">
          <img class="img-photo" src="<?php echo the_post_thumbnail_url(); ?>" />
          <div>
              <div class="photo-hover">
                  <img class="full-screen" src="<?php echo get_template_directory_uri(); ?>/Photos NMota/fullscreen.png" alt="Icône de plein écran" />
                  <a href="<?php echo get_post_permalink(); ?>">
                      <img class="oeil" src="<?php echo get_template_directory_uri(); ?>/Photos NMota/eye_icon.png" alt="Icône en fome d'oeil" />
                  </a>
                  <div class="photo-infos">
                      <p><?php the_title(); ?></p>
                      <p><?php echo strip_tags(get_the_term_list($photos->ID, 'categorie')); ?></p>
                  </div>
              </div>
          </div>
      </div>
  </div> 