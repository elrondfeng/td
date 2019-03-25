

function BindColorPickers(){

    // roof
    jQuery(".roof .color.select").on("click", function(){
        jQuery(".roof .color.select").removeClass("selected");
        jQuery(this).addClass("selected");
        var c = jQuery(this).attr("value");

        jQuery("#roof_color").val(c);
        jQuery("#roof_color").change();


    });

    // trim
    jQuery(".trim .color.select").on("click", function(){
        jQuery(".trim .color.select").removeClass("selected");
        jQuery(this).addClass("selected");

        var c = jQuery(this).attr("value");

        jQuery("#trim_color").val(c);
        jQuery("#trim_color").change();
    });


    // side
    jQuery(".side .color.select").on("click", function(){
        jQuery(".side .color.select").removeClass("selected");
        jQuery(this).addClass("selected");

        var c = jQuery(this).attr("value");

        jQuery("#side_color").val(c);
        jQuery("#side_color").change();
    });


    // end
    jQuery(".end .color.select").on("click", function(){
        jQuery(".end .color.select").removeClass("selected");
        jQuery(this).addClass("selected");

        var c = jQuery(this).attr("value");

        jQuery("#end_color").val(c);
        jQuery("#end_color").change();
    });





    // roof type selector
    jQuery(".roof.select").on("click", function(e){
        jQuery(".roof.select").removeClass("selected");
        var o = jQuery(this);
        o.addClass("selected");

        var v = o.attr("value");
        jQuery("#"+v).click();
    });
}