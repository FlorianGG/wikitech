$( document ).ready(function() {
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
            $part = $.parseJSON(data);
             $('#addArticleSummary').hide();
             $formPart.hide();
             $('#fieldsetDisabled').prop('disabled', false);
             $('#alertAddPart').show();
             $('#inputPartReadOnly').show();
             $('#inputPartReadOnly').attr('placeholder', $part.title);
             $('#form_part').append($('<option>', {
                 value: $part.id,
                 text: $part.title,
                 selected: 'selected'
                 
             }));
             $('#form_orderInPart').attr('value', 1);
          }       
      });
  });
  //Event qui gère de remplir l'attribut value de OrderInPart
  $('#articleOrderInPart div div label input').click(function(event) {
     var $orderInPart = $(this).attr('value');
     var $partValue = $(this).nextAll('input:first').attr('value');
     $('#form_part option[value=' + $partValue + ']').prop('selected', true);
     $('#formGroupPart').show();
     $placeholder = $('#form_part option[value=' + $partValue + ']').text();
     $('#inputPartReadOnly').attr('placeholder', $placeholder);
     $('#fieldsetDisabled').prop('disabled', false);
     $('#form_orderInPart').attr('value', $orderInPart);
  });
});
