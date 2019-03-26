<?php
/**
 * Template Name: FENG
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in WP-Forge consists of a page content area for adding text, images, video --
 * anything you'd like.
 *
 */

get_header(); ?>


<?php /*get_template_part('/content-parts/content', 'maincontent'); */ ?>


<section id="custom-product">

    <div class="row">
        <div class="small-24 medium-12 large-12 columns">

            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1" class="custom-product-tabs">Start</a></li>
                    <li><a href="#tabs-2" class="custom-product-tabs">Roof</a></li>
                    <li><a href="#tabs-3" class="custom-product-tabs">Size</a></li>
                    <li><a href="#tabs-4" class="custom-product-tabs">Walls</a></li>
                    <li><a href="#tabs-5" class="custom-product-tabs">Doors</a></li>
                    <li><a href="#tabs-6" class="custom-product-tabs">Options</a></li>
                </ul>
                <div id="tabs-1" class="ui-tabs-panel">
                    <div id="start">
                        <h5>LOCAL CARPORT PRICING, DESIGN YOUR METAL BUILDING</h5>
                        <h5>Verify your zip code is correct for local pricing, then click below to
                            start customizing your building. You can select from the tabs above at any time
                            to make changes.</h5>
                        <h5>Price Includes Delivery & Installation.</h5>
                        <div class="buttons-container">
                            <input id="startCustomizeButton" class="start-button" type="submit" value="START"
                                   style="font-size: 2em">
                        </div>
                        <div class="zip-container">
                            <div class="row">
                                <div class="small-16 medium-8 large-8 columns">
                                     <div id="client-county"></div>
                                </div>

                                <div class="small-16 medium-8 large-8 columns">
                                     <div id="client-zipcode" class=""> </div>
                                 </div>

                                <div class="small-16 medium-8 large-8 columns">
                                    <input type="button" class="change-zip-button" value="CHANGE">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="tabs-2" class="ui-tabs-panel ui-tabs-hide">
                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, \.</p>
                    <div class="buttons-container">
                        <input type="button" id="roof-prev" class="pre-next-button" href="#" value="PREV"
                               style="font-size: 1.2em">
                        <input type="button" id="roof-next" class="pre-next-button" href="#" value="NEXT"
                               style="font-size: 1.2em">
                    </div>

                </div>
                <div id="tabs-3" class="ui-tabs-panel ui-tabs-hide">
                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel
                        vehicula accumsan, mi neque rutrum erats.</p>
                    <div class="buttons-container">
                        <input type="button" id="size-prev" class="pre-next-button" href="#" value="PREV"
                               style="font-size: 1.2em">
                        <input type="button" id="size-next" class="pre-next-button" href="#" value="NEXT"
                               style="font-size: 1.2em">
                    </div>
                </div>
                <div id="tabs-4" class="ui-tabs-panel ui-tabs-hide">
                    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec
                        sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. .</p>
                    <div class="buttons-container">
                        <input type="button" id="walls-prev" class="pre-next-button" href="#" value="PREV"
                               style="font-size: 1.2em">
                        <input type="button" id="walls-next" class="pre-next-button" href="#" value="NEXT"
                               style="font-size: 1.2em">
                    </div>
                </div>
                <div id="tabs-5" class="ui-tabs-panel ui-tabs-hide">
                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus
                        id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus
                        eros molestie lectus.</p>
                    <div class="buttons-container">
                        <input type="button" id="doors-prev" class="pre-next-button" href="#" value="PREV"
                               style="font-size: 1.2em">
                        <input type="button" id="doors-next" class="pre-next-button" href="#" value="NEXT"
                               style="font-size: 1.2em">
                    </div>
                </div>
                <div id="tabs-6" class="ui-tabs-panel ui-tabs-hide">
                    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus.
                        Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit.
                        Suspendisse potenti. .</p>
                    <div class="buttons-container">
                        <input type="button" id="options-prev" class="pre-next-button" href="#" value="PREV"
                               style="font-size: 1.2em">
                        <input type="button" id="options-next" class="pre-next-button" href="#" value="NEXT"
                               style="font-size: 1.2em">
                    </div>
                </div>
            </div>


        </div>

        <div class="small-24 medium-12 large-12 columns ">
            <div class="white_container">

                <div class="product-parts">

                    <div class="row">

                        <div class="small-32 medium-16 large-16 columns">

                            <div class="row">
                                <div class="small-16 medium-8 large-8 columns">
                                    <div class="parts-item"> WIDTH</div>
                                </div>

                                <div class="small-16 medium-8 large-8 columns">
                                    <div class="parts-item"> LENGTH</div>
                                </div>

                                <div class="small-16 medium-8 large-8 columns">
                                    <div class="parts-item"> HEIGHT</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-16 medium-8 large-8 columns">
                                    <div id="width" class="parts-item"></div>
                                </div>

                                <div class="small-16 medium-8 large-8 columns">
                                    <div id="length" class="parts-item"></div>
                                </div>

                                <div class="small-16 medium-8 large-8 columns">
                                    <div id="height" class="parts-item"></div>
                                </div>
                            </div>

                        </div>

                        <div class="small-16 medium-8 large-8 columns order-parts">
                            <div class="">
                                <input type="button" style="font-size: 1.2em" class="order-now-button"
                                       value="ORDER NOW">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="product-parts">


                    <div class="row">
                        <div class="small-16 medium-8 large-8 columns">
                            <div class="window-door-item"> GARAGE DOORS</div>
                        </div>

                        <div class="small-16 medium-8 large-8 columns">
                            <div class="window-door-item"> WALK-IN DOORS</div>
                        </div>

                        <div class="small-16 medium-8 large-8 columns">
                            <div class="window-door-item"> WINDOWS</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-16 medium-8 large-8 columns">
                            <div id="width" class="window-door-item"> 0</div>
                        </div>

                        <div class="small-16 medium-8 large-8 columns">
                            <div id="length" class="window-door-item"> 0</div>
                        </div>

                        <div class="small-16 medium-8 large-8 columns">
                            <div id="height" class="window-door-item"> 0</div>
                        </div>
                    </div>


                </div>


                <div class="product-graph">
                    <img src="https://www.tdmetalbuildings.com/wp-content/uploads/2018/07/TDBuildings-Logo-ForLightBackgrounds-Transparent_v1.png"">
                </div>

                <div class="price">
                    <div class="row">
                        <div class="small-36 medium-16 large-16 columns">
                            <div class="price-item">TOTAL SPECIAL LOW PRICE:</div>
                        </div>

                        <div class="small-12 medium-8 large-8 columns">
                            <div id="total-price" class="price-item"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-36 medium-16 large-16 columns">
                            <div class="price-item">TODAY'S DEPOSIT:</div>
                        </div>

                        <div class="small-12 medium-8 large-8 columns">
                            <div id="today-deposit" class="price-item"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php get_template_part('/content-parts/content', 'flexible-content'); ?>

<div id="dialog-zipcode" title="tdbuildings">
    <h2 class="popup-centered">Enter Your Zip Code To Get Instant Pricing </h2>
    <form>
        <fieldset>
            <input type="text" id="zip" name="zip"  value="" placeholder="Enter Zip Code"
                   class="" style="display:block"/>
            <h5 class="popup-centered"> After submit your zip code, if the popup page reloads and doesn't close, then online
                pricing may not be available in your area. please call <strong>919-452-7500</strong> for local pricing.</h5>
        </fieldset>
    </form>
</div>

<?php get_footer(); ?>

<!--todo
get the picture :
https://carport.com/renderCARPORT2.php?
rt=reg&fs=122105&st=open&so=hor&tc=tan&csw=clay&
ft=open&bt=open&eo=hor&cew=clay&cr=clay&cfw=clay&cfd=white&cw=white&
cwi=white&gd=0&wd=0&wi=0
-->
