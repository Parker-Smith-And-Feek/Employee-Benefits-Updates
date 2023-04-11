<!DOCTYPE html>
<html class ='' lang=''>
    <!--Start head content-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php wp_title('|', true, 'right'); echo get_bloginfo('name');?></title>
        <?php
        //Get values from respective DB-tables. Will use this data to populate fields via JS/jQuery, to have more flexibility with future vs past posts
            global $wpdb;

            $web_sql = $wpdb->prepare("SELECT *
                FROM benefits_webinars
                ORDER BY Date DESC", array("ID", 'Title', 'Date', 'Content', 'Handout', 'Presentation', 'Recording', 'Host')
                );
            $webinars_data = $wpdb->get_results($web_sql);

            $art_sql = $wpdb->prepare("SELECT *
                FROM articles
                ORDER BY Date DESC", array("id", 'title', 'date', 'link', 'tags')
                );
            $benefit_alerts = $wpdb->get_results($art_sql);

            $eb_sql = $wpdb->prepare("SELECT *
                FROM employee_benefits
                ORDER BY Date DESC", array("id", 'title', 'date', 'link', 'tags')
                );
            $employee_benefits = $wpdb->get_results($eb_sql);

            $hr_args = [
                'orderby' => 'date',
                'order' => 'DESC',
                'cat' => 4,
            ];
            $hrinsight_query = new WP_Query($hr_args);
            foreach($hrinsight_query->posts as $hr){
                $hr->article_url = implode('',get_post_custom_values('IMA Link', $hr->ID));
            }

            $ebb_args = [
                'orderby' => 'date',
                'order' => 'DESC',
                'cat' => 5,
            ];
            $ebb_query = new WP_Query($ebb_args);
            foreach($ebb_query->posts as $eb){
                $eb->article_url = get_permalink($eb->ID);
            }

        ?>
        <script>
            let benefitsWebinars = <?php echo json_encode($webinars_data)?>;
            console.log('benefitsWebinars: ', benefitsWebinars);
            let benefitAlerts = <?php echo json_encode($benefit_alerts)?>;
            let employeeBenefits = <?php echo json_encode($employee_benefits)?>;
            let hrInsights = <?php echo json_encode($hrinsight_query->posts) ?>;
            let ebb = <?php echo json_encode($ebb_query->posts) ?>;

        </script>
        <?php wp_head() ?>
        <meta content="width=device-width, initial-scale=1" name="viewport">
    </head>
    <!--Start of Body content-->
    <body
        <?php
            $body_class = '';
            if (is_single() && !is_attachment()) {
                $current_category = get_the_category(get_the_ID());
                $current_category = reset($current_category);

                if ( 'articles' == $current_category->slug ) {
                    $body_class = 'cat-articles';
                }
            }
        body_class($body_class);
        ?>
        >
        <header id = "headerMain">
        <!--Header image and logo-->
            <hgroup class="container headerImage">
                <!-- #header start -->
                <picture>
                    <source media ="(max-width: 600px)" srcset = "/wp-content/themes/psf-ebu-theme/header-images/ebu-site-header-mobile.jpg">
                    <source media ="(max-width: 769px)" srcset = "/wp-content/themes/psf-ebu-theme/header-images/ebu-site-header-tablet.jpg">
                    <img src = '/wp-content/themes/psf-ebu-theme/header-images/ebu-site-header-desktop.jpg'>
                </picture>
            </hgroup>
            <!--Navigation / navbar-->
            <i class="fa-solid fa-bars transition" id="ham"></i>
        </header>
        <nav class = 'selection transition' id = 'selection'>
            <img alt="Home" src="/wp-content/themes/psf-ebu-theme/header-images/ebu-site-header-mobile-nav.jpg"/>
            <?php
            wp_nav_menu(
                array(
                    'menu'           => 'Primary',
                    'theme_location' => 'primary',
                    'container'      => '',
                    'add_li_class'   => 'select',
                )
            );
            ?>
            <div class = 'psfLink'>
                <a style="text-decoration:none;" href="http://www.psfinc.com">
                    <img alt="Learn more about Parker, Smith & Feek on their website" src="/wp-content/themes/psf-ebu-theme/header-images/PS&F Primary logo-white-IMA.png"/>
                </a>
            </div>
        </nav>


    </body>
</html>
<?php


?>