$( document ).ready(function() {
	$alertVideo = $('#alertVideo');
	$url = $('#wkt_platformbundle_articlemodified_video_url');
	$author = $('#wkt_platformbundle_articlemodified_video_author');
	$buttonForModal = $('#buttonForModal');

	//fonction qui va permettre de verifier avant l'ouverture de la modale
	//si le champ video a été ignoré ou rempli correctement
	//sinon on empêche lo'uverture de la modale et on affiche une erreur
	$('#myModal').on('show.bs.modal', function (e) {
		$alertVideo.hide();
  		if ($author.val() == '' && $url.val() == '') {
  			return;
  		}else if (!($author.val() == '') && $url.val() == '') {
  			$alertVideo.show();
  			return e.preventDefault(); // stops modal from being shown
  		}else if ($author.val() == '' && !($url.val() == '')) {
  			$alertVideo.show();
  			return e.preventDefault(); // stops modal from being shown
  		}  
	})
})
