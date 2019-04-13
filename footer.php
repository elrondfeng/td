<footer id="footer" class="padded-section">
    <div class="row">
        <div class="small-24 medium-12 columns text-center medium-text-left large-text-left">
            <?php if (get_field('footer_logo', 'options')): ?>
                <?php $footerImage = get_field('footer_logo', 'options'); ?>
                <a title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="footer-logo text-left "
                   href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo $footerImage['url']; ?>"
                                                                     alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                                                                     title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"/></a>
            <?php else: ?>
                <h3><? bloginfo('name'); ?></h3>
            <?php endif; ?>


            <ul class="nobullets">
                <li class="location">
                    <?php echo do_shortcode("[address]"); ?>
                </li>
                <li>
                     
                </li>
                <?php if (get_field("phone", "options")): ?>
                    <li class="phone">
                        <strong>Phone:</strong> <a class="phone" title="Call Us Today!"
                                                   href="tel:<?php echo textivia_cleanphonenumber(get_field("phone", "options")); ?>"><?php the_field("phone", "options"); ?></a>
                    </li>
                <?php endif; ?>
                <?php if (get_field("fax", "options")): ?>
                    <li class="fax">
                        <strong>Fax:</strong> <a class="fax" title="Fax Us Today!"
                                                 href="tel:<?php echo textivia_cleanphonenumber(get_field("fax", "options")); ?>"><?php the_field("fax", "options"); ?></a>
                    </li>
                <?php endif; ?>

            </ul>

            <?php if (have_rows('social_media_networks', 'options')): ?>
                <ul class="inline text-center medium-text-left large-text-left ">
                    <?php while (have_rows('social_media_networks', 'options')) : the_row(); ?>
                        <li class="social">
                            <a target="_blank" title="Visit us on <?php the_sub_field('url'); ?>"
                               href="<?php the_sub_field('url'); ?>" class="social-icon"><span
                                        class="hidden"><?php the_sub_field('url'); ?></span></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>

        <div class="small-24 medium-12 columns footer-menu text-center medium-text-left large-text-left">
            <ul class="nobullets">
                <?php wp_nav_menu(array('theme_location' => 'footer', 'depth' => '1', 'container' => '', 'items_wrap' => '%3$s')); ?>
            </ul>
        </div>

    </div>

    <div class="row divider-line">
        <div class="small-24 columns">
            <hr/>
        </div>
    </div>
</footer><!-- .row -->


<div id="copyright">

    <div class="row align-middle">
        <div class="small-24 medium-12 columns text-center medium-text-left ">
            <p>Copyright <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
            <p><a title="Privacy Policy" href="/privacy-policy/">Privacy Policy</a> | <a title="Terms of Use"
                                                                                         href="/terms-of-use/">Terms of
                    Use</a></p>
        </div>
        <div class="small-24 medium-12 columns text-center medium-text-right">
            <p>Web Design & Internet Marketing by Textivia</p>
        </div>
    </div>
</div>
</div>
</div>
</div>
<a title="Scroll to top of page." class="gototop" href="#bodytop" data-smooth-scroll data-offset="200"><i
            class="fa fa-caret-up"></i></a>
<?php wp_footer(); ?>

<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0045/4589.js" async="async" defer></script>
<script src="//rum-static.pingdom.net/pa-5b5cd51c54acd3001600001c.js" async defer></script>

</body>
</html>