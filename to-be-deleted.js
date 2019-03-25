// the button to open the dialog

$( "#change-zipcode" )
    .button()
    .click(function() {
        $( "#dialog-message" ).dialog( "open" );
    });

$( ".selector" ).dialog({ position: 'center' });
$( ".selector" ).dialog( "option", "position", 'center' );
});


// dialog code

<div id="dialog-message" title="Carport.com Zipcode Pricing Tool"> <img src="https://www.carport.com/wp-content/themes/buildpress-child/builder/images/carport-logo.png" alt="carport pricing"  hspace="0" align="left" width="130" height="135" />
    <p style="font-size:30px;"><b>Get instant pricing, enter your Zip Code below. </b></p>
<!--form id="frmZipcode"-->
    <fieldset>
    <input type="text" name="zip" id="zip" value="" placeholder="Enter Zip Code" class="text ui-widget-content ui-corner-all" />

    <label for="zip">Enter your ZIP code for local carport pricing. Customize your metal building at <b>Carport.com</b> today!</label><br />
<font size="-1">If page reloads after entering your zip code, online pricing may not be available in your area. <a href="/shop/"><span style="font-size:12px; color:DE3C25;">Shop by photo<span></a> and call <strong>855-227-7678</strong> for local pricing.</font>
</fieldset>
<!--/form-->

</div>


<style>
.ui-widget-overlay { z-index: 99999990 !important;  }
.ui-dialog         { z-index: 99999991 !important;  }
</style>


var zipCookie=getCookie("carport_zipcode");
//console.log('zipcookie'+zipCookie);
if (zipCookie!='undefined' && zipCookie!=null && zipCookie!=""){
    updateZIP(zipCookie);
} else {
    //console.log('open dialog');
    $( "#dialog-message" ).dialog( "open" );
}

// set roof type
$('input[name=roof_type]:radio').filter('[value=r]').attr('checked', true);
$('input[name=certified]:checkbox').filter('[value=no]').attr('checked', true);
$('input[name=gauge]:checkbox').filter('[value=14]').attr('checked', true);

// set colors
var roofColor = $('#roof_color').find('option[value$="cl"]').val();
$('#roof_color option[value='+roofColor+']').attr('selected','selected');
var endColor = $('#end_color').find('option[value$="cl"]').val();
$('#end_color option[value='+endColor+']').attr('selected','selected');
var sideColor = $('#side_color').find('option[value$="cl"]').val();
$('#side_color option[value='+sideColor+']').attr('selected','selected');
var trimColor = $('#trim_color').find('option[value$="tn"]').val();
$('#trim_color option[value='+trimColor+']').attr('selected','selected');

// set walls
$('input[name=sides]:radio').filter('[value=o]').attr('checked', true);
$('input[name=side_orientation]:radio').filter('[value=h]').attr('checked', true);
$('input[name=front]:radio').filter('[value=o]').attr('checked', true);
$('input[name=back]:radio').filter('[value=o]').attr('checked', true);
$('input[name=end_orientation]:radio').filter('[value=h]').attr('checked', true);


function updateZIP(zip){
    $('input[name=zip]').attr('value', zip);
    $("#displayZIP").html(zip);
    $("#zipcode").val(zip);
    setCookie('carport_zipcode', zip, 1000);
    if (zip=="11111") {
        $(".btnBuyNow").hide();
        $("#price").html("Enter ZIP");
        $("#deposit").html("N/A");
        $("#pricingZipTxt").html("Enter ZIP for pricing");
        $("#displayZIP").html("");
    }
    updatePricing();
}

function updatePricing() {
    home_url = 'https://www.carport.com';
    $('#price,#deposit').html('<img src="https://www.carport.com/wp-content/themes/buildpress-child/builder/images/ajax-loader.gif" align="center"/>');
    //alert(formSerialized);
    $.ajax({
        type: 'POST',
        url: 'https://www.carport.com/wp-content/themes/buildpress-child/builder/process_carolina_new.php',
        dataType: 'json',
        data: $('#builder').serialize(),
        success: function(data){


            priceBreakdown = data[0].addedup;
            vm.priceBreakdown(priceBreakdown);
            pgid = data[0].pgid;
            vm.pgid(pgid);

            if(parseInt(data[0].checkZIP) > 0){
                if($("#zip").val()=="11111"){
                    $("#price").html("Enter ZIP");
                    $("#deposit").html("N/A");
                } else {
                    var price = parseInt(data[0].total);
                    var deposit = data[0].deposit;
                    $('#price').html('$'+price+'.00');
                    $('#deposit').html('$'+deposit+'');
                }

                if(data[0].forceCertified == "1") {
                    $("#certified").button("disable");
                    $("#certified").hide();
                    // $("label[for='certified'] span").text("Certification Included");
                    $("label[for='certified']").hide();
                    $(".cert-included").show();
                } else {

                }

                if(pgid==61) {
                    $("#gauge").button("disable");
                    $("#gauge").hide();
                    $("label[for='gauge']").hide();
                    $(".12g-included").show();
                }

                if ((data[0].origTotal) != parseInt(data[0].total)) { // we have a discount
                    $('.show-on-prid').show();
                    $('#price').addClass('change-on-prid');
                    $('#deposit').addClass('change-on-prid');
                }
                else {
                    $('.show-on-prid').hide();
                    $('#price').removeClass('change-on-prid');
                    $('#deposit').removeClass('change-on-prid');
                }
                $('#orig_price').html('$'+((data[0].origTotal))+'.00');
                $('#orig_deposit').html('$'+((data[0].origDeposit)));
                // $('#buildID').html();
                $('#buildID').html(VerifyBuildId(data[0].buildID));

                $('#summaryWidth').html(data[0].summaryWidth);
                $('#summaryLength').html(data[0].summaryLength);
                $('#summaryHeight').html(data[0].summaryHeight);
                $('#summaryGarage').html(data[0].totalGarageDoors);
                $('#summaryWalkIn').html(data[0].totalWalkIn);
                $('#summaryWindows').html(data[0].totalWindows);
                $('#strDiscountDesc').html(data[0].strDiscountDesc);
                //$('#render').attr('src','https://carport.com/render.php?'+data[0].imgQuery);
                $('#render').attr('src','//carport.com/renderCARPORT2.php?'+data[0].imgQuery);
                encoded = encodeURIComponent(home_url + '/?bid='+data[0].buildID);
                $('#facebook').attr('href','//www.facebook.com/sharer.php?u=' + encoded);
                encoded = encodeURIComponent( 'Currently reading '+ home_url + '/?bid='+data[0].buildID );
                $('#twitter').attr('href', '//twitter.com/home?status=' + encoded);
                $('#mailshare').attr('href','mailto:?subject=Check out my building I just built on carport.com&body=View my building at https://www.carport.com/?bid='+data[0].buildID);
                $('#mailsharez').attr('href','mailto:?subject=Check out my building I just built on carport.com&body=View my building at https://www.carport.com/?bid='+data[0].buildID);
                $('#passparam1').attr('href','https://www.carport.com/checkout/?prid=&rep=&orderemail=&orderfName=&orderlName=&orderphone=&customersource=&source=&medium=&campaign=&adgroup=&keyword=&referer=https://www.carport.com/building-styles/carports/?filter_roof-style=boxed-eave&zipcode='+$("#zip").val()+'&bid='+data[0].buildID+'&price='+data[0].total+'&deposit='+data[0].deposit+'&'+data[0].imgQuery+'&width='+data[0].summaryWidth+'&height='+data[0].summaryHeight+'&length='+data[0].summaryLength+'&garage='+data[0].totalGarageDoors+'&walkin='+data[0].totalWalkIn+'&windows='+data[0].totalWindows);
                $('#passparamz').attr('href','https://www.carport.com/checkout/?prid=&rep=&orderemail=&orderfName=&orderlName=&orderphone=&customersource=&source=&medium=&campaign=&adgroup=&keyword=&referer=https://www.carport.com/building-styles/carports/?filter_roof-style=boxed-eave&zipcode='+$("#zip").val()+'&bid='+data[0].buildID+'&price='+data[0].total+'&deposit='+data[0].deposit+'&'+data[0].imgQuery+'&width='+data[0].summaryWidth+'&height='+data[0].summaryHeight+'&length='+data[0].summaryLength+'&garage='+data[0].totalGarageDoors+'&walkin='+data[0].totalWalkIn+'&windows='+data[0].totalWindows);
            }
            else {
                $('#price').html('change ZIP');
                $('#deposit').html('na');
                $( "#dialog-message" ).dialog( "open" );
            }

            //alert(data);
        } //end success

    }); //end ajax
} // end updatePricing

function checkZIP(zipcode) {
    $('#price,#deposit').html('<img src="https://www.carport.com/wp-content/themes/buildpress-child/builder/images/ajax-loader.gif" align="center"/>');
    $.ajax({
        type: 'POST',
        url: 'checkZIP.php',
        dataType: 'json',
        data: zipcode,
        success: function(data){
            var validZIP = parseInt(data[0].validZIP);
        } //end success

    }); //end ajax
    return validZIP;
} // end checkZIP

if(parseInt(data[0].checkZIP) > 0){
    if($("#zip").val()=="11111"){
        $("#price").html("Enter ZIP");
        $("#deposit").html("N/A");
    } else {
        var price = parseInt(data[0].total);
        var deposit = data[0].deposit;
        $('#price').html('$'+price+'.00');
        $('#deposit').html('$'+deposit+'');
    }