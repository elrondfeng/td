<?php $gallery_files = get_sub_field('image_gallery'); ?>
<section class="gallery">
	<?php if( $gallery_files ): ?>
	<div class="row small-up-2 medium-up-2 large-up-4 align-middle">
	    <?php foreach( $gallery_files as $gallery_file ): ?>
		<div class="column img">
			<a "Image for <?php echo $gallery_file['name']; ?>" href="<?php echo $gallery_file['url']; ?>" rel="gallery_lightbox">
				<img src="<?php echo $gallery_file['sizes']['thumbnail_640']; ?>" alt="<?php echo $gallery_file['alt']; ?>" title="<?php echo $gallery_file['title']; ?>"/>
			</a>
		</div>
	    <?php endforeach; ?>
	</div>
	<?php endif; ?>
</section>