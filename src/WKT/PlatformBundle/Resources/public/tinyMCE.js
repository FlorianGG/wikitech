
function tinymce_button_titre1(ed) {
    ed.focus();
    if (ed.selection.getContent()) {
        ed.selection.setContent("<h3 class='a1'>" + ed.selection.getContent() + "</h3>");
    }else{
        ed.selection.setContent("<h3 class='a1'>&nbsp");
    }
}
function tinymce_button_titre2(ed) {
    ed.focus();
    if (ed.selection.getContent()) {
        ed.selection.setContent("<h4 class='a2'>" + ed.selection.getContent() + "</h4>");
    }else{
        ed.selection.setContent("<h4 class='a2'>&nbsp");
    }
}
function tinymce_button_titreX(ed) {
    ed.focus();
    if (ed.selection.getContent()) {
        ed.selection.setContent("<p>" + ed.selection.getContent() + "</p>");
    }else{
        ed.selection.setContent("<p>&nbsp");
    }
}
function tinymce_button_accolade(ed) {
    ed.focus();
    if (ed.selection.getContent()) {
        ed.selection.setContent("<span class='accolade'>" + ed.selection.getContent() + "</span>");
    }else{
        ed.selection.setContent("<span class='accolade'>&nbsp");
    }
}
function tinymce_button_comment(ed) {
    ed.focus();
    if (ed.selection.getContent()) {
        ed.selection.setContent("<div class='col-xs-12 remarque'><p class='paragrapheTinymce'><span class='remarqueOblique'>|</span> Remarque :</p><p class='paragrapheTinymce'>" + ed.selection.getContent() + "</p></div>");
    }else{
        ed.selection.setContent("<div class='col-xs-12 remarque'><p class='paragrapheTinymce'><span class='remarqueOblique'>|</span> Remarque :</p><p class='paragrapheTinymce'>&nbsp");
    }
}

