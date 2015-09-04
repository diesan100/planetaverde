
/**
 * Handle Image Upload
 */
$(function() {
    'use strict';
    
    $('.fileupload').each(function() {

        if ($(this).attr('id') == "profileImageUpload") {
           
            console.log(profileImageUploaderUrl);
            /**
             * Handle Profile Image Upload
             */
            $(this).fileupload({
                dropZone: $(this),
                url: profileImageUploaderUrl,
                dataType: 'json',
                singleFileUploads: true,
                formData: {'CSRF_TOKEN': csrfValue},
                limitMultiFileUploads: 1,
                progressall: function(e, data) {
                    console.log("progress");
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#profile-image-upload-bar .progress-bar').css('width', progress + '%');
                },
                done: function(e, data) {

                    if (data.result.error == true) {
                        handleUploadError(data.result);
                    } else {

                        var d = new Date();
                        $('#profile-img-sidebar').attr('src', data.result.url + "?" +d.getTime());
                        $('#profile-img-dropdown').attr('src', data.result.url + "?" +d.getTime());                        
                        $('#user-profile-image').attr('src', data.result.url + "?" +d.getTime());
                        
                        $('#user-profile-image').addClass('animated bounceIn');
                    }

                    $('#profile-image-upload-loader').hide();
                    $('#profile-image-upload-bar .progress-bar').css('width', '0%');
                    //$('#profile-image-upload-edit-button').show();
                    //$('#deleteLinkPost_modal_profileimagedelete').show();
                }
            }).bind('fileuploadstart', function(e) {
                console.log("fileuploadstart-------------------------------------------------");
                //$('.image-upload-container.image-upload-loader')
        
                $('#profile-image-upload-loader').show();
            }).bind('fileuploadstart', function(e) {
                $('#user-profile-image').removeClass('animated bounceIn');
            })

        } 

    });


})


/**
 * Handle upload errors for profile and banner images
 */
function handleUploadError(json) {

    $('#uploadErrorModal').appendTo(document.body);
    $('#uploadErrorModal .modal-dialog .modal-content .modal-body').html(json.files.errors.image);
    $('#uploadErrorModal').modal('show');

}

function resetProfileImage(jsonResp) {
    json = jQuery.parseJSON(jsonResp);
    $('#'+json.type+'-image-upload-edit-button').hide();
    $('#deleteLinkPost_modal_'+json.type+'imagedelete').hide();
    $('#user-'+json.type+'-image').attr('src', json.defaultUrl);
}

$(document).ready(function() {

    // override standard drag and drop behavior
    $(document).bind('drop dragover', function(e) {
        e.preventDefault();
    });

    // show buttons at image rollover
    $('#projectImageUpload').mouseover(function() {
        $('#profile-image-upload-buttons').show();
    })

    // show buttons also at buttons rollover (better: prevent the mouseleave event)
    $('#profile-image-upload-buttons').mouseover(function() {
        $('#profile-image-upload-buttons').show();
    })

    // hide buttons at image mouse leave
    $('#projectImageUpload').mouseleave(function() {
        $('#profile-image-upload-buttons').hide();
    })


    // show buttons at image rollover
    $('#bannerfileupload, .img-profile-data').mouseover(function() {
        $('#banner-image-upload-buttons').show();
    })

    // show buttons also at buttons rollover (better: prevent the mouseleave event)
    $('#banner-image-upload-buttons').mouseover(function() {
        $('#banner-image-upload-buttons').show();
    })

    // hide buttons at image mouse leave
    $('#bannerfileupload, .img-profile-data').mouseleave(function() {
        $('#banner-image-upload-buttons').hide();
    })
    
    
    $('#upload-image-button').click(function() {
        $('#profileImageUpload input').click();
    })
    

});