$( document ).ready(function() {
	var idUrl = $('#links li span').last().attr('id');
	var url = $('#links li span').last().attr('data-href');
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
	  	    var newLink = '<li id="liWithId' + data['id'] + '" class="list-group-item"><a href="' + data['url'] + '"><i class="' + data['social']
           + '"></i> ' + data['title'] + '</a></li>';
	  	    $('#links').append(newLink);
          $('#wkt_userbundle_link_title').val('');
          $('#wkt_userbundle_link_url').val('');
  	    }       
  	});
  });
});
