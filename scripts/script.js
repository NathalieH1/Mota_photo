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
          url: my_ajax_obj.ajax_url,
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
  






