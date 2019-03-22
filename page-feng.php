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


<?php get_template_part('/content-parts/content', 'maincontent'); ?>


<section id="custom-product">

    <div class="row">
        <div class="small-24 medium-12 large-12 columns">

            <div id="tabs">
                <ul>
                    <li ><a href="#tabs-1" class="custom-product-tabs">Start</a></li>
                    <li ><a href="#tabs-2" class="custom-product-tabs">Roof</a></li>
                    <li ><a href="#tabs-3" class="custom-product-tabs">Size</a></li>
                    <li ><a href="#tabs-4" class="custom-product-tabs">Walls</a></li>
                    <li ><a href="#tabs-5" class="custom-product-tabs">Doors</a></li>
                    <li ><a href="#tabs-6" class="custom-product-tabs">Options</a></li>
                </ul>
                <div id="tabs-1" class="ui-tabs-panel">
                    <div id="start">
                        <h5>Price Includes Delivery & Installation.</h5>
                        <div class="buttons-container">
                            <input id="startCustomizeButton" class="start-button" type="submit" value="START" style="font-size: 2em">
                        </div>
                    </div>
                </div>
                <div id="tabs-2" class="ui-tabs-panel ui-tabs-hide">
                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, \.</p>
                    <div class="buttons-container">
                        <input type="button" id="roof-prev" class="pre-next-button" href="#" value="PREV" style="font-size: 1.2em">
                        <input type="button" id="roof-next" class="pre-next-button" href="#" value="NEXT" style="font-size: 1.2em">
                    </div>

                </div>
                <div id="tabs-3" class="ui-tabs-panel ui-tabs-hide">
                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel
                        vehicula accumsan, mi neque rutrum erats.</p>
                    <div class="buttons-container">
                        <input type="button" id="size-prev" class="pre-next-button" href="#" value="PREV" style="font-size: 1.2em">
                        <input type="button" id="size-next" class="pre-next-button" href="#" value="NEXT" style="font-size: 1.2em">
                    </div>
                </div>
                <div id="tabs-4" class="ui-tabs-panel ui-tabs-hide">
                    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec
                        sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. .</p>
                    <div class="buttons-container">
                        <input type="button" id="walls-prev" class="pre-next-button" href="#" value="PREV" style="font-size: 1.2em">
                        <input type="button" id="walls-next" class="pre-next-button" href="#" value="NEXT" style="font-size: 1.2em">
                    </div>
                </div>
                <div id="tabs-5" class="ui-tabs-panel ui-tabs-hide">
                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus
                        id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus
                        eros molestie lectus.</p>
                    <div class="buttons-container">
                        <input type="button" id="doors-prev" class="pre-next-button" href="#" value="PREV" style="font-size: 1.2em">
                        <input type="button" id="doors-next" class="pre-next-button" href="#" value="NEXT" style="font-size: 1.2em">
                    </div>
                </div>
                <div id="tabs-6" class="ui-tabs-panel ui-tabs-hide">
                    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus.
                        Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit.
                        Suspendisse potenti. .</p>
                    <div class="buttons-container">
                        <input type="button" id="options-prev" class="pre-next-button" href="#" value="PREV" style="font-size: 1.2em">
                        <input type="button" id="options-next" class="pre-next-button" href="#" value="NEXT" style="font-size: 1.2em">
                    </div>
                </div>
            </div>


        </div>

        <div class="small-24 medium-12 large-12 columns ">
            <div class="white_container">

                <div class="product-parts">
                    <div>
                        WIDTH
                    </div>
                    <div id="width"></div>
                    <div>
                        LENGTH
                    </div>
                    <div id="length"></div>
                </div>

                <div class="product-graph clearfix">
                    <img src="https://www.tdmetalbuildings.com/wp-content/uploads/2018/07/TDBuildings-Logo-ForLightBackgrounds-Transparent_v1.png"">
                </div>

                <div class="price">
                    <p> this is price session</p>
                </div>

            </div>
        </div>
    </div>
</section>


<?php get_template_part('/content-parts/content', 'flexible-content'); ?>



<?php get_footer(); ?>
