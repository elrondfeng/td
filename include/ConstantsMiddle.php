<?php

// width : 26 to 30
class ConstantsMiddle
{
    private static $basic_height = 6;
    public static function get_basic_height (){
        return self::$basic_height;
    }
    /* width x length */
    private static $base_regular = array(
        "26x21" => 2295,
        "28x21" => 2395,
        "30x21" => 2495,

        "26x26" => 2895,
        "28x26" => 2995,
        "30x26" => 3195,

        "26x31" => 3395,
        "28x31" => 3495,
        "30x31" => 3795,

        "26x36" => 3995,
        "28x36" => 4195,
        "30x36" => 4495,

        "26x41" => 4395,
        "28x41" => 4595,
        "30x41" => 4895,

        "26x46" => 4995,
        "28x46" => 5195,
        "30x46" => 5495,

        "26x51" => 5595,
        "28x51" => 5795,
        "30x51" => 6195,

        "26x56" => 6095,
        "28x56" => 6295,
        "30x56" => 6795,

        "26x61" => 6595,
        "28x61" => 6795,
        "30x61" => 7395

    );

    public static function getBaseRegular(){
        return self::$base_regular;
    }

    /* width x length */
    private static $base_boxed = array(
        "26x21" => 2395,
        "28x21" => 2495,
        "30x21" => 2595,

        "26x26" => 2995,
        "28x26" => 3195,
        "30x26" => 3295,

        "26x31" => 3495,
        "28x31" => 3795,
        "30x31" => 3895,

        "26x36" => 4195,
        "28x36" => 4495,
        "30x36" => 4695,

        "26x41" => 4695,
        "28x41" => 4895,
        "30x41" => 5095,

        "26x46" => 5195,
        "28x46" => 5495,
        "30x46" => 5795,

        "26x51" => 5795,
        "28x51" => 6195,
        "30x51" => 6495,

        "26x56" => 6295,
        "28x56" => 6795,
        "30x56" => 7095,

        "26x61" => 6795,
        "28x61" => 7395,
        "30x61" => 7695
    );

    public static function getBaseBoxed(){
        return self::$base_boxed;
    }

    /* width x length */
    private static $base_vertical = array(
        "26x21" => 2695,
        "28x21" => 2795,
        "30x21" => 2895,

        "26x26" => 3395,
        "28x26" => 3495,
        "30x26" => 3695,

        "26x31" => 3995,
        "28x31" => 4095,
        "30x31" => 4395,

        "26x36" => 4695,
        "28x36" => 4895,
        "30x36" => 5195,

        "26x41" => 5495,
        "28x41" => 5695,
        "30x41" => 5895,

        "26x46" => 5995,
        "28x46" => 6295,
        "30x46" => 6495,

        "26x51" => 6695,
        "28x51" => 6895,
        "30x51" => 7195,

        "26x56" => 7295,
        "28x56" => 7595,
        "30x56" => 8095,

        "26x61" => 7995,
        "28x61" => 8195,
        "30x61" => 8795
    );

    public static function getBaseVertical(){
        return self::$base_vertical;
    }

    /* heigth x length */
    private static $leg_height = array(
        "7x20" => 60,
        "7x25" => 75,
        "7x30" => 90,
        "7x35" => 105,
        "7x40" => 120,
        "7x45" => 190,
        "7x50" => 210,
        "7x55" => 230,
        "7x60" => 250,

        "8x20" => 120,
        "8x25" => 150,
        "8x30" => 180,
        "8x35" => 210,
        "8x40" => 240,
        "8x45" => 380,
        "8x50" => 420,
        "8x55" => 460,
        "8x60" => 500,

        "9x20" => 180,
        "9x25" => 225,
        "9x30" => 270,
        "9x35" => 315,
        "9x40" => 360,
        "9x45" => 570,
        "9x50" => 630,
        "9x55" => 690,
        "9x60" => 750,

        "10x20" => 240,
        "10x25" => 300,
        "10x30" => 360,
        "10x35" => 420,
        "10x40" => 480,
        "10x45" => 760,
        "10x50" => 840,
        "10x55" => 920,
        "10x60" => 1000,

        "11x20" => 300,
        "11x25" => 375,
        "11x30" => 450,
        "11x35" => 525,
        "11x40" => 600,
        "11x45" => 950,
        "11x50" => 1050,
        "11x55" => 1150,
        "11x60" => 1250,

        "12x20" => 360,
        "12x25" => 450,
        "12x30" => 540,
        "12x35" => 630,
        "12x40" => 720,
        "12x45" => 1140,
        "12x50" => 1260,
        "12x55" => 1380,
        "12x60" => 1500,

        "13x20" => 950,
        "13x25" => 1150,
        "13x30" => 1350,
        "13x35" => 1600,
        "13x40" => 1800,
        "13x45" => 2000,
        "13x50" => 2150,
        "13x55" => 2350,
        "13x60" => 2550,

        "14x20" => 1000,
        "14x25" => 1300,
        "14x30" => 1600,
        "14x35" => 1900,
        "14x40" => 2200,
        "14x45" => 2500,
        "14x50" => 2850,
        "14x55" => 3100,
        "14x60" => 3400,

        "15x20" => 1950,
        "15x25" => 2200,
        "15x30" => 2400,
        "15x35" => 2600,
        "15x40" => 3000,
        "15x45" => 3200,
        "15x50" => 3500,
        "15x55" => 3700,
        "15x60" => 3800,

        "16x20" => 2100,
        "16x25" => 2300,
        "16x30" => 2500,
        "16x35" => 2700,
        "16x40" => 3150,
        "16x45" => 3350,
        "16x50" => 3600,
        "16x55" => 3850,
        "16x60" => 4000,

        "17x20" => 2200,
        "17x25" => 2400,
        "17x30" => 2600,
        "17x35" => 2800,
        "17x40" => 3800,
        "17x45" => 4200,
        "17x50" => 4400,
        "17x55" => 4600,
        "17x60" => 4800,

        "18x20" => 2300,
        "18x25" => 2500,
        "18x30" => 2700,
        "18x35" => 2900,
        "18x40" => 3900,
        "18x45" => 4400,
        "18x50" => 4600,
        "18x55" => 4800,
        "18x60" => 5000,

        "19x20" => 2400,
        "19x25" => 2600,
        "19x30" => 2800,
        "19x35" => 3000,
        "19x40" => 4000,
        "19x45" => 4600,
        "19x50" => 4800,
        "19x55" => 5000,
        "19x60" => 5200,

        "20x20" => 2500,
        "20x25" => 2700,
        "20x30" => 2900,
        "20x35" => 3100,
        "20x40" => 4100,
        "20x45" => 4800,
        "20x50" => 5000,
        "20x55" => 5200,
        "20x60" => 5400
    );

    public static function getLegHeight(){
        return self::$leg_height;
    }

    /* height x length  */
    private static $both_sides = array(
        "6x20" => 350,
        "6x25" => 450,
        "6x30" => 550,
        "6x35" => 650,
        "6x40" => 700,
        "6x45" => 800,
        "6x50" => 900,
        "6x55" => 1000,
        "6x60" => 1100,

        "7x20" => 400,
        "7x25" => 500,
        "7x30" => 625,
        "7x35" => 750,
        "7x40" => 800,
        "7x45" => 900,
        "7x50" => 1100,
        "7x55" => 1125,
        "7x60" => 1250,

        "8x20" => 475,
        "8x25" => 600,
        "8x30" => 750,
        "8x35" => 850,
        "8x40" => 950,
        "8x45" => 1045,
        "8x50" => 1140,
        "8x55" => 1270,
        "8x60" => 1400,

        "9x20" => 550,
        "9x25" => 675,
        "9x30" => 850,
        "9x35" => 975,
        "9x40" => 1100,
        "9x45" => 1150,
        "9x50" => 1300,
        "9x55" => 1440,
        "9x60" => 1580,

        "10x20" => 600,
        "10x25" => 775,
        "10x30" => 950,
        "10x35" => 1150,
        "10x40" => 1200,
        "10x45" => 1300,
        "10x50" => 1500,
        "10x55" => 1650,
        "10x60" => 1800,

        "11x20" =>650,
        "11x25" =>850,
        "11x30" =>1050,
        "11x35" =>1250,
        "11x40" =>1300,
        "11x45" =>1475,
        "11x50" => 1700,
        "11x55" => 1850,
        "11x60" => 2000,

        "12x20" =>750,
        "12x25" =>950,
        "12x30" =>1150,
        "12x35" =>1350,
        "12x40" =>1500,
        "12x45" =>1600,
        "12x50" => 1850,
        "12x55" => 2000,
        "12x60" => 2150,

        "13x20" =>750,
        "13x25" =>1000,
        "13x30" =>1150,
        "13x35" =>1350,
        "13x40" =>1500,
        "13x45" =>1750,
        "13x50" => 2000,
        "13x55" => 2150,
        "13x60" => 2300,

        "14x20" =>800,
        "14x25" =>1100,
        "14x30" =>1250,
        "14x35" =>1425,
        "14x40" =>1600,
        "14x45" =>1900,
        "14x50" => 2200,
        "14x55" => 2350,
        "14x60" => 2500,

        "15x20" =>900,
        "15x25" =>1200,
        "15x30" =>1350,
        "15x35" =>1550,
        "15x40" =>1800,
        "15x45" =>2100,
        "15x50" => 2400,
        "15x55" => 2550,
        "15x60" => 2700,

        "16x20" =>1000,
        "16x25" =>1300,
        "16x30" =>1450,
        "16x35" =>1650,
        "16x40" =>2000,
        "16x45" =>2300,
        "16x50" => 2600,
        "16x55" => 2750,
        "16x60" => 2900,

        "17x20" =>1200,
        "17x25" =>1400,
        "17x30" =>1600,
        "17x35" =>1800,
        "17x40" =>2400,
        "17x45" =>2600,
        "17x50" => 2800,
        "17x55" => 3000,
        "17x60" => 3200,

        "18x20" =>1300,
        "18x25" =>1500,
        "18x30" =>1700,
        "18x35" =>1950,
        "18x40" =>2600,
        "18x45" =>2800,
        "18x50" => 3000,
        "18x55" => 3200,
        "18x60" => 3400,

        "19x20" =>1400,
        "19x25" =>1600,
        "19x30" =>1800,
        "19x35" =>2050,
        "19x40" =>2800,
        "19x45" =>3000,
        "19x50" => 3200,
        "19x55" => 3400,
        "19x60" => 3600,

        "20x20" =>1500,
        "20x25" =>1700,
        "20x30" =>1900,
        "20x35" =>2200,
        "20x40" =>3000,
        "20x45" =>3200,
        "20x50" => 3400,
        "20x55" => 3600,
        "20x60" => 3800
    );

    public static function getBothSides(){
        return self::$both_sides;
    }

    /**************************************/
    // height X width
    private static $each_end = array(
        "6x26" => 1050,
        "6x28" => 1150,
        "6x30" => 1250,

        "7x26" => 1100,
        "7x28" => 1250,
        "7x30" => 1350,

        "8x26" => 1200,
        "8x28" => 1340,
        "8x30" => 1450,

        "9x26" => 1300,
        "9x28" => 1400,
        "9x30" => 1550,

        "10x26" => 1380,
        "10x28" => 1500,
        "10x30" => 1650,

        "11x26" => 1450,
        "11x28" => 1600,
        "11x30" => 1750,

        "12x26" => 1550,
        "12x28" => 1700,
        "12x30" => 1850,

        "13x26" => 1600,
        "13x28" => 1800,
        "13x30" => 1945,

        "14x26" => 1650,
        "14x28" => 1900,
        "14x30" => 2050,

        "15x26" => 1800,
        "15x28" => 2050,
        "15x30" => 2250,

        "16x26" => 1950,
        "16x28" => 2450,
        "16x30" => 2750,

        "17x26" => 2100,
        "17x28" => 3000,
        "17x30" => 3250,

        "18x26" => 2200,
        "18x28" => 3500,
        "18x30" => 3800,

        "19x26" => 2300,
        "19x28" => 4000,
        "19x30" => 4300,

        "20x26" => 2450,
        "20x28" => 4400,
        "20x30" => 4800
    );
    public static function getEachEnd(){
        return self::$each_end;
    }

    /**************************************/
    /* height x width */
    private static $garage_door = array(
        "6x6" =>400,
        "8x8" =>500,
        "9x8" =>550,
        "10x8" =>600,
        "10x10" =>700,
        "10x12" =>1000,
        "12x12" =>1050,
        "14x12" =>2250,
        "14x14" =>2400
    );

    public static function getGarageDoor(){
        return self::$garage_door;
    }

    /**************************************/
    private static $walk_in = 275;
    public static function getWalkIn(){
        return self::$walk_in;
    }

    /**************************************/
    private static $window = 150;
    public static function getWindow(){
        return self::$window;
    }
    /**************************************/
    private static $gable = 330;
    public static function getGable(){
        return self::$gable;
    }

    /**************************************/
    private static $certification = array(
        "6-10x21" =>200,
        "6-10x26" =>250,
        "6-10x31" =>300,
        "6-10x36" =>350,
        "6-10x41" =>400,
        "6-10x46" =>450,
        "6-10x51" =>500,
        "6-10x56" =>550,
        "6-10x61" =>600,

        "11-14x21" =>400,
        "11-14x26" =>500,
        "11-14x31" =>600,
        "11-14x36" =>700,
        "11-14x41" =>800,
        "11-14x46" =>900,
        "11-14x51" =>1000,
        "11-14x56" =>1100,
        "11-14x61" =>1200,

        "17-20x21" =>700,
        "17-20x26" =>800,
        "17-20x31" =>900,
        "17-20x36" =>1000,
        "17-20x41" =>1100,
        "17-20x46" =>1200,
        "17-20x51" =>1300,
        "17-20x56" =>1400,
        "17-20x61" =>1500,
    );

    public static function getCertification(){
        return self::$certification;
    }









}