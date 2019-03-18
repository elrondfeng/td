			<?php $background_image = get_sub_field( 'background_image' ); ?>
<?php
			
		$style="style='background-image: url(" . $background_image['sizes']['large'] .")'";
		$extraClass ="cover-bg has-background ";
?>
					
<section class="three_column_callouts content padded-section <?php echo $extraClass; ?>" <?php echo $style; ?>>
	<div class="row">
		<div class="small-24 columns text-center">
			<h2><?php the_sub_field( 'header' ); ?></h2>
			<?php the_sub_field( 'content' ); ?>
		</div>
	</div>
		<?php if ( have_rows( 'callouts' ) ) : ?>
			<div class="row small-up-1 medium-up-2 large-up-3 align-stretch callouts collapse">
			<?php while ( have_rows( 'callouts' ) ) : the_row(); ?>
				<div class="column individual_callout">
					<div class="content_container has-number text-center">
						<h3><?php the_sub_field( 'header' ); ?></h3>
						<?php the_sub_field( 'content' ); ?>
						<p class="fixtobottom">
							<?php while ( have_rows( 'button_section' ) ) : the_row(); ?>
								<?php get_template_part( 'components/component', 'button'); ?>
							<?php endwhile; ?>
						</p>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>
</section>