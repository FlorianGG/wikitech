$( document ).ready(function() {
	var butonResetField = $('.butonResetField');
	butonResetField.click(function(event) {
		$(this).next().val('');
	});
	var addLink = $('#addLink');
	var linkForm = $('#linkForm');

	addLink.click(function(event) {
		linkForm.toggle();
	});

	var trashlink = $('.trash-link');
	trashlink.show();
	trashlink.click(function(event) {
		var url = $(this).attr('data-href');
		var id = $(this).attr('id');
		var targetLi = '#liWithId'+id;

		$.ajax({
			url: url,
			method: "post",
			data: { id: $(this).attr('id')},
			success: function(data){
				$(targetLi).remove();
			}
		});

	});
});
