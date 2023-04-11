<?php
/**
 * archive.php - WordPress Archive Template
 *
 * This is a template file that lists multiple posts in a particular archive.
 * This file can be used alone or in conjunction with specific archive files
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>

    <h1 class = 'archive-title'><?php single_cat_title();?></h1>

	<div class="content_col" id='skipToContent'>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class('blog_listing'); ?>>

			<h2><?php echo apply_filters('twobc_title_list', get_the_title(), get_the_ID()); ?></h2>

			<div class="post_info">
				<p class = 'postDate'><?php the_time(get_option('date_format')); ?></p>
				<!--| posted by <?php the_author_posts_link(); ?>-->
			</div>
				<?php
				if (the_excerpt()){
					the_excerpt ();
				}
					echo '<a href="'.get_the_permalink().'">View Article</a>';
				?>

		</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2>No posts found</h2>

	<?php endif; ?>
	</div>
<?php get_footer(); ?>
