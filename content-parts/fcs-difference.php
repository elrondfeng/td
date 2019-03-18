

<?php if ( have_rows( 'the_difference' ) ) : ?>
<section class="process difference" data-smooth-scroll>
	<?php while ( have_rows( 'the_difference' ) ) : the_row(); ?>
	
	<article class="row process_step" id="<?php echo createSectionID(get_sub_field( 'step_icon' )); ?>">
		<div class="small-24 columns">	
			<div class="flexme primary">
				<div class="number">	
					<i class="fal <?php the_sub_field( 'step_icon' ); ?>"></i>
				</div>
				<div class="text">
					<h2><?php the_sub_field( 'header' ); ?></h2>
					<?php the_sub_field( 'primary_content' ); ?>
				</div>
			</div>
			<div class="row secondary">
				<div class="small-24 columns">		
					<h3><?php the_sub_field( 'secondary_header' ); ?></h3>
					<?php the_sub_field( 'secondary_content' ); ?>
				</div>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
</section>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>

<?php 



?>