<?php
/**
 * Template Name: Promotions
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in WP-Forge consists of a page content area for adding text, images, video --
 * anything you'd like.
 *
 */

get_header(); ?>


	<?php get_template_part( '/content-parts/content', 'maincontent' ); ?>

	<?php			
	   global $paged;
	   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	    $args = array(
	      'post_type'   => 'promotion',
	      'paged' => $paged,
	      'order' => 'DESC'
	    );
		query_posts($args);
	?>

	<?php while ( have_posts() ) : the_post(); ?>
	<div class="row promotion_container">
		<div class="small-24 columns promotion">
			<article class="row ">
				<div class="small-24 medium-8 columns">
					<?php the_post_thumbnail( 'thumbnail_640', array('title' => get_the_title() ) ); ?>
				</div>
	
				<div class="small-24 medium-16 columns">
					<h2><?php the_title(); ?>					
						<?php if(get_field( 'title_line_two' )): ?><small><?php the_field( 'title_line_two' ); ?></small><?php endif; ?>
					</h2>
					
					<div class="main_promotion_text">
						<?php the_field( 'main_offer_text' ); ?>
					</div>
					<div class="fine_print">
						<?php the_field( 'fine_print' ); ?>
					</div>
				</div>
			</article>
		</div>
	</div>

	<?php endwhile; // end of the loop. ?>

	<?php wp_reset_query(); ?>	

	<?php get_template_part( '/content-parts/content', 'flexible-content' ); ?>

<?php get_footer(); ?>
