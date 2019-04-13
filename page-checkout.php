<?php
/**
 * Template Name: CHECKOUT
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in WP-Forge consists of a page content area for adding text, images, video --
 * anything you'd like.
 *
 */

get_header(); ?>


<section id="checkout">

    <div class="row checkout_form">
        <div class="small-24 medium-14 large-16 columns">

            <?php if(get_field('form_header')): ?><h2 class="text-center"><?php the_field('form_header'); ?></h2><?php endif; ?>
            <?php
            if(get_field('checkout_form')):
                $form_object = get_field('checkout_form');
                echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="false"]');
            else:
                echo "&nbsp;";
            endif;
            ?>
        </div>
        <div class="small-24 medium-10 large-8 columns sidebar show-for-medium">
            <div class="white_container">
                <ul class="nobullets">
                    <li><a title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" class="text-left offcanvas-logo " href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="https://www.tdmetalbuildings.com/wp-content/uploads/2018/07/TDBuildings-Logo-ForLightBackgrounds-Transparent_v1.png" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" /></a><br><br></li>

                    <li><h2><?php bloginfo('name'); ?></h2></li>

                    <?php if(get_field("phone","options")): ?>
                        <li class="location">
                            <?php echo do_shortcode("[address]");?>
                        </li>
                        <li>
                            &nbsp;
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

