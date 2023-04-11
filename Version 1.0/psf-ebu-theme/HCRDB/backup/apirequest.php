<?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  echo $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
  require_once('/var/www/vhosts/employee-benefits-updates.com/httpdocs/wp-load.php');

  global $wpdb;

  //Make date variables to use in API requests
  $today = strtotime('now');
  $onepointfive = substr(date('c', strtotime("-18 month", $today)),0,-6);
  $twoyears = substr(date('c', strtotime("-2 year", $today)),0,-6);


  //***Delete all previous entries into benefits webinars table***//
  $wpdb->query('TRUNCATE TABLE benefits_webinars');
  echo "Deleted benefits webinars";

  //***Delete all previous entires into articles table***//

  $wpdb->query('TRUNCATE TABLE articles');
  echo "deleted articles";


  //***Delete all previous entires into employee benefits table***//
  $wpdb->query('TRUNCATE TABLE employee_benefits');
  echo "Deleted employee_benefits";

  /*Api request for webinars*/
  $futurePosts = file_get_contents('https://psfinc.com/wp-json/benefits_webinars/future_posts');
  $apiRequest = file_get_contents('https://psfinc.com/wp-json/wp/v2/benefits-webinars?categories=17096&per_page=100');

  $request = json_decode($apiRequest, true);
  $requestFuture = json_decode($futurePosts, true);

  // print_r($request);

  /*API request for articles*/
  $article1 = file_get_contents("https://psfinc.com/wp-json/wp/v2/posts?categories=5&tags=12909&per_page=100&after=$onepointfive");
  $article2 = file_get_contents("https://psfinc.com/wp-json/wp/v2/posts?categories=5&tags=46&tags_exclude=12909&per_page=100&after=$twoyears");

  $apiArticle1 = json_decode($article1, true);
  $apiArticle2 = json_decode($article2, true);

  /*Loop through webinars request and INSERT each value into the database*/
  foreach ($request as $data) {
    // $date = $data[acf][benefits_webinar_date];
    $date = $data[acf][webinar_date];
    $title = $data[title][rendered];
    $content = $data[content][rendered];
    $handout = $data[acf][benefits_webinar_handouts];
    $presentation = $data[acf][benefits_webinar_presentation];
    $recording = $data[acf][benefits_webinar_recording];
    $id = $data[id];

    $insert_webinars = $wpdb->insert(benefits_webinars, array(
      'ID'      => $id,
      'Date'    => $date,
      'Title'   => $title,
      'Content' => $content,
      'Handout'    => $handout,
      'Presentation'    => $presentation,
      'Recording'    => $recording,
    ));

  }


  // /*Loop through Future webinars request and INSERT each value into the database*/
  foreach ($requestFuture as $data) {
    // $date = $data[acf][benefits_webinar_date];
    $date = date('Y-m-d', strtotime($data[acf][webinar_date]));
    $title = $data[post_title];
    $content = $data[post_content];
    $id = $data[ID];
    $host = $data[acf][host];

    // echo "<h2>In loop</h2>";
    // print_r($data);
    // echo '<h3>Date: ', date("F d, Y",strtotime($data[acf][benefits_webinar_date])), '</h3>';
    // echo '<h3>Title: ', $data[title][rendered], '</h3>';
    // echo '<h3>Content: ', $data[content][rendered], '</h3>';
    // echo '<h3>Handouts: ', $data[acf][benefits_webinar_handouts], '</h3>';
    // echo '<h3>Presentation: ', $data[acf][benefits_webinar_presentation], '</h3>';
    // echo '<h3>Recording: ', $data[acf][benefits_webinar_recording], '</h3>';
    // echo '<h3>Id: ', $data[id], '</h3>';

    $insert_webinars = $wpdb->insert(benefits_webinars, array(
      'ID'      => $id,
      'Date'    => $date,
      'Title'   => $title,
      'Content' => $content,
      'Host'    => $host,
    ));

  }

  foreach ($apiArticle1 as $data) {
    /*Establish Variables for database*/
    $date = $data[date];
    $title = $data[title][rendered];
    $content = $data[excerpt][rendered];
    $id = $data[id];
    $link = $data[link];
    $tags = json_encode($data[tags]);

    echo '<h3>Unedited Date: ', $date, '</h3>';
    echo '<h3>Date: ', date("F d, Y",strtotime($date)), '</h3>';
    echo '<h3>Title: ', $title, '</h3>';
    echo '<h3>Id: ', $id, '</h3>';
    echo '<h3>Link: ', $link, '<h3>';

    /*Insert into database*/

    $insert_articles = $wpdb->insert(articles, array(
      'id'      => $id,
      'date'    => $date,
      'title'   => $title,
      'Content' => $content,
      'link'    => $link,
      'tags'    => $tags,
    ));

  }

  foreach ($apiArticle2 as $data) {
    /*Establish Variables for database*/
    $date = $data[date];
    $title = $data[title][rendered];
    $content = $data[excerpt][rendered];
    $id = $data[id];
    $link = $data[link];
    $tags = json_encode($data[tags]);

    echo '<h3>Unedited Date: ', $date, '</h3>';
    echo '<h3>Date: ', date("F d, Y",strtotime($date)), '</h3>';
    echo '<h3>Title: ', $title, '</h3>';
    echo '<h3>Id: ', $id, '</h3>';
    echo '<h3>Link: ', $link, '<h3>';

    /*Insert into database*/

    $insert_articles = $wpdb->insert(employee_benefits, array(
      'id'      => $id,
      'date'    => $date,
      'title'   => $title,
      'content' => $content,
      'link'    => $link,
      'tags'    => $tags,
    ));

  }



?>
