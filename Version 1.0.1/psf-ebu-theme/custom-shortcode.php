<?php

    //Show the latest hr insight in the top section
    add_shortcode( 'latest_hr_insights', 'show_latest_hr_insights');

    function show_latest_hr_insights($atts){
        global $post;
        $output = '';
        $args = [
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'cat' => 4,
            'posts_per_page' => 1,
        ];

        $latest_hrinsight_query = new WP_Query($args);

        //Start the loop
        if ($latest_hrinsight_query -> have_posts()) : while ($latest_hrinsight_query -> have_posts()) : $latest_hrinsight_query -> the_post();

        $index = $latest_hrinsight_query->current_post;
        $id = get_the_ID();
        $key_value = get_post_custom_values($key = "IMA Link");
        $link = $key_value[0];
        $title = get_the_title();
        $date = get_the_date();
        $content = get_the_excerpt();
        ?>

        <?php 
            $output .= "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
            <h3 class = 'webinarTitle'>$title</h3>
            <p class = 'postDate'>$date</p>
            <div class = 'content'>$content</div>
            <a class = 'excerpt' href = '{$link}' target = '_blank'>View Article</a>
            </div>";
        ?>

        <?php
            endwhile;
            endif;
        wp_reset_postdata();
        return $output;

    //end show_latest_hr_insight function    
    }

    //Show the rest of hr insight posts, populated in the remainder div
?>