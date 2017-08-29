$( document ).ready(function() {
  $('#inputPartReadOnly').hide();
  $('#formGroupPart').hide();
  var $buttonCreatePart =  $('#buttonCreatePart');
  var $formPart = $('#formPart');
  $buttonCreatePart.click(function(){
      $formPart.toggle();
      if ($buttonCreatePart.text() === 'Sélectionner une partie existante') {
        $buttonCreatePart.text('Créer une nouvelle partie');
      }else{
        $buttonCreatePart.text('Sélectionner une partie existante');
      }

      });

  $('#formPart').submit(function(event) {
      event.preventDefault();
      var formData = {
          'title' : $('#partTitle').val(),
          'orderInTraining' : $('#partOrderInTraining').val()
      };
      // appel Ajax
      $.ajax({
          url: $(this).attr('action'), // le nom du controlleur indiqué dans le formulaire
          type: $(this).attr('method'), // la méthode indiquée dans le formulaire (get ou post)
          data: formData,
          success: function(data) { // je récupère la réponse du fichier PHP
             document.location.reload(true);
          }       
          //return false; //
      });
  });
  //Event qui gère de remplir l'attribut value de OrderInPart
  $('#articleOrderInPart div div label input').click(function(event) {
     var $orderInPart = $(this).attr('value');
     var $partValue = $(this).nextAll('input:first').attr('value');
     $('#form_part option[value=' + $partValue + ']').prop('selected', true);
     $('#formGroupPart').show();
     $('#form_part').hide();
     $placeholder = $('#form_part option[value=' + $partValue + ']').text();
     $('#inputPartReadOnly').attr('placeholder', $placeholder);
     $('#inputPartReadOnly').show();
     $('#fieldsetDisabled').prop('disabled', false);
     $('#form_orderInPart').attr('value', $orderInPart);
  });
});
