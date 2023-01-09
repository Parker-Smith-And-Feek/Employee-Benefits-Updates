<!DOCTYPE html>
<html class ='' lang=''>
    <!--Start head content-->
    <head>
        <!--Get values from respective DB-tables. Will use this data to populate fields via JS/jQuery, to have more flexibility with future vs past posts-->
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
    </head>
    <!--Start of Body content-->
    <body>
        <!--Header image and logo-->
        <hgroup class="container headerImage">
            <!-- #header start -->
            <a style="text-decoration:none;" href="http://www.psfinc.com">
                <img style="top:0; text-align:center;" alt="Home" src="/wp-content/uploads/2023/01/healthcarereform-webheader.jpg" />
            </a>
        </hgroup>
        <!--Navigation / navbar-->
        <nav class = 'selection transition' id = 'selection'>
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
