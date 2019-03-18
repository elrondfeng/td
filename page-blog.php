<?php
/**
 * Template Name: Blog
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in WP-Forge consists of a page content area for adding text, images, video --
 * anything you'd like.
 *
 */

get_header(); ?>

<?php get_template_part( '/content-parts/content', 'maincontent' ); ?>
<?php get_template_part( '/content-parts/content', 'flexible-content' ); ?>

<section class="blog ">
	<div class="row align-stretch">
		<div class="small-24 medium-16 columns  blogcontent">
			<?php
			   global $paged;
			   $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			    $args = array(
			      'post_type'   => 'post',
			      'paged' => $paged,
			      'order' => 'DESC'
			    );
				query_posts($args);
			?>


			<?php while ( have_posts() ) : the_post(); ?>
			<article class="row">

				<div class="small-24  columns   ">
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<div class="meta"><?php the_time('F d, Y'); ?></div>
					<?php if(has_post_thumbnail()): ?>
						<?php the_post_thumbnail('thumbnail_640'); ?>
					<?php endif; ?>

					<?php the_excerpt(); ?>

					<p> <a title="Read More: <?php the_title(); ?>" class="button orange" href="<?php the_permalink(); ?>">Read More</a></p>
				</div>
			</article>

			<?php endwhile; // end of the loop. ?>
		</div>
		<div class="small-24 medium-8 columns sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>

	<?php if(wp_count_posts()->publish > get_option('posts_per_page')): ?>
	<div class="row divider-line">
		<div class="small-24 columns">
			<hr />
		</div>
	</div>

	<div class="row pagination">
		<div class="small-24 columns text-center">
			<?php
			global $wp_query;

			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages,
				'prev_text'          => __('<i class="fa fa-angle-left"></i> Previous'),
				'next_text'          => __('Next <i class="fa fa-angle-right"></i>'),
			) );
			?>
		</div>
	</div>
	<?php endif; ?>

	<?php wp_reset_query(); ?>
</section>

<?php get_footer(); ?>