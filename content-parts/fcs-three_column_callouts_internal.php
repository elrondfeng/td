<section class="three_column_callouts_internal content" >
	<?php if ( have_rows( 'callouts' ) ) : ?>
		<div class="row small-up-1 medium-up-2 large-up-3 align-stretch callouts collapse">
		<?php while ( have_rows( 'callouts' ) ) : the_row(); ?>
			<div class="column individual_callout">
				<div class="content_container text-center">
					<h3 class="callout_header"><?php the_sub_field( 'header' ); ?></h3>
					<?php the_sub_field( 'content' ); ?>
					<p class="fakelink fixtobottom"><?php the_sub_field( 'link_text' ); ?> <i class="fa fa-angle-right"></i></p>
					<a href="<?php the_sub_field( 'link' ); ?>">
						<span class="hidden"><?php the_sub_field( 'link_text' ); ?> </span>
					</a>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
	<?php else : ?>
		<?php // no rows found ?>
	<?php endif; ?>
</section>
