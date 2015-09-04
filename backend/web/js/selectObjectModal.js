var selectedType = $("#cmspage-type").val();
$(document).ready(function() {
    setButtons();
    
    $('#object-content-selector').on('shown', function() {
        loadObjectAjaxModal();
    });

    $("#edit-content-button").click(function(){
        console.log($("#cmspage-type").val());
        
        var type = $("#cmspage-type").val();
        
        var replacedEditUrl = "";
        
        if(type == "0") {
            replacedEditUrl = editPost.replace("-id-",$("#cmspage-content_id").val());
        } else if(type == "1") {
            replacedEditUrl = editCat.replace("-id-",$("#cmspage-content_id").val());
        } else if(type == "5") {
            replacedEditUrl = editCourse.replace("-id-",$("#cmspage-content_id").val());
        } else if(type == "7") {
            replacedEditUrl = editCollege.replace("-id-",$("#cmspage-content_id").val());
        }
        
        if(replacedEditUrl != "" ) {    
            window.open(
                replacedEditUrl,
                '_blank' // <- This is what makes it open in a new window.
              );
        }
    });
    
    $("#cmspage-type").change(function() {
        if(selectedType != $("#cmspage-type").val()) {
            $("#cmspage-content_id").val("");
            $("#show_object").val("");
            selectedType = $("#cmspage-type").val();
            setButtons();
        }
    });
});



function loadObjectAjaxModal() {
    //$('#events-loader').html("<img src='" + web_root + "/images/loader.gif'>");
    
    var type = $("#cmspage-type").val();
    $.ajax({
        method: "POST",
        url: urlLoadObjectSelector,
        data: { _csrf : csrfParam, type: type }
      })
    .done(function(html) {
        $('#loading_modal_div_1').html(html, function(){
            $('#loading_modal_div_1').fadeIn('slow');
        });
    })
    .fail(function(error) {
        console.log("error:" + error);
    });
}

function selectObject() {
    /*
    console.log("selectObject()");
    console.log($('select[name="MockModel[attribute]"]').val());
    console.log($('select[name="MockModel[attribute]"] option:selected').text());
    */
    
    $("#cmspage-content_id").val($('select[name="MockModel[attribute]"]').val());    
    $("#show_object").val($('select[name="MockModel[attribute]"] option:selected').text());
        
    $('#object-content-selector').modal('hide');
       
    setButtons();
}

function setButtons() {
    if(isEditable() && $("#cmspage-content_id").val()!="") {
        $("#edit-content-button").removeAttr("disabled");                
    } else {
        $("#edit-content-button").attr("disabled", "disabled");
    }

    if(isSelectable()) {
        $("#selec_object_combo").removeAttr("disabled");
    } else {
        $("#selec_object_combo").attr("disabled", "disabled");
    }
}

function isSelectable() {
    var type = $("#cmspage-type").val();
    if(type == "0" || type == "1" || type == "5" || type == "7" || type == "4" ) {
        return true;
    } else {
        return false;
    }
}

function isEditable() {
    var type = $("#cmspage-type").val();
    if(type == "0" || type == "1" || type == "5" || type == "7" ) {
        return true;
    } else {
        return false;
    }
}


/*
$(document).ready(function() {
    
    
    
    $('form#{$model->formName()}').on('beforeSubmit', function(e) {
        var form = $(this);

         if($(form).find('.has-error').length) {
                 return false;
         }

             if($(form).find('#projectwizardtwoform-name').val() == '') {
             $(form).find('#projectwizardtwoform-name').focus();
             return false;
         }

         $.ajax({
                 url: form.attr('action'),
                 type: 'post',
                 data: form.serialize(),
                 dataType: 'json',
                 success: function(data) {
                     console.log('error');
                     if(data.error == false) {
                         tratarRespuestaExito(form, data, '".Yii::getAlias("@web")."');
                     } else {
                         tratarRespuestaError(data.mensaje);
                     }
                 }
         });

     }).on('submit', function(e){
         e.preventDefault();
     });
});
*/


