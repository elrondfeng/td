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

jQuery( document ).ready(function($) {

    $("#startCustomizeButton").click(function(){
        alert("started");
    });

});

