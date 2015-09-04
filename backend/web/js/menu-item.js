updateFields();
    
function updateFields() {
    var selected  = $("#cmsmenuitem-type").find(":selected").val();
    //console.log("selected: " + selected);

    // Internal page
    if(selected == "0") {
        console.log("internal page TYPE");
       $(".field-cmsmenuitem-url").hide();
       //$(".field-cmsmenuitem-reffered_entity").hide();
       $(".field-cmsmenuitem-page").show();
    }
    // URL
    else if (selected == "1") {
        console.log("url TYPE");
        $(".field-cmsmenuitem-page").hide();
        //$(".field-cmsmenuitem-reffered_entity").hide();
         $(".field-cmsmenuitem-url").show();
    } 
    else if (selected == "3" || selected == "5") {
        console.log("colleges / courses");
        $(".field-cmsmenuitem-page").hide();
         $(".field-cmsmenuitem-url").hide();
         //$(".field-cmsmenuitem-reffered_entity").show();
    }
    else {
        $(".field-cmsmenuitem-page").hide();
         $(".field-cmsmenuitem-url").hide();
         //$(".field-cmsmenuitem-reffered_entity").hide();
    }

}

$( "#cmsmenuitem-type" ).change(function() {
    updateFields();
});