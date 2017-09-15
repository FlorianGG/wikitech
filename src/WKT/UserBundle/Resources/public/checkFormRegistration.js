$(document).ready(function() {
    $('#fos_user_registration_form_plainPassword_first, #fos_user_registration_form_plainPassword_second').on('keyup', function(e) {
 
     if($('#fos_user_registration_form_plainPassword_first').val() != '' && $('#fos_user_registration_form_plainPassword_second').val() != '' && $('#fos_user_registration_form_plainPassword_first').val() != $('#fos_user_registration_form_plainPassword_second').val())
        {
           $('#passwordStrength').removeClass().addClass('alert alert-danger').html('Les 2 mots de passe ne sont pas identiques');
           $('#password1').removeClass().addClass('form-group has-error');
           $('#password2').removeClass().addClass('form-group has-error');

        return false;
       }
 
        // Must have capital letter, numbers and lowercase letters
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
 
        // Must have either capitals and lowercase letters or lowercase and numbers
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
 
        // Must be at least 6 characters long
        var okRegex = new RegExp("(?=.{6,}).*", "g");
 
        if (okRegex.test($(this).val()) === false) {
            // If ok regex doesn't match the password
               $('#passwordStrength').removeClass().addClass('alert alert-danger').html('Le mot de passe doit faire au moins 6 caractères');
               $('#password1').removeClass().addClass('form-group has-error');

 
        } else if (strongRegex.test($(this).val())) {
            // If reg ex matches strong password
            $('#passwordStrength').removeClass().addClass('alert alert-success').html('Très bon mot de passe!');
            $('#password1').removeClass().addClass('form-group has-success');
            $('#password2').removeClass().addClass('form-group has-success');
        } else if (mediumRegex.test($(this).val())) {
            // If medium password matches the reg ex
            $('#passwordStrength').removeClass().addClass('alert alert-info').html('Rendez votre mot de passe plus sûr avec plus de lettres majuscules, plus de chiffres et de caractères spéciaux!');
            $('#password1').removeClass().addClass('form-group has-info');
            $('#password2').removeClass().addClass('form-group has-info');
        } else {
            // If password is ok 
            $('#passwordStrength').removeClass().addClass('alert alert-info').html('Vote mot de passe fait au moins 6 caractères. Pensez à rajouter des majuscules, chiffres ou caractères speciaux pour renforcer la sécurité 😎');
            $('#password1').removeClass().addClass('form-group has-success');
            $('#password2').removeClass().addClass('form-group has-success');
        }
 
        return true;
    });

  $('#fos_user_registration_form_firstname').on('keyup', function(e) {

  	if($('#fos_user_registration_form_firstname').val().length < 2 || $('#fos_user_registration_form_firstname').val().length > 50){
        	$('#firstname').removeClass().addClass('form-group has-error');
        	$('#helpFirstname').removeClass().addClass('help-block').html('Le prénom doit faire plus de 2 caractères et moins de 50.');

    	}else{
    		$('#firstname').removeClass().addClass('form-group has-success');
    		$('#helpFirstname').removeClass().addClass().html('');
    	}
  });

  $('#fos_user_registration_form_lastname').on('keyup', function(e) {

  	if($('#fos_user_registration_form_lastname').val().length < 2 || $('#fos_user_registration_form_lastname').val().length > 50){
        	$('#lastname').removeClass().addClass('form-group has-error');
        	$('#helpLastname').removeClass().addClass('help-block').html('Le nom doit faire plus de 2 caractères et moins de 50.');

    	}else{
    		$('#lastname').removeClass().addClass('form-group has-success');
    		$('#helpLastname').removeClass().addClass().html('');
    	}
  });

  $('#fos_user_registration_form_email').on('keyup', function(e) {

  	if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#fos_user_registration_form_email').val())){
        $('#email').removeClass().addClass('form-group has-success');
        $('#helpEmail').removeClass().addClass().html('');
    }else{
    		$('#email').removeClass().addClass('form-group has-error');
        $('#helpEmail').removeClass().addClass('help-block').html('L\'adresse email n\'est pas valide');
    }
  });

});
