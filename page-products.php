<?php
/**
 * Template Name: Products
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in WP-Forge consists of a page content area for adding text, images, video --
 * anything you'd like.
 *
 */

get_header(); ?>


	<?php get_template_part( '/content-parts/content', 'maincontent-product' ); ?>

	<?php get_template_part( '/content-parts/content', 'flexible-content' ); ?>

<?php get_footer(); ?>
