<?php if ( have_rows( 'the_process' ) ) : ?>
<section class="process">
	<?php while ( have_rows( 'the_process' ) ) : the_row(); ?>
	<article class="row process_step">
		<div class="small-24 columns">	
			<div class="flexme primary">
				<div class="number">	
					<?php the_sub_field( 'step_number' ); ?>
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
					
					<?php while ( have_rows( 'button_section' ) ) : the_row(); ?>
						<p><?php get_template_part( 'components/component', 'button'); ?></p>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</article>
	<?php endwhile; ?>
</section>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>