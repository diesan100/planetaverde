$(document).ready(function() {
    $("#add-menu-item-button").click(function(){
        $("#menu-item-modal-form").modal("show").find("#menu-item-modal-content").load($(this).attr('value'));
    });
    
    $("button.edit-item-ajax").each(function(){
        $(this).click(function(){
            $("#menu-item-modal-form").modal("show").find("#menu-item-modal-content").load($(this).attr('value'));
        });
    });
});


