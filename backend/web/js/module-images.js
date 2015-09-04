$(document).ready(function(){
    adjustSizes();
    $(window).resize(function(){
        adjustSizes();
    });
});

$(window).load(function(){
    console.log("window loaded");
    
    if( $("ul.redactor-toolbar").length > 0 ) {
        
        console.log("redactor tool bar founded");
        $("ul.redactor-toolbar li a").each(function(){
            if($(this).hasClass("re-image")) {
                console.log($(this).attr("href"));
                $(this).unbind("click");
                $(this).click(function(){
                    var textArea = $(this).parent().parent().parent().find("textarea");                    
//                    console.log(textArea.attr("id"));
                    $('#field_img_name').val("textarea:" + textArea.attr("id"));
                    $('#modal-media-selector').modal('show');
                });
            }
         });
    } 
});

$('#modal-media-selector').on('show.bs.modal', function () {
    adjustSizes();
    loadAjaxModal();
});

function loadAjaxModal() {
    //$('#events-loader').html("<img src='" + web_root + "/images/loader.gif'>");
    
    $.ajax({
        method: "POST",
        url: urlLoadModalImages,
        data: { _csrf : csrfParam }
      })
    .done(function(html) {
        $('#loading_modal_div').html(html, function(){
            $('#loading_modal_div').fadeIn('slow');
            
        });
        adjustSizes();
        imagesEvents();

    })
    .fail(function(error) {
        console.log("error:" + error);
    });
}

function adjustSizes() {
    var modal_height = $(window).height() * 0.8;
    var modal_width = $(window).width() * 0.9;
    
    var wrapper_height = modal_height - Math.abs($('.modal-header').height()) - Math.abs($("#myTab2").height()) - Math.abs($(".images_selector_footer").height());
    
    $('.modal .modal-body').css('height', modal_height + "px");
    $('.modal .modal-body').css('max-height', modal_height + "px");
    
    $('#modal-media-selector .modal-dialog').css('width', modal_width + "px");
    $('#modal-media-selector .modal-dialog').css('max-width', modal_width + "px");
    
    $('.images_panel_wrapper').css('height', wrapper_height + "px");
    
    //console.log("$(modal_image_gallery).width()" + $(".modal_image_gallery").width());
    var thumb_widht = (($(".modal_image_gallery").width()-20) / 5) - 14;
    
    $(".clicable").each(function(){
        $(this).width(thumb_widht + "px");
        $(this).height(thumb_widht + "px");
    });
    
}

function imagesEvents() {
    $(".clicable").each(function(){        
        $(this).click(function(e) {
            var _this = $(this);
            _this.addClass("active");
            $(".clicable").each(function(){                
                if(_this.attr("data-id") == $(this).attr("data-id")) {
                    $(this).addClass("active");
                    loadImageData(_this.attr("data-id"));
                } else {
                    $(this).removeClass("active");
                }
            });
        }); 
    });
}

function resetModal() {
    $(".clicable").each(function(){     
        $(this).removeClass("active");
    }); 
    $('.images_panel_right').html("");
}

function getSelectedImg() {
    
    var return_elem = null;
    $(".clicable").each(function(){   
        
        if($(this).hasClass("active")) {
            return_elem = $(this);
            return;
        }
    }); 
    
    return return_elem;
}

function loadImageData(image_id) {
    
    $("#selectImageButton").removeClass("disabled");

    var urlLoadImageData_ = urlLoadImageData.replace("-id-", image_id);

    $.ajax({
        method: "POST",
        url: urlLoadImageData_,
        data: { _csrf : csrfParam }
      })
    .done(function(html) {
        console.log(html);
        $('.images_panel_right').html(html);
    })
    .fail(function(error) {
        console.log("error:" + error);
    });
}


function fileCompleted(response) {
    var response = $.parseJSON(response);
    $("#loading_modal_div .modal_image_gallery li:last").after('<li><div class="gallery-thumbnail small clicable" data-id="'+ response['id'] +'" style="width: 108px; height: 108px;"><img class="" src="'+ response['url'] +'"></div></li>');
    
    var newElement = $("#loading_modal_div .modal_image_gallery li:last").find(".clicable");
    newElement.click(function(e) {
            var _this = $(this);
            _this.addClass("active");
            $(".clicable").each(function(){                
                if(_this.attr("data-id") == $(this).attr("data-id")) {
                    $(this).addClass("active");
                    loadImageData(_this.attr("data-id"));
                } else {
                    $(this).removeClass("active");
                }
            });
        });
    
}

function fileRemoved(file) {
    console.log("removed" + file);
}

function setThisImage() {
    field = $('#field_img_name').val();
    var selectedImg = getSelectedImg();
    var img_id = $(selectedImg).attr("data-id");
    var img_src = $(selectedImg).find("img").attr("src");
    
    //console.log($("#img_"+field));
    //console.log($("#hidden_"+field));
    
    if(field.indexOf("textarea:") > -1 ) {
        var textAreaId = field.substring(9, field.length);
        console.log("textarea id = " + textAreaId);
        var textArea = $("#" + textAreaId);
        //var img_code = '<img src="' + img_src + '" style="width: 200px; height: auto; cursor: pointer;" />';
        var img_code = '<img src="' + img_src + '"/>';
        console.log(img_code);
        textArea.redactor("image.insert", img_code);
        $('#modal-media-selector').modal('hide');
                                                
    } else {
    
        $("#img_"+field).attr("src", img_src);
        $("#hidden_"+field).val(img_id);

        $("#img_"+field).show();    

        $('#modal-media-selector').modal('hide');

        resetModal()

        $("#unset_"+field).show();
    }
    
}

function unsetFile(field) {
    $("#img_"+field).attr("src", "");
    $("#hidden_"+field).val("");
    $("#img_"+field).hide();  
    $("#unset_"+field).hide();
}