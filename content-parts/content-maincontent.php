
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section id="mainContent" class="content align-stretch cover-bg padded-section">
	<div class="row ">

	<?php if ( get_field( 'main_content_section_has_image' ) == 1 ) { ?>
		<div class="small-24 medium-14  columns ">
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

			<?php if(get_field('main_content_section_has_link')): ?>
			<p>
				<?php while ( have_rows( 'button_section' ) ) : the_row(); ?>
					<?php get_template_part( 'components/component', 'button'); ?>
				<?php endwhile; ?>
			</p>
			<?php endif; ?>
		</div>
		<div class="small-24 medium-10  columns ">


<?php $main_content_image = get_field( 'main_content_image' );  ?>

<?php if ( $main_content_image ) { ?>
	<img src="<?php echo $main_content_image['sizes']['thumbnail_640x480']; ?>" alt="<?php echo $main_content_image['alt']; ?>" title="<?php echo $main_content_image['title']; ?>"/>
<?php } ?>


		</div>
	
	<?php } else {  ?>
		<div class="small-24 medium-24  columns ">
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
	
			<?php if(get_field('main_content_section_has_link')): ?>
			<p>	<?php while ( have_rows( 'button_section' ) ) : the_row(); ?>
					<?php get_template_part( 'components/component', 'button'); ?>
				<?php endwhile; ?>
			</p>
			<?php endif; ?>
		</div>
	<?php } ?>
	</div>
	
</section>
<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>