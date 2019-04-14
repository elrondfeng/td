<?php
require "zipcode.php" ;
require "taxrate.php" ;


/**
 * Enqueue child-theme style sheet
 */

function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function wpstarter_child_style() {

    // style and script
    wp_enqueue_script( 'custom-product', get_stylesheet_directory_uri() . '/js/customproduct.js', array('jquery'), '1.0', false );

    if ( is_page('checkout')) {
        wp_enqueue_script('checkout', get_stylesheet_directory_uri() . '/js/checkout.js', array('jquery'), '1.0', false);
    }

    # custom product css
    wp_enqueue_style( 'custom-product-style', get_stylesheet_directory_uri() .'/css/customproduct.css' , array( 'parent-styles' ), '1.0');
    # jquery ui external
    wp_enqueue_script('jquery-ui', "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js", array(), "1.12.1",false) ;
    wp_enqueue_style('jquery-ui-css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', array('parent-styles'),null,false );

    # jquery UI internal built-in with wordpress
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script('jquery-ui-dialog');
    wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_script('jquery-ui-spinner');

    // original enqueue css stylesheet
    wp_dequeue_style( 'textivia-hephaestus');
    wp_enqueue_style( 'google-fonts-child', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800|Open+Sans:400,600,700,800', array( 'parent-styles' ), '4.0');
    wp_enqueue_style( 'parent-styles', get_template_directory_uri() . '/style.css', '', '5.5.2.5');
    wp_enqueue_style( 'child-styles', get_stylesheet_uri(), array( 'parent-styles' ), '4.0');
	wp_enqueue_style( 'slickslider', get_stylesheet_directory_uri() .'/lib/slick/slick.css' , array( 'parent-styles' ), '4.0');
	wp_enqueue_style( 'slickslider-theme', get_stylesheet_directory_uri() .'/lib/slick/slick-theme.css' , array( 'parent-styles' ), '4.0');

    # original enqueue javascript
	wp_enqueue_script( 'slickslider', get_stylesheet_directory_uri() . '/lib/slick/slick.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'scrollto', get_stylesheet_directory_uri() . '/lib/scrollto.js', array('jquery'), '2.1.2', true );
	wp_enqueue_script( 'sitescripts-child', get_stylesheet_directory_uri() . '/js/sitescripts.js', array('jquery'), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'wpstarter_child_style');

add_image_size( 'thumbnail_640x480', 640, 480, true);

function createSectionID($iconcode) {
	//$cleanclass = preg_replace('/\s+/', '', $iconcode);	
	$pieces = explode(" ",$iconcode);
	$cleanclass = str_replace('-', '_', $pieces[1]);	
	return strtolower($cleanclass);
}
function createProductID($text) {
	$cleanID = preg_replace('/\s+/', '_', $text);	
	return strtolower($cleanID);
}

function post_image_sizes($sizes){
    $custom_sizes = array(
        'thumbnail_640x480' => '640x480'
    );
    return array_merge( $sizes, $custom_sizes );
}
add_filter('image_size_names_choose', 'post_image_sizes');

add_filter( 'wpseo_breadcrumb_links', 'products_breadcrumb_trail' );
function products_breadcrumb_trail( $links ) {
    global $post;

    if ( is_singular( 'post' ) || is_archive() || is_category()) {
        $breadcrumb[] = array(
            'url' => '/about/',
            'text' => 'About',
        );

        $breadcrumb[] = array(
            'url' => '/about/blog/',
            'text' => 'Blog',
        );        

        array_splice( $links, 1, -1, $breadcrumb );
    }



    return $links;
}

add_action('wp_head', 'ajaxplugin_ajaxurl');

function ajaxplugin_ajaxurl() {
    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}



add_action('wp_ajax_nopriv_checkzip', 'check_zip_function');
add_action('wp_ajax_checkzip', 'check_zip_function');

function check_zip_function(){
    header('Content-type: application/json');
    $zip_input = $_GET['zipcode'];

    $result = array();
    $my_zip = new ZipCounty();
    $my_tax = new TaxRate();

    $my_county = $my_zip->getCounty($zip_input);

    $result['zip'] = $zip_input;
    $result['county'] = $my_county;
    $result['valid'] = $my_zip->isValid($zip_input);
    $result['tax'] = $my_tax ->getRate($my_county);

    $json = json_encode($result);

    echo $json;

    wp_die();
}

