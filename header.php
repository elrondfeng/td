<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	
<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-T42VW96');</script>
<!-- End Google Tag Manager -->
	
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

	<!--[if lte IE 9]>
	<style type="text/css">
		.container .front { min-height: 300px }
		.container .front h2 { display: none !important; }
		#slider { display: none !important; }
	</style>
	<![endif]-->

	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/favicon.ico" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/manifest.json">

	<link rel="alternate" href="<?php the_permalink(); ?>" hreflang="en-us" />
	<meta name="referrer" content="origin">

	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php bloginfo('stylesheet_directory'); ?>/imgs/icons/ms-icon-144x144.png">
	<?php wp_head(); ?>
</head>

<body  id="bodytop" <?php body_class(); ?> >

	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T42VW96" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
			<div class="off-canvas position-left" id="offCanvas" data-off-canvas>
				<button class="close-button" aria-label="Close menu" type="button" data-close>
				  <span aria-hidden="true">&times;</span>
				</button>

				<?php if ( get_field('header_logo','options' ) ): ?>
					<?php $headerImage = get_field('header_logo','options' ); ?>

					<?php if(is_array($headerImage)) : ?>
						<?php $logoUrl = $headerImage['url']; ?>
					<?php else: ?>
						<?php $logoUrl = wp_get_attachment_url( $headerImage); ?>
					<?php endif; ?>

					<a title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" class="text-left offcanvas-logo " href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logoUrl; ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" /></a>

				<?php endif; ?>

				<?php
				wp_nav_menu(array(
				    'theme_location' => 'mobile',
				    'container' => false,
				    'depth' => 0,
				    'items_wrap' => '<ul class="menu vertical" >%3$s</ul>',

				) );
				?>
			</div>

			<div class="off-canvas-content" data-off-canvas-content>
				<?php if(!is_page_template( 'page-landing-page.php' )): ?>
					<?php get_template_part( '/content-parts/header', 'menu' ); ?>
				<?php else: ?>	
					<?php get_template_part( '/content-parts/header', 'landing' ); ?>
				<?php endif; ?>
				
				<?php if(is_home() || is_front_page( )): ?>
					<?php get_template_part( '/content-parts/header', 'home-hero' ); ?>
				<?php else: ?>
					<?php if(!is_page_template( 'page-landing-page.php' )): ?>
						<?php get_template_part( '/content-parts/content', 'breadcrumbs' ); ?>
					<?php endif; ?>
				<?php endif; ?>

