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

                    <?php if (in_category(4)){
                        // Get the urls from the WP Custom Fields established within wp-admin
                        $hr_image = implode('',get_post_custom_values('hr_image', get_the_ID()));
                        $pdf_link = implode('',get_post_custom_values('IMA Link', get_the_ID()));

                        //Use default image if the custom field doesn't have a value
                        if ($hr_image === '' || $hr_image === null){ $hr_image = '/wp-content/uploads/2023/08/pdf-download.jpg';}
                        ?>
                        <a style ="display:block; text-align: center;" href ="<?php echo $pdf_link;?>" aria-label ="Follow this link to read or download the PDF version"><img alt="" class = 'hr-image' style = "padding-bottom: 16px;" src ="<?php echo $hr_image ?>"/></a>
                        <p style ="font-size: 75%;text-align: center;padding-bottom: 3em;">To learn more, read the most recent <a href ="<?php echo $pdf_link;?>">HR Insight</a></p>

                    <?php //End if in_category(4)
                    }?>
                    
                    <div>
                        <p style="font-size: .8em; font-style: italic;">
                            The views and opinions expressed within are those of the author(s) and do not necessarily reflect the official policy or position of Parker, Smith & Feek. While every effort has been taken in compiling this information to ensure that its contents are totally accurate, neither the publisher nor the author can accept liability for any inaccuracies or changed circumstances of any information herein or for the consequences of any reliance placed upon it.
                        </p>

                    </div>
                </div>

            </div>

        <?php endwhile; endif;?>
	</div>

<?php get_footer(); ?>