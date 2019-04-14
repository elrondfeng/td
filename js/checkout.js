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

    jQuery("#input_5_31").val(carport_product.price.init_deposit);
    jQuery("#input_5_31").prop('readonly', true);

    jQuery("#input_5_30").val(carport_product.price.all_price);
    jQuery("#input_5_30").prop('readonly', true);

    jQuery("#input_5_18").val(carport_product.width);
    jQuery("#input_5_18").prop('readonly', true);

    jQuery("#input_5_19").val(carport_product.length);
    jQuery("#input_5_19").prop('readonly', true);

    jQuery("#input_5_20").val(carport_product.height);
    jQuery("#input_5_20").prop('readonly', true);

    jQuery("#input_5_21").val(carport_product.doors.length);
    jQuery("#input_5_21").prop('readonly', true);

    jQuery("#input_5_23").val(carport_product.walk_ins.back + carport_product.walk_ins.front + carport_product.walk_ins.left + carport_product.walk_ins.right);
    jQuery("#input_5_23").prop('readonly', true);

    jQuery("#input_5_22").val(carport_product.windows.front + carport_product.windows.back + carport_product.windows.left + carport_product.windows.right);
    jQuery("#input_5_22").prop('readonly', true);

    jQuery("#input_5_25").val(carport_product.roof_color);
    jQuery("#input_5_25").prop('readonly', true);

    jQuery("#input_5_24").val(carport_product.side_wall_color);
    jQuery("#input_5_24").prop('readonly', true);

    jQuery("#input_5_27").val(carport_product.end_wall_color);
    jQuery("#input_5_27").prop('readonly', true);

    jQuery("#input_5_26").val(carport_product.trim_color);
    jQuery("#input_5_26").prop('readonly', true);

    jQuery("#input_5_32").html(JSON.stringify(carport_product, undefined, 4));
    jQuery("#input_5_32").prop('readonly', true);


});