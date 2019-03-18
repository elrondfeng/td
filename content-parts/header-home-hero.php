<?php
$style="";
$extraClass="";
$background_image_obj = get_field('background_image');
$backgroundUrl  =$background_image_obj['sizes']['large'];
if($background_image_obj):
	//$style = "style='background: rgba(48,47,53,1) url(" . $backgroundUrl . ");'";
	$extraClass ="cover-bg has-background";

else:
	$background_image_obj = get_field('default_header_background_image','options');

	//$style = "style='background: rgba(48,47,53,1) url(" . $backgroundUrl . ");'";
	$extraClass ="cover-bg has-background";
endif;
?>

<div id="hero" class=" overlay  <?php echo $extraClass; ?>" <?php echo $style; ?>  data-interchange="[<?php echo $background_image_obj['sizes']['large']; ?>, small], [<?php echo $background_image_obj['sizes']['large']; ?>, medium], [<?php echo $background_image_obj['url']; ?>, large]">
	<div class="row text-center padded-section">
		<div class="small-24  columns">
			<div class="header"><?php the_field( 'hero_line_one' ); ?>
				<small class="subheader"><?php the_field( 'hero_line_two' ); ?></small>
			</div>
			<?php while ( have_rows( 'hero_buttons' ) ) : the_row(); ?>
				<?php get_template_part( 'components/component', 'button'); ?>
			<?php endwhile; ?>
		</div>
	</div>
	
	
<?php if ( have_rows( 'hero_links' ) ) : ?>
<div class="hero_links">
	<div class="row small-up-2 medium-up-4 large-up-4">
		<?php while ( have_rows( 'hero_links' ) ) : the_row(); ?>
		<div class="column text-center hero_link">
			<a href="<?php the_sub_field( 'page_link' ); ?>">
				<?php $image = get_sub_field( 'image' ); ?>
				<?php if ( $image ) { ?>
					<img src="<?php echo $image['url']; ?>" title="<?php echo $image['title']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php } ?>
				<strong><?php the_sub_field( 'text' ); ?></strong>
			</a>
			
		</div>
		<?php endwhile; ?>
	</div>
</div>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>

</div>