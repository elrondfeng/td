jQuery(document).ready(function ($) {
// code goes here when document is ready. use $ for jQuery
    jQuery("#tabs").tabs();
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
        zip: 0,
        tax: 0,
        county: '',
        garage_door: 0,
        walk_in_door: 0,
        window: 0,
        price: {
            all_price: 995.00,
            init_deposit: 119.40
        },
        //roof
        roof_style: '',
        roof_color: '',
        trim_color: '',
        // size
        width: 10,
        length: 10,
        height: 6,
        certified: 'NO',
        gauge: 'NO',
        //wall
        side_wall_style: 'NO WALL',
        side_wall_orientation: 'HORIZONTAL',
        side_wall_color: '',
        end_wall_style_front: 'NO WALL',
        end_wall_style_back: 'NO WALL',
        end_wall_orientation: 'HORIZONTAL',
        end_wall_color: '',
        // doors
        doors: [],
        walk_ins: {
            front: 0,
            back: 0,
            left: 0,
            right: 0
        },
        windows: {
            front: 0,
            back: 0,
            left: 0,
            right: 0
        },
        //options
        four_auger_anchors:'no anchors',
        install_style:"free install"
    };

    function door(position, size) {
        this.position = position;
        this.size = size;
    }

    function isEquivalent(a, b) {
        // Create arrays of property names
        var aProps = Object.getOwnPropertyNames(a);
        var bProps = Object.getOwnPropertyNames(b);

        // If number of properties is different,
        // objects are not equivalent
        if (aProps.length != bProps.length) {
            return false;
        }

        for (var i = 0; i < aProps.length; i++) {
            var propName = aProps[i];

            // If values of same property are not equal,
            // objects are not equivalent
            if (a[propName] !== b[propName]) {
                return false;
            }
        }

        // If we made it this far, objects
        // are considered equivalent
        return true;
    }

    // init product
    function initProductValues() {
        $('#width').html(custom_product.width);
        $('#length').html(custom_product.length);
        $('#height').html(custom_product.height);
        $('#total-price').html(custom_product.price.all_price);
        $('#today-deposit').html(custom_product.price.init_deposit);
    }

    initProductValues();

    function submitZipcode() {
        console.log(ajaxurl);
        jQuery.ajax({
            type: "get",
            dataType: "json",
            url: ajaxurl,
            data: {
                'action': 'checkzip',
                'zipcode': $('#zip').val()
            },
            success: function (result) {
                console.log(JSON.stringify(result));

                // 1. if valid, close the dialog. display it on teh start page
                // 2. if not valid, do nothing
                if (result.valid) {
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

    function openDialog() {
        $("#dialog-zipcode").dialog({
            modal: true,
            draggable: true,
            resizable: false,
            closeOnEscape: false,
            buttons: [{
                text: 'SUBMIT',
                click: submitZipcode,
                class: 'submitZipcode-button-class'
            }]
        });
    }

    openDialog();

    $(".change-zip-button").click(openDialog);

    $('.row.pics.stylename .block').click(function () {
        $('.row.pics.stylename .block p6').removeClass('selected');
        $(this).find('p6').addClass('selected');
        custom_product.roof_style = $(this).find('p6').text();
    })

    $('.roof-color .color.block').click(function () {
        $('.roof-color .color.block').removeClass('selected');
        $(this).addClass('selected');
        custom_product.roof_color = $(this).find('.color.definition').text();
    })

    $('.trim-color .color.block').click(function () {
        $('.trim-color .color.block').removeClass('selected');
        $(this).addClass('selected');
        custom_product.trim_color = $(this).find('.color.definition').text();
    })

    /* Size part  */
    $("#width-slider").slider({
        min: 10,
        max: 30,
        slide: function (event, ui) {
            var selectedWidth = $(this).slider("value");
            $("#width-value").text(selectedWidth);
            custom_product.width = selectedWidth;
            $("#width").text(selectedWidth);
        }
    });

    $("#length-slider").slider({
        min: 10,
        max: 51,
        slide: function (event, ui) {
            var selectedLength = $(this).slider("value");
            $("#length-value").text(selectedLength);
            custom_product.length = selectedLength;
            $("#length").text(selectedLength);
        }
    });

    $("#height-slider").slider({
        min: 6,
        max: 12,
        slide: function (event, ui) {
            var selectedHeight = $(this).slider("value");
            $("#height-value").text(selectedHeight);
            custom_product.height = selectedHeight;
            $("#height").text(selectedHeight);
        }
    });

    // this is for the two checkboxradio on the size page
    $("input[id='cb-certified'][type='checkbox']").checkboxradio({
        icon: false
    });
    $("input[id='cb-gauge'][type='checkbox']").checkboxradio({
        icon: false
    });

    // update certified and gauge checkbox value to custom_product object
    $("#certifiedcheckbox").on('click', function () {
        if ($("#cb-certified").is(':checked')) {
            custom_product.certified = "NO";
        } else {
            custom_product.certified = "YES";
        }
    })

    $("#gaugecheckbox").on('click', function () {
        if ($("#cb-gauge").is(':checked')) {
            custom_product.gauge = "YES";
        } else {
            custom_product.gauge = "NO";
        }
    })

    // this is for the checkboxradio on the wall page
    $("input[name='side-wall-style']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#side-wall-style-fs").controlgroup();

    $("input[name='side-wall-orientation']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#side-wall-orientation-fs").controlgroup();

    //
    $("input[name='end-wall-style-front']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#end-wall-style-front-fs").controlgroup();

    $("input[name='end-wall-style-back']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#end-wall-style-back-fs").controlgroup();

    $("input[name='end-wall-orientation']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#end-wall-orientation-fs").controlgroup();

    // update radio choice of the wall tab to custom_product object

    // 1. side wall style
    $("div.widget fieldset#side-wall-style-fs > input[type='radio']").change(function () {
        var side_wall_style = $("input[name='side-wall-style']:checked").val();
        custom_product.side_wall_style = side_wall_style;
    });

    // 2. side wall orientation
    $("div.widget fieldset#side-wall-orientation-fs > input[type='radio']").change(function () {
        var side_wall_orientation = $("input[name='side-wall-orientation']:checked").val();
        custom_product.side_wall_orientation = side_wall_orientation;
    });

    // 3. side wall color
    $('.side-wall-color .color.block').click(function () {
        $('.side-wall-color .color.block').removeClass('selected');
        $(this).addClass('selected');
        custom_product.side_wall_color = $(this).find('.color.definition').text();
    }) // good so far

    // 4. end wall style front
    $("div.widget fieldset#end-wall-style-front-fs > input[type='radio']").change(function () {
        var end_wall_style_front = $("input[name='end-wall-style-front']:checked").val();
        custom_product.end_wall_style_front = end_wall_style_front;
    });

    // 5. end wall style back
    $("div.widget fieldset#end-wall-style-back-fs > input[type='radio']").change(function () {
        var end_wall_style_back = $("input[name='end-wall-style-back']:checked").val();
        custom_product.end_wall_style_back = end_wall_style_back;
    });

    // 6. end wall orientation
    $("div.widget fieldset#end-wall-orientation-fs > input[type='radio']").change(function () {
        var end_wall_orientation = $("input[name='end-wall-orientation']:checked").val();
        custom_product.end_wall_orientation = end_wall_orientation;
    });

    // 7. side wall color
    $('.end-wall-color .color.block').click(function () {
        $('.end-wall-color .color.block').removeClass('selected');
        $(this).addClass('selected');
        custom_product.end_wall_color = $(this).find('.color.definition').text();
    })

    // DOORS
    $("#door-position").selectmenu({
        width: 150
    });
    $("#door-size").selectmenu({
        width: 150
    });

    var max_door = 5;

    $("#door-add-button").on("click", function(e){
        e.stopPropagation();
        var added_door = $('div.row.added-door').length;

        if (added_door <= max_door) {

            $("#selected-doors-div").append(`
                    <div class="row added-door">
                        <div class="small-20 medium-10 large-10 columns door-position">
                            ${$("#door-position").val()}
                        </div>
                        <div class="small-20 medium-10 large-10 columns door-size">
                            ${$("#door-size").val()}
                        </div>
                        <div class="small-8 medium-4 large-4 columns">
                            <input type="button" class="door-remove-button" value="-">
                        </div>
                    </div>
            `);
            custom_product.doors.push(new door($("#door-position").val(),$("#door-size").val()));

            /*console.log("after push, the number of doors is : " + JSON.stringify(custom_product.doors));*/
        }
    });

    // NOTE: if the remove handler be in inside of add handler , then weird things happens.
    $(document).on('click', ".door-remove-button" , function (e) {
        e.stopPropagation();
        e.preventDefault();

        var this_door = new door( $(this).parent('div').parent('div').find('.door-position').text().trim(),
                                  $(this).parent('div').parent('div').find('.door-size').text().trim());

        var index = custom_product.doors.findIndex(function(item){ return isEquivalent(item,this);}, this_door);

        /*console.log("the index is " + index);*/

        custom_product.doors.splice(index, 1);

        /*console.log("after delete, the number of doors is " + JSON.stringify(custom_product.doors))*/

        $(this).parent('div').parent('div').remove();

    });

    // walk-ins

    $("#front-door-spinner").spinner({
        min:0,
        max:8,
        change: function( event, ui ) {
            var value = $( "#front-door-spinner" ).spinner( "value" );
            custom_product.walk_ins.front = value;
            //console.log("front : " + custom_product.walk_ins.front);
        }
    });

    $("#front-door-spinner").spinner("value", 0);

    $("#back-door-spinner").spinner({
        min:0,
        max:8,
        change: function( event, ui ) {
            var value = $( "#back-door-spinner" ).spinner( "value" );
            custom_product.walk_ins.back = value;
            //console.log("back : " + custom_product.walk_ins.back);
        }
    });

    $("#back-door-spinner").spinner("value", 0);

    $("#left-door-spinner").spinner({
        min:0,
        max:8,
        change: function( event, ui ) {
            var value = $( "#left-door-spinner" ).spinner( "value" );
            custom_product.walk_ins.left = value;
            //console.log("left : " + custom_product.walk_ins.left);
        }
    });

    $("#left-door-spinner").spinner("value", 0);

    $("#right-door-spinner").spinner({
        min:0,
        max:8,
        change: function( event, ui ) {
            var value = $( "#right-door-spinner" ).spinner( "value" );
            custom_product.walk_ins.right = value;
            //console.log("right : " + custom_product.walk_ins.right);
        }
    });

    $("#right-door-spinner").spinner("value", 0);

    // windows

    $("#front-window-spinner").spinner({
        min:0,
        max:8,
        change: function( event, ui ) {
            var value = $( "#front-window-spinner" ).spinner( "value" );
            custom_product.windows.front = value;
            //console.log("front : " + custom_product.windows.front);
        }
    });

    $("#front-window-spinner").spinner("value", 0);

    $("#back-window-spinner").spinner({
        min:0,
        max:8,
        change: function( event, ui ) {
            var value = $( "#back-window-spinner" ).spinner( "value" );
            custom_product.windows.back = value;
            //console.log("back : " + custom_product.windows.back);
        }
    });

    $("#back-window-spinner").spinner("value", 0);

    $("#left-window-spinner").spinner({
        min:0,
        max:8,
        change: function( event, ui ) {
            var value = $( "#left-window-spinner" ).spinner( "value" );
            custom_product.windows.left = value;
            //console.log("left : " + custom_product.windows.left);
        }
    });

    $("#left-window-spinner").spinner("value", 0);

    $("#right-window-spinner").spinner({
        min:0,
        max:8,
        change: function( event, ui ) {
            var value = $( "#right-window-spinner" ).spinner( "value" );
            custom_product.windows.right = value;
            //console.log("right : " + custom_product.windows.right);
        }
    });

    $("#right-window-spinner").spinner("value", 0);

    // options : four auger anchors
    $("input[name='four-auger-anchors']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#four-auger-anchors-fs").controlgroup();

    $("div.widget fieldset#four-auger-anchors-fs > input[type='radio']").change(function () {
        var four_auger_anchors = $("input[name='four-auger-anchors']:checked").val();
        custom_product.four_auger_anchors = four_auger_anchors;
        //console.log("four auger anchors : " +  four_auger_anchors);
    });

    // install style
    $("input[name='install-style']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#install-style-fs").controlgroup();
    $("div.widget fieldset#install-style-fs > input[type='radio']").change(function () {
        var install_style = $("input[name='install-style']:checked").val();
        custom_product.install_style = install_style;
        console.log("install style is : " +  install_style);
    });

});

