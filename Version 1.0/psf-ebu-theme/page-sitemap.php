/*
Template Name : Sitemap Page
*/

<?php get_header(); ?>

	<div class="content_col">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="the_content">
				<h1><?php echo apply_filters('twobc_title_single', get_the_title()); ?></h1>
				<?php the_content(); ?>
			</div>

		<?php endwhile; endif;?>
	</div>
    
<?php get_footer(); ?>