<?php get_header(); ?>

	<?php get_template_part( '/content-parts/content', 'maincontent' ); ?>
	<?php get_template_part( '/content-parts/content', 'flexible-content' ); ?>

	<?php if(is_singular()): ?>
		<?php $posts = query_posts($query_string); if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="row navigation align-middle">
				<div class="small-8 columns text-left">
					<?php previous_post_link('%link', ' <i class="fa fa-angle-left"></i>Previous', TRUE); ?>
				</div>
				<div class="small-8 columns text-center">
					<a title="View All Blog Posts" href="<?php the_field('blog_news_page','options'); ?>">View All Blog Posts</a>
				</div>
				<div class="small-8 columns text-right">
					<?php next_post_link('%link', 'Next <i class="fa fa-angle-right"></i>', TRUE); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>
	<?php endif; ?>
<?php get_footer(); ?>