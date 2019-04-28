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
        garage_door_num: 0,
        walk_in_door_num: 0,
        window_num: 0,
        price: {
            tax_amount:0,
            all_price: 895.00,
            total:0,
            init_deposit: 119.40
        },
        //roof
        roof_style: 'Regular Style',
        roof_color: '',
        trim_color: '',
        // size
        width: 12,
        length: 21,
        height: 6,
        certified: 'NO',
        gauge: 'NO',
        //wall
        side_wall_number: 'NONE',
/*        side_wall_orientation: 'HORIZONTAL',*/
/*        side_wall_color: '',*/
        end_wall_number: 'NONE',
/*        end_wall_style_back: 'NO WALL',
        end_wall_orientation: 'HORIZONTAL',*/
        side_end_wall_color: '',
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
/*        four_auger_anchors: 'no anchors',
        install_style: "free install",*/
        gable_ends:'NONE',
        panels_number:'NONE',
        insulation:'1/2" Bubble Wrap $1sq ft',
        panels_size: "21"
    };

    function getDoorString(){
        var doors_string ="";
        for (let i = 0; i<custom_product.doors.length; i++){
            //console.log("single my door : " + custom_product.doors[i].size);
            doors_string = doors_string.concat(custom_product.doors[i].size);
            if( i !== custom_product.doors.length -1 ){
                doors_string = doors_string.concat("|")
            }
        }
        return doors_string;
    }

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
        $('#total-tax').html(custom_product.price.all_price*custom_product.tax);
        $('#total-td-price').html(custom_product.price.all_price);

    }

    initProductValues();

    function calculatePrice(){
        jQuery.ajax({
            type: 'get',
            dataType:"json",
            url: ajaxurl,
            data: {
                'action':'docalculateprice',
                'roof':custom_product.roof_style,
                'width' : custom_product.width,
                'length':custom_product.length,
                'height':custom_product.height,
                'walk': custom_product.walk_in_door_num,
                'window': custom_product.window_num,
                "door":getDoorString(),
                "cert":custom_product.certified,
                "side":custom_product.side_wall_number,
                "end":custom_product.end_wall_number,
                'gable':custom_product.gable_ends,
                'panel-num':custom_product.panels_number,
                'panel-size':custom_product.panels_size
            },
            success: function(response) {
                //console.log(JSON.stringify(response, null, 4));
                custom_product.price.all_price = response.price;
                $('#total-price').html(response.price);
                handelTax();
            }
        });
    }

    function handelTax(){
        custom_product.price.tax_amount = (custom_product.tax*custom_product.price.all_price/100);
        custom_product.price.total = custom_product.price.all_price + custom_product.price.tax_amount;

        if(custom_product.price.all_price<2000){
            custom_product.price.init_deposit = custom_product.price.all_price*0.12;
        } else {
            custom_product.price.init_deposit = custom_product.price.all_price*0.16;
        }
        $("#total-tax").html(custom_product.price.tax_amount.toFixed(2));
        $("#total-td-price").html(custom_product.price.total.toFixed(2));
        $("#today-deposit").html(custom_product.price.init_deposit.toFixed(2));
    }

    function submitZipcode() {
        //console.log(ajaxurl);
        //console.log($('#zip').val());
        jQuery.ajax({
            type: "get",
            dataType: "json",
            url: ajaxurl,
            data: {
                'action': 'checkzip',
                'zipcode': $('#zip').val()
            },
            success: function (result) {
                //console.log(JSON.stringify(result));

                // 1. if valid, close the dialog. display it on teh start page
                // 2. if not valid, do nothing
                if (result.valid) {
                    $("#dialog-zipcode").dialog('close');
                    $("#client-county").html(result.county);
                    $("#client-zipcode").html(result.zip);
                    custom_product.zip = result.zip;
                    custom_product.county = result.county;
                    custom_product.tax = result.tax;
                    handelTax();
                } else {
                    console.log("not valid");
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
        calculatePrice();
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

    function adjustLengthSlider(event){
        event.preventDefault();
        event.stopPropagation();
        event.stopImmediatePropagation();
        if(custom_product.width<=24){
            $("#length-slider").slider("option","max", 46);
            if(($("#length-slider").slider( "option", "value" ))>46){
                $("#length-slider").slider( "option", "value", 46);
                $("#length-value").text(46);
                custom_product.length = 46;
                $("#length").text(46);
            }
        } else if (custom_product.width>=32) {
            $("#length-slider").slider("option","max", 51);
        } else {
            $("#length-slider").slider("option","max", 61);
        }
    }

    function adjustHeightSlider(event){
        event.preventDefault();
        event.stopPropagation();
        event.stopImmediatePropagation();
        if (custom_product.width>=32) {
            $("#height-slider").slider("option","min", 8);
            if(($("#height-slider").slider( "option", "value" ))<8){
                $("#height-slider").slider( "option", "value", 8);
                $("#height-value").text(8);
                custom_product.height = 8;
                $("#height").text(8);
            }
        } else {
            $("#height-slider").slider("option","min", 6);
        }

    }
    // width slider
    var width_map = [12, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60];
    $("#width-slider").slider({
        min: 0,
        max: width_map.length - 1,
        slide: function (event, ui) {
            var selectedWidth = width_map[ui.value];// $(this).slider("value");
            $("#width-value").text(selectedWidth);
            custom_product.width = selectedWidth;
            $("#width").text(selectedWidth);
        },
        change: function(event,ui){
            adjustLengthSlider(event);
            adjustHeightSlider(event);
            calculatePrice();
            event.stopPropagation();
            event.preventDefault();
        }
    });
    // length slider
    $("#length-slider").slider({
        min: 21,
        max: 46,
        step: 5,
        slide: function (event, ui) {
            var selectedLength = ui.value;//
            $("#length-value").text(selectedLength);
            custom_product.length = selectedLength;
            $("#length").text(selectedLength);
        },
        change: function(){
            calculatePrice();
        }
    });


/*    var length_map_narrow = [21,26,31,36,41,46];
    var length_map_middle = [21,26,31,36,41,46,51,56,61];
    var length_map_wide = [21,26,31,36,41,46,51];
    var length_map = length_map_narrow;

    $("#length-slider").slider({
        min: 0,
        max: length_map.length - 1,
        slide: function (event, ui) {
            if(custom_product.width<=24){
                length_map = length_map_narrow;
            } else if (custom_product.width>=32){
                length_map = length_map_wide;
            } else {
                length_map = length_map_middle;
            }
            var selectedLength = length_map[ui.value];//  $(this).slider("value");
            $("#length-value").text(selectedLength);
            custom_product.length = selectedLength;
            $("#length").text(selectedLength);
        },
        change: function(){
            calculatePrice();
        }
    });*/
    //height slider
    $("#height-slider").slider({
        min: 6,
        max: 20,
        slide: function (event, ui) {
            var selectedHeight = ui.value;//  $(this).slider("value");
            $("#height-value").text(selectedHeight);
            custom_product.height = selectedHeight;
            $("#height").text(selectedHeight);
        },
        change: function(){
            calculatePrice();
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
            calculatePrice();
        } else {
            custom_product.certified = "YES";
            calculatePrice();
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

/*    $("input[name='side-wall-orientation']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#side-wall-orientation-fs").controlgroup();*/

    //
    $("input[name='end-wall-style-front']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#end-wall-style-front-fs").controlgroup();

/*    $("input[name='end-wall-style-back']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#end-wall-style-back-fs").controlgroup();*/

/*    $("input[name='end-wall-orientation']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#end-wall-orientation-fs").controlgroup();*/

    // update radio choice of the wall tab to custom_product object

    // 1. side wall style
    $("div.widget fieldset#side-wall-style-fs > input[type='radio']").change(function () {
        var side_wall_number = $("input[name='side-wall-style']:checked").val();
        custom_product.side_wall_number = side_wall_number;
        calculatePrice();
    });

    // 2. side wall orientation
/*    $("div.widget fieldset#side-wall-orientation-fs > input[type='radio']").change(function () {
        var side_wall_orientation = $("input[name='side-wall-orientation']:checked").val();
        custom_product.side_wall_orientation = side_wall_orientation;
    });*/

    // 3. side wall color
/*    $('.side-wall-color .color.block').click(function () {
        $('.side-wall-color .color.block').removeClass('selected');
        $(this).addClass('selected');
        custom_product.side_wall_color = $(this).find('.color.definition').text();
    }) // good so far*/

    // 4. end wall style front
    $("div.widget fieldset#end-wall-style-front-fs > input[type='radio']").change(function () {
        var end_wall_number = $("input[name='end-wall-style-front']:checked").val();
        custom_product.end_wall_number = end_wall_number;
        calculatePrice();
    });

    // 5. end wall style back
/*    $("div.widget fieldset#end-wall-style-back-fs > input[type='radio']").change(function () {
        var end_wall_style_back = $("input[name='end-wall-style-back']:checked").val();
        custom_product.end_wall_style_back = end_wall_style_back;
    });*/

    // 6. end wall orientation
/*    $("div.widget fieldset#end-wall-orientation-fs > input[type='radio']").change(function () {
        var end_wall_orientation = $("input[name='end-wall-orientation']:checked").val();
        custom_product.end_wall_orientation = end_wall_orientation;
    });*/

    // 7. side wall color
    $('.end-wall-color .color.block').click(function () {
        $('.end-wall-color .color.block').removeClass('selected');
        $(this).addClass('selected');
        custom_product.side_end_wall_color = $(this).find('.color.definition').text();
    })

    // DOORS
    $("#door-position").selectmenu({
        width: 150
    });
    $("#door-size").selectmenu({
        width: 150
    });

    var max_door = 5;

    $("#door-add-button").on("click", function (e) {
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
            custom_product.doors.push(new door($("#door-position").val(), $("#door-size").val()));
            calculatePrice();
            $("#number-door").text(custom_product.doors.length);
            //console.log("after push, the number of doors is : " + JSON.stringify(custom_product.doors));
        }
    });

    // NOTE: if the remove handler be in inside of add handler , then weird things happens.
    $(document).on('click', ".door-remove-button", function (e) {
        e.stopPropagation();
        e.preventDefault();

        var this_door = new door($(this).parent('div').parent('div').find('.door-position').text().trim(),
            $(this).parent('div').parent('div').find('.door-size').text().trim());

        var index = custom_product.doors.findIndex(function (item) {
            return isEquivalent(item, this);
        }, this_door);

        /*console.log("the index is " + index);*/

        custom_product.doors.splice(index, 1);

        /*console.log("after delete, the number of doors is " + JSON.stringify(custom_product.doors))*/

        $(this).parent('div').parent('div').remove();
        $("#number-door").text(custom_product.doors.length);
        calculatePrice();

    });

    // walk-ins

    $("#front-door-spinner").spinner({
        min: 0,
        max: 8,
        spin: function (event, ui) {
            var value = ui.value;//$( "#front-door-spinner" ).spinner( "value" );
            custom_product.walk_ins.front = value;
            //console.log("front : " + custom_product.walk_ins.front);
            custom_product.walk_in_door_num = custom_product.walk_ins.back + custom_product.walk_ins.front
                + custom_product.walk_ins.left + custom_product.walk_ins.right;
            $("#number-walk-in").text(custom_product.walk_in_door_num);
            calculatePrice();
        }
    });

    $("#front-door-spinner").spinner("value", 0);

    $("#back-door-spinner").spinner({
        min: 0,
        max: 8,
        spin: function (event, ui) {
            var value = ui.value; // $( "#back-door-spinner" ).spinner( "value" );
            custom_product.walk_ins.back = value;
            //console.log("back : " + custom_product.walk_ins.back);
            custom_product.walk_in_door_num = custom_product.walk_ins.back + custom_product.walk_ins.front
                + custom_product.walk_ins.left + custom_product.walk_ins.right;
            $("#number-walk-in").text(custom_product.walk_in_door_num);
            calculatePrice();
        }
    });

    $("#back-door-spinner").spinner("value", 0);

    $("#left-door-spinner").spinner({
        min: 0,
        max: 8,
        spin: function (event, ui) {
            var value = ui.value; //$( "#left-door-spinner" ).spinner( "value" );
            custom_product.walk_ins.left = value;
            //console.log("left : " + custom_product.walk_ins.left);
            custom_product.walk_in_door_num = custom_product.walk_ins.back + custom_product.walk_ins.front
                + custom_product.walk_ins.left + custom_product.walk_ins.right;
            $("#number-walk-in").text(custom_product.walk_in_door_num);
            calculatePrice();
        }
    });

    $("#left-door-spinner").spinner("value", 0);

    $("#right-door-spinner").spinner({
        min: 0,
        max: 8,
        spin: function (event, ui) {
            var value = ui.value; //$( "#right-door-spinner" ).spinner( "value" );
            custom_product.walk_ins.right = value;
            //console.log("right : " + custom_product.walk_ins.right);
            custom_product.walk_in_door_num = custom_product.walk_ins.back + custom_product.walk_ins.front
                + custom_product.walk_ins.left + custom_product.walk_ins.right;
            $("#number-walk-in").text(custom_product.walk_in_door_num);
            calculatePrice();
        }
    });

    $("#right-door-spinner").spinner("value", 0);

    // windows

    $("#front-window-spinner").spinner({
        min: 0,
        max: 8,
        spin: function (event, ui) {
            var value = ui.value; //$( "#front-window-spinner" ).spinner( "value" );
            custom_product.windows.front = value;
            //console.log("front : " + custom_product.windows.front);
            custom_product.window_num = custom_product.windows.front + custom_product.windows.back +
                custom_product.windows.left + custom_product.windows.right;
            $("#number-window").text(custom_product.window_num);
            calculatePrice();
        }
    });

    $("#front-window-spinner").spinner("value", 0);

    $("#back-window-spinner").spinner({
        min: 0,
        max: 8,
        spin: function (event, ui) {
            var value = ui.value; //$( "#back-window-spinner" ).spinner( "value" );
            custom_product.windows.back = value;
            //console.log("back : " + custom_product.windows.back);
            custom_product.window_num = custom_product.windows.front + custom_product.windows.back +
                custom_product.windows.left + custom_product.windows.right;
            $("#number-window").text(custom_product.window_num);
            calculatePrice();
        }
    });

    $("#back-window-spinner").spinner("value", 0);

    $("#left-window-spinner").spinner({
        min: 0,
        max: 8,
        spin: function (event, ui) {
            var value = ui.value; //$( "#left-window-spinner" ).spinner( "value" );
            custom_product.windows.left = value;
            //console.log("left : " + custom_product.windows.left);
            custom_product.window_num = custom_product.windows.front + custom_product.windows.back +
                custom_product.windows.left + custom_product.windows.right;
            $("#number-window").text(custom_product.window_num);
            calculatePrice();
        }
    });

    $("#left-window-spinner").spinner("value", 0);

    $("#right-window-spinner").spinner({
        min: 0,
        max: 8,
        spin: function (event, ui) {
            var value = ui.value; //$( "#right-window-spinner" ).spinner( "value" );
            custom_product.windows.right = value;
            //console.log("right : " + custom_product.windows.right);
            custom_product.window_num = custom_product.windows.front + custom_product.windows.back +
                custom_product.windows.left + custom_product.windows.right;
            $("#number-window").text(custom_product.window_num);
            calculatePrice();
        }
    });

    $("#right-window-spinner").spinner("value", 0);

/*    // options : four auger anchors
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
        //console.log("install style is : " + install_style);
    });*/

    //********************************************************//
    $("input[name='gable-ends']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#gable-ends-fs").controlgroup();

    $("div.widget fieldset#gable-ends-fs > input[type='radio']").change(function () {
        var gable_ends = $("input[name='gable-ends']:checked").val();
        custom_product.gable_ends= gable_ends;
        calculatePrice();
        //console.log("gable_ends : " +  gable_ends);
    });

    //********************************************************//
    $("input[name='insulation']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#insulation-fs").controlgroup();

    $("div.widget fieldset#insulation-fs > input[type='radio']").change(function () {
        var insulation = $("input[name='insulation']:checked").val();
        custom_product.insulation= insulation;
       // console.log("insulation : " +  insulation);
    });

    //********************************************************//
    //********************************************************//
    $("input[name='panels-number']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#panels-number-fs").controlgroup();

    $("div.widget fieldset#panels-number-fs > input[type='radio']").change(function () {
        var panels_number = $("input[name='panels-number']:checked").val();
        custom_product.panels_number= panels_number;
        calculatePrice();
        //console.log("panels_number : " +  panels_number);
    });

    $("input[name='panels']:radio").checkboxradio({
        icon: false
    });
    $("fieldset#panels-fs").controlgroup();

    $("div.widget fieldset#panels-fs  input[type='radio']").change(function () {
        var panels = $("input[name='panels']:checked").val();
        custom_product.panels_size= panels.substring(0,2);
        calculatePrice();
        //console.log("panels : " +  panels);
    });

    // save the javascript object.
    $(".order-now-button").click(function () {
        sessionStorage.setItem("carport_product", JSON.stringify(custom_product));
    });

});

