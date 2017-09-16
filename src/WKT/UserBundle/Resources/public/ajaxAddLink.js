$( document ).ready(function() {
	var idUrl = $('#links p span').last().attr('id');
	var url = $('#links p span').last().attr('data-href');
	var $linkForm =  $('#linkForm');
  var lastLink = '';
	$linkForm.submit(function(e){
  		e.preventDefault();
  		var formData = {
  		  'social' : $('#wkt_userbundle_link_social').val(),
  	    'title' : $('#wkt_userbundle_link_title').val(),
  	    'url' : $('#wkt_userbundle_link_url').val()
  		};
  	// appel Ajax
  	$.ajax({
  	    url: $(this).attr('action'), // le nom du controlleur indiqué dans le formulaire
  	    type: $(this).attr('method'), // la méthode indiquée dans le formulaire (get ou post)
  	    data: formData,
  	    success: function(data) { // je récupère la réponse du fichier PHP
          var lastLink = '#' + data['id'];
	  	    var newLink = '<p id="liWithId' + data['id'] + '"><a href="' + data['url'] + '"><i class=" logoLink ' + data['social']
           + '"></i> ' + data['name'] + ' : ' + data['title'] + '</a></p>';
	  	    $('#links').append(newLink);
          $('#noLink').remove();
          $('#wkt_userbundle_link_title').val('');
          $('#wkt_userbundle_link_url').val('');
  	    }       
  	});
  });
});
