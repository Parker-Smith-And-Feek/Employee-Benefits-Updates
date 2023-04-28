<!DOCTYPE html>
<html class ='' lang='en'>
    <!--Start head content-->
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-CJM479T7LQ"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-CJM479T7LQ');
            </script>
        <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-PLNJWWQ');</script>
        <!-- End Google Tag Manager -->
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php
            $title = get_bloginfo('name');
            (is_front_page() ? print get_bloginfo('name') : wp_title('|', true, 'right'));?></title>
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
                'posts_per_page' => -1,
            ];
            $hrinsight_query = new WP_Query($hr_args);
            foreach($hrinsight_query->posts as $hr){
                $hr->article_url = implode('',get_post_custom_values('IMA Link', $hr->ID));
            }

            $ebb_args = [
                'orderby' => 'date',
                'order' => 'DESC',
                'cat' => 5,
                'posts_per_page' => -1,
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
        <link rel ='icon' href ="https://www.employee-benefits-updates.com/wp-content/themes/psf-ebu-theme/images/favicon.ico">
        <link rel ="canonical" href ="https://www.employee-benefits-updates.com">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name = "description" content ="Employee benefits compliance is a complex and ever changing landscape. We provide up-to-date information and notice of changes to state and federal legislation that may affect your benefit plans.">
        
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
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PLNJWWQ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <header id = "headerMain">
        <!--Header image and logo-->
            <hgroup class="container headerImage">
                <!-- #header start -->
                <picture>
                    <source media ="(max-width: 600px)" srcset = "/wp-content/themes/psf-ebu-theme/header-images/ebu-site-header-mobile.webp">
                    <source media ="(max-width: 769px)" srcset = "/wp-content/themes/psf-ebu-theme/header-images/ebu-site-header-tablet.webp">
                    <img src = '/wp-content/themes/psf-ebu-theme/header-images/ebu-site-header-desktop.webp' alt ="Employee Benefits Updates provided by Parker, Smith & Feek">
                </picture>
            </hgroup>
            <!--Navigation / navbar-->
            <i class="fa-solid fa-bars transition" id="ham"></i>
        </header>
        <nav class = 'selection transition' id = 'selection'>
            <img alt="Home" src="/wp-content/themes/psf-ebu-theme/header-images/ebu-site-header-mobile-nav.webp"/>
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
                    <img alt="Learn more about Parker, Smith & Feek on their website" src="/wp-content/themes/psf-ebu-theme/header-images/PS&F Primary logo-white-IMA.webp"/>
                </a>
            </div>
        </nav>


    </body>
</html>
<?php


?>