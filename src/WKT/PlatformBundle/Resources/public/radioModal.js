$( document ).ready(function() {
    $label = $('.modal-body [type="radio"]');
    $label.click(function(e) {
        $label.each(function(index) {
            $(this).parent().css('background-color', '#fff');
        });
        $(this).parent().css('background-color', '#EDEBEB');
    });
    
});
