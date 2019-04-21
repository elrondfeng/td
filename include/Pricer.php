<?php

require get_theme_file_path('/include/ConstantsMiddle.php');
require get_theme_file_path('/include/ConstantsNarrow.php');
require get_theme_file_path('/include/ConstantsWide.php');

class Pricer{

    var $log = "";
    var $price;
    var $roof;
    var $width;
    var $length;
    var $height;
    var $walk_in_num;
    var $window_num;
    var $door_string;
    var $is_certified;
    var $side_num;
    var $end_num;
    var $gable_num;
    var $panel_size;
    var $panel_num;

    const walkInPrice = 275;
    const windowPrice = 150;

    function __construct($roof, $width, $length, $height, $walk_in_num, $window_num, $door_string, $cert, $side,
                         $end , $gable, $panel_num, $panel_size){
        $this->price = 0;
        $this->roof = $roof;
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
        $this->walk_in_num = $walk_in_num;
        $this->window_num = $window_num;
        $this->door_string = $door_string;
        $this->is_certified = $cert;
        $this->side_num = $side;
        $this->end_num = $end;
        $this->gable_num = $gable;
        $this->panel_num = $panel_num;
        $this->panel_size = $panel_size;
    }

    function priceBase(){
        $key_size =  $this->width.'x'.$this->length;
        $this->log .= " basic size : ". $key_size . " roof style is : " . $this->roof . ". ";
        // the wide base is only depend on the size of width. They are all vertical.
        if($this->width >=32 ){
            if($this->width>=52){
                $base_price = ConstantsWide::getBase50th()[$key_size];
            } elseif($this->width>=42){
                $base_price = ConstantsWide::getBase40th()[$key_size];
            }  else{
                $base_price = ConstantsWide::getBase30th()[$key_size];
            }
            // narrow , roof style does matter
        } elseif($this->width<=24){

            if(strcmp($this->roof,'Regular Style') === 0){
                $base_price = ConstantsNarrow::getBaseRegular()[$key_size];
            } elseif(strcmp($this->roof,'Boxed-Eave Style') === 0){
                $base_price = ConstantsNarrow::getBaseBoxed()[$key_size];
            }else{
                $base_price = ConstantsNarrow::getBaseVertical()[$key_size];
            }

            // middle , roof style does matter
        } else {
            if(strcmp($this->roof,'Regular Style') === 0){
                $base_price = ConstantsMiddle::getBaseRegular()[$key_size];
            } elseif(strcmp($this->roof,'Boxed-Eave Style') === 0){
                $base_price = ConstantsMiddle::getBaseBoxed()[$key_size];
            }else{
                $base_price = ConstantsMiddle::getBaseVertical()[$key_size];
            }
        }
        $this->log .= " base price : ". $base_price . ". " ;

        $this->price = $this->price + $base_price;
    }

    function priceLegHeight(){
        $key_size =  $this->height.'x'.($this->length-1);
        $this->log .= " leg height key : ". $key_size . ". ";
        if($this->width >=32 ){
            $leg_height_price = ConstantsWide::getLegHeight()[$key_size];
            // narrow
        } elseif($this->width<=24){
            $leg_height_price = ConstantsNarrow::getLegHeight()[$key_size];
            // middle , roof style does matter
        } else {
            $leg_height_price = ConstantsMiddle::getLegHeight()[$key_size];
        }
        $this->log .= " leg height price : ". $leg_height_price . ". " ;
        $this->price = $this->price + $leg_height_price;
    }

    function priceDoor(){
        $door_array = explode("|", $this->door_string);
        write_log("*****************  this is a door_string ... " . $this->door_string .
            " number of doors is " . $door_array );
        $this->log .= "number of doors is  " . count($door_array) . ". ";
        foreach ( $door_array as $door_size){
            $door_price = ConstantsMiddle::getGarageDoor()[$door_size];
            $this->log .= " size is  " . $door_size . " . price is " . $door_price . " . " ;
            $this->price = $this->price + $door_price;
        }
    }

    function priceWalkIn(){
            $this->log .= " walkins number  " . $this->walk_in_num . " price is " . $this->walk_in_num*self::walkInPrice;
            $this->price = $this->price + $this->walk_in_num*self::walkInPrice;
    }
    function priceWindow(){
            $this->log .= " windows number  " . $this->window_num . " price is " . $this->window_num*self::windowPrice;
            $this->price = $this->price + $this->window_num*self::windowPrice;
    }

    function priceGable(){
        $this->log .= " gable number  " . $this->gable_num . " .";
        if($this->width >=32 ){
            if( $this->width >= 52 && $this->width <= 60){
                $key_size = "52-60";
            } elseif($this->width >= 32 && $this->width <= 40){
                $key_size = "32-40";
            } elseif($this->width >= 42 && $this->width <= 50){
                $key_size = "42-50";
            } else{
                $key_size = "NOT_EXIST";
            }
            $gable_end_price = ConstantsWide::getGable()[$key_size];
            // narrow
        } elseif($this->width<=24){
            $gable_end_price = ConstantsNarrow::getGable();
            // middle , roof style does matter
        } else {
            $gable_end_price = ConstantsMiddle::getGable();
        }

        $this->log .= " gable end price : ". $gable_end_price*$this->gable_num . ". " ;
        $this->price = $this->price + $gable_end_price*$this->gable_num;
    }

    function priceCertification(){

        $this->log .= " certification is YES. height is  " . $this->height . " length is " . $this->length . " . " ;

        // large, certification is already included. not price separately for large one.
        if($this->width >=32 ){
            // narrow , roof style does matter
            $cert_price = 0;
        } elseif($this->width<=24){
            if($this->height<=10){
                $cert_price = ConstantsNarrow::getCertification()['6-10x'.$this->length];
            } elseif($this->height>=17){
                $cert_price = ConstantsNarrow::getCertification()['17-20x'.$this->length];
            } elseif($this->height>=11 && $this->height<=14 ){
                $cert_price = ConstantsNarrow::getCertification()['11-14x'.$this->length];
            } else{ // not covered
                $cert_price = 0;
            }
            // middle , roof style does matter
        } else {
            if($this->height<=10){
                $cert_price = ConstantsMiddle::getCertification()['6-10x'.$this->length];
            } elseif($this->height>=17){
                $cert_price = ConstantsMiddle::getCertification()['17-20x'.$this->length];
            } elseif($this->height>=11 && $this->height<=14 ){
                $cert_price = ConstantsMiddle::getCertification()['11-14x'.$this->length];
            } else { // not covered
                $cert_price = 0;
            }
        }
        $this->log .= " certification price : ". $cert_price . ". " ;
        $this->price = $this->price + $cert_price;
    }

    function  priceSideWall(){
        $key_size =  $this->height.'x'.($this->length-1);
        $this->log .= " side wall price key : ". $key_size . ". ";
        if($this->width >=32 ){
            $side_wall_price = ConstantsWide::getBothSides()[$key_size];
            // narrow
        } elseif($this->width<=24){
            $side_wall_price = ConstantsNarrow::getBothSides()[$key_size];
            // middle , roof style does matter
        } else {
            $side_wall_price = ConstantsMiddle::getBothSides()[$key_size];
        }

        if ($this->side_num == 1) {
            $side_wall_price = $side_wall_price / 2;
        }

        $this->log .= " side wall price : ". $side_wall_price . ". " ;
        $this->price = $this->price + $side_wall_price;
    }
    function  priceEndWall(){
        $key_size =  $this->height.'x'.$this->width;
        $this->log .= " end wall price key : ". $key_size . ". ";
        if($this->width >=32 ){
            $end_wall_price = ConstantsWide::getEachEnd()[$key_size];
            // narrow
        } elseif($this->width<=24){
            $end_wall_price = ConstantsNarrow::getEachEnd()[$key_size];
            // middle , roof style does matter
        } else {
            $end_wall_price = ConstantsMiddle::getEachEnd()[$key_size];
        }

        if ($this->end_num == 2) {
            $end_wall_price = $end_wall_price * 2;
        }

        $this->log .= " end wall price : ". $end_wall_price . ". " ;
        $this->price = $this->price + $end_wall_price;
    }

    function  pricePanel(){
        if ($this->panel_size == 21) {
            $this->price = $this->price + $this->panel_num * 100;
            $this->log .= " panel number : ". $this->panel_num . ". " . " panel size : " . $this->panel_size .
                " price added : " .  $this->panel_num * 100  . " " ;
        } elseif($this->panel_size == 26){
            $this->price = $this->price + $this->panel_num * 120;
            $this->log .= " panel number : ". $this->panel_num . ". " . " panel size : " . $this->panel_size .
                " price added : " .  $this->panel_num * 120  . " " ;
        } elseif($this->panel_size == 31) {
            $this->price = $this->price + $this->panel_num * 140;
            $this->log .= " panel number : ". $this->panel_num . ". " . " panel size : " . $this->panel_size .
                " price added : " .  $this->panel_num * 140  . " " ;
        } else {
            $this->price = $this->price + $this->panel_num * 160;
            $this->log .= " panel number : ". $this->panel_num . ". " . " panel size : " . $this->panel_size .
                " price added : " .  $this->panel_num * 160  . " " ;
        }
    }

    function getPrice(){

        $this->logIt();

        $this->priceBase();

        $this->priceLegHeight();

        if(!empty($this->door_string)){
            $this->priceDoor();
        }

        if($this->walk_in_num>0){
            $this->priceWalkIn();
        }
        if($this->window_num>0){
            $this->priceWindow();
        }
        if(strcmp($this->is_certified, 'YES')===0){
            write_log("certified.");
            $this->priceCertification();
        }
        if($this->side_num>0){
            $this->priceSideWall();
        }
        if($this->end_num>0){
            $this->priceEndWall();
        }
        if($this->gable_num>0){
            $this->priceGable();
        }
        if($this->panel_num>0){
            $this->pricePanel();
        }
        $result = array(
            "log" => $this->log,
            "price" => $this->price
        );

        return $result;
    }

    function logIt(){
        $this->log .= " **data passed in to pricer is:**  roof: " . $this->roof  ;
        $this->log .= " width: " . $this->width  ;
        $this->log .= " length: " . $this->length ;
        $this->log .= " height: " . $this->height ;
        $this->log .= " walk-ins-num: " . $this->walk_in_num ;
        $this->log .= " window_num: " . $this->window_num ;
        $this->log .= " door_string: " . $this->door_string ;
        $this->log .= " is_certified: " . $this->is_certified;
        $this->log .= " side_num: " . $this->side_num;
        $this->log .= " end_num: " . $this->end_num;
        $this->log .= " gable_num " . $this->gable_num;
        $this->log .= " panel_num " . $this->panel_num;
        $this->log .= " panel_size " . $this->panel_size;
    }

    function get_base(){
        ConstantsNarrow::getBaseRegular()["20x21"];
    }

}