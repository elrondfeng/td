<?php
$extraClass ="";
$style = "";
$theButtons="";
$image="";

if(get_sub_field('section_options')):
	if(in_array('has_background',get_sub_field('section_options'))) :
		$background_image_url = get_sub_field('background_image');
		$style="style='background-image: url(" . $background_image_url['sizes']['large'] .")'";
		$extraClass ="cover-bg has-background";
	else:
		$extraClass ="";
		$style = "";
	endif;

	if(in_array('has_image',get_sub_field('section_options'))) :
		$image = get_sub_field('image');
		$image_url = $image['sizes']['thumbnail_640x480'];

		if(get_sub_field('image_position') == 'left'):
			$columnOneClass = "small-order-1 medium-order-1";
			$columnTwoClass = "small-order-2 medium-order-2 aligned-content";
		else:
			$columnOneClass = "small-order-2 medium-order-2 aligned-content";
			$columnTwoClass = "small-order-1 medium-order-1";
		endif;
	else:
		$columnOneClass="";
		$columnTwoClass="";
	endif;

	if(in_array('has_link',get_sub_field('section_options'))) :

		if( have_rows('button_links') ):
			while ( have_rows('button_links') ) : the_row();
				$theButtons.='<a title="' . get_sub_field('link_text') . '" class="button custom red" href="' . get_sub_field('link_url') . '">' . get_sub_field('link_text') . '</a> &nbsp;';
			endwhile;
		else:
			$theButtons="";
		endif;
	endif;
endif;

if(get_sub_field('header')):
	$theHeader = get_sub_field('header');
else:
	$theHeader ="";
endif;


?>

<section class="basic-content content padded-section <?php echo $extraClass; ?>" <?php echo $style; ?>>
	<div class="row">
		<?php if($image) : ?>
			<?php if(is_page_template( 'page-landing-page.php' )): ?>
			<div class="small-24 medium-12 columns <?php echo $columnOneClass; ?>">
			<?php else: ?>
			<div class="small-24 medium-10 columns <?php echo $columnOneClass; ?>">				
			<?php endif; ?>
				<img src="<?php echo $image_url; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
			</div>
			
			<?php if(is_page_template( 'page-landing-page.php' )): ?>
			<div class="small-24 medium-12 columns <?php echo $columnTwoClass; ?>">
			<?php else: ?>
			<div class="small-24 medium-14 columns <?php echo $columnTwoClass; ?>">	
				
			<?php endif; ?>					
				<div class="row">
					<?php if($theHeader):?>
					<div class="medium-24 columns text-left">
						<<?php the_sub_field( 'type_of_header' ); ?>>
							<?php
								echo $theHeader;
								echo $theSubheader;
							?>
						</<?php the_sub_field( 'type_of_header' ); ?>>
					</div>
					<?php endif; ?>

					<div class="small-24 <?php if(get_sub_field('has_video')): ?> medium-12 <?php endif; ?>columns">
						<?php the_sub_field('content'); ?>
						<p>
						<?php while ( have_rows( 'button_section' ) ) : the_row(); ?>
							<?php get_template_part( 'components/component', 'button'); ?>
						<?php endwhile; ?>
						</p>
					</div>
				</div>
			</div>
		<?php else: ?>
			<?php if($theHeader):?>
			<div class="medium-24 columns text-left">
				<<?php the_sub_field( 'type_of_header' ); ?>>
					<?php
						echo $theHeader;
						echo $theSubheader;
					?>
				</<?php the_sub_field( 'type_of_header' ); ?>>
			</div>
			<?php endif; ?>

			<div class="small-24 <?php if(get_sub_field('has_video')): ?>large-12 <?php endif; ?>columns">
				<?php the_sub_field('content'); ?>
				<p>
					<?php while ( have_rows( 'button_section' ) ) : the_row(); ?>
						<?php get_template_part( 'components/component', 'button'); ?>
					<?php endwhile; ?>
				</p>
			</div>
		<?php endif; ?>
	</div>
</section>