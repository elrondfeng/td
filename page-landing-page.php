<?php
/**
 * Template Name: Landing Page
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in WP-Forge consists of a page content area for adding text, images, video --
 * anything you'd like.
 *
 */

get_header(); ?>




<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php if ( get_field( 'background_image' ) ) { 
		$background_image_obj = get_field( 'background_image' );	
		
		$background_image_url=$background_image_obj['url'];
	}?>
<section id="mainContent" class="overlay content align-stretch cover-bg padded-section products" style="background-image:url(<?php echo $background_image_url; ?>); background-position: center center;">
	<div class="row ">
		<div class="small-24 medium-12  columns ">
			<h1>
				<?php if(get_field('alternate_header')): ?>
					<?php the_field('alternate_header'); ?>
				<?php else : ?>
					<?php the_title(); ?>
				<?php endif; ?>
			</h1>
			
			<?php the_content(); ?>
			<br />

			<?php $main_content_image = get_field( 'main_content_image' );  ?>
			
			<?php if ( $main_content_image ) { ?>
				<img src="<?php echo $main_content_image['sizes']['thumbnail_640x480']; ?>" />
			<?php } ?>

			<?php if(get_field('main_content_section_has_link')): ?>
			<p>
				<?php while ( have_rows( 'button_section' ) ) : the_row(); ?>
					<?php get_template_part( 'components/component', 'button'); ?>
				<?php endwhile; ?>
			</p>
			<?php endif; ?>
		</div>
		<div class="small-24 medium-12  columns ">
			<div class="form_container" id="quoteform">
				<h2 class="text-center"><?php the_field( 'form_header' ); ?></h2>
				<?php
					if(get_field('product_quote_form')):
					    $form_object = get_field('product_quote_form');
					    echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="false"]');
				    else:
					    echo "&nbsp;";
				    endif;
				?>
			</div>
		</div>
	</div>
</section>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


	<?php if ( have_rows( 'icons' ) ) : ?>
	<div class="blue_bg">
		<div class="row small-up-2 medium-up-3 large-up-6 icons">		
			<?php while ( have_rows( 'icons' ) ) : the_row(); ?>
				<div class="column text-center individual-icon">
					<?php $icon_array = get_sub_field( 'icon' ); ?>
					<?php if ( $icon_array ): ?>
							<i class="fal <?php echo $icon_array['value']; ?>"></i>
							<strong><?php echo $icon_array['label']; ?></strong>
					<?php endif; ?>			
				</div>
			<?php endwhile; ?>
		</div>
	</div>
	<?php else : ?>
		<?php // no rows found ?>
	<?php endif; ?>



<?php get_template_part( '/content-parts/content', 'flexible-content' ); ?>




					<?php if(!(get_field('hide_callout'))): ?>
						<?php if(get_field( 'contact_section_blurb', 'option' )): ?>				
							<div class="contact_section cover_bg padded-section">
								<div class="row">
									<div class="small-24 columns text-center flexme">
										<div>
										<?php the_field( 'contact_section_blurb', 'option' ); ?>
										</div>
										<div>
										<?php while ( have_rows( 'contact_section_buttons','option' ) ) : the_row(); ?>
											<?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
												<?php
													$buttonLink = " href='#quoteform' " ;
												?>
												<?php if(get_sub_field( 'button_text' )): ?>
													<a title="<?php the_sub_field( 'button_text' ); ?>" class="button scroll <?php the_sub_field( 'button_color' ); ?>" <?php echo $buttonLink; ?> data-hash="quoteform">
														<?php the_sub_field( 'button_text' ); ?> <i class="fas fa-angle-right"></i>
													</a>
												<?php endif; ?>
											<?php endwhile; ?>
										<?php endwhile; ?>
										
										
										
										</div>
									</div>
								</div>				
							</div>
						<?php endif; ?>
					<?php else: ?>
							<div class="contact_section cover_bg  green_border">
								<div class="row">
									<div class="small-24 columns text-center">
										
									</div>
								</div>				
							</div>						
					<?php endif; ?>					
				<footer id="footer" class="padded-section">
					<div class="row">
						<div class="small-18 small-offset-3  columns text-center ">
								<?php if ( get_field('footer_logo','options' ) ): ?>
									<?php $footerImage = get_field('footer_logo','options' ); ?>
									<a title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" class="footer-logo text-left " href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $footerImage['url']; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" /></a>
								<?php else: ?>
									<h3><? bloginfo('name'); ?></h3>
								<?php endif; ?>


					
				</footer><!-- .row -->




			</div>
		</div>
	</div>
	<a title="Scroll to top of page." class="gototop" href="#bodytop" data-smooth-scroll data-offset="200"><i class="fa fa-caret-up"></i></a>
<?php wp_footer(); ?>
</body>
</html>