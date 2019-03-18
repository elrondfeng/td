<div id="header" data-sticky-container class="hide-for-medium-up show-for-large">
	<div class="cover-bg sticky " data-sticky data-margin-top="0">
		<div class="row align-middle  top-bar ">
			<div class="small-24 medium-6 large-6 columns header-logo"  >
				<?php $headerImage = get_field('header_logo','options' ); ?>
				<?php $logoUrl = $headerImage['url']; ?>
				<a class="text-left " href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo $logoUrl; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" />
				</a>
			</div>
			<div class="small-24 medium-18 large-18 columns medium-text-right align-bottom">
				<div class="row align-middle" id="top-menu">
					<div class="small-24 align-top">
						<ul class="inline float-right text-right">
							<li class="location">
								<?php echo do_shortcode("[address]");?>
							</li>
							<?php if(get_field('contact_email_address','options')) : ?>
							<li class="email">
								<a title="Email Us" href="mailto:<?php the_field('contact_email_address','options'); ?>"><?php the_field('contact_email_address','options'); ?></a>
							</li>
							<?php endif; ?>

							<?php wp_nav_menu(array('theme_location' => 'top-menu', 'depth' => '1', 'container' =>'','menu_class' => 'inline','items_wrap'=>'%3$s')); ?>
							<?php if(get_field('phone','options')) : ?>
							<li>
								<a title="Phone Number" class="phone" href="tel:<?php echo textivia_cleanphonenumber(get_field('phone','options')); ?>"> <?php the_field('phone','options'); ?></a>
							</li>
							<?php endif; ?>
						</ul>
					</div>

					<div class="small-24  align-bottom text-left">
					<?php
					wp_nav_menu(array(
					    'theme_location' => 'main_menu',
					    'container' => false,
					    'depth' => 0,
					    'items_wrap' => '<ul class="dropdown menu float-right" data-dropdown-menu>%3$s</ul>',

					) );
					?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div id="header2"  class="header cover-bg header-menu show-for-small hide-for-large" <?php echo $style; ?>>
	<div >
		<div class="row align-middle  top-bar">
			
			<div class="small-14 small-offset-5 medium-10 medium-offset-7 columns text-center">
				<?php $headerImage = get_field('header_logo','options' ); ?>
				<?php $logoUrl = $headerImage['url']; ?>
				<a class="text-left " href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo $logoUrl; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" />
				</a>	
			</div>	
			
			<div class="small-9 small-offset-0 large-24 columns ">
				<button type="button" data-open="offCanvas"><i class="fa fa-bars" ></i> <span>Menu</span></button>
			</div>
			<div class="small-15 columns text-right ">
				<a class="phone" href="tel:<?php echo textivia_cleanphonenumber(get_field('phone','options')); ?>"> <?php the_field('phone','options'); ?></a>
			</div>

		</div>
	</div>
</div>