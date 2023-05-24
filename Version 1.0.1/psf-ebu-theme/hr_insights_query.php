<?php

    $args = [
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
                'cat' => 4,
                'posts_per_page' => -1,
            ];

    $hrinsight_query = new WP_Query($args);
?> 