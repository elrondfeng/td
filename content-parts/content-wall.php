<?php

?>

<h3>WALLS & SIDING OPTIONS</h3>
<h5>Customize your walls with enclosures, colors, and orientation options for the siding.
    You may add doors and windows in the next step.</h5>
<div class="sub-item">
    <div class="sub-item-name">SIDE WALL STYLE</div>
    <div class="widget">
        <fieldset id="side-wall-style-fs">
            <label for="side-wall-style-no-wall">NO WALL</label>
            <input type="radio" name="side-wall-style" id="side-wall-style-no-wall" value="NO WALL" checked>
            <label for="side-wall-style-top">TOP</label>
            <input type="radio" name="side-wall-style" id="side-wall-style-top" value="TOP">
            <label for="side-wall-style-bottom">BOTTOM</label>
            <input type="radio" name="side-wall-style" id="side-wall-style-bottom" value="BOTTOM">
            <label for="side-wall-style-closed">CLOSED</label>
            <input type="radio" name="side-wall-style" id="side-wall-style-closed" value="CLOSED">
        </fieldset>
    </div>

    <div class="sub-item-name">SIDE WALL ORIENTATION</div>
    <div class="widget">
        <fieldset id="side-wall-orientation-fs">
            <label for="side-wall-ori-horizontal">HORIZONTAL</label>
            <input type="radio" name="side-wall-orientation" id="side-wall-ori-horizontal" checked>
            <label for="side-wall-ori-vertical">VERTICAL</label>
            <input type="radio" name="side-wall-orientation" id="side-wall-ori-vertical">
        </fieldset>
    </div>

    <div class="sub-item-name">SIDE WALL COLOR</div>

    <div class="sub-item-name">END WALL STYLE</div>
    <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <h4 class="center-vertical">FRONT</h4>
        </div>
        <div class="small-36 medium-18 large-18 columns">
            <div class="widget">
                <fieldset id="end-wall-style-front-fs">
                    <label for="end-wall-style-front-no-wall">NO WALL</label>
                    <input type="radio" name="end-wall-style-front" id="end-wall-style-front-no-wall" checked
                           value="NO WALL">
                    <label for="end-wall-style-front-gable">GABLE</label>
                    <input type="radio" name="end-wall-style-front" id="end-wall-style-front-gable" value="GABLE">
                    <label for="end-wall-style-front-closed">CLOSED</label>
                    <input type="radio" name="end-wall-style-front" id="end-wall-style-front-closed" value="CLOSED">
                </fieldset>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-6 large-6 columns">
            <h4 class="center-vertical">BACK</h4>
        </div>
        <div class="small-36 medium-18 large-18 columns">
            <div class="widget">
                <fieldset id="end-wall-style-back-fs">
                    <label for="end-wall-style-back-no-wall">NO WALL</label>
                    <input type="radio" name="end-wall-style-back" id="end-wall-style-back-no-wall" checked
                           value="NO WALL">
                    <label for="end-wall-style-back-gable">GABLE</label>
                    <input type="radio" name="end-wall-style-back" id="end-wall-style-back-gable" value="GABLE">
                    <label for="end-wall-style-back-closed">CLOSED</label>
                    <input type="radio" name="end-wall-style-back" id="end-wall-style-back-closed" value="CLOSED">
                </fieldset>
            </div>
        </div>
    </div>
    <div class="sub-item-name">END WALL ORIENTATION</div>
    <div class="widget">
        <fieldset id="end-wall-orientation-fs">
            <label for="end-wall-horizontal-orientation">Horizontal Orientation</label>
            <input type="radio" name="end-wall-orientation" id="end-wall-horizontal-orientation"
                   value="Horizontal Orientation" checked>
            <label for="end-wall-vertical-orientation">Vertical Orientation</label>
            <input type="radio" name="end-wall-orientation" id="end-wall-vertical-orientation"
                   value="Vertical Orientation">
        </fieldset>
    </div>

    <div class="sub-item-name">END WALL COLOR</div>

</div>

<div class="buttons-container">
    <input type="button" id="walls-prev" class="pre-next-button" href="#" value="PREV"
           style="font-size: 1.2em">
    <input type="button" id="walls-next" class="pre-next-button" href="#" value="NEXT"
           style="font-size: 1.2em">
</div>
