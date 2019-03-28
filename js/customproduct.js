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
        zip : 0,
        tax :0,
        county : '',
        width : 10,
        length : 10,
        height : 6,
        roof_style : '',
        roof_color : '',
        trim_color : '',
        garage_door : 0,
        walk_in_door : 0,
        window : 0,
        price : {
          all_price:995.00,
          init_deposit:119.40
        }
    };

    // init product
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
                    $("#client-county").html(result.county);
                    $("#client-zipcode").html(result.zip);
                    custom_product.zip = result.zip;
                    custom_product.county = result.county;
                    custom_product.tax = result.tax;
                } else {
                    ;
                }
            }
        });
    }

    function openDialog(){
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
    }

    openDialog();

    $(".change-zip-button").click(openDialog);

    $('.row.pics.stylename .block').click(function(){
        $('.row.pics.stylename .block p6').removeClass('selected');
        $(this).find('p6').addClass('selected');
        custom_product.roof_style = $(this).find('p6').text();
    })

    $('.roof-color .color.block').click(function(){
        $('.roof-color .color.block').removeClass('selected');
        $(this).addClass('selected');
        custom_product.roof_color = $(this).find('.color.definition').text();
    })

    $('.trim-color .color.block').click(function(){
        $('.trim-color .color.block').removeClass('selected');
        $(this).addClass('selected');
        custom_product.trim_color = $(this).find('.color.definition').text();
    })

    /* Size part  */
    $( "#width-slider" ).slider({
        min:10,
        max:30,
        slide: function( event, ui ) {
            var selectedWidth = $(this).slider("value");
            $("#width-value").text(selectedWidth);
            custom_product.width = selectedWidth;
            $("#width").text(selectedWidth);
        }
    });

    $( "#length-slider" ).slider({
        min:10,
        max:51,
        slide: function( event, ui ) {
            var selectedLength = $(this).slider("value");
            $("#length-value").text(selectedLength);
            custom_product.length = selectedLength;
            $("#length").text(selectedLength);
        }
    });

    $( "#height-slider" ).slider({
        min:6,
        max:12,
        slide: function( event, ui ) {
            var selectedHeight = $(this).slider("value");
            $("#height-value").text(selectedHeight);
            custom_product.height = selectedHeight;
            $("#height").text(selectedHeight);
        }
    });

    $( "input[type='checkbox']").checkboxradio({
        icon: false
    });





});

