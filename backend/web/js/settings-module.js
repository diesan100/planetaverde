jQuery(document).ready(function() {
    
    if($("#settings-param_type").length > 0) {
        updateSettingsFields();

        function updateSettingsFields() {
            var selected  = $("#settings-param_type").find(":selected").val();
            console.log("selected: " + selected);



/**
'0' => 'Boolean', 
'1' => 'Integer', 
'2' => 'Texto simple', 
'3' => 'Texto largo',
 */
            // Boolean
            if(selected == "0") {
                console.log("Boolean");
                $(".field-settings-param_varchar_value").hide();
                $(".field-settings-param_long_value").hide();
                $(".field-settings-param_int_value").show();
            }
            // Integer
            else if (selected == "1") {
                console.log("Integer");
                $(".field-settings-param_varchar_value").hide();
                $(".field-settings-param_long_value").hide();
                $(".field-settings-param_int_value").show();

            }
            // Simple text
            else if (selected == "2") {
                console.log("Simple text");
                $(".field-settings-param_varchar_value").show();
                $(".field-settings-param_long_value").hide();
                $(".field-settings-param_int_value").hide();

            }
            // Long text
            else if (selected == "3") {
                console.log("Long text");
                $(".field-settings-param_varchar_value").hide();
                $(".field-settings-param_long_value").show();
                $(".field-settings-param_int_value").hide();

            }
            else {
                console.log("Unknown type");
            }


        }

        $( "#settings-param_type" ).change(function() {
            updateSettingsFields();
        });

    }
});


