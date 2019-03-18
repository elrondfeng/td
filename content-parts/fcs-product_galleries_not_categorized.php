<?php $faqLink = get_sub_field( 'faq_link' ); ?>
<?php $quoteLink = get_sub_field( 'request_a_quote_link' ); ?>

<section class="product_galleries">
	<div class="dark_gray_bg padded-section">
		<div class="row">
			<div class="small-24 columns">
				<h2><?php the_sub_field( 'header' ); ?></h2>
				<?php the_sub_field( 'content' ); ?>
			
			</div>
		</div>
	</div>

	<?php if ( have_rows( 'galleries' ) ) : ?>
		<?php while ( have_rows( 'galleries' ) ) : the_row(); ?>
			<div class="row gallery_container" id="<?php echo createProductID(get_sub_field( 'short_button_text' )); ?>">
				<div class="small-24 columns">				
					<?php $image_gallery_images = get_sub_field( 'image_gallery' ); ?>
					<?php if ( $image_gallery_images ) :  ?>
								<div class="row small-up-2 medium-up-4 align-middle gallery">
									<?php foreach ( $image_gallery_images as $image_gallery_image ): ?>							
									<div class="column">
										<a href="<?php echo $image_gallery_image['url']; ?>" rel="lightbox[<?php echo createProductID(get_sub_field( 'short_button_text' )); ?>]">
											<img src="<?php echo $image_gallery_image['sizes']['thumbnail_640x480']; ?>" alt="<?php echo $image_gallery_image['alt']; ?>" title="<?php echo $image_gallery_image['title']; ?>" />
										</a>
									</div>							
									<?php endforeach; ?>
								</div>
					<?php endif; ?>
					<a title="<?php the_sub_field( 'button_text' ); ?>" class="button green scroll fullwidth" data-hash="quoteform">
						Request A Quote <i class="fas fa-angle-right"></i>
					</a>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</section>

