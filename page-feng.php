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


<?php get_template_part( '/content-parts/content', 'maincontent' ); ?>


<section id="custom-product" >

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );
    </script>

    <?php $price = 0 ?>


    <div class="row">
        <div class="small-24 medium-12 large-12 columns">

            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Start</a></li>
                    <li><a href="#tabs-2">Roof</a></li>
                    <li><a href="#tabs-3">Size</a></li>
                    <li><a href="#tabs-4">Walls</a></li>
                    <li><a href="#tabs-5">Doors</a></li>
                    <li><a href="#tabs-6">Options</a></li>
                </ul>
                <div id="tabs-1">
                    <div id="start">
                        <h5>Price Includes Delivery & Installation.</h5>
                        <input id="startCustomizeButton" type="submit" value="START">
                    </div>
                </div>
                <div id="tabs-2">
                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                </div>
                <div id="tabs-3">
                    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
                </div>
                <div id="tabs-4">
                    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
                </div>
                <div id="tabs-5">
                    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                </div>
                <div id="tabs-6">
                    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
                </div>
            </div>

        </div>

        <div class="small-24 medium-12 large-12 columns ">
            <div class="white_container">
                <ul class="nobullets">

                    <li> <?php echo $price ?> </li>

                    <li><a title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" class="text-left offcanvas-logo " href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="https://www.tdmetalbuildings.com/wp-content/uploads/2018/07/TDBuildings-Logo-ForLightBackgrounds-Transparent_v1.png" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" /></a><br><br></li>

                    <li><h2><?php bloginfo('name'); ?></h2></li>

                    <?php if(get_field("phone","options")): ?>
                        <li class="location">
                            <?php echo do_shortcode("[address]");?>
                        </li>
                        <li class="phone" >
                            <strong>Phone:</strong> <a class="phone" title="Call Tao FENG Us Today!" href="tel:<?php echo textivia_cleanphonenumber(get_field("phone","options")); ?>"><?php the_field("phone","options"); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if(get_field("fax","options")): ?>
                        <li class="fax" >
                            <strong>Fax:</strong> <a class="fax" title="Fax Us Today!" href="tel:<?php echo textivia_cleanphonenumber(get_field("fax","options")); ?>"><?php the_field("fax","options"); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>

                <?php if( have_rows('social_media_networks','options') ): ?>
                    <ul class="inline  ">
                        <?php while ( have_rows('social_media_networks','options') ) : the_row(); ?>
                            <li class="social">
                                <a target="_blank" title="Visit us on <?php the_sub_field('url'); ?>" href="<?php the_sub_field('url'); ?>" class="social-icon"><span class="hidden"><?php the_sub_field('url'); ?></span></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>



<?php get_template_part( '/content-parts/content', 'flexible-content' ); ?>



<?php get_footer(); ?>
