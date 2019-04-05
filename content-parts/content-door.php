<?php
?>

<h3>DOOR & WINDOW OPTIONS</h3>

<h5> The metal building preview displays only one garage door, window, or walk-in door at a time.
    These appear on the same side of the building regardless of the selected location.

    Your selected locations WILL be included and saved with your order. The visual example is for
    reference only and not an exact depiction of your building. </h5>
<div class="small-font">
    Note: Doors and windows may only be added to "closed" walls selected in the previous step.
    Use the “Prev” button below if you need to change your wall options.
</div>

<div class="sub-item">
    <div class="sub-item-name">GARAGE DOORS</div>
    <div class="widget">
        <div class="row">
            <div class="small-20 medium-10 large-10 columns">
                <select name="door-position" id="door-position">
                    <option value="FRONT" selected>FRONT</option>
                    <option value="BACK">BACK</option>
                    <option value="LEFT">LEFT</option>
                    <option value="RIGHT">RIGHT</option>
                </select>
            </div>
            <div class="small-20 medium-10 large-10 columns">
                <select name="door-size" id="door-size">
                    <option value="6x7" selected>6x7</option>
                    <option value="8x7">8x7</option>
                    <option value="9x7">9x7</option>
                    <option value="10x8">10x8</option>
                    <option value="10x10">10x10</option>
                </select>
            </div>
            <div class="small-8 medium-4 large-4 columns">
                <input type="button" id="door-add-button" value="ADD">
            </div>
        </div>
    </div>
</div>

<div class="buttons-container">
    <input type="button" id="doors-prev" class="pre-next-button" href="#" value="PREV"
           style="font-size: 1.2em">
    <input type="button" id="doors-next" class="pre-next-button" href="#" value="NEXT"
           style="font-size: 1.2em">
</div>



