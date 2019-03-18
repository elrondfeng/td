<?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
	<?php
		switch(get_sub_field( 'button_type' )) {
			case 'internal' :
				$buttonLink = " href='" .get_sub_field( 'page_link' ) ."' " ;
				break;
			case 'external' :
				$buttonLink = " target='_blank' href='" . get_sub_field( 'custom_link' ) ."' ";
				break;
		}
	?>
	<?php if(get_sub_field( 'button_text' )): ?>
		<a title="<?php the_sub_field( 'button_text' ); ?>" class="button <?php the_sub_field( 'button_color' ); ?>" <?php echo $buttonLink; ?>>
			<?php the_sub_field( 'button_text' ); ?> <i class="fas fa-angle-right"></i>
		</a>
	<?php endif; ?>
<?php endwhile; ?>