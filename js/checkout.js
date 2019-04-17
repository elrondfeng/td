jQuery(document).ready(function ($) {
// code goes here when document is ready. use $ for jQuery

    // auto populate value to the gravity form fields.
    /*    jQuery("#input_5_38").val(carport_product.price.init_deposit);
        jQuery("#input_5_38").prop('readonly', true);

        jQuery("#input_5_39").val(carport_product.price.all_price);
        jQuery("#input_5_39").prop('readonly', true);

        jQuery("#input_5_24").val(carport_product.width);
        jQuery("#input_5_24").prop('readonly', true);

        jQuery("#input_5_29").val(carport_product.length);
        jQuery("#input_5_29").prop('readonly', true);

        jQuery("#input_5_28").val(carport_product.height);
        jQuery("#input_5_28").prop('readonly', true);

        jQuery("#input_5_35").html(JSON.stringify(carport_product,undefined,4));
        jQuery("#input_5_35").prop('readonly', true);*/

    // auto populate value to the gravity form fields.

    var carport_product = JSON.parse(sessionStorage.getItem("carport_product"));

    console.log("object is " + JSON.stringify(carport_product));

    jQuery("#input_4_11").val(carport_product.width);
    jQuery("#input_4_11").prop('readonly', true);

    jQuery("#input_4_13").val(carport_product.length);
    jQuery("#input_4_13").prop('readonly', true);

    jQuery("#input_4_12").val(carport_product.height);
    jQuery("#input_4_12").prop('readonly', true);

    jQuery("#input_4_16").val(carport_product.doors.length);
    jQuery("#input_4_16").prop('readonly', true);

    jQuery("#input_4_15").val(carport_product.walk_ins.back + carport_product.walk_ins.front + carport_product.walk_ins.left + carport_product.walk_ins.right);
    jQuery("#input_4_15").prop('readonly', true);

    jQuery("#input_4_14").val(carport_product.windows.front + carport_product.windows.back + carport_product.windows.left + carport_product.windows.right);
    jQuery("#input_4_14").prop('readonly', true);

    jQuery("#input_4_9").val(carport_product.roof_color);
    jQuery("#input_4_9").prop('readonly', true);

    jQuery("#input_4_19").val(carport_product.side_wall_color);
    jQuery("#input_4_19").prop('readonly', true);

    jQuery("#input_4_18").val(carport_product.end_wall_color);
    jQuery("#input_4_18").prop('readonly', true);

    jQuery("#input_4_17").val(carport_product.trim_color);
    jQuery("#input_4_17").prop('readonly', true);

    jQuery("#input_4_23").val(carport_product.price.init_deposit);
    jQuery("#input_4_23").prop('readonly', true);

    jQuery("#input_4_20").val(carport_product.price.all_price);
    jQuery("#input_4_20").prop('readonly', true);

    jQuery("#input_4_24").html(JSON.stringify(carport_product, undefined, 4));
    jQuery("#input_4_24").prop('readonly', true);


});