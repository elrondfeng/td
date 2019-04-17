<?php

?>
<h3> ROOF STYLE DESIGNS </h3>
<h5>
    Choose a metal roofing style and customize your colors, then click next.
    Regular style is standard, Boxed-Eave is a Luxury Style, and Vertical is the best and most functional. </h5>

<h4 class="new-section roof-style"> ROOF STYLE: </h4>
<div class="row pics stylename">
    <div class="small-16 medium-8 large-8 columns block">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/regular-short.png">
        <p6>Regular Style</p6>
    </div>

    <div class="small-16 medium-8 large-8 columns block">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/luxury-short.png">
        <p6>Boxed -Eave Style</p6>
    </div>

    <div class="small-16 medium-8 large-8 columns block">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/platinum-short.png">
        <p6>Vertical Style</p6>
    </div>
</div>

<h4 class="new-section"> ROOF COLOR: </h4>
<div class="roof-color">
    <?php get_template_part('/content-parts/content', 'colorpicker'); ?>
</div>
<h4 class="new-section"> TRIM COLOR: </h4>
<div class="trim-color">
    <?php get_template_part('/content-parts/content', 'colorpicker'); ?>
</div>

<div class="buttons-container">
    <input type="button" id="roof-prev" class="pre-next-button" href="#" value="PREV"
           style="font-size: 1.2em">
    <input type="button" id="roof-next" class="pre-next-button" href="#" value="NEXT"
           style="font-size: 1.2em">
</div>
