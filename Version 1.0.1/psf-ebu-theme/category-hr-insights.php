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
	<div class="content_col insights" id='skipToContent'>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class('blog_listing'); ?>>

		<p class = 'index'><?php echo $wp_query->current_post?></p>

		<h2><?php echo apply_filters('twobc_title_list', get_the_title(), get_the_ID()); ?></h2>

			<div class="post_info">
				<p class = 'postDate'><?php echo get_the_date('F j, Y'); ?></p>
				<!--| posted by <?php the_author_posts_link(); ?>-->
			</div>

			

				<?php
					echo '<a href="'.implode('',get_post_custom_values('IMA Link', get_the_ID())).'">View Article</a>';
				?>

		</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2>No posts found</h2>

	<?php endif; ?>
	</div>
<?php get_footer(); ?>
