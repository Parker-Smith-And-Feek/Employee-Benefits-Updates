<?php

/**************************Download Image for HR Insight SHORTCODE**************************/
add_shortcode('hr_image', 'show_hr_image');

function show_hr_image(){
    $output = '';
    // Get the urls from the WP Custom Fields established within wp-admin
    $hr_image = implode('',get_post_custom_values('hr_image', get_the_ID()));
    $pdf_link = implode('',get_post_custom_values('IMA Link', get_the_ID()));

    //Use default image if the custom field doesn't have a value
    if ($hr_image ==='' || $hr_image === null){$hr_image = '/wp-content/uploads/2023/08/pdf-download.jpg';}

    $output = "<a style = 'display:block; text-align: center;' href ='{$pdf_link}' aria-label = 'Follow this link to read or download the PDF version'><img alt='' class = 'hr-image' style = 'padding-bottom: 16px;' src = '{$hr_image}'></a>
    <p style='font-size:75%;text-align:center;padding-bottom:3em;'>To learn more, read the most recent <a href='{$pdf_link}'>HR Insight</a></p>";

    return $output;

}


/**************************HR INSIGHTS SHORTCODE**************************/

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
        $link = get_the_permalink();
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
    add_shortcode( 'remainder_hr_insights', 'show_remainder_hr_insights');

    function show_remainder_hr_insights($atts){
        global $post;
        $output = '';
        $args = [
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'cat' => 4,
            'posts_per_page' => -1,
        ];

        $remainder_hrinsight_query = new WP_Query($args);

        //Start the loop
        if ($remainder_hrinsight_query -> have_posts()) : while ($remainder_hrinsight_query -> have_posts()) : $remainder_hrinsight_query -> the_post();

        $index = $remainder_hrinsight_query->current_post;
        $id = get_the_ID();
        $key_value = get_post_custom_values($key = "IMA Link");
        $link = get_the_permalink();
        $title = get_the_title();
        $date = get_the_date();
        $content = get_the_excerpt();
        ?>

        <?php 
            if ($index === 0) continue;
            $output .= "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
            <h3 class = 'webinarTitle'>$title</h3>
            <p class = 'postDate'>$date</p>
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

    /**************************EMPLOYEE BENEFITS BLOG SHORTCODE**************************/
    //Show the latest Employee Benefits Blog in the top section
    add_shortcode( 'latest_ebb', 'show_latest_ebb');

    function show_latest_ebb($atts){
        global $post;
        $output = '';
        $args = [
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'cat' => 5,
            'posts_per_page' => 1,
        ];

        $latest_ebb_query = new WP_Query($args);

        //Start the loop
        if ($latest_ebb_query -> have_posts()) : while ($latest_ebb_query -> have_posts()) : $latest_ebb_query -> the_post();

        $index = $latest_ebb_query->current_post;
        $id = get_the_ID();
        $key_value = get_post_custom_values($key = "IMA Link");
        $link = get_the_permalink();
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
    add_shortcode( 'remainder_ebb', 'show_remainder_ebb');

    function show_remainder_ebb($atts){
        global $post;
        $output = '';
        $args = [
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'cat' => 5,
            'posts_per_page' => -1,
        ];

        $remainder_ebb_query = new WP_Query($args);

        //Start the loop
        if ($remainder_ebb_query -> have_posts()) : while ($remainder_ebb_query -> have_posts()) : $remainder_ebb_query -> the_post();

        $index = $remainder_ebb_query->current_post;
        $id = get_the_ID();
        $key_value = get_post_custom_values($key = "IMA Link");
        $link = get_the_permalink();
        $title = get_the_title();
        $date = get_the_date();
        $content = get_the_excerpt();
        ?>

        <?php 
            if ($index === 0) continue;
            $output .= "<div class = 'something webinar post index{$index}' id = 'post-{$id}'>
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

    //end show_remainder_ebb function    
    }
    ?>

<?php
    /**************************PSFINC Articles**************************/
    //Show the latest Articles in the top section
    add_shortcode( 'latest_articles', 'show_latest_articles');

    function show_latest_articles($atts){
        global $wpdb;
        $output = '';
        $index = 0;
        $eb_sql = $wpdb->prepare("SELECT *
            FROM employee_benefits
            ORDER BY Date DESC", array("id", 'title', 'date', 'link', 'tags')
        );
        $employee_benefits_articles = $wpdb->get_results($eb_sql);

        //Start the loop
        $row = $employee_benefits_articles[0];

        $id = $row-> id;
        $title = $row -> title;
        $content = $row -> content;
        $postDate = $row -> date;
        $date = date('F d, Y', strtotime($postDate));
        $link = $row -> link;

    
        $output = 
        "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
            <h3 class = 'webinarTitle'>$title</h3>
            <p class = 'postDate'>$date</p>
            <div class = 'content'>$content</div>
            <a class = 'excerpt' href = '{$link}' target = '_blank'>View Article</a>
        </div>";

        wp_reset_postdata();
        return $output; 
    }
    ?>

    <?php 
    //Show the remainder of Articles in the lower section
    add_shortcode( 'remainder_articles', 'show_remainder_articles');

    function show_remainder_articles($atts){
        global $wpdb;
        $output = '';
        $index = 0;
        $eb_sql = $wpdb->prepare("SELECT *
            FROM employee_benefits
            ORDER BY Date DESC", array("id", 'title', 'date', 'link', 'tags')
        );
        $employee_benefits_articles = $wpdb->get_results($eb_sql);

        //Start the loop

        foreach($employee_benefits_articles as $row){

            $id = $row-> id;
            $title = $row -> title;
            $content = $row -> content;
            $postDate = $row -> date;
            $date = date('F d, Y', strtotime($postDate));
            $link = $row -> link;

            if ($index === 0){
                $index++;
                continue;
            }

            $output .= 
            "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
                <h3 class = 'webinarTitle'>$title</h3>
                <p class = 'postDate'>$date</p>
                <a class = 'excerpt' href = '{$link}' target = '_blank'>View Article</a>
            </div>";

            $index++;

        }      

        wp_reset_postdata();
        return $output; 
    }

    ?>

<?php
    /**************************PSFINC Benefit Alerts**************************/
    //Show the latest Benefit Alert in the top section
    add_shortcode( 'latest_benefit_alert', 'show_latest_benefit_alert');

    function show_latest_benefit_alert($atts){
        global $wpdb;
        $output = '';
        $index = 0;
        $art_sql = $wpdb->prepare("SELECT *
            FROM articles
            ORDER BY Date DESC", array("id", 'title', 'date', 'link', 'tags')
            );
        $benefit_alerts = $wpdb->get_results($art_sql);

        //Start the loop
        $row = $benefit_alerts[0];

        $id = $row-> id;
        $title = $row -> title;
        $content = $row -> content;
        $postDate = $row -> date;
        $date = date('F d, Y', strtotime($postDate));
        $link = $row -> link;

    
        $output = 
        "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
            <h3 class = 'webinarTitle'>$title</h3>
            <p class = 'postDate'>$date</p>
            <div class = 'content'>$content</div>
            <a class = 'excerpt' href = '{$link}' target = '_blank'>View Article</a>
        </div>";

        wp_reset_postdata();
        return $output; 
    }
    ?>

    <?php 
    //Show the remainder of benefit alerts in the lower section
    add_shortcode( 'remainder_benefit_alert', 'show_remainder_benefit_alert');

    function show_remainder_benefit_alert($atts){
        global $wpdb;
        $output = '';
        $index = 0;
        $art_sql = $wpdb->prepare("SELECT *
            FROM articles
            ORDER BY Date DESC", array("id", 'title', 'date', 'link', 'tags')
            );
        $benefit_alerts = $wpdb->get_results($art_sql);

        //Start the loop

        foreach($benefit_alerts as $row){

            $id = $row-> id;
            $title = $row -> title;
            $content = $row -> content;
            $postDate = $row -> date;
            $date = date('F d, Y', strtotime($postDate));
            $link = $row -> link;

            if ($index === 0){
                $index++;
                continue;
            }

            $output .= 
            "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
                <h3 class = 'webinarTitle'>$title</h3>
                <p class = 'postDate'>$date</p>
                <a class = 'excerpt' href = '{$link}' target = '_blank'>View Article</a>
            </div>";

            $index++;

        }      

        wp_reset_postdata();
        return $output; 
    }

    ?>

    <?php
    /**************************PSFINC Webinars**************************/
    

    add_shortcode( 'latest_webinars', 'show_latest_webinars');

    function show_latest_webinars(){
        global $wpdb;
        $output = '';       

        $today = strtotime(date('Y-m-d'));

        $webinar_sql = $wpdb->prepare("SELECT *
        FROM benefits_webinars
        ORDER BY Date DESC", array("ID", 'Title', 'Date', 'Content', 'Handout', 'Presentation', 'Recording', 'Host')
        );
        $webinar_query_data = $wpdb->get_results($webinar_sql);

        foreach ($webinar_query_data as $row){
            $id = $row-> ID;
            $title = $row -> Title;
            $postDate = $row -> Date;   
            $date = date('F d, Y', strtotime($postDate));
            $content = $row -> Content;
            $handout = $row -> Handout;
            $presentation = $row -> Presentation;
            $recording = $row -> Recording;
            $registration = $row -> Registration_Link;
            $host = $row -> Host;
            $time = $row -> Webinar_Time;
            if ($time != ''){
                $webinar_time = '| ' . $time;
            } else{
                $webinar_time = '';
            }

            if (strtotime($postDate) >= $today){
                $preput = 
                    "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
                        <h3 class = 'webinarTitle'>$title</h3>
                        <p class = 'postDate'>$date $webinar_time</p>
                        <div class = 'content'>$content</div>";
                if ($host === 'Benefit Comply'){
                    $preput .= "<p class = 'presenter'><i>Presented by ${host}. All Benefit Comply, LLC employee benefit webinars are held at 3 p.m. Eastern, 2 p.m. Central, Noon Pacific, and are 60 minutes</i></p>";
                } else{
                    $preput .= "<p class = 'presenter'><i>Presented by $host</i></p>";
                    if ($registration !== ''){
                        $preput .= "<a class = 'registration' href = '$registration' target = '_blank'>Register Here</a>";
                    }
                }
                

                $preput .= "</div>";

                $output = $preput . $output;
                        
            } else{
                break;
            }

        }

        wp_reset_postdata();
        return $output; 
    }

    add_shortcode( 'remainder_webinars', 'show_remainder_webinars');

    function show_remainder_webinars(){
        global $wpdb;
        $output = '';       

        $today = strtotime(date('Y-m-d'));

        $webinar_sql = $wpdb->prepare("SELECT *
        FROM benefits_webinars
        ORDER BY Date DESC", array("ID", 'Title', 'Date', 'Content', 'Handout', 'Presentation', 'Recording', 'Host')
        );
        $webinar_query_data = $wpdb->get_results($webinar_sql);

        foreach ($webinar_query_data as $row){
            $id = $row-> ID;
            $title = $row -> Title;
            $postDate = $row -> Date;   
            $date = date('F d, Y', strtotime($postDate));
            $content = $row -> Content;
            $handout = $row -> Handout;
            $presentation = $row -> Presentation;
            $recording = $row -> Recording;
            $registration = $row -> Registration_Link;
            $host = $row -> Host;

            if (strtotime($postDate) < $today){
                $output .= 
                    "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
                        <h3 class = 'webinarTitle'>$title</h3>
                        <p class = 'postDate'>$date</p>";
                if ($recording !== ''){
                    $output .= "<a class = 'recording' href ='$recording' target ='_blank'>View Online</a>";
                }
                if ($presentation !== ''){
                    $output .= "<a class = 'presentation' href ='$presentation' target ='_blank'>Download Slides</a>";
                }
                if ($handout !== ''){
                    $output .= "<a class = 'handout' href ='$handout' target ='_blank'>Download Handout</a>";
                }
                $output .= "</div>";
            }
                        
        }

        wp_reset_postdata();
        return $output; 
    }


    /**************************Home Page Shortcodes**************************/
    

    add_shortcode( 'home_upcoming_webinar', 'show_home_upcoming_webinar');

    function show_home_upcoming_webinar(){
        global $wpdb;
        $output = '';       

        $today = strtotime(date('Y-m-d'));

        $webinar_sql = $wpdb->prepare("SELECT *
        FROM benefits_webinars
        ORDER BY Date DESC", array("ID", 'Title', 'Date', 'Content', 'Handout', 'Presentation', 'Recording', 'Host')
        );
        $webinar_query_data = $wpdb->get_results($webinar_sql);
        $upcoming_posts = array();

        foreach($webinar_query_data as $row){
            $postDate = $row -> Date;
            if (strtotime($postDate) > $today){
                array_unshift($upcoming_posts, $row);
            } else{
                break;
            }
        }

        $id = $upcoming_posts[0] -> ID;
        $title = $upcoming_posts[0] -> Title;
        $postDate = $upcoming_posts[0] -> Date; 
        $date = date('F d, Y', strtotime($postDate));
        $content = $upcoming_posts[0] -> Content;
        $registration = $upcoming_posts[0] -> Registration_Link;
        $host = $upcoming_posts[0] -> Host;

        
        
        $output = "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
                    <h3 class = 'webinarTitle'>$title</h3>
                    <p class = 'postDate'>$date</p>
                    <div class = 'content'>$content</div>";
        if ($host === 'Benefit Comply'){
            $output .= "<p class = 'presenter'><i>Presented by ${host}. All Benefit Comply, LLC employee benefit webinars are held at 3 p.m. Eastern, 2 p.m. Central, Noon Pacific, and are 60 minutes</i></p>";
        } else{
            $output .= "<p class = 'presenter'><i>Presented by $host</i></p>";
            if ($registration !== ''){
                $output .= "<a class = 'registration' href = '$registration' target = '_blank'>Register Here</a>";
            }
        }

        $output .= "</div>";

        wp_reset_postdata();
        return $output; 
    }

    add_shortcode( 'home_remainder_webinars', 'show_home_remainder_webinars');

    function show_home_remainder_webinars(){
        global $wpdb;
        $output = '';
        $index = 0;       

        $today = strtotime(date('Y-m-d'));

        $webinar_sql = $wpdb->prepare("SELECT *
        FROM benefits_webinars
        ORDER BY Date DESC", array("ID", 'Title', 'Date', 'Content', 'Handout', 'Presentation', 'Recording', 'Host')
        );
        $webinar_query_data = $wpdb->get_results($webinar_sql);

        foreach ($webinar_query_data as $row){
            $id = $row-> ID;
            $title = $row -> Title;
            $postDate = $row -> Date;   
            $date = date('F d, Y', strtotime($postDate));
            $content = $row -> Content;
            $handout = $row -> Handout;
            $presentation = $row -> Presentation;
            $recording = $row -> Recording;
            $registration = $row -> Registration_Link;
            $host = $row -> Host;

            if (strtotime($postDate) < $today){
                $output .= 
                    "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
                        <h3 class = 'webinarTitle'>$title</h3>
                        <p class = 'postDate'>$date</p>";
                if ($recording !== ''){
                    $output .= "<a class = 'recording' href ='$recording' target ='_blank'>View Online</a>";
                }
                if ($presentation !== ''){
                    $output .= "<a class = 'presentation' href ='$presentation' target ='_blank'>Download Slides</a>";
                }
                if ($handout !== ''){
                    $output .= "<a class = 'handout' href ='$handout' target ='_blank'>Download Handout</a>";
                }
                $output .= "</div>";

                if ($index === 1) {
                    break;
                } else{
                    $index++;
                }
            }
            
                        
        }

        wp_reset_postdata();
        return $output; 
    }


    /****Show first four Compliance Updates on Home Page */
    add_shortcode( 'home_benefit_alerts', 'show_home_benefit_alerts');

    function show_home_benefit_alerts($atts){
        global $wpdb;
        $output = '';
        $index = 0;
        $art_sql = $wpdb->prepare("SELECT *
            FROM articles
            ORDER BY Date DESC", array("id", 'title', 'date', 'link', 'tags')
            );
        $benefit_alerts = $wpdb->get_results($art_sql);

        //Start the loop

        foreach($benefit_alerts as $row){

            $id = $row-> id;
            $title = $row -> title;
            $content = $row -> content;
            $postDate = $row -> date;
            $date = date('F d, Y', strtotime($postDate));
            $link = $row -> link;

            $output .= 
            "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
                <h3 class = 'webinarTitle'>$title</h3>
                <p class = 'postDate'>$date</p>
                <a class = 'excerpt' href = '{$link}' target = '_blank'>View Article</a>
            </div>";

            if ($index === 3){
                break;
            } else{
                $index++;
            }
            


        }      

        wp_reset_postdata();
        return $output; 
    }

    //Show the first four Articles on the home page
    add_shortcode( 'home_articles', 'show_home_articles');

    function show_home_articles($atts){
        global $wpdb;
        $output = '';
        $index = 0;
        $eb_sql = $wpdb->prepare("SELECT *
            FROM employee_benefits
            ORDER BY Date DESC", array("id", 'title', 'date', 'link', 'tags')
        );
        $employee_benefits_articles = $wpdb->get_results($eb_sql);

        //Start the loop

        foreach($employee_benefits_articles as $row){

            $id = $row-> id;
            $title = $row -> title;
            $content = $row -> content;
            $postDate = $row -> date;
            $date = date('F d, Y', strtotime($postDate));
            $link = $row -> link;


            $output .= 
            "<div class = 'webinar post index{$index}' id = 'post-{$id}'>
                <h3 class = 'webinarTitle'>$title</h3>
                <p class = 'postDate'>$date</p>
                <a class = 'excerpt' href = '{$link}' target = '_blank'>View Article</a>
            </div>";

            if ($index === 3){
                break;
            } else {
                $index++;
            }


        }      

        wp_reset_postdata();
        return $output; 
    }

    /*****************PSFINC Webinars Test *****************/

    add_shortcode( 'psfinc_webinars', 'show_psfinc_webinars');

    function show_psfinc_webinars(){
        global $wpdb;
        $output = '';
        $index = 0;  
        $upcoming_count = 0;
        $past_count = 0;     

        /****Will use this timestamp as a comparison in dividing posts: Upcoming posts vs past posts ****/
        $today = strtotime(date('Y-m-d'));

        /****Prepare the query to the database for the webinar posts ****/
        $webinar_sql = $wpdb->prepare("SELECT *
        FROM benefits_webinars
        ORDER BY Date DESC", array("ID", 'Title', 'Date', 'Content', 'Handout', 'Presentation', 'Recording', 'Host')
        );
        $webinar_query_data = $wpdb->get_results($webinar_sql);

        /****Establish the 2 different arrays: Upcoming webinars & Past Webinars ****/
        $upcoming_webinars = array();
        $past_webinars = array();

        /****Loop through Query data and separate posts as Upcoming vs Past ****/
        foreach ($webinar_query_data as $row){
            $id = $row-> ID;
            $title = $row -> Title;
            $postDate = $row -> Date;   
            $date = date('F d, Y', strtotime($postDate));
            $content = $row -> Content;
            $registration = $row -> Registration_Link;
            $recording = $row -> Recording;
            $host = $row -> Host;   

            if (strtotime($postDate) < $today){
                $past_webinars[$past_count] = array(
                    "ID" => $id,
                    "Title" => $title,
                    "Date" => $postDate,
                    "Content" => $content,
                    "Registration" => $registration,
                    "Recording" => $recording,
                    "Host" => $host
                );
                ++$past_count;
            } else{
                $upcoming_webinars[$upcoming_count] = array(
                    "ID" => $id,
                    "Title" => $title,
                    "Date" => $postDate,
                    "Content" => $content,
                    "Registration" => $registration,
                    "Host" => $host
                );
                ++$upcoming_count;
            }

        }

        

        /****Render the header on the page ****/
        $output .= "<h2 class = 'title'>Upcoming Webinars</h2>";

        /****Loop through the upcoming webinars array and create the content that will be rendered on the page ****/
        foreach ($upcoming_webinars as $post){

            $id = $post[ID];
            $title = $post[Title];
            $postDate = $post[Date];   
            $date = date('F d, Y', strtotime($postDate));
            $content = $post[Content];
            $handout = $post -> Handout;
            $presentation = $post -> Presentation;
            $recording = $post -> Recording;
            $registration = $post -> Registration_Link;
            $host = $post[Host];

            $output .= "
                        <div class = 'upcomingPosts'>
                            <div class = 'benefits-webinars webinar post' id ='{$id}' style = 'border-bottom: 1px solid #f37121'>
                                <h2>{$title}</h2>
                                <h3 class = 'webinarSub webinarHost mainContent'>Date</h3>
                                <p>{$date}</p>
                                <h3 class = 'webinarSub webinarHost mainContent'>Presented By</h3>
                                <p>{$host}</p>
                                <div class = 'content'>
                                    <h3 class = 'webinarSub webinarHost mainContent'>Webinar Description</h3>
                                    <p>{$content}</p>
                                </div>
                            </div>
                        </div>
                        ";
        }

        /****Render the header on the page ****/
        $output .= "<h2>Previous Webinars Include:";
        $output .= "";     

        /****Loop through the past webinars array and create the content that will be rendered on the page ****/        
        foreach ($past_webinars as $post){
            $id = $post[ID];
            $title = $post[Title];
            $postDate = $post[Date];   
            $date = date('F d, Y', strtotime($postDate));
            $content = $post[Content];
            $handout = $post -> Handout;
            $presentation = $post -> Presentation;
            $recording = $post[Recording];
            $registration = $post -> Registration_Link;
            $host = $post[Host];

            $output .= "
                        <div class = 'upcomingPosts'>
                            <div class = 'benefits-webinars webinar post' id ='{$id}'>
                                <p><strong>{$title}</strong> - {$date}<br><a href = '$recording' target ='_blank' aria-label='{$title} online recording'>Watch Online</a></p>
                            </div>
                        </div>
                        ";
        }

        wp_reset_postdata();
        return $output;


    }

    




?>

    
