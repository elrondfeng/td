<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section id="mainContent" class="content align-stretch cover-bg padded-section products">
	<div class="row ">
		<div class="small-24 medium-13  columns text-column">
			<h1>
				<?php if(get_field('alternate_header')): ?>
					<?php the_field('alternate_header'); ?>
				<?php else : ?>
					<?php the_title(); ?>
				<?php endif; ?>
			</h1>
			<?php if(is_singular('post')): ?>
				<div class="meta"><?php the_time('F d, Y'); ?></div>
			<?php endif; ?>			
			
			
			<?php the_content(); ?>

			

			<?php $main_content_image = get_field( 'main_content_image' );  ?>
			
			<?php if ( $main_content_image ) { ?>
			
				<img class="show-for-medium" alt="<?php echo $main_content_image['alt']; ?>" title="<?php echo $main_content_image['title']; ?>" src="<?php echo $main_content_image['sizes']['thumbnail_640x480']; ?>" />
			<?php } ?>


			<?php if(get_field('main_content_section_has_link')): ?>
			<p>
				<?php while ( have_rows( 'button_section' ) ) : the_row(); ?>
					<?php get_template_part( 'components/component', 'button'); ?>
				<?php endwhile; ?>
			</p>
			<?php endif; ?>
		</div>
		<div class="small-24 medium-11  columns " id="quoteform">
			<div class="form_container">
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