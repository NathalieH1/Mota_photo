
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
            <div class="modal-header">
             <div class="image-container">
                <img src="<?php echo get_template_directory_uri(); ?>/Photos NMota/contact_modale_desktop.png" alt="Le mot CONTACT">
             </div>   
            </div>
        <div class="modal-body">
          <div class="form-container">
            <?php
		            $contact_form = do_shortcode('[contact-form-7 id="e5d582f" title="Formulaire de contact 1"]');
		            echo $contact_form;
		        ?>
          </div>
        </div>
    </div>
  </div>
</div>
