$( document ).ready(function() {
	$form = $('#fos_user_registration_form').closest('form');
	$pseudo = $('#fos_user_registration_form_username');
	$firstname = $('#fos_user_registration_form_firstname');
	$lastname = $('#fos_user_registration_form_lastname');
    $button = $('#buttonRegister');
	$button.click(function(e) {
		$key = Math.floor(Math.random() * (1000 - 0 +1)) + 0;
		$pseudo.val($firstname.val().toLowerCase()+$lastname.val().toLowerCase()+$key);
	});
});
