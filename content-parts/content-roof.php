<?php

?>
<h3> ROOF STYLE DESIGNS </h3>
<h5>
    Choose a metal roofing style and customize your colors, then click next.
    Regular is good, A-Frame is better, and Vertical is best. </h5>

<h4 class="new-section roof-style"> ROOF STYLE: </h4>
<div class="row pics stylename">
    <div class="small-16 medium-8 large-8 columns block">
        <img src="<?php echo get_styleshet_directory_uri(); ?>/imgs/Regular.png">
        <p6>Luxury</p6>
    </div>

    <div class="small-16 medium-8 large-8 columns block">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/Boxed-Eve.png">
        <p6>Luxury</p6>
    </div>

    <div class="small-16 medium-8 large-8 columns block">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/Vertical.png">
        <p6>Platinum</p6>
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
