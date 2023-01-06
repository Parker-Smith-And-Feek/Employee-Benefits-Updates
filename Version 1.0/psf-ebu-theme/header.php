<!DOCTYPE html>
<html class ='' lang=''>
    <!--Start head content-->
    <head>
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