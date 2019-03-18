<?php if(!is_front_page() && !is_home()): ?>
	<?php if ( function_exists('yoast_breadcrumb') ) : ?>
	<nav id="breadcrumbs">
		<div class="row">
			<div class="small-24 columns text-left">
				<?php yoast_breadcrumb('',''); ?>
			</div>
		</div>
	</nav>
	<?php endif; ?>
<?php endif; ?>