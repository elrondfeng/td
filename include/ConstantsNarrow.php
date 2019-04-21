<?php

// width : 12 to 24
class ConstantsNarrow
{

    private static $basic_height = 6;
    public static function get_basic_height (){
        return self::$basic_height;
    }

    // width x length
    private static $base_regular = array(
        "12x21" => 895,
        "18x21" => 995,
        "20x21" => 1295,
        "22x21" => 1395,
        "24x21" => 1495,

        "12x26" => 1195,
        "18x26" => 1295,
        "20x26" => 1495,
        "22x26" => 1895,
        "24x26" => 1995,

        "12x31" => 1395,
        "18x31" => 1495,
        "20x31" => 1895,
        "22x31" => 2195,
        "24x31" => 2395,

        "12x36" => 1595,
        "18x36" => 1795,
        "20x36" => 2195,
        "22x36" => 2495,
        "24x36" => 2795,

        "12x41" => 1795,
        "18x41" => 1995,
        "20x41" => 2595,
        "22x41" => 2795,
        "24x41" => 3095,

        "12x46" => 2095,
        "18x46" => 2395,
        "20x46" => 2795,
        "22x46" => 3295,
        "24x46" => 3595
    );

    public static function getBaseRegular(){
        return self::$base_regular;
    }

    // width x length
    private static $base_boxed = array(
        "12x21" => 995,
        "18x21" => 1095,
        "20x21" => 1395,
        "22x21" => 1495,
        "24x21" => 1695,

        "12x26" => 1295,
        "18x26" => 1395,
        "20x26" => 1595,
        "22x26" => 1995,
        "24x26" => 2195,

        "12x31" => 1495,
        "18x31" => 1595,
        "20x31" => 1995,
        "22x31" => 2295,
        "24x31" => 2595,

        "12x36" => 1695,
        "18x36" => 1895,
        "20x36" => 2195,
        "22x36" => 2595,
        "24x36" => 2895,

        "12x41" => 1995,
        "18x41" => 2195,
        "20x41" => 2795,
        "22x41" => 2995,
        "24x41" => 3395,

        "12x46" => 2295,
        "18x46" => 2495,
        "20x46" => 2995,
        "22x46" => 3395,
        "24x46" => 3795
    );

    public static function getBaseBoxed(){
        return self::$base_boxed;
    }

    // width x length
    private static $base_vertical = array(
        "12x21" => 1195,
        "18x21" => 1395,
        "20x21" => 1695,
        "22x21" => 1895,
        "24x21" => 1995,

        "12x26" => 1695,
        "18x26" => 1795,
        "20x26" => 1995,
        "22x26" => 2295,
        "24x26" => 2395,

        "12x31" => 1995,
        "18x31" => 2095,
        "20x31" => 2295,
        "22x31" => 2795,
        "24x31" => 2995,

        "12x36" => 2295,
        "18x36" => 2495,
        "20x36" => 2795,
        "22x36" => 3195,
        "24x36" => 3495,

        "12x41" => 2495,
        "18x41" => 2795,
        "20x41" => 3095,
        "22x41" => 3795,
        "24x41" => 3995,

        "12x46" => 2895,
        "18x46" => 3095,
        "20x46" => 3495,
        "22x46" => 4095,
        "24x46" => 4395
    );

    public static function getBaseVertical(){
        return self::$base_vertical;
    }

    // height x length
    private static $leg_height = array(
        "7x20" => 50,
        "7x25" => 60,
        "7x30" => 75,
        "7x35" => 85,
        "7x40" => 100,
        "7x45" => 110,

        "8x20" => 100,
        "8x25" => 120,
        "8x30" => 150,
        "8x35" => 170,
        "8x40" => 200,
        "8x45" => 220,

        "9x20" => 150,
        "9x25" => 180,
        "9x30" => 225,
        "9x35" => 255,
        "9x40" => 300,
        "9x45" => 330,

        "10x20" => 200,
        "10x25" => 240,
        "10x30" => 300,
        "10x35" => 340,
        "10x40" => 400,
        "10x45" => 440,

        "11x20" => 250,
        "11x25" => 300,
        "11x30" => 375,
        "11x35" => 425,
        "11x40" => 500,
        "11x45" => 550,

        "12x20" => 300,
        "12x25" => 360,
        "12x30" => 450,
        "12x35" => 510,
        "12x40" => 600,
        "12x45" => 660,

        "13x20" => 450,
        "13x25" => 550,
        "13x30" => 650,
        "13x35" => 750,
        "13x40" => 900,
        "13x45" => 1000,

        "14x20" => 550,
        "14x25" => 650,
        "14x30" => 750,
        "14x35" => 850,
        "14x40" => 1000,
        "14x45" => 1200,

        "15x20" => 1300,
        "15x25" => 1600,
        "15x30" => 1675,
        "15x35" => 1925,
        "15x40" => 2500,
        "15x45" => 2600,

        "16x20" => 1400,
        "16x25" => 1780,
        "16x30" => 1800,
        "16x35" => 2100,
        "16x40" => 2700,
        "16x45" => 2830,

        "17x20" => 1750,
        "17x25" => 1925,
        "17x30" => 2250,
        "17x35" => 2575,
        "17x40" => 3500,
        "17x45" => 3375,

        "18x20" => 1850,
        "18x25" => 2050,
        "18x30" => 2400,
        "18x35" => 2750,
        "18x40" => 3700,
        "18x45" => 3900,

        "19x20" => 2000,
        "19x25" => 2175,
        "19x30" => 2550,
        "19x35" => 2925,
        "19x40" => 4000,
        "19x45" => 4175,

        "20x20" => 2100,
        "20x25" => 2300,
        "20x30" => 2700,
        "20x35" => 3100,
        "20x40" => 4200,
        "20x45" => 4400
    );

    public static function getLegHeight(){
        return self::$leg_height;
    }

    private static $both_sides = array(
        "6x20" => 350,
        "6x25" => 450,
        "6x30" => 550,
        "6x35" => 650,
        "6x40" => 700,
        "6x45" => 800,

        "7x20" => 400,
        "7x25" => 500,
        "7x30" => 625,
        "7x35" => 725,
        "7x40" => 800,
        "7x45" => 900,

        "8x20" => 475,
        "8x25" => 570,
        "8x30" => 700,
        "8x35" => 850,
        "8x40" => 950,
        "8x45" => 1045,

        "9x20" => 500,
        "9x25" => 650,
        "9x30" => 790,
        "9x35" => 925,
        "9x40" => 1000,
        "9x45" => 1150,

        "10x20" =>550,
        "10x25" =>750,
        "10x30" =>900,
        "10x35" =>1025,
        "10x40" =>1100,
        "10x45" =>1300,

        "11x20" =>625,
        "11x25" =>850,
        "11x30" =>1000,
        "11x35" =>1150,
        "11x40" =>1250,
        "11x45" =>1475,

        "12x20" =>675,
        "12x25" =>925,
        "12x30" =>1075,
        "12x35" =>1275,
        "12x40" =>1350,
        "12x45" =>1600,

        "13x20" =>750,
        "13x25" =>1000,
        "13x30" =>1150,
        "13x35" =>1350,
        "13x40" =>1500,
        "13x45" =>1750,

        "14x20" =>800,
        "14x25" =>1100,
        "14x30" =>1250,
        "14x35" =>1425,
        "14x40" =>1600,
        "14x45" =>1900,

        "15x20" =>900,
        "15x25" =>1200,
        "15x30" =>1350,
        "15x35" =>1550,
        "15x40" =>1800,
        "15x45" =>2100,

        "16x20" =>1000,
        "16x25" =>1300,
        "16x30" =>1450,
        "16x35" =>1650,
        "16x40" =>2000,
        "16x45" =>2300,

        "17x20" =>1200,
        "17x25" =>1400,
        "17x30" =>1600,
        "17x35" =>1800,
        "17x40" =>2400,
        "17x45" =>2600,

        "18x20" =>1300,
        "18x25" =>1500,
        "18x30" =>1700,
        "18x35" =>1950,
        "18x40" =>2600,
        "18x45" =>2800,

        "19x20" =>1400,
        "19x25" =>1600,
        "19x30" =>1800,
        "19x35" =>2050,
        "19x40" =>2800,
        "19x45" =>3000,

        "20x20" =>1500,
        "20x25" =>1700,
        "20x30" =>1900,
        "20x35" =>2200,
        "20x40" =>3000,
        "20x45" =>3200
    );

    public static function getBothSides(){
        return self::$both_sides;
    }

    /**************************************/
    // height X width
    private static $each_end = array(
        "6x12" => 400,
        "6x18" => 500,
        "6x20" => 550,
        "6x22" => 700,
        "6x24" => 750,

        "7x12" => 450,
        "7x18" => 550,
        "7x20" => 625,
        "7x22" => 765,
        "7x24" => 850,

        "8x12" => 500,
        "8x18" => 625,
        "8x20" => 700,
        "8x22" => 855,
        "8x24" => 925,

        "9x12" => 550,
        "9x18" => 700,
        "9x20" => 750,
        "9x22" => 970,
        "9x24" => 1000,

        "10x12" =>625,
        "10x18" =>765,
        "10x20" =>875,
        "10x22" =>1075,
        "10x24" =>1100,

        "11x12" =>700,
        "11x18" =>875,
        "11x20" =>975,
        "11x22" =>1175,
        "11x24" =>1250,

        "12x12" =>750,
        "12x18" =>950,
        "12x20" =>1050,
        "12x22" =>1250,
        "12x24" =>1350,

        "13x12" =>900,
        "13x18" =>1095,
        "13x20" =>1175,
        "13x22" =>1400,
        "13x24" =>1475,

        "14x12" =>1100,
        "14x18" =>1200,
        "14x20" =>1300,
        "14x22" =>1500,
        "14x24" =>1600,

        "15x12" =>1200,
        "15x18" =>1400,
        "15x20" =>1600,
        "15x22" =>1800,
        "15x24" =>1850,

        "16x12" =>1300,
        "16x18" =>1500,
        "16x20" =>1700,
        "16x22" =>1900,
        "16x24" =>2000,

        "17x12" =>1400,
        "17x18" =>1600,
        "17x20" =>1800,
        "17x22" =>2100,
        "17x24" =>2200,

        "18x12" =>1500,
        "18x18" =>1700,
        "18x20" =>1900,
        "18x22" =>2200,
        "18x24" =>2300,

        "19x12" =>1600,
        "19x18" =>1800,
        "19x20" =>2000,
        "19x22" =>2300,
        "19x24" =>2500,

        "20x12" =>1700,
        "20x18" =>1900,
        "20x20" =>2100,
        "20x22" =>2400,
        "20x24" =>2700
    );
    public static function getEachEnd(){
        return self::$each_end;
    }

    /**************************************/
    private static $garage_door = array(
        "6x6" =>375,
        "8x8" =>500,
        "9x8" =>525,
        "10x8" =>575,
        "10x10" =>700,
        "10x12" =>950,
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
    private static $gable = 175;
    public static function getGable(){
        return self::$gable;
    }

    /**************************************/
    private static $certification = array(
        "6-10x21" =>175,
        "6-10x26" =>200,
        "6-10x31" =>250,
        "6-10x36" =>300,
        "6-10x41" =>350,
        "6-10x46" =>375,

        "11-14x21" =>350,
        "11-14x26" =>400,
        "11-14x31" =>450,
        "11-14x36" =>500,
        "11-14x41" =>550,
        "11-14x46" =>600,

        "17-20x21" =>600,
        "17-20x26" =>650,
        "17-20x31" =>700,
        "17-20x36" =>750,
        "17-20x41" =>800,
        "17-20x46" =>850
    );

    public static function getCertification(){
        return self::$certification;
    }


}