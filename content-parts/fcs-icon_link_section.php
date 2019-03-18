<section class="icon_link_section content padded-section <?php echo $extraClass; ?>" <?php echo $style; ?>>
	<div class="row">
		<div class="small-24 columns text-center">
			<h2><?php the_sub_field( 'header' ); ?></h2>
			<?php the_sub_field( 'content' ); ?>
		</div>
	</div>
	<?php if ( have_rows( 'icon_links' ) ) : ?>
		<div class="row small-up-2 medium-up-3 large-up-6 icons">		
			<?php while ( have_rows( 'icon_links' ) ) : the_row(); ?>
				<div class="column text-center individual-icon">
					<?php $icon_array = get_sub_field( 'icon' ); ?>
					<?php if ( $icon_array ): ?>
						<a href="<?php the_sub_field( 'page_link' ); ?>#<?php echo createSectionID($icon_array['value']); ?>">
							<i class="fal <?php echo $icon_array['value']; ?>"></i>
							<strong><?php echo $icon_array['label']; ?></strong>
						</a>
					<?php endif; ?>			
				</div>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
		<?php // no rows found ?>
	<?php endif; ?>
</section>