/*
import $ from 'jquery';

class CustomProduct{
    //1. describe and create/initiate the object
    constructor(){
        this.startCustomizeButton = $("#startCustomizeButton");
    }

    //2. events

    events(){
        this.startCustomizeButton.on("click", this.startCustomizing.bind(this));
    }

    //2. methods ( function, action ... )

    startCustomizing(){
        alert("started");
    }
}

export default CustomProduct;*/

jQuery(document).ready(function($){
// code goes here when document is ready. use $ for jQuery

    jQuery( "#tabs" ).tabs();
    // start
    $("#startCustomizeButton").click(function () {
        $("#tabs").tabs({active: 1});
    });
    //roof
    $("#roof-prev").click(function () {
        $("#tabs").tabs({active: 0});
    });
    $("#roof-next").click(function () {
        $("#tabs").tabs({active: 2});
    });

    //size
    $("#size-prev").click(function () {
        $("#tabs").tabs({active: 1});
    });
    $("#size-next").click(function () {
        $("#tabs").tabs({active: 3});
    });


    //walls
    $("#walls-prev").click(function () {
        $("#tabs").tabs({active: 2});
    });
    $("#walls-next").click(function () {
        $("#tabs").tabs({active: 4});
    });

    //doors
    $("#doors-prev").click(function () {
        $("#tabs").tabs({active: 3});
    });
    $("#doors-next").click(function () {
        $("#tabs").tabs({active: 5});
    });

    //options
    $("#options-prev").click(function () {
        $("#tabs").tabs({active: 4});
    });
    $("#options-next").click(function () {
        $("#tabs").tabs({active: 6});
    });

    // object
    var custom_product = {
        zip : "00000",
        width : 12,
        length : 21,
        height : 5,
        garage_door : 0,
        walk_in_door : 0,
        window : 0,
        price : {
          all_price:995.00,
          init_deposit:119.40
        }
    };

    function initProductValues(){
        $('#width').html(custom_product.width);
        $('#length').html(custom_product.length);
        $('#height').html(custom_product.height);
        $('#total-price').html(custom_product.price.all_price);
        $('#today-deposit').html(custom_product.price.init_deposit);
    }

    initProductValues();

    function submitZipcode(){
        console.log(ajaxurl);
        jQuery.ajax({
            type: "get",
            dataType: "json",
            url: ajaxurl,
            data:{
                'action': 'checkzip',
                'zipcode' : $('#zip').val()
            },
            success: function(result){
                console.log(JSON.stringify(result));

                // 1. if valid, close the dialog. display it on teh start page
                // 2. if not valid, do nothing
                if(result.valid) {
                    $("#dialog-zipcode").dialog('close');
                    $("#client-zipcode").html(result.zip);
                } else {
                    ;
                }
            }
        });
    }

    $( "#dialog-zipcode" ).dialog({
        modal: true,
        draggable: true,
        resizable: false,
        closeOnEscape : false,
        buttons : [{
            text  : 'SUBMIT',
            click : submitZipcode,
            class : 'submitZipcode-button-class'
        }]
    });



});

