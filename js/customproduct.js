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
});

