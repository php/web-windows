<?php
include __DIR__ . '/../include/config.php';

define('CUR_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

$title_page = 'Home';

function show_latest_news($count = PHP_INT_MAX) {
    $news = glob(NEWS_DIR . '*.php');
    rsort($news);
    $news = array_slice($news, 0, $count);
    foreach ($news as $entry) {
        include $entry;
    }
}

function news_date($in) {
    $time = strtotime($in);
    $human_readable = date('d M Y', $time);
    $for_tools = date(DATE_W3C, $time);
    echo "<p class='news-date'><time datetime='{$for_tools}'>{$human_readable}</time></p>";
}


include TPL_PATH . 'header.php';

include TPL_PATH . 'news_line.php';

?>

<li id="content">
  <ul id="content-columns">
    <?php

    include TPL_PATH . 'left_column.php';

    ?>

    <li id="main-column">
      <div class="content">
        <div class="block">
          <!-- .block -->
          <?php show_latest_news(10); ?>
        </div><!-- .block -->
                <p class="t-center"><!--
                                <a href="https://windows.php.net/archive/index.php"><strong>News Archive</strong></a>
                                --></p>
              </div><!-- .content -->
    </li><!-- .main-column -->
  </ul><!-- .content-columns -->

  <?php

  include TPL_PATH . 'footer.php';

  ?>
