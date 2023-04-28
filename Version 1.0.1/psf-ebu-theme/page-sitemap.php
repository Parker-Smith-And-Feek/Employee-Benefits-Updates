<?php 
/*
Template Name : Sitemap Page
*/
?>

<?php get_header(); ?>

	<div class="content_col">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="the_content">
				<h1><?php echo apply_filters('twobc_title_single', get_the_title()); ?></h1>
				<ul>
                    <li><a href ="https://www.employee-benefits-updates.com/"></a></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>

                </ul>
			</div>

		<?php endwhile; endif;?>
	</div>
    
<?php get_footer(); ?>