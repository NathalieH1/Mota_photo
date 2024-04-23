(function ($) {
    'use strict';
  
  let pageActuelle = 1;
  
  $('#btn-charger_plus').on('click', function () {
      pageActuelle++;
      ajaxRequest(true);
  });
  
  $(document).on('change', '.taxonomie', function (e) {
      e.preventDefault();
      pageActuelle = 1;
      ajaxRequest(false);
  });
  
     
  function ajaxRequest(chargerPlus) {
      var categorieSelection = $('#select-categorie').val();
      var formatSelection = $('#select-format').val();
      var ordre = $('#select-ordre').val();
  
      $.ajax({
          type: 'POST',
          url: "http://localhost/Nathalie_Mota/wp-admin/admin-ajax.php",
          dataType: 'html',
          data: {
              action: 'filter',
              categorieTaxonomie: 'categorie',
              categorieSelection: categorieSelection,
              formatTaxonomie: 'format',
              formatSelection: formatSelection,
              orderDirection: ordre,
              page: pageActuelle,
          },
          success: function (resultat) {
              if (chargerPlus) {
                  $('.photo_type').append(resultat);
              } else {
                  $('.photo_type').html(resultat);
              }
  
              if (categorieSelection === 'Mariage' && pageActuelle >= 3) {
                  $('#charger_plus_btn').attr('style', 'display: none;');
              } else if (pageActuelle === 5) {
                  $('#charger_plus_btn').attr('style', 'display: none;');
              } else if (
                  (categorieSelection === 'Concert' || categorieSelection === 'Reception' 
                  || categorieSelection === 'Television') && pageActuelle === 1) {
                  $('#charger_plus_btn').attr('style', 'display: none;');
              } else {
                  $('#charger_plus_btn').attr('style', 'display: block;');
              }
          },
          error: function (result) {
              console.warn(result);
          },
      });
  }
  
  navigationPhotos($('.arrow-gauche'), $('.previous-image'));
  navigationPhotos($('.arrow-droite'), $('.next-image'));
  
    function navigationPhotos(arrow, image) {
      arrow.hover(
        function () {
          image.css('opacity', '1');
        },
        function () {
          image.css('opacity', '0');
        }
      );
    }
  
  
  })(jQuery);  
  
  /*** Menu Burger ***/
  document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggle');
    const navMenu = document.getElementById('nav_header');

    toggleButton.addEventListener('click', function() {
        navMenu.classList.toggle('visible'); // Ajoute ou supprime la classe 'visible' au menu de navigation
    });
});















