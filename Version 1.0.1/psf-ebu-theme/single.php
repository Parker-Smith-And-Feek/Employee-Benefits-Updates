<?php
/**
 * single.php - WordPress template used to serve a single blog post
 *
 * @package WordPress
 */

get_header();

$current_category = get_the_category(get_the_ID());
$current_category = reset($current_category);
?>


	<div class="content_col single_post" id ='skipToContent'>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="the_content">
                    <h1 class="<?php echo $current_category->slug; ?>-post-title"><?php echo apply_filters('twobc_title_single', get_the_title()); ?></h1>
                    
                    <p class="post-date"><?php the_date('F j, Y'); ?></p>

                    <?php the_content(); ?>

                    <?php wp_link_pages(); ?>

                    <?php
                        if (is_single()) :

                        $all_terms = wp_get_post_terms(get_the_ID(), 'category');
                        $main_term = reset($all_terms);
                    endif?>	
                    
                    <div>
                        <p style="font-size: .8em; font-style: italic;">
                            The views and opinions expressed within are those of the author(s) and do not necessarily reflect the official policy or position of Parker, Smith & Feek. While every effort has been taken in compiling this information to ensure that its contents are totally accurate, neither the publisher nor the author can accept liability for any inaccuracies or changed circumstances of any information herein or for the consequences of any reliance placed upon it.;}
                        </p>

                    </div>
                </div>

            </div>

        <?php endwhile; endif;?>
	</div>

<?php get_footer(); ?>