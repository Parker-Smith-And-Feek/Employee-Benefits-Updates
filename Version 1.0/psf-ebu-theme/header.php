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

        ?>
        <script>
            let benefitsWebinars = <?php echo json_encode($webinars_data)?>;
            console.log('benefitsWebinars: ', benefitsWebinars);
            let benefitAlerts = <?php echo json_encode($benefit_alerts)?>;
            let employeeBenefits = <?php echo json_encode($employee_benefits)?>;

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
                <a style="text-decoration:none;" href="http://www.psfinc.com">
                    <img style="top:0; text-align:center;" alt="Home" src="/wp-content/uploads/2023/01/healthcarereform-webheader.jpg" />
                </a>
            </hgroup>
            <!--Navigation / navbar-->
            <i class="fa-solid fa-bars transition" id="ham"></i>
        </header>
        <nav class = 'selection transition' id = 'selection'>
            <a style="text-decoration:none;" class = 'psfincLink'href="http://www.psfinc.com"><img alt="Home" src="/wp-content/uploads/2023/01/PS&F Primary logo-IMA.jpg"/></a>
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
        </nav>

    </body>
</html>
<?php


?>