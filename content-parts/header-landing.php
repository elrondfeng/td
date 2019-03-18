<section id="header" data-sticky-container1 class="landing" >
	<div class="cover-bg sticky " data-sticky1 data-margin-top="0">
		<div class="row align-middle  top-bar ">
			<div class="small-12 columns header-logo"  >
				<?php if ( get_field('header_logo','options' ) ): ?>
					<?php $headerImage = get_field('header_logo','options' ); ?>

					<?php if(is_array($headerImage)) : ?>
						<?php $logoUrl = $headerImage['url']; ?>
					<?php else: ?>
						<?php $logoUrl = wp_get_attachment_url( $headerImage); ?>
					<?php endif; ?>

					<a class="text-left " href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logoUrl; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" /></a>
				<?php else: ?>
					<h1 class="hidden"><a class="text-left " href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_attr( get_bloginfo('name', 'display') ); ?></a></h1>
				<?php endif; ?>

			</div>
			<div class="small-12 columns medium-text-right align-bottom">
				<div class="row" id="top-menu">
					<div class="small-24  align-top">
						<ul class="inline float-right text-right">
							<?php if(get_field('phone','options')) : ?>
							<li>
								<a title="Phone Number" class="phone" href="tel:<?php echo textivia_cleanphonenumber(get_field('phone','options')); ?>"> <?php the_field('phone','options'); ?></a> &nbsp;
							</li>
							<?php endif; ?>
						</ul>
					</div>

				</div>

			</div>
		</div>
	</div>
</section>
