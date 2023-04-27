<?php /* Template Name: Hr Insights */ ?>

<?php 
    get_header();
    $latest_hr_args = [
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'cat' => 4,
        'posts_per_page' => 1,
    ];
    $latest_hrinsight_query = new WP_Query($latest_hr_args);
    
    $past_hr_arg = [
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'cat' => 4,
        'posts_per_page' => -1,
        'offset' => 1
    ];
    $past_hrinsight_query = new WP_Query($past_hr_arg);
?>

<div class = 'content_col'>
    <div class = 'the_content'>
        <h1><?php echo apply_filters('twobc_title_single', get_the_title()); ?></h1>
        <div class="hrContainer">
            <div class="articlesContainer hrInsights" id="hrInsights">
                <div class="mostRecent" id="mostRecent">
                    <h2>Latest HR Insights</h2>
                    <div class="articlesImageContainer">
                            <img src="https://www.employee-benefits-updates.com/wp-content/uploads/2023/01/laptop-cropped.jpg" alt="Parker, Smith &amp; Feek Benefit Alerts" class="latestImage">
                    </div>
                        
                    <?php 
                        if ($latest_hrinsight_query -> have_posts()) : while ($latest_hrinsight_query -> have_posts()) : $latest_hrinsight_query -> the_post(); 

                        $index = $latest_hrinsight_query->current_post;
                        $date = $latest_hrinsight_query ->post_date;
                        $key_value = get_post_custom_values($key = "IMA Link");
                    ?>
                    <div class = 'webinar post index<?php echo $index;?>' id ="post-<?php the_ID();?>">

                            <h3 class = 'webinarTitle'><?php the_title()?></h3>

                                <p class = 'postDate'><?php the_date();?></p>
                                <div class = 'content'><?php the_excerpt();?></div>
                                <a class = 'excerpt' href = "<?php echo $key_value[0];?>" target ="_blank">View Article</a>
                    </div>
                        <?php endwhile?>
                        <?php endif ?>
                </div>
                <div class="remainder" id="remainder">
                    <?php 
                            if ($past_hrinsight_query -> have_posts()) : while ($past_hrinsight_query -> have_posts()) : $past_hrinsight_query -> the_post(); 

                            $index = $past_hrinsight_query->current_post+1;
                            $date = $past_hrinsight_query ->post_date;
                            $key_value = get_post_custom_values($key = "IMA Link");
                        ?>
                        <div class = 'webinar post index<?php echo $index;?>' id ="post-<?php the_ID();?>">

                                <h3 class = 'webinarTitle'><?php the_title()?></h3>

                                    <p class = 'postDate'><?php the_date();?></p>
                                    <a class = 'excerpt' href = "<?php echo $key_value[0];?>" target ="_blank">View Article</a>
                        </div> 
                    <?php endwhile?>
                    <?php endif ?>                   

                </div>
            </div>
        </div>

        <?php 
            // Reset post data
            wp_reset_postdata();
        ?>
    </div>
</div>

