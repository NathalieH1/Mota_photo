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
    var categorieSelection = ($('#select-categorie').val() == null ) ? 'all' : $('#select-categorie').val();
    var formatSelection = ( $('#select-format').val() == null) ? 'all' : $('#select-format').val();
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

  
/*** Section filtres ***/
  $(document).ready(function() {
    // Lorsqu'une option est sélectionnée
    $('#select-categorie').change(function() {
      // Supprimer la classe "selected" de toutes les options
      $('.js-filter-item').removeClass('selected');
      // Ajouter la classe "selected" à l'option sélectionnée
      $(this).find(':selected').addClass('selected');
    });
  });

  /*** Lightbox ***/
  var lightbox = document.getElementById('lightbox-container');
var btnFermetureLightbox = document.getElementById('lightbox__close');$(document).on('click', '.full-screen', function () {
    var image = $(this).parent().parent().prev();
    var urlImage = image.attr('src');
    $("#lightbox__container_content").empty();
    var creerImage = '<img src="' + urlImage + '" alt="Image agrandie">';
    $('.lightbox__container_content').append(creerImage);
    $("#lightbox__container_content").removeClass("hidden");
    $('.lightbox').css('display', 'block');
  });
  $(document).on('click', '.lightbox__close', function () {
    $('.lightbox').css('display', 'none');
    $("#lightbox__container_content").empty();
  });

  /*** Modal ***/
  var modale = document.getElementById('myModal');
  $('.menu-item-107, .interaction-photo__btn').click(function () {
    $(modale).css('display', 'flex');
});
window.onclick = function (event) {
  if (event.target == modale) {
    $(modale).css('display', 'none');
  }
};
$('.interaction-photo__btn').click(function () {
  var reference = $('#reference-photo').text();
  $('#ref').val(reference);
});

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















